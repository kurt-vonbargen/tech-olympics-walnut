<?php
$questionArray = array();
$index = 0;
$currObj = array("text"=>"blank", "type"=>"blank", "a1"=>"", "a2"=>"", "a3"=>"","a4"=>"","a5"=>"");
$questionFile = fopen("questiontxt.txt", "r");	
$currLine = "";
while (!feof($questionFile)) {
	$index++;
	$currLine = fgets($questionFile);
	if (empty($currLine)) continue;
	$tagExtent = stripos($currLine, ">");
	$tagContent = substr($currLine, 1, ($tagExtent - 1));
	echo ("At index " . $index . ", Current Line: " . $currLine . "<br>Tag Extent: " . $currLine . "<br>Tag Content: " . $tagContent); 
	$innerContent;
	if ($tagContent !== "question") {
		$innerLength = stripos($currLine, "</") - ($tagExtent + 1);
		if ($innerLength > 0) {
			$innerContent = substr($currLine, $tagExtent, $innerLength);
		} else {
			$innerContent = "";
		}
	} else continue;
	switch ($tagContent) {
		case "text":
			$currObj["text"] = $innerContent;
			break;
		case "type":
			$currObj["type"] = $innerContent;
			break;
		case "a1":
			$currObj["a1"] = $innerContent; 
			break;
		case "a2":
			$currObj["a2"] = $innerContent;
			break;
		case "a3":
			$currObj["a3"] = $innerContent;
			break;
		case "a4":
			$currObj["a4"] = $innerContent;
			break;
		case "a5":
			$currObj["a5"] = $innerContent;
			break;
		case "/question":
			$questionArray[] = $currObj;
			break;
		default:
			echo("ERROR: unexpected tag within question line #" . $index . " " . $tagContent);
	}	
}
?>