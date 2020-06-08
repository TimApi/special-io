<?php 
	require_once 'dbh.php';
	
	$query = $PDO->prepare('select * FROM temperatuur ORDER BY created_at DESC LIMIT 5');
	$query->execute();
	
	$temp = $query->fetchAll();
	$temp = array_reverse($temp);

	$data = [];
	$data2 = [];
	foreach ($temp as $output){	
		$time = new DateTime($output['created_at']);
		$time = $time->format('H:i');
		array_push($data, ['y'=>$output['thermo1'], 'label'=>$time]);
	}
	foreach ($temp as $output){	
		$time = new DateTime($output['created_at']);
		$time = $time->format('H:i');
		array_push($data2, ['y'=>$output['thermo2'], 'label'=>$time]);
	}
	//print_r($data);
	//echo "<br>";
	//print_r($data2);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="refresh" content="5" >

<script type="text/script.js">

</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>
</html>
