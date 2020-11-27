<?php

$conn = mysqli_connect('127.0.0.1', 'root', '', 'buzzbar') or die(mysqli_error(($conn)));

$scores = $conn->query("SELECT * FROM users ORDER BY score DESC LIMIT 10");
$i = $scores->num_rows;
while($i != 0){
    $i--;
echo json_encode($scores->fetch_assoc());
}