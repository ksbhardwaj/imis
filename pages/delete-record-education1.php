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
	$education_id = $_GET["id"];
}
            $user = new User();
            try {
                $user->delete_education_info($education_id);
				Redirect::to('update-information-student.php');
            } catch(Exception $e) {
                echo $e->getMessage(), '<br>';
            } 
?>