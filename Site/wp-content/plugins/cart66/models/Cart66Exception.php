<?php
/**
 * Exception error codes
 * 66101 - Product file upload failed
 * 66102 - Product save failed 
 * 66201 - Cart66ConstantContact failed to initialize
 * 66301 - Promotion save failed
 * 66501 - Invalid PayPal Express Configuration
 * 66502 - Invalid PayPal Pro Configuration
 */ 
class Cart66Exception extends Exception {
  
  public static function exceptionMessages($errorCode, $errorMessage, $reasons=null) {
    $exception = array(
      'errorCode' => $errorCode,
      'errorMessage' => $errorMessage
    );
    switch ($errorCode) {
      case 66301;
        $exception['exception'] = $reasons;
        break;
      case 66501;
        $exception['exception'] = __('In order to use PayPal Express Checkout you must enter your PayPal API username, password and signature in the Cart66 Settings Panel', 'cart66');
        break;
      case 66502;
        $exception['exception'] = __('In order to use PayPal Pro Checkout you must enter your PayPal API username, password and signature in the Cart66 Settings Panel', 'cart66');
        break;
      default;
        $exception['exception'] = __("Unfortunately there has been an error with the shopping cart.  Please contact the site Administrator for more information.<br />Error Code: $errorCode $errorMessage","cart66");
        break;
    }
    return $exception;
  }
}