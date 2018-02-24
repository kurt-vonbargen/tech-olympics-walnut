<?php
session_start();
if (!($_SESSION["inputARR"]) && !($_POST["qtype"])) {
	$_SESSION["index"] = 0;
	$_SESSION["inputARR"] = array();
	require 'reader.php';
	$_SESSION["qHolder"] = $questionArray;
} else if ($_POST["submit"] === "-->") 
	$_SESSION["index"]++;
} else {
	$_SESSION["index"]--;
} 

$currQuestion = $_SESSION["qHolder"][($_SESSION["index"])];
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<form method="post" id="formhead" action="/forward.php">
			<input type="submit" name="submit" value="<--">
			<input type="submit" name="submit" value="-->">
			<div id = "qBox">
			<h3><?php echo $currQuestion["text"];?><br>This is question #<?php echo $_SESSION["index"];?></h3>
		</div>
		<div id = "qOptions">
			<input type = "radio" name = "value" value = "2"><?php echo $currQuestion["a1"];?><br>
			<input type = "radio" name = "value" value = "1"><?php echo $currQuestion["a2"];?><br>
			<input type = "radio" name = "value" value = "0"><?php echo $currQuestion["a3"];?><br>
			<input type = "radio" name = "value" value = "-1"><?php echo $currQuestion["a4"];?><br>
			<input type = "radio" name = "value" value = "-2"><?php echo $currQuestion["a5"];?><br>
		</div>
	</form>
	
	<input hidden name="qtype" form="formhead" value="<?php echo $currQuestion["type"];?>">
	</body>
</html>
