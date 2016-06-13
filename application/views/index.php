

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script  src="http://www.mkyong.com/wp-content/uploads/jQuery/jquery-1.3.2.min.js"></script>

<h2>TextBox value : <label id="msg"></label></h2>

<div style="padding:16px;">
	TextBox : <input type="textbox" id="weleh" value="Type something"></input>
</div>

<a id="Btn"><input type="button" value="Get TextBox Value" /></a> 
<br />
<br />
<script type="text/javascript">
    $("a:#Btn").click(function () {		
	$('#msg').html($('#weleh').val());
		
    });
	
</script>

<?php
$tz_object = new DateTimeZone('Asia/Jakarta');
$datetime = new DateTime();
//$d=strtotime("+3 Days");
$datetime->modify( '+0 day' );
$datetime->setTimezone($tz_object);

echo $datetime->format('Y\-m\-d\ h:i:s')."<br />";
echo $datetime->format('Y-m-d h:i:s A')."<br />";

$d = new DateTime( '2010-01-31' );
$d->modify( 'next month' );
echo $d->format( 'F' ), "\n";
echo "<br>";
echo "MD5 dari 5 : ".md5('5');
echo "<br />";

//echo date("Y-m-d h:i:sa", $d) . "<br>";

$jsone = '{"countryId":"84","productId":"1","status":"0","opId":"134"}';
$json = json_decode($jsone, true);
echo $json['countryId'];
echo "<br />";
echo $json['productId'];
echo "<br />";
echo $json['status'];
echo "<br />";
echo $json['opId'];
echo "<br />";

foreach ($json as $name => $value) {
    echo $name . ':'.$value;
    echo "<br />";
}

$data1 = array();
  $data2 = array();
  $data1[] = array('apple','banana','cherry');
  $data2[] = array('dog', 'elephant');
  echo json_encode(array($data1,$data2));
  echo "<br />";
  
  
  $test = 'whello';
  echo "{$test}, world";
  
  echo "<br />";
 

$string = file_get_contents("http://172.16.60.11/api_opiss/results.json",true);
$json_a=json_decode($string,true);

$getit = $json_a['weleh']['item'][5]['merchant code'];
$name = $json_a['weleh']['item'][5]['merchant name'];
//echo "OID from VNS : ".$getit;
//print_r($json_a);

echo '<pre>';
print_r ($json_a);
echo "<br />";
/*
if($getit == '000047'){
	echo "Bukan Bank Negara - ";
}
*/
//echo $getit." - ".$name;
echo '</pre>';
$i=0;
foreach($json_a['weleh']['item'] as $p)
{
	$i=$i+1;
	$merchant_code = $p["merchant code"];
	$merchant_name = $p["merchant name"];
	if($merchant_code != '000003'){
		echo "<font color='blue'>";
		echo $i.". ".$merchant_code." : ".$merchant_name;
		echo "</font>";
		echo "<br />";
	}else{
		echo $i.". ".$merchant_code." : ".$merchant_name;	
		echo "<br />";
	}
}

  
?>