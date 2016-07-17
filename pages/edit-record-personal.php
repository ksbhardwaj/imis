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
$sql = "SELECT * FROM personal_information where student_id=?";
$pds=$pdo->prepare($sql);
$pds->execute(array($student_id));
$row = $pds->fetch();

if (Input::exists()) {
    if(Token::check(Input::get('tokenPI'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'term' => array(
                'name' => 'term'
            ),
            'year' => array(
                'name' => 'year',
                'required' => true
            ),
            'student_id' => array(
                'name' => 'student_id',
                'required' => true,
                'min' => 9,
            ),
            'first_name' => array(
                'name' => 'first_name',
                'required' => true
            ),
			'middle_name' => array(
                'name' => 'middle_name'
            ),
			'last_name' => array(
                'name' => 'last_name',
                'required' => true
            ),
			'email_id' => array(
                'name' => 'email_id',
                'required' => true,
            ),
			'telephone' => array(
                'name' => 'telephone'
            ),
			'status' => array(
                'name' => 'status'
            ),
			'gender' => array(
                'name' => 'gender'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
            try {
                $user->update_personal_info(array(
                    'term' => Input::get('term'),
                    'year' => Input::get('year'),
					'student_id' => Input::get('student_id'),
					'first_name' => Input::get('first_name'),
					'middle_name' => Input::get('middle_name'),
					'last_name' => Input::get('last_name'),
					'email_id' => Input::get('email_id'),
					'telephone' => Input::get('telephone'),
					'status' => Input::get('status'),
					'gender' => Input::get('gender'),
                ), $student_id);
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
						<form action="" method="post">
								<label for="semesterRegistered">Semester Registered</label>
								  <div class="radio">
									<label>
									<input type="radio" class="form-control" id="term" name="term" value="Fall" checked>
									Fall
									</label>
								  </div>
								  <div class="radio">
									<label>
									<input type="radio" class="form-control" id="term" name="term" value="Winter">
									Winter
									</label>
								  </div><br />
								  <div class="form-group">
									<label for="year">Year</label>
									<input type="text" maxlength="4" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo $row['year']; ?>" required>
								  </div>
								  
								  <div class="form-group">
									<label for="student_id">Student ID</label>
									<input type="text" maxlength="9" class="form-control" id="student_id" name="student_id" placeholder="Student ID" value="<?php echo $row['student_id']; ?>" required>
								  </div>
								  <div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required>
								  </div>
								  <div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php echo $row['middle_name']; ?>">
								  </div>
								  <div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" required>
								  </div>
								  <div class="form-group">
									<label for="email_id">Email address</label>
									<input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email" value="<?php echo $row['email_id']; ?>" required>
								  </div>
								  <div class="form-group">
									<label for="telephone">Telephone</label>
									<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="<?php echo $row['telephone']; ?>" required>
								  </div>
								  
								  <label for="status">Status</label>
								  <div class="radio">
									<label>
									<input type="radio" class="form-control" id="status" name="status" value="International" checked>
									International
									</label>
								  </div>
								  <div class="radio">
									<label>
									<input type="radio" class="form-control" id="status" name="status" value="Permanent Resident/Citizen">
									Permanent Resident/Citizen
									</label>
								  </div><br />
								  
								  <label for="gender">Gender</label>
								  <div class="radio">
									<label>
									<input type="radio" class="form-control" id="gender" name="gender" value="Male" checked>
									Male
									</label>
								  </div>
								  <div class="radio">
									<label>
									<input type="radio" class="form-control" id="gender2" name="gender" value="Female">
									Female
									</label>
								  </div><br />
								  <input type="hidden" name="tokenPI" value="<?php echo Token::generate(); ?>">
								  <input type="submit" value="Update" class="btn btn-default">
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