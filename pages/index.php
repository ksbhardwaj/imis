<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(!isset($_SESSION['username'])) {
	Redirect::to('login.php');
}
$sql = "SELECT COUNT(*) as totalno FROM personal_information";
$pds=$pdo->prepare($sql);
$pds->execute(array());
while ($row = $pds->fetch()){
$count = $row['totalno'];	
}
$sql1 = "SELECT COUNT(*) as totalno FROM student_hired";
$pds1=$pdo->prepare($sql1);
$pds1->execute(array());
while ($row1 = $pds1->fetch()){
$hired = $row1['totalno'];	
}
$sql2 = "SELECT COUNT(*) as totalno FROM jobs";
$pds2=$pdo->prepare($sql2);
$pds2->execute(array());
while ($row2 = $pds2->fetch()){
$jobs = $row2['totalno'];	
}
$sql3 = "SELECT COUNT(*) as totalno FROM student_interest";
$pds3=$pdo->prepare($sql1);
$pds3->execute(array());
while ($row3 = $pds3->fetch()){
$interested = $row3['totalno'];	
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
                        <li><a href="generate-student-account.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="insert-information.php"><i class="fa fa-table fa-fw"></i> Insert Information</a>
                        </li>
						
						<li>
                            <a href="view-st-id.php"><i class="fa fa-edit fa-fw"></i> View by Student Id</a>
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> View/Update/Delete<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="update-personal-information.php">Personal Information</a>
                                </li>
                                <li>
                                    <a href="update-education-information.php">Education Detail</a>
                                </li>
								<li>
                                    <a href="update-work-information.php">Work Experience</a>
                                </li>
								<li>
                                    <a href="update-company-information.php">Company Detail</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="jobs-availability.php"><i class="fa fa-edit fa-fw"></i> Jobs Availability</a>
                        </li>
						<li>
                            <a href="view-jobs-availability.php"><i class="fa fa-bar-chart-o fa-fw"></i> View Jobs Availability</a>
                        </li>
						
                        <li>
                            <a href="student-interest.php"><i class="fa fa-edit fa-fw"></i> Interested Students</a>
                        </li>
						<li>
                            <a href="student-hired.php"><i class="fa fa-edit fa-fw"></i> Students Hired</a>
                        </li>
						<li>
                            <a href="view-student-hired.php"><i class="fa fa-bar-chart-o fa-fw"></i> View Student Hired</a>
                        </li>
                        <li>
                            <a href="report.php"><i class="fa fa-sitemap fa-fw"></i> Report</a>
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
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
			<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count; ?></div>
                                    <div>Students Enrolled!</div>
                                </div>
                            </div>
                        </div>
                        <a href="update-personal-information.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $hired; ?></div>
                                    <div>Students Hired!</div>
                                </div>
                            </div>
                        </div>
                        <a href="view-student-hired.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jobs; ?></div>
                                    <div>Available Jobs!</div>
                                </div>
                            </div>
                        </div>
                        <a href="view-jobs-availability.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $interested; ?></div>
                                    <div>Interested Students!</div>
                                </div>
                            </div>
                        </div>
                        <a href="student-interest.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
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
