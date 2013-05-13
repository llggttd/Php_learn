<?php
error_reporting(E_ALL^E_NOTICE);
//接收查询字符
	if (!isset($_POST['query'])) {
		$_POST['query']="类型";
	}
	$query_string=$_POST['query'];

//从csv文件读取销售记录，将同一天的销售情况合并，并将结果存放在$date_id中，$date_id=Array([日期 ] => Array(),[日期 ] => Array())
	$file_handle=fopen("test2.csv","r");
	$date_id=array();
	$csv=fgetcsv($file_handle);
	do{
			$row=substr($csv[1],0,9);
			$date_id[$row][]=$csv[0];					
			$csv=fgetcsv($file_handle);
	}while($csv);
	fclose($file_handle);
//	print_r($date_id);


//从csv文件中读取每一件产品的product_json信息，半将结果存放在product_info中
//	$file_handle2=fopen("test.csv","r");
//	while($line=fgetcsv($file_handle2)){
//	$product_info[]=$line;
//	}
//	fclose($file_handle2);
//	print_r($product_info);
//将产品信息转换为id=>info的形式存放在数组id_info中
//	foreach ($product_info as $key=>$value){
//		$id_info[$value[0]]=json_decode($value[1],true);
//	}
//	print_r($id_info);

//从数据库读取数据，读取每一件产品的product_json信息，半将结果存放在product_info中
	require('connect.php');
	mysql_set_charset('utf8') or trigger_error(mysql_error());
	mysql_select_db('upms2012_v2',$connect) or die (mysql_error());
	$sql="SELECT `product`,`product_json` FROM `draft`";
	$result_id=mysql_query($sql) or die (mysql_error());
	for($i=1;$i<=mysql_num_rows($result_id) ;$i++ ){
		$product_info[]=mysql_fetch_assoc($result_id);
	}
//	print_r($product_info);
//将产品信息转换为id=>info的形式存放在数组id_info中
	foreach ($product_info as $key=>$value){
		$id_info[$value['product']]=json_decode($value['product_json'],true);
	}
//	print_r($id_info);


					
//将同一天的产品按类进行统计，$date_type=Array([日期]=>array([type1]=>1,[type2]=>2))				
	foreach ($date_id  as $key=>$value){			
		foreach ($value as $id_t){
			$type[$id_info[$id_t][$query_string]]+=1;
		}
		$date_type[$key]=$type;
		unset($type);
	}
//print_r($date_type);
					
					
//按类型进行统计				
	foreach ($date_type as $date=>$type){						
		foreach ($type as $type_name=>$data){
			$type_data[$type_name][$date]=($data+=$data);
		}
	}
//print_r($type_data);

//转换为highcharts中对series的要求
	foreach ($type_data as $type_name=>$data){
		$pre_json[]=array("name"=>$type_name,"data"=>array_values($data));
	}
//print_r($pre_json);

//取出x轴日期
	foreach ( $date_type as $date=>$type){
		$x_date[]=$date;
	}

//将数据合并
	$odata[]=$pre_json;
	$odata[]=$x_date;
	echo json_encode($odata);
error_reporting(E_ALL);
?>
