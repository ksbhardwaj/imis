<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(!isset($_SESSION['username'])) {
	Redirect::to('login.php');
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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">imis - Internship Information Management System</h1>
					<form action="" method="post">
								  <div class="form-group">
									<label for="InputStudentId">Student ID</label>
									<input type="text" class="form-control" id="InputStudentId" name="InputStudentId" placeholder="Enter Student ID" required>
								  </div>
								  <br />
								  <input type="submit" name="submit" value="Search" class="btn btn-default">
						</form>
						<?php
						if(isset($_POST['submit'])){
						$studentid = $_POST['InputStudentId'];
						$sql1 = "SELECT * FROM personal_information where student_id=?";
						$pds1=$pdo->prepare($sql1);
						$pds1->execute(array($studentid));
						$row1 = $pds1->fetch();
						// education
						$sql2 = "SELECT * FROM education_detail where student_id=?";
						$pds2=$pdo->prepare($sql2);
						$pds2->execute(array($studentid));
						//work education
						$sql3 = "SELECT * FROM work_experience where student_id=?";
						$pds3=$pdo->prepare($sql3);
						$pds3->execute(array($studentid));
						?>
						<h3>Personal Information</h3>
						<div class="panel-body">
                             <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
											<th>Term</th>
											<th>Student ID</th>
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Last Name</th>
											<th>Email Address</th>
											<th>Telephone</th>
											<th>Status</th>
											<th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody><br><br>
									
                                        <?php		
												echo "<tr>";
												echo "<td>".$row1['term']." ".$row1['year']."</td>";
												echo "<td>".$row1['student_id']."</td>";
												echo "<td>".$row1['first_name']."</td>";
												echo "<td>".$row1['middle_name']."</td>";
												echo "<td>".$row1['last_name']."</td>";
												echo "<td>".$row1['email_id']."</td>";
												echo "<td>".$row1['telephone']."</td>";
												echo "<td>".$row1['status']."</td>";
												echo "<td>".$row1['gender']."</td>";		
												echo "<td><a href=\"edit-record-personal.php?id=$row1[student_id]\">Edit</a> | <a href=\"delete-record-personal.php?id=$row1[student_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
											?>
                                    </tbody>
                                </table>
								
                            </div>
                            <!-- /.table-responsive -->
							
							<!--Education Info -->
									<h3>Education Detail</h3>
									<div class="panel-body">
                             <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
											<th>Student Id</th>
											<th>Education</th>
											<th>Major</th>
											<th>GPA</th>
											<th>University</th>
											<th>Country</th>
											<th>Start Date</th>
											<th>Complete Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											while($row2 = $pds2->fetch()) { 		
												echo "<tr>";
												echo "<td>".$row2['student_id']."</td>";
												echo "<td>".$row2['education_name']."</td>";
												echo "<td>".$row2['major']."</td>";
												echo "<td>".$row2['gpa']."</td>";
												echo "<td>".$row2['institution_name']."</td>";
												echo "<td>".$row2['country_name']."</td>";
												echo "<td>".$row2['certifications']."</td>";
												echo "<td>".$row2['certifications_body']."</td>";
												echo "<td><a href=\"edit-record-education.php?id=$row2[education_id]&&e_name=$row2[education_name]\">Edit</a> | <a href=\"delete-record-education.php?id=$row2[education_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
											}
											?>
                                    </tbody>
                                </table>
								
                            </div>
                            <!-- /.table-responsive -->
                        </div>
								<!--Work Info -->
									<h3>Work Experience</h3>
						<div class="panel-body">
                             <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
											<th>Student ID</th>
											<th>Company Nmae</th>
											<th>Start Date</th>
											<th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											while($row3 = $pds3->fetch()) { 		
												echo "<tr>";
												echo "<td>".$row3['student_id']."</td>";
												echo "<td>".$row3['company_name']."</td>";
												echo "<td>".$row3['start_date']."</td>";
												echo "<td>".$row3['end_date']."</td>";
												echo "<td>".$row3['job_title']."</td>";		
												echo "<td><a href=\"edit-record-work.php?id=$row3[student_id]\">Edit</a> | <a href=\"delete-record-work.php?id=$row3[student_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
											}
											?>
                                    </tbody>
                                </table>
								
                            </div>
                            <!-- /.table-responsive -->
                        </div>
							
                        </div>
						<?php } ?>
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
