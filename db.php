<?php

$link = mysql_connect('172.20.27.96', 'direksysmx', 'D01NksjIw283hsl');

mysql_select_db('direksys2_e2', $link) or die(mysql_error());

function valip($ipconf) {
	$ip = '172.20.18.80';
	$ip1 = preg_split("/\./",$ip,4);
	$ips = preg_split("/,|\n/",$ipconf);

	echo "<pre>ip1 =";print_r($ip1);echo "</pre>";
	echo "<pre>ips =";print_r($ips);echo "</pre>";

	echo "<br>size".sizeof($ips)."<br>";

	for ($x = 0; $x<sizeof($ips); $x++) {
		$ips[$x] = preg_replace("/\r/", "", $ips[$x]);
		echo "ips[".$x."]".$ips[$x];
		$ip2 = preg_split("/\./",$ips[$x],4);
		echo "<pre>ip2 =";print_r($ip2);echo "</pre>";
		$ok = 1;
		for ($i = 0; $i <= 3; $i++) {
			if ($ip1[$i] != $ip2[$i] and $ip2[$i] != 'x') {
				$ok = 0;
			}
		}
		echo "ok = ".$ok;
		if ($ok) {
			//$sth = mysql_query("SELECT COUNT(*) FROM admin_IPlist WHERE Type='Black' AND IP='$ip'");

			$sql = "SELECT COUNT(*) FROM sl_ipmanager WHERE Type='Trusted' AND IP='$ip'";

			echo "<br>sql= ".$sql;

			$sth = mysql_query($sql);
			//var_dump("SELECT COUNT(*) FROM admin_IPlist WHERE Type='Trusted' AND IP='$ip'");
			$ary = mysql_fetch_array($sth);

			echo "<br>ary[0]= ".$ary[0];
			exit;

			if ($ary[0]>0) {
				return 0;
			} else {
				return 1;
			}
		}
	}
	return 0;
}

$qry2 = "SELECT * FROM sl_ipmanager WHERE Type='Trusted';";
$res2 = mysql_query($qry2) or die("Query failed: ".mysql_error());
$rec2 = mysql_fetch_array($res2);


echo "rec2= ".$rec2["IP"];#172.20.x.x

valip($rec2["IP"]);
