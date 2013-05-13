<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax</title>
</head>
<script>
function load() {
	var xhr;
	if (window.XMLHttpRequest) {
		xhr= new XMLHttpRequest;
	}
	else {
		xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.open("POST","demo.txt",true);
	xhr.send();
	xhr.onreadystatechange=function () {
		if (xhr.readyState==4&&xhr.status==200) {
			document.getElementById("demo").innerHTML=xhr.responseText;
		}
	}
}
</script>
<body>
<input type="button" onclick="load()" value="获取">
<div id="demo"></div>	
</body>
</html>