<?
	$ip=$_SERVER['REMOTE_ADDR'];
	$host = gethostbyaddr($ip);
	$plik = "log.txt";
	$fp = fopen($plik, "a");
	flock($fp, LOCK_EX);
	fwrite($fp, "IP: $ip HOST: $host \n");
	flock($fp, LOCK_UN);
	fclose($fp);
	
	$plik = "counter.txt";
	$fp = fopen($plik, "r+");
	flock($fp, LOCK_EX);
	$cntr = fscanf($fp, "%d")
	$cntr = $cntr + 1;
	file_put_contents("counter.txt", $cntr);
	flock($fp, LOCK_UN);
	fclose($fp);
	
?>