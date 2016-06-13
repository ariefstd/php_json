<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to API OPISS!</h1>

	<div id="body">
	<?php
		if (empty($query)){
			//echo "<script>alert('Teot again bro ... ');</script>";
			 $json = array(
				'Status' => 'Failed to created data'
			   );
			$datanya = json_encode($json);
			$input_bagus = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',$datanya);
			echo $input_bagus; 
	echo "<br />";
	echo "<br />";

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($datanya, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}
	
		}else{
		foreach($query as $dt){
			  $item[] = array(
			   "no subform"=>$dt["subform"],
			   "nama pelanggan"=>$dt["nama"],
			   "email pelanggan"=>$dt["email"],
			   "alamatnya"=>$dt["alamat"]   
			);   
		}
	 $json = array(
		'Status' => 'Successfully to create data',
		'weleh' => array('item' => $item)
	   );	

	$datanya = json_encode($json);
	$input_bagus = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',$datanya);
	echo $input_bagus; 
	echo "<br />";
	echo "<br />";

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($json));
fclose($fp);
	
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($datanya, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}
	
$json = json_decode($datanya, true);
//$subform = $json['item'];
//echo $subform['no_subform'];
//echo $subform."<br />";
echo "<br />";
echo "<br />";
$subform = $json{'weleh'}{'item'}{0}{'no subform'};
echo "<br />".$subform.', ';
$nama = $json['weleh']['item'][0]['nama pelanggan'];
echo $nama;
$email = $json{'weleh'}{'item'}{0}{'email pelanggan'};
echo "<br />".$email.', ';
$address = $json['weleh']['item'][0]['alamatnya'];
echo $address;
//secho $json['item'];
echo "<br />";
echo "<a href=".base_url()."results.json>json file</a>";

	
}

   ?>		
	</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>