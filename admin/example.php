<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
function getresult(url) {    $.ajax({
	url: url,
	type: "GET",
	data:  {rowcount:$("#rowcount").val()},
	success: function(data){ $("#pagination").html(data); },
	error: function() {} 	        
   });
}
</script>

</head>
<body>

<div id="pagination">
<input type="hidden" name="rowcount" id="rowcount" />
</div>
<script>
getresult("getresult.php");
</script>

</body>
</html>