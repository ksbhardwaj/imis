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
	$sql = "delete from student_hired where hired_id=?";
	$pds=$pdo->prepare($sql);
	$pds->execute(array($student_id));
	Redirect::to('view-student-hired.php');
            /*$user = new User();
            try {
                $user->delete_personal_info($student_id);
				Redirect::to('update-personal-information.php');
            } catch(Exception $e) {
                echo $e->getMessage(), '<br>';
            } */
?>