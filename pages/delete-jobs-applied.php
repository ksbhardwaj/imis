<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(!isset($_SESSION['username_student'])) {
	Redirect::to('login.php');
}
if(!isset($_GET["id"])) {
	Redirect::to('index.php');
}
else {
	$student_id = $_GET["id"];
}
	$sql = "delete from jobs_applied where applied_id=?";
	$pds=$pdo->prepare($sql);
	$pds->execute(array($student_id));
	Redirect::to('view-jobs-applied.php');
?>