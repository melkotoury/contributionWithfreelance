<?php

return array(

    // set your paypal credential
    'client_id' => 'ARGdNu4zdACsvanyudgKJZw0JJpxQtJ4L7FWJXfJyQnvd5HW36IhZc-RupQs_T6D_1fzYqEf10nzPOwy',
    'secret'    => 'EHL8jG3Z1Q7vIyPhe_QIUjNxkhhXca8qPfrsVuSM_9oXilnrEJDvQ_7Vbr950dRgnFyED6uOVW_RMOxp',

    /**
     *   SDK configuration
     */
    'settings'  => array(
     /**
      *   Available option 'sandbox' or 'live'
      */
    'mode'      => 'sandbox',
        /**
      *   Specify the Endpoint Url
      */
    'service.EndPoint' => 'https://api.sandbox.paypal.com',

     /**
      *   Specify the max request time in seconds
      */
    'http.ConnectionTimeOut'    => 30,
     /**
      *   Wether want to log to a file
      */

      'log.logEnabled'  => true,
     /**
      *   Specify the currency used
      */

      'currency'  => 'USD',
      /**
      *   Specify the file that you want to write on
      */
      'log.FileName'    => storage_path().'/logs/paypal.log',
      /**
      *   Available options 'FINE' , 'INFO' , 'WARN' or 'ERROR'
      *   Logging is most verbose in the 'FINE' level and decreases as you
      *   proceed towards ERROR
      */
      'log.logLevel'    => 'FINE'
    ),
);

?>
