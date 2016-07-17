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
$sql = "SELECT * FROM work_experience where work_id=?";
$pds=$pdo->prepare($sql);
$pds->execute(array($student_id));
$row = $pds->fetch();

if (isset($_POST["submit4"])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'student_id' => array(
                'name' => 'student_id'
            ),
			'InputCompany' => array(
                'name' => 'company_name'
            ),
            'InputDates1' => array(
                'name' => 'start_date'
            ),
            'InputDates2' => array(
                'name' => 'end_date'
            ),
			'InputTitle' => array(
                'name' => 'job_title'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
			try {
                $user->insert_work_info(array(
                    'student_id' => Input::get('student_id'),
                    'company_name' => Input::get('InputCompany'),
					'start_date' => Input::get('InputDates1'),
                    'end_date' => Input::get('InputDates2'),
					'job_title' => Input::get('InputTitle'),
					));
				$success = "Successful";
            } catch(Exception $e) {
                echo $e->getMessage(), '<br>';
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>imis</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">imis</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index-student.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="insert-information-student.php"><i class="fa fa-table fa-fw"></i> Insert Information</a>
                        </li>
                                <li>
                                    <a href="update-information-student.php"><i class="fa fa-bar-chart-o fa-fw"></i> View/Update/Delete</a>
                                </li>
                        <li>
                            <a href="available-jobs.php"><i class="fa fa-sitemap fa-fw"></i> Available Jobs</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">imis - Internship Information Management System</h1>
					<?php
					if (!empty($success )) {
					echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
					}
					?>
						<!-- Student_Info_Insert form -->
						<h2>Edit record</h2>
						<h3>Student's Personal Information</h3>
						<div class="panel panel-default">
						<div class="panel-body">
						<form method="post" action="">
										<div class="form-group">
										<label for="student_id">Student ID</label>
										<input type="text" maxlength="9" class="form-control" id="student_id" name="student_id" placeholder="Student ID" value="<?php echo $row['student_id']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputCompany">Company</label>
										<input type="text" class="form-control" id="InputCompany" name="InputCompany" value="<?php echo $row['company_name']; ?>" placeholder="Company" required>
										</div>
										<div class="form-group">
										<label for="InputDates">Start Dates</label>
										<input type="text" class="form-control" id="InputDates" name="InputDates1" placeholder="Start Date" value="<?php echo $row['start_date']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputDates">End Date(Enter today if working presently)</label>
										<input type="text" class="form-control" id="InputDates" name="InputDates2" placeholder="End Date" value="<?php echo $row['end_date']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputTitle">Title</label>
										<input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="Title" value="<?php echo $row['job_title']; ?>" required>
										</div>
										<input type="submit" name="submit4" value="Update" class="btn btn-default">
									</form>
							</div>
						</div>
					</div>
                <!-- /.col-lg-12 -->
           </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
