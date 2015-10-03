<html>
<head>
	<title> Config wifi</title>
</head>
<body>
<?php if(isset($_POST['submit'])) {
	if((!empty($_POST['ssid'])) && (!empty($_POST['psk']))){
		$config = fopen("/etc/wpa_supplicant/wpa_supplicant.conf","a");
		$text = "\n";
		$text.= 'network={
				ssid="'.$_POST['ssid'].'"
				psk="'.$_POST['psk'].'"
				}';
		chmod($config,'0777');
		fwrite($config,$text);
		fclose($config);
		
	}
}?>
<form method="POST">
SSID : <input type="text" name="ssid" />
Password : <input type="text" name="psk" />
<input type="submit" name="submit" value="Add Wifi" />
</form>
</body>
</html>