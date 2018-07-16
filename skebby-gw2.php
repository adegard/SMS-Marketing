<?php
define("NET_ERROR", "Network+error,+unable+to+send+the+message");
define("SENDER_ERROR", "You+can+specify+only+one+type+of+sender,+numeric+or+alphanumeric");
function do_post_request($url, $data, $optional_headers = null){
	if(!function_exists('curl_init')) {
		$params = array(
			'http' => array(
				'method' => 'POST',
				'content' => $data
			)
		);
		if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		}
		$ctx = stream_context_create($params);
		$fp = @fopen($url, 'rb', false, $ctx);
		if (!$fp) {
			return 'status=failed&message='.NET_ERROR;
		}
		$response = @stream_get_contents($fp);
		if ($response === false) {
			return 'status=failed&message='.NET_ERROR;
		}
		return $response;
	} else {
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_TIMEOUT,60);
		curl_setopt($ch,CURLOPT_USERAGENT,'Generic Client');
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_URL,$url);

		if ($optional_headers !== null) {
			curl_setopt($ch,CURLOPT_HTTPHEADER,$optional_headers);
		}

		$response = curl_exec($ch);
		curl_close($ch);
		if(!$response){
			return 'status=failed&message='.NET_ERROR;
		}
		return $response;
	}
}
function skebbyGatewaySendSMS($username,$password,$recipients,$text,$sms_type='basic',$sender_number='',$sender_string='',$charset='',$optional_headers=null) {
	$url = 'http://gateway.skebby.it/api/send/smseasy/advanced/http.php';

	switch($sms_type) {
		case 'classic':
			$method='send_sms_classic';
			break;
		case 'report':
			$method='send_sms_classic_report';
			break;
		case 'basic':
		default:
			$method='send_sms_basic';
	}

	$parameters = 'method='
				  .urlencode($method).'&'
				  .'username='
				  .urlencode($username).'&'
				  .'password='
				  .urlencode($password).'&'
				  .'text='
				  .urlencode($text).'&'
				 // .'recipients[]='.implode('&recipients[]=',$recipients)
				  .'recipients[]='.$recipients
				  ;
//echo "recipients is ".$recipients."</br>";
//echo "parameters is ".$parameters."</br>";

	if($sender_number != '' && $sender_string != '') {
		parse_str('status=failed&message='.SENDER_ERROR,$result);
		return $result;
	}
	$parameters .= $sender_number != '' ? '&sender_number='.urlencode($sender_number) : '';
	$parameters .= $sender_string != '' ? '&sender_string='.urlencode($sender_string) : '';

	switch($charset) {
		case 'UTF-8':
			$parameters .= '&charset='.urlencode('UTF-8');
			break;
		case '':
		case 'ISO-8859-1':
		default:
	}

	parse_str(do_post_request($url,$parameters,$optional_headers),$result);

	return $result;
}

?>