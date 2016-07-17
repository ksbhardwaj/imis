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
	$company_id = $_GET["id"];
}
	$sql = "delete from company-information where company_id=?";
	$pds=$pdo->prepare($sql);
	$pds->execute(array($company_id));
	
	$sql1 = "delete from jobs_applied where company_id=?";
	$pds1=$pdo->prepare($sql1);
	$pds1->execute(array($company_id));
	
	$sql2 = "delete from student_hired where company_id=?";
	$pds2=$pdo->prepare($sql2);
	$pds2->execute(array($company_id));
            /*$user = new User();
            try {
                $user->delete_company_info($company_id);
				Redirect::to('update-company-information.php');
            } catch(Exception $e) {
                echo $e->getMessage(), '<br>';
            }*/ 
?>