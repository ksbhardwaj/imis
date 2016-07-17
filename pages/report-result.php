<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
$query = "SELECT * FROM personal_information ";
$optionsRadios1 = $_GET['option1'];
$optionsRadios2 = $_GET['option2'];
$country = $_GET['country'];
$year = $_GET['year'];
$term = $_GET['term'];
$gpa = $_GET['gpa'];
if ($_GET['option1'] != '' && $optionsRadios1 == '' && $gpa == '') {
	if($optionsRadios1 == "withjob"){
		$query	.= "inner join student_hired on personal_information.student_id = student_hired.student_id ";
	}
	if ($optionsRadios1 == "withoutjob") {
		$query	.= "inner join student_hired on personal_information.student_id != student_hired.student_id ";
	}
}
if ($_GET['option2'] != '' && $_GET['option1'] == '' && $_GET['gpa'] == '') {
	if ($optionsRadios2 == "paidjob") {
		$query	.= "inner join student_hired on personal_information.student_id = student_hired.student_id where student_hired.salary > 0 ";
	} else {
		$query	.= "inner join student_hired on personal_information.student_id = student_hired.student_id where student_hired.salary <= 0 ";
	}
}
if ($_GET['option2'] != '' && $_GET['option1'] != '' && $_GET['gpa'] == '') {
	if ($optionsRadios2 == "paidjob") {
	$query	.= "inner join student_hired on personal_information.student_id = student_hired.student_id where student_hired.salary > 0 ";
		} else {
			$query	.= "inner join student_hired on personal_information.student_id = student_hired.student_id where student_hired.salary <= 0 ";
		}
}
if ($_GET['gpa'] != '' &&  $optionsRadios1 == '' && $optionsRadios2 == '') {
	$query .= "inner join education detail on personal_information.student_id=education_detail.student_id where education_detail.gpa>? ";
}

if ($_GET['gpa'] != '' &&  $optionsRadios1 != '' && $optionsRadios2 == '') {
	$query .= "inner join education detail on personal_information.student_id=education_detail.student_id where education_detail.gpa>? ";
}

if ($_GET['gpa'] != '' &&  $optionsRadios1 == '' && $optionsRadios2 != '') {
	if ($optionsRadios2 == "paidjob"){
		$query .= "inner join student_hired on personal_information.student_id = student_hired.student_id inner join education detail on personal_information.student_id=education_detail.student_id where education_detail.gpa>? and student_hired.salary > 0 ";
	}
	if ($optionsRadios2 == "unpaidjob"){
		$query .= "inner join student_hired on personal_information.student_id = student_hired.student_id inner join education detail on personal_information.student_id=education_detail.student_id where education_detail.gpa>? and student_hired.salary <= 0 ";
	}
}

if ($_GET['gpa'] != '' &&  $optionsRadios1 != '' && $optionsRadios2 != '') {
	if ($optionsRadios2 == "paidjob"){
		$query .= "inner join student_hired on personal_information.student_id = student_hired.student_id inner join education detail on personal_information.student_id=education_detail.student_id where education_detail.gpa>? and student_hired.salary > 0 ";
	}
	if ($optionsRadios2 == "unpaidjob"){
		$query .= "inner join student_hired on personal_information.student_id = student_hired.student_id inner join education detail on personal_information.student_id=education_detail.student_id where education_detail.gpa>? and student_hired.salary <= 0 ";
	}
}
if ($optionsRadios2 == '' && $gpa =='') {
	if ($year != '' && $country == '' && $term == '') {
		$query .= "where personal_information.year=? ";
	}
	if ($year == '' && $country != '' && $term == '') {
		$query .= "where personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term == '') {
		$query .= "where personal_information.year=? and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term != '') {
		$query .= "where personal_information.year=? and personal_information.country=? and personal_information.term=? ";
	}
	if ($year == '' && $country == '' && $term != '') {
		$query .= "where personal_information.term=? ";
	}
	if ($year == '' && $country != '' && $term != '') {
		$query .= "where personal_information.term=? and personal_information.country=? ";
	}
	if ($year != '' && $country == '' && $term != '') {
		$query .= "where personal_information.year=? and personal_information.term=? ";
	}
}

