<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(!isset($_SESSION['username_student'])) {
	Redirect::to('login.php');
}
$student_id = $_SESSION['username_student'];
if(!isset($_GET["job_id"])) {
	Redirect::to('index.php');
}
else {
	$job_id = $_GET["job_id"];
	$company_id = $_GET["company_id"];
	$sql = "Insert into jobs_applied(job_id,company_id,student_id) values(?,?,?)";
	$pds=$pdo->prepare($sql);
	$pds->execute(array($job_id,$company_id,$student_id));
	Redirect::to('available-jobs.php');
}
?>