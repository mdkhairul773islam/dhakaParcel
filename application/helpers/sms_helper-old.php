<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// send sms the application
function send_sms($gsm, $txt, $mask=NULL) {
    // application key
    $user = 'TTCMym'; // merchant account username
    $pass = '123456'; // merchant account password
    $sender = $mask; // Job%20Study // 11 characters
    $message = str_replace(' ', '%20', $txt);
    $mobile = '88' . substr(trim($gsm), -11);

    // for unicode
    // $url = "http://app.itsolutionbd.net/api/v3/sendsms/plain?user=$user&password=$pass&sender=$sender&text=$message&GSM=$gsm&datacoding=8";

    // for long text
    $url = "http://app.itsolutionbd.net/api/v3/sendsms/plain?user=$user&password=$pass&sender=$sender&SMSText=$message&GSM=$mobile&type=longSMS";

    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_URL, $url);
    $contents = curl_exec($c);
    curl_close($c);

    if ($contents){
    	$fileContents = str_replace(array("\n", "\r", "\t"), '', $contents);
    	$fileContents = trim(str_replace('"', "'", $fileContents));
	$simpleXml = simplexml_load_string($fileContents);
	$json = json_encode($simpleXml);
    	return $json;
    } else {
        return FALSE;
    }

    // return file_get_contents( $url );
}
