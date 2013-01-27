<?php 
class Cart66AuPost {
  protected $developerKey;  
  protected $fromZip;
  protected $credentials;

  public function __construct() {
    $setting = new Cart66Setting();
    $this->developerKey = Cart66Setting::getValue('aupost_developer_key');
    $this->fromZip = Cart66Setting::getValue('aupost_ship_from_zip');
    $this->credentials = 1;
  }
  
  public function getRate($PostalCode, $dest_zip, $dest_country_code, $service, $weight, $length=5, $width=5, $height=5) {
    $weight = $weight / 2.2; // Convert to Kilograms for accurate pricing
    $setting= new Cart66Setting();
    $countryCode = array_shift(explode('~', Cart66Setting::getValue('home_country')));
    
    if ($this->credentials != 1) {
      print 'Please set your credentials with the setCredentials function';
      die();
    }
    
    // Rate Request URL
    if($dest_country_code == 'AU') {
      $url = "https://auspost.com.au/api/postage/parcel/domestic/service.json";
      $url .= '?from_postcode=' . $this->fromZip;
      $url .= '&to_postcode=' . $dest_zip;
      $url .= '&length=' . $length . '&width=' . $width . '&height=' . $height;
      $url .= '&weight=' . $weight;
    } else {
      $url = 'https://auspost.com.au/api/postage/parcel/international/service.json';
      $url .= '?country_code=' . $dest_country_code;
      $url .= '&weight=' . $weight;
    }
    
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array("AUTH-KEY: $this->developerKey"));
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    
    Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] AUSTRALIA POST GET REQUEST: \n$url");
    Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] AUSTRALIA POST JSON RESULT: \n$result");

    $result = json_decode($result);
    if(isset($result->services->service)) {
      $rate = array();
      foreach($result->services->service as $service) {
        $serviceType = $service->code;
        $amount = $service->price;
        $rate[] = array('name' => $serviceType, 'rate' => $amount);
      }
      //Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] Response Description: (Service: $serviceType) $serviceType");
    } else {
      if(isset($result->error)) {
        $error = $result->error->errorMessage;
      } else {
        $error = 'There was an unspecified error message, please check the response for more details';
      }
      Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] Response Description: (Service: $service) $error");
      $rate = false;
    }
    
    //Cart66Common::log('[' . basename(__FILE__) . ' - line ' . __LINE__ . "] RATE ===> $rate");
    return $rate;
  }
  
  /**
   * Return an array where the keys are the service names and the values are the prices
   */
  public function getAllRates($toZip, $toCountryCode, $weight) {
    
    $rates = array();
    $method = new Cart66ShippingMethod();
    if($toCountryCode == 'AU') {
      $aupostServices = $method->getServicesForCarrier('aupost');
      $rate = $this->getRate($this->fromZip, $toZip, $toCountryCode, null, $weight);
      foreach($aupostServices as $service => $code) {
        if(is_array($rate)) {
          foreach($rate as $r) {
            if($rate !== FALSE && $r["name"] == $code) {
              $rates[$service] = number_format((float) $r["rate"], 2, '.', '');
            }
          }
          Cart66Common::log("LIVE RATE REMOTE RESULT ==> ZIP: $toZip Service: $service $code) Rate: $rate");
        }
      }
    } else {
      $aupostServices = $method->getServicesForCarrier('aupost_intl');
      $rate = $this->getRate($this->fromZip, $toZip, $toCountryCode, null, $weight);
      foreach($aupostServices as $service => $code) {
        foreach($rate as $r) {
          if($rate !== FALSE && $r["name"] == $code) {
            $rates[$service] = number_format((float) $r["rate"], 2, '.', '');
          }
        }
        Cart66Common::log("LIVE RATE REMOTE RESULT ==> ZIP: $toZip Service: $service $code) Rate: $rate");
      }
    }
    return $rates;
  }  
  
}