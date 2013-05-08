<!-- 通过PHP对数据库进行查询，并把查询结果以json格式写入csv文件 -->
<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>json</title>
	</head>
	<body>
<pre><?php
			require('connect.php');
			mysql_set_charset('utf8') or trigger_error(mysql_error());
			mysql_select_db('upms2012_v2',$connect) or die (mysql_error());
			$sql="SELECT `product`,`product_json` FROM `draft`";
			$result_id=mysql_query($sql) or die (mysql_error());
//			$result=mysql_fetch_assoc($result_id);
//			var_dump($result);
			$file_handle=fopen("./test.csv","w+");
			for($i=1;$i<=mysql_num_rows($result_id) ;$i++ ){
//				$json=mysql_fetch_assoc($result_id);
//				var_dump($json);
				fputcsv($file_handle,mysql_fetch_assoc($result_id));
			}
			fclose($file_handle);
			echo "数据已写入CSV"."\n";
//			var_dump(json_encode($result));
			?></pre>
	</body>
	</html>