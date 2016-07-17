<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(!isset($_SESSION['username'])) {
	Redirect::to('login.php');
}
if(!isset($_GET["id"])) {
	Redirect::to('index.php');
}
else {
	$student_id = $_GET["id"];
}
	$sql = "delete from jobs where job_id=?";
	$pds=$pdo->prepare($sql);
	$pds->execute(array($student_id));
	$sql1 = "delete from jobs_applied where job_id=?";
	$pds1=$pdo->prepare($sql1);
	$pds1->execute(array($student_id));
	Redirect::to('view-jobs-availability.php');
            /*$user = new User();
            try {
                $user->delete_personal_info($student_id);
				Redirect::to('update-personal-information.php');
            } catch(Exception $e) {
                echo $e->getMessage(), '<br>';
            } */
?>