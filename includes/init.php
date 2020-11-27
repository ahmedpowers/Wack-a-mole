<?php
$conn = mysqli_connect('host', 'user', 'pass', 'db_name') or die(mysqli_error(($conn)));

$score = $_POST['score'];



if(isset($_POST['submit'])){

$conn->query("INSERT INTO users (score) VALUES ('$score')") or die(mysqli_error($conn));

header("Location: /buzzbar/leaderboard.php");

}

?>
