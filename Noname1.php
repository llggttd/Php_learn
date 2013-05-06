<pre><?php


//boolean
$a=True;
$b=False;
$c=NULL;
$d="0";
$e="";
$f=array();
echo "The value of \"True\" is ".$a."</br>";
echo "The value of \"False\" is ".$b."</br>";
echo "The value of \"NULL\" is ".$c."</br>";
echo "The value of \"0\" is ".$d."</br>";
echo "The value of \"\" is ".$e."</br>";
echo "The value of \"array()\" is ".$f."</br>";


//integer
$i=9999999999;	//超限自动转化为float,可用PHP_INT_MAX设置最大值
$i2=123456789.1;
var_dump($i);	
var_dump($i2);

//string
echo '12\n'.'34'."12\n"."34";		//单引号不转意
$str = <<<EP
it is paragraph,you can
see the format wont be change.
EP;
//结束标签必须置顶
echo $str;

//array
$box=array("1"=>array("1"=>100,"2"=>200,"3"=>300),
"2"=>array("1"=>400,"2"=>500,"3"=>600));
print_r($box);
unset($box[2][2]);
print_r($box);
$box=array_values($box);
foreach ($box as $num)
	echo $num;
echo $box[2][2];
