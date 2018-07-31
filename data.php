<?php

include 'DBconfig.php';

$json = array();
$sumbuX = array();
$sumbuY = array();
$count = 0;

$sql = "SELECT * FROM data";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	while($row = mysqli_fetch_assoc($result)) {
		array_push($sumbuX, $row['x']);
		array_push($sumbuY, $row['y']);
	}

} else {

	array_push($sumbuX, "0");
	array_push($sumbuY, "0");

}


$sql = "SELECT count(*) AS count FROM data";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

	$row = mysqli_fetch_assoc($result);
	$count = $row['count'];

} else {

	$count = 0;

}

echo json_encode(array(
	"count" => $count,
	"x" => $sumbuX,
	"y" => $sumbuY
));

?>