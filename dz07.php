<?php
if(isset($_POST["r"])){
	header("Content-type: application/json");
		$r = trim($_POST["r"]);

		$arr = array (
		'poluprecnik' => $r,
		'povrsina kruga' => $r^2*3.14
	);
	echo json_encode($arr);
}

if(isset($_GET["r"])){
	header("Content-type: application/json");
		$r = trim($_GET["r"]);

		$arr = array (
		'poluprecnik' => $r,
		'obim kruga' => $r*2*3.14
	);
	echo json_encode($arr);
}
?>