if ($optionsRadios2 != '' && $gpa =='') {
	if ($year != '' && $country == '' && $term == '') {
		$query .= "and personal_information.year=? ";
	}
	if ($year == '' && $country != '' && $term == '') {
		$query .= "and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term == '') {
		$query .= "and personal_information.year=? and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term != '') {
		$query .= "and personal_information.year=? and personal_information.country=? and personal_information.term=? ";
	}
	if ($year == '' && $country == '' && $term != '') {
		$query .= "and personal_information.term=? ";
	}
	if ($year == '' && $country != '' && $term != '') {
		$query .= "and personal_information.term=? and personal_information.country=? ";
	}
	if ($year != '' && $country == '' && $term != '') {
		$query .= "and personal_information.year=? and personal_information.term=? ";
	}
}

if ($optionsRadios2 == '' && $gpa !='') {
	if ($year != '' && $country == '' && $term == '') {
		$query .= "and personal_information.year=? ";
	}
	if ($year == '' && $country != '' && $term == '') {
		$query .= "and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term == '') {
		$query .= "and personal_information.year=? and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term != '') {
		$query .= "and personal_information.year=? and personal_information.country=? and personal_information.term=? ";
	}
	if ($year == '' && $country == '' && $term != '') {
		$query .= "and personal_information.term=? ";
	}
	if ($year == '' && $country != '' && $term != '') {
		$query .= "and personal_information.term=? and personal_information.country=? ";
	}
	if ($year != '' && $country == '' && $term != '') {
		$query .= "and personal_information.year=? and personal_information.term=? ";
	}
}

if ($optionsRadios2 != '' && $gpa !='') {
	if ($year != '' && $country == '' && $term == '') {
		$query .= "and personal_information.year=? ";
	}
	if ($year == '' && $country != '' && $term == '') {
		$query .= "and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term == '') {
		$query .= "and personal_information.year=? and personal_information.country=? ";
	}
	if ($year != '' && $country != '' && $term != '') {
		$query .= "and personal_information.year=? and personal_information.country=? and personal_information.term=? ";
	}
	if ($year == '' && $country == '' && $term != '') {
		$query .= "and personal_information.term=? ";
	}
	if ($year == '' && $country != '' && $term != '') {
		$query .= "and personal_information.term=? and personal_information.country=? ";
	}
	if ($year != '' && $country == '' && $term != '') {
		$query .= "and personal_information.year=? and personal_information.term=? ";
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Report</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
	
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
			<div class="panel-body">
                        <div class="row">
							<div class="col-lg-12">
							<?php
							$sql = $query;
							$pds=$pdo->prepare($sql);
							if($country != '' && $term != '' && $year != '') {
							$pds->execute(array($year,$country,$term));	
							}
							if($country != '' && $term == '' && $year != '') {
							$pds->execute(array($country,$year));	
							}
							if($country != '' && $term != '' && $year == '') {
							$pds->execute(array($term,$country));	
							}
							if($country == '' && $term == '' && $year != '') {
							$pds->execute(array($year,$term));	
							}
							if($country != '' && $term == '' && $year == '') {
							$pds->execute(array($country));	
							}
							if($country == '' && $term == '' && $year != '') {
							$pds->execute(array($year));	
							}
							if($country == '' && $term != '' && $year == '') {
							$pds->execute(array($term));	
							}	
							if($country == '' && $term == '' && $year == '') {
							$pds->execute(array());	
							}	
							?>
							<div class="table-responsive" id="dvContainer">
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
                                    <tbody>
                                        <?php
											while($row = $pds->fetch()) { 		
												echo "<tr>";
												echo "<td>".$row['term']." ".$row['year']."</td>";
												echo "<td>".$row['student_id']."</td>";
												echo "<td>".$row['first_name']."</td>";
												echo "<td>".$row['middle_name']."</td>";
												echo "<td>".$row['last_name']."</td>";
												echo "<td><a href=\"mailto:".$row['email_id']."\" target=\"_top\">".$row['email_id']."</td>";
												echo "<td>".$row['telephone']."</td>";
												echo "<td>".$row['status']."</td>";
												echo "<td>".$row['gender']."</td>";		
											}
											?>
                                    </tbody>
                                </table>
								
                            </div>
							<input type="button" value="Print" id="btnPrint" />
                            <!-- /.table-responsive -->
							</div>
                
					</div>
				</div>
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
