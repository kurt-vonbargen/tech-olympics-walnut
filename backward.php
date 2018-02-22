<?php
session_start();
$_SESSION["index"]--;
$oldInput = $_SESSION["inputARR"][($_SESSION["index"])];
$currQuestion = $_SESSION["qHolder"][($_SESSION["index"])];
$lastValue = substr($oldInput, 1);
?>

<!DOCTYPE html>
<html>
	<head>
		<script>
			function changeDir(num) {
				switch (num) {
					case 0:
						var actionStr = "/forward.php";
						break;
					case 1:
						var actionStr = "/backward.php";
						break;
					default:
						break;
					}
				document.getElementById("formhead").setAttribute(actionStr);
			}
		</script>
	</head>
	<body>
		<form method="post" id="formhead" action="/forward.php">
			<input type="submit" value="<--" onclick="changeDir(0)">
			<input type="submit" value="-->" onclick="changeDir(1)">
			<div id = "qBox">
			<h3><?php echo $currQuestion["text"];?><br>This is question #<?php echo $_SESSION["index"];?></h3>
		</div>
		<div id = "qOptions">
			<input <?php if ($lastValue === "2") echo("checked")?> type = "radio" name = "value" value = "2"><?php echo $currQuestion["a1"];?><br>
			<input <?php if ($lastValue === "1") echo("checked")?> type = "radio" name = "value" value = "1"><?php echo $currQuestion["a2"];?><br>
			<input <?php if ($lastValue === "0") echo("checked")?> type = "radio" name = "value" value = "0"><?php echo $currQuestion["a3"];?><br>
			<input <?php if ($lastValue === "-1") echo("checked")?> type = "radio" name = "value" value = "-1"><?php echo $currQuestion["a4"];?><br>
			<input <?php if ($lastValue === "-2") echo("checked")?> type = "radio" name = "value" value = "-2"><?php echo $currQuestion["a5"];?><br>
		</div>
	</form>
	
	<input hidden name="qtype" form="formhead" value="<?php echo $currQuestion["type"];?>">
	</body>
</html>