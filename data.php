<?php
	require('connect.php');
	mysql_set_charset('utf8') or trigger_error(mysql_error());
	mysql_select_db('upms2012_v2',$connect) or die (mysql_error());
	$sql="SELECT `product`,`product_json` FROM `draft`";
	$result_id=mysql_query($sql) or die (mysql_error());
	for($i=1;$i<=mysql_num_rows($result_id) ;$i++ ){
		$product_info[]=mysql_fetch_assoc($result_id);
	}
	echo json_encode($product_info);