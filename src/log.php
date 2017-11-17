<?php

class log
{
	public static function logAccess()
	{
		$ip = getenv('REMOTE_ADDR');
		$userAgent = getenv('HTTP_USER_AGENT');
		$referer = getenv('HTTP_REFERER');
		$query = getenv('QUERY_STRING');

		$sql = "INSERT INTO access_log (ip, browser, referer, query) VALUES (:ip, :userAgent, :referer, :query)";
		$params = array(":ip" => $ip, ":userAgent" => $userAgent, ":referer" => $referer, ":query" => $query);
		sql::exe($sql, $params);
	}
}
?>