<?php 
class Cart66CaPost {
  protected $merchantId;  
  protected $fromZip;
  protected $credentials;
  protected $language = 'en';

  public function __construct() {
    $setting = new Cart66Setting();
    $this->merchantId = Cart66Setting::getValue('capost_merchant_id');
    $this->fromZip = Cart66Setting::getValue('capost_ship_from_zip');
    $this->credentials = 1;
  }
  
  public function getRate($PostalCode, $dest_zip, $dest_country_code, $service, $weight, $length=0, $width=0, $height=0) {
    $weight = $weight / 2.2; // Convert to Kilograms for accurate pricing
    $setting= new Cart66Setting();
    $countryCode = array_shift(explode('~', Cart66Setting::getValue('home_country')));
    
    if ($this->credentials != 1) {
      print 'Please set your credentials with the setCredentials function';
      die();
    }
    
    // Rate Request
    $data = "<?xml version=\"1.0\" ?>
               <eparcel>
                 <language>$this->language</language>
                 <ratesAndServicesRequest>
                   <merchantCPCID>$this->merchantId</merchantCPCID>
                   <fromPostalCode>$this->fromZip</fromPostalCode>
                   <lineItems>
                     <item>
                       <quantity>1</quantity>
                       <weight>$weight</weight>
                       <length>$length</length>
                       <width>$width</width>
                       <height>$height</height>
                       <description> </description>
                     </item>
                   </lineItems>
                   <city> </city>
                   <provOrState> </provOrState>
                   <country>$dest_country_code</country>
                   <postalCode>$dest_zip</postalCode>
                 </ratesAndServicesRequest>
               </eparcel>";
    
    $ch = curl_init("sellonline.canadapost.ca:30000");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    $result = curl_exec($ch);
    curl_close($ch);
    
    Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] CANADA POST XML REQUEST: \n$data");
    Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] CANADA POST XML RESULT: \n$result");
    
    // Convert the result to an array
    if($result != ""){
      $result = json_decode(json_encode((array) simplexml_load_string($result)),1);
      if(!is_array($result) || isset( $result["error"])) {
        if(!is_array($result)){
          $message = "WARNING: Unable to Connect To Canada Post.";
          Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] $message");
        } else {
          $message = "WARNING: Canada Post Response Error<BR>" . " Status Code: " . $result["error"]["statusCode"] . "<br>" . " Status Message: " . $result["error"]["statusMessage"] . "<br>" . " requestID: " . $result["error"]["requestID"] . "<br>";
          Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] $message");
        }
        Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] rate is false now");
        $rate = false;
      } else {
        if(isset($result["ratesAndServicesResponse"]["product"])) {
          Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] Proper Results returned for $service");
          $rate = array();
          foreach($result["ratesAndServicesResponse"]["product"] as $option) {
            $rate[] = array('name' => $option["name"], 'rate' => $option["rate"]);
          }
        }
      }
    }
    Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] rate: $rate");
    return $rate;
  }
  
  /**
   * Return an array where the keys are the service names and the values are the prices
   */
  public function getAllRates($toZip, $toCountryCode, $weight) {
    
    $rates = array();
    $method = new Cart66ShippingMethod();
    if($toCountryCode == 'CA') {
      $capostServices = $method->getServicesForCarrier('capost');
      $rate = $this->getRate($this->fromZip, $toZip, $toCountryCode, null, $weight);
      if($rate !== false) {
        foreach($capostServices as $service => $code) {
          foreach($rate as $r) {
            if($rate !== FALSE && $r["name"] == $code) {
              $rates[$service] = number_format((float) $r["rate"], 2, '.', '');
            }
            Cart66Common::log("LIVE RATE REMOTE RESULT ==> ZIP: $toZip Service: $service $code) Rate: " . print_r($rate, true));
          }
        }
      }
    } else {
      $capostServices = $method->getServicesForCarrier('capost_intl');
      $rate = $this->getRate($this->fromZip, $toZip, $toCountryCode, null, $weight);
      if($rate !== false) {
        foreach($capostServices as $service => $code) {
          foreach($rate as $r) {
            if($rate !== FALSE && $r["name"] == $code) {
              $rates[$service] = number_format((float) $r["rate"], 2, '.', '');
            }
            Cart66Common::log("LIVE RATE REMOTE RESULT ==> ZIP: $toZip Service: $service $code) Rate: " . print_r($rate, true));
          }
        }
      }
    }
    return $rates;
  }  
  
}