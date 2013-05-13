<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>天津合昶网络科技有限公司</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="js/highcharts.js"></script>
	</head>

<script type="text/javascript">
function ShowChart(Data) {
//	var data_series=[{"name":"pifu","data":[18,28,24,20,12]},{"name":"donghua","data":[16,24,40,26,34]},{"name":"taozhuang","data":[20,18,36,40,32]}]
//	var x_categories=['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'];
var data_series=Data[0];
var x_categories=Data[1];
//alert(Data[1]);
	chart=new Highcharts.Chart({
		chart: {
			renderTo:'container',
			type: 'column'
		},
		title: {
			text: '产品销量'
		},
		subtitle: {
			text: ''
		},
		xAxis: {
		   categories: x_categories
		},
		yAxis: {
			min: 0,   
			title: {
				text: '销量 (套)'
			}
		},
			tooltip: {   //提示框；提示信息；工具提示；提示文本；
			// 给显示的框美化  加单位等
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',   // {point.key}  x轴数据  月份
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +  //   {series.name}  series属性的名字
				'<td style="padding:0"><b>{point.y} 套</b></td></tr>',   //   {point.y:.1f}  y轴数据 深度
			footerFormat: '</table>',
			shared: true,    //shared  adj. 共享的，共用的；
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.1,   // 柱形图的宽度
				borderWidth: 0
			}
		},
		series: data_series
	});
}
function UpDate(data) {
//	data[0]=[{"name":"pifu","data":[18,28,24,20,12]},{"name":"donghua","data":[16,24,40,26,34]},{"name":"taozhuang","data":[20,18,36,40,32]}];
//	data[1]=['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'];
	var a=JSON.parse(data);
//	alert(a);
	ShowChart(a);
}
</script>
<body >
<div id="select">
	<input type="button" name="query" value="类型">
	<input type="button" name="query" value="设计师">
	<input type="button" name="query"  value="名称">
</div>
<div>
	<input type="date" name="date_start" id="date_start" />
	<input type="date" name="date_end" id="date_end" />
</div>
<script>
	$('input').click(function () {
		$.post('readcsv.php',{query:this.value},function (data) {
			UpDate(data)
		})
	});
</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</body>
</html>
