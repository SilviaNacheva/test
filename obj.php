<?php
class obj
{
	function getRespond() 
	{
		$service_url = 'https://c405352e-a97c-41a1-b8e5-d5232345d017.mock.pstmn.io?userToken=C64DBA84CD6D0F237D5CB3F595EDBE6E9AD51E7A';
	  	$curl = curl_init($service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);
		if ($curl_response === false) {
		    $info = curl_getinfo($curl);
		    curl_close($curl);
		    die('error occured during curl exec. Additioanl info: ' . var_export($info));
		}
		curl_close($curl);
		}
	}
?>
