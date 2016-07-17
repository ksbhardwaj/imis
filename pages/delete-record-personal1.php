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
		$sql = "delete from personal_information where student_id=?";
	$pds=$pdo->prepare($sql);
	$pds->execute(array($student_id));
	
	$sql1 = "delete from education_detail where student_id=?";
	$pds1=$pdo->prepare($sql1);
	$pds1->execute(array($student_id));
	
	$sql2 = "delete from work_experience where student_id=?";
	$pds2=$pdo->prepare($sql2);
	$pds2->execute(array($student_id));
	
	$sql3 = "delete from student_skills where student_id=?";
	$pds3=$pdo->prepare($sql3);
	$pds3->execute(array($student_id));
	
	$sql4 = "delete from job_applied where student_id=?";
	$pds4=$pdo->prepare($sql4);
	$pds4->execute(array($student_id));
	
	$sql5 = "delete from student_hired where student_id=?";
	$pds5=$pdo->prepare($sql5);
	$pds5->execute(array($student_id));
	Redirect::to('update-information-student.php');
            /*$user = new User();
            try {
                $user->delete_personal_info($student_id);
				Redirect::to('update-information-student.php');
            } catch(Exception $e) {
                echo $e->getMessage(), '<br>';
            } */
?>