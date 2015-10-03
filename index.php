<html>
<head>
	<title> Config wifi</title>
	<style>
		div.ssid {
			position:absolute;
			top : 100px;
			left : 35%;
			background: #FFFFFF;
			padding: 20px;
			width: 300px;
			height: 150px;
			
			margin:0px;
			padding:10px;
			
		}
		
		label {
			width:100px;
			display: inline-block;
			padding-bottom:5px;
		}
		
		div.topdiv {
			
			border-top-right-radius: 10px;
			border-top-left-radius: 10px;
			background-color:#5291EA;
			padding:10px;2
		}
		
		div.centrediv{
			border-left:2px solid;
			border-right:2px solid;
			border-bottom:2px solid;
			border-color: #5291EA;
			padding:10px;
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		
		span > input {
			padding : 10px;
			margin : 10px;
			width : 250px;
		}
		
	</style
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
<div class="ssid">
	<div class="topdiv">Raspberry Pi Wifi Connection</div>
	<div class="centrediv">
		<form method="POST">
			<label>SSID :</label> <input type="text" name="ssid" /><br />
			<label>Password :</label> <input type="text" name="psk" /><br >
			<span><input type="submit" name="submit" value="Connect to Wifi" /></span>
		</form>
	</div>
</div>
</body>
</html>