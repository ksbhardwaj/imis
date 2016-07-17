<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(!isset($_SESSION['username'])) {
	Redirect::to('login.php');
}

$sql2 = "SELECT * FROM personal_information ORDER BY student_id";
$pds2=$pdo->prepare($sql2);
$pds2->execute(array());

$sql3 = "SELECT * FROM personal_information ORDER BY student_id";
$pds3=$pdo->prepare($sql3);
$pds3->execute(array());

$sql4 = "SELECT * FROM personal_information ORDER BY student_id";
$pds4=$pdo->prepare($sql4);
$pds4->execute(array());

$sql5 = "SELECT * FROM personal_information ORDER BY student_id";
$pds5=$pdo->prepare($sql5);
$pds5->execute(array());

$sql6 = "SELECT * FROM personal_information ORDER BY student_id";
$pds6=$pdo->prepare($sql6);
$pds6->execute(array());

if (isset($_POST["submit0"])) {
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
				'unique' => 'personal_information'
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
				'unique' => 'personal_information'
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
                $user->insert_personal_info(array(
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

if (isset($_POST["submit1"])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'student_id' => array(
                'name' => 'student_id'
            ),
			'InputMajor1' => array(
                'name' => 'major'
            ),
            'InputGPA1' => array(
                'name' => 'gpa'
            ),
            'InputUni1' => array(
                'name' => 'institution_name'
            ),
            'InputCountry1' => array(
                'name' => 'country_name'
            ),
			'InputDate1' => array(
                'name' => 'certifications'
            ),
			'InputDate12' => array(
                'name' => 'certifications_body'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
			try {
                $user->insert_education_detail(array(
                    'student_id' => Input::get('student_id'),
                    'education_name' => "Undergraduate",
					'major' => Input::get('InputMajor1'),
                    'gpa' => Input::get('InputGPA1'),
					'institution_name' => Input::get('InputUni1'),
					'country_name' => Input::get('InputCountry1'),
					'certifications' => Input::get('InputDate1'),
					'certifications_body' => Input::get('InputDate12'),
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

if (isset($_POST["submit2"])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'student_id' => array(
                'name' => 'student_id'
            ),
			'InputMajor2' => array(
                'name' => 'major'
            ),
            'InputGPA2' => array(
                'name' => 'gpa'
            ),
            'InputUni2' => array(
                'name' => 'institution_name'
            ),
            'InputCountry2' => array(
                'name' => 'country_name'
            ),
			'InputDate2' => array(
                'name' => 'certifications'
            ),
			'InputDate22' => array(
                'name' => 'certifications_body'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
			try {
                $user->insert_education_detail(array(
                    'student_id' => Input::get('student_id'),
                    'education_name' => "Graduate",
					'major' => Input::get('InputMajor2'),
                    'gpa' => Input::get('InputGPA2'),
					'institution_name' => Input::get('InputUni2'),
					'country_name' => Input::get('InputCountry2'),
					'certifications' => Input::get('InputDate2'),
					'certifications_body' => Input::get('InputDate22'),
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
if (isset($_POST["submit3"])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'student_id' => array(
                'name' => 'student_id'
            ),
			'InputMajor3' => array(
                'name' => 'major'
            ),
            'InputGPA3' => array(
                'name' => 'gpa'
            ),
            'InputUni3' => array(
                'name' => 'institution_name'
            ),
            'InputCountry3' => array(
                'name' => 'country_name'
            ),
			'InputDate3' => array(
                'name' => 'certifications'
            ),
			'InputDate32' => array(
                'name' => 'certifications_body'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
			try {
                $user->insert_education_detail(array(
                    'student_id' => Input::get('student_id'),
                    'education_name' => "Other",
					'major' => Input::get('InputMajor3'),
                    'gpa' => Input::get('InputGPA3'),
					'institution_name' => Input::get('InputUni3'),
					'country_name' => Input::get('InputCountry3'),
					'certifications' => Input::get('InputDate3'),
					'certifications_body' => Input::get('InputDate32'),
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
if (isset($_POST["submit5"])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'InputCompany' => array(
                'name' => 'company_name'
            ),
            'InputAddress' => array(
                'name' => 'address'
            ),
            'InputCity' => array(
                'name' => 'city'
            ),
			'InputPostal' => array(
                'name' => 'postal_code'
            ),
			'InputCountry' => array(
                'name' => 'country'
            ),
			'InputContactFname' => array(
                'name' => 'p_fname'
            ),
			'InputContactLname' => array(
                'name' => 'p_lname'
            ),
			'InputContactPosition' => array(
                'name' => 'p_position'
            ),
			'InputTelephone' => array(
                'name' => 'telephone'
            ),
			'InputEmail' => array(
                'name' => 'email_id'
            ),
			'InputWebsite' => array(
                'name' => 'c_website'
            ),
			'InputNotes' => array(
                'name' => 'notes'
            )
        ));

        if ($validate->passed()) {
            $user = new User();
			try {
                $user->insert_company_info(array(
					'company_name' => Input::get('InputCompany'),
                    'address' => Input::get('InputAddress'),
					'city' => Input::get('InputCity'),
                    'postal_code' => Input::get('InputPostal'),
					'country' => Input::get('InputCountry'),
					'p_fname' => Input::get('InputContactFname'),
					'p_lname' => Input::get('InputContactLname'),
					'p_position' => Input::get('InputContactPosition'),
					'telephone' => Input::get('InputTelephone'),
					'email_id' => Input::get('InputEmail'),
					'c_website' => Input::get('InputWebsite'),
					'notes' => Input::get('InputNotes')
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
if (isset($_POST["submit6"])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'student_id' => array(
                'name' => 'student_id',
                'required' => true,
                'min' => 9,
				'unique' => 'student_skills'
            )	
        ));
        if ($validate->passed()) {
            $user = new User();
            try {
                $user->insert_student_skills(array(
					'student_id' => Input::get('student_id'),
					'ASP.NET' => Input::get('radio1'),
					'C' => Input::get('radio2'),
					'C++' => Input::get('radio3'),
					'C#' => Input::get('radio4'),
					'Flex' => Input::get('radio5'),
					'Java' => Input::get('radio6'),
					'JavaScript' => Input::get('radio7'),
					'LIPS' => Input::get('radio8'),
					'Matlab' => Input::get('radio9'),
					'MySQL' => Input::get('radio10'),
					'Objective C' => Input::get('radio11'),
					'Pascal' => Input::get('radio12'),
					'Perl' => Input::get('radio13'),
					'PHP' => Input::get('radio14'),
					'Prolog' => Input::get('radio15'),
					'Python' => Input::get('radio16'),
					'R' => Input::get('radio17'),
					'Ruby' => Input::get('radio18'),
					'SQL-Oracle' => Input::get('radio19'),
					'TCL' => Input::get('radio20'),
					'T-SQL' => Input::get('radio21'),
					'VB.NET' => Input::get('radio22'),
					'Concrete5' => Input::get('radio24'),
					'DotNetNuke' => Input::get('radio25'),
					'Drupal' => Input::get('radio26'),
					'Joomla' => Input::get('radio27'),
					'Wordpress' => Input::get('radio28'),
					'Android' => Input::get('radio30'),
					'Chrome OS' => Input::get('radio31'),
					'IOS' => Input::get('radio32'),
					'Linux' => Input::get('radio33'),
					'MAC OS' => Input::get('radio34'),
					'Unix' => Input::get('radio35'),
					'Windows' => Input::get('radio36'),
					
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
					<h3>Personal Information</h3>
					
					<?php
					if (!empty($success )) {
					echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
					}
					?>
					
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal0">Personal Information</button>
								<!-- Modal  -->
							<div id="myModal0" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Personal Information</h4>
										</div>
										<div class="modal-body">
						
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
									<input type="text" maxlength="4" class="form-control" id="year" name="year" placeholder="Year" value="<?php echo escape(Input::get('year')); ?>" required>
								  </div>
								  
								  <div class="form-group">
									<label for="student_id">Student ID</label>
									<input type="text" maxlength="9" class="form-control" id="student_id" name="student_id" placeholder="Student ID" value="<?php echo escape(Input::get('student_id')); ?>" required>
								  </div>
								  <div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo escape(Input::get('first_name')); ?>" required>
								  </div>
								  <div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php echo escape(Input::get('middle_name')); ?>">
								  </div>
								  <div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo escape(Input::get('last_name')); ?>" required>
								  </div>
								  <div class="form-group">
									<label for="email_id">Email address</label>
									<input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email" value="<?php echo escape(Input::get('email_id')); ?>" required>
								  </div>
								  <div class="form-group">
									<label for="telephone">Telephone</label>
									<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="<?php echo escape(Input::get('telephone')); ?>" required>
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
								  <input type="submit" name="submit0" value="Insert" class="btn btn-default">
						</form>
						
						</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
					<!-- /Model personal information -->
					<br><h3>Education Detail</h3>
					<!-- Model education information -->					
					<!--  bootstrap modal 1  -->
							<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Undergraduate degree</button>
								<!-- Modal  -->
							<div id="myModal1" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Undergraduate degree</h4>
										</div>
										<div class="modal-body">
									<form action="" method="post">
										<div class="form-group">
										<label>Student ID</label>
											<select name="student_id" class="form-control">
											<?php 
											while ($row2 = $pds2->fetch()){
											echo "<option value=\"". $row2['student_id'] ."\">" . $row2['student_id'] . "</option>";
											}
											?>
											</select>
										</div>
										<div class="form-group">
										<label for="InputMajor1">Major</label>
										<input type="text" class="form-control" id="InputMajor1" name="InputMajor1" placeholder="Major" required>
										</div>
										<div class="form-group">
										<label for="InputGPA1">GPA</label>
										<input type="text" class="form-control" id="InputGPA1" name="InputGPA1" placeholder="GPA">
										</div>
										<div class="form-group">
										<label for="InputUni1">University/Organization</label>
										<input type="text" class="form-control" id="InputUni1" name="InputUni1" placeholder="University/Organization">
										</div>
										<div class="form-group">
										<label for="InputCountry1">Country</label>
										<input type="text" class="form-control" id="InputCountry1" name="InputCountry1" placeholder="Country">
										</div>
										<div class="form-group">
										<label for="InputDate1">Certification</label>
										<input type="text" class="form-control" id="InputDate1" name="InputDate1" placeholder="Certification">
										</div>
										<div class="form-group">
										<label for="InputDate12">Certification Body</label>
										<input type="text" class="form-control" id="InputDate12" name="InputDate12" placeholder="Certification Body">
										</div>
										<br />
										<input type="submit" name="submit1" value="Insert" class="btn btn-default">
									</form>	
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
						<!--  /bootstrap modal 1 -->
							&nbsp;&nbsp;
						<!--  bootstrap modal 2  -->
							<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Graduate degree</button>
								<!-- Modal  -->
							<div id="myModal2" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Graduate degree</h4>
										</div>
										<div class="modal-body">
									<form action="" method="post">
										<div class="form-group">
										<label>Student ID</label>
											<select name="student_id" class="form-control">
											<?php 
											while ($row3 = $pds3->fetch()){
											echo "<option value=\"". $row3['student_id'] ."\">" . $row3['student_id'] . "</option>";
											}
											?>
											</select>
										</div>
										<div class="form-group">
										<label for="InputMajor2">Major</label>
										<input type="text" class="form-control" id="InputMajor2" name="InputMajor2" placeholder="Major" required>
										</div>
										<div class="form-group">
										<label for="InputGPA2">GPA</label>
										<input type="text" class="form-control" id="InputGPA2" name="InputGPA2" placeholder="GPA">
										</div>
										<div class="form-group">
										<label for="InputUni2">University/Organization</label>
										<input type="text" class="form-control" id="InputUni2" name="InputUni2" placeholder="University/Organization">
										</div>
										<div class="form-group">
										<label for="InputCountry2">Country</label>
										<input type="text" class="form-control" id="InputCountry2" name="InputCountry2" placeholder="Country">
										</div>
										<div class="form-group">
										<label for="InputDate2">Certification</label>
										<input type="text" class="form-control" id="InputDate2" name="InputDate2" placeholder="Certification">
										</div>
										<div class="form-group">
										<label for="InputDate22">Certification Body</label>
										<input type="text" class="form-control" id="InputDate22" name="InputDate22" placeholder="Certification Body">
										</div>
										<br />
										<input type="submit" name="submit2" value="Insert" class="btn btn-default">
									</form>	
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
						<!--  /bootstrap modal 2 -->
						&nbsp;&nbsp;
						<!--  bootstrap modal 3  -->
							<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Others</button>
								<!-- Modal  -->
							<div id="myModal3" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Other – List any other degrees or certifications you have</h4>
										</div>
										<div class="modal-body">
									<form action="" method="post">
										<div class="form-group">
										<label>Student ID</label>
											<select name="student_id" class="form-control">
											<?php 
											while ($row4 = $pds4->fetch()){
											echo "<option value=\"". $row4['student_id'] ."\">" . $row4['student_id'] . "</option>";
											}
											?>
											</select>
										</div>
										<div class="form-group">
										<label for="InputMajor3">Major</label>
										<input type="text" class="form-control" id="InputMajor3" name="InputMajor3" placeholder="Major" required>
										</div>
										<div class="form-group">
										<label for="InputGPA13">GPA</label>
										<input type="text" class="form-control" id="InputGPA3" name="InputGPA3" placeholder="GPA">
										</div>
										<div class="form-group">
										<label for="InputUni3">University/Organization</label>
										<input type="text" class="form-control" id="InputUni3" name="InputUni3" placeholder="University/Organization">
										</div>
										<div class="form-group">
										<label for="InputCountry3">Country</label>
										<input type="text" class="form-control" id="InputCountry3" name="InputCountry3" placeholder="Country">
										</div>
										<div class="form-group">
										<label for="InputDate3">Certification</label>
										<input type="text" class="form-control" id="InputDate3" name="InputDate3" placeholder="Certification">
										</div>
										<div class="form-group">
										<label for="InputDate32">Certification Body</label>
										<input type="text" class="form-control" id="InputDate32" name="InputDate32" placeholder="Certification Body">
										</div>
										<br />
										<input type="submit" name="submit3" value="Insert" class="btn btn-default">
									</form>	
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
						<!--  /bootstrap modal 3 -->
					
					<!-- /Model education information -->
					<br><h3>Work Experience</h3>
					<!--  bootstrap modal 1  -->
							<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Work Experience</button>
								<!-- Modal  -->
							<div id="myModal4" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Work Experience</h4>
										</div>
										<div class="modal-body">
									<form method="post" action="">
										<div class="form-group">
										<label>Student ID</label>
											<select name="student_id" class="form-control">
											<?php 
											while ($row5 = $pds5->fetch()){
											echo "<option value=\"". $row5['student_id'] ."\">" . $row5['student_id'] . "</option>";
											}
											?>
											</select>
										</div>
										<div class="form-group">
										<label for="InputCompany">Company</label>
										<input type="text" class="form-control" id="InputCompany" name="InputCompany" placeholder="Company" required>
										</div>
										<div class="form-group">
										<label for="InputDates">Start Dates</label>
										<input type="text" class="form-control" id="InputDates" name="InputDates1" placeholder="Start Date" required>
										</div>
										<div class="form-group">
										<label for="InputDates">End Date(Enter today if working presently)</label>
										<input type="text" class="form-control" id="InputDates" name="InputDates2" placeholder="End Date" required>
										</div>
										<div class="form-group">
										<label for="InputTitle">Title</label>
										<input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="Title" required>
										</div>
										<input type="submit" name="submit4" value="Insert" class="btn btn-default">
									</form>	
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
						<!--  /bootstrap modal 1 -->
					<br>
					
					<br><h3>Skills</h3>
					<!--  bootstrap modal 1  -->
							<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal41">Skills</button>
								<!-- Modal  -->
							<div id="myModal41" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Skills</h4>
										</div>
										<div class="modal-body">
									<form action="" method="post">
					<div class="form-group">
										<label>Student ID</label>
											<select name="student_id" class="form-control">
											<?php 
											while ($row6 = $pds6->fetch()){
											echo "<option value=\"". $row6['student_id'] ."\">" . $row6['student_id'] . "</option>";
											}
											?>
											</select>
										</div>
								<ul style="list-style-type:disc">
								<li><p>Technical: </p></li></li>
								<ul style="list-style-type: circle">
								<table id="Mytable" width="500" border="0" style="border-collapse: collapse;">
								  <tbody>
									<tr>
									 <td width="10">&nbsp;</td>
									  <td width="100">&nbsp;</td>
									  <td width="100">Not at All competent</td>
									  <td width="100">Little competent</td>
									  <td width="100">Moderately competent</td>
									  <td width="100">Extremely competent</td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>ASP.NET</td>
									  <td><input type="radio" name="radio1" id="radio1" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio1" id="radio1" value="Little competent"></td>
									  <td><input type="radio" name="radio1" id="radio1" value="Moderately competent"></td>
									  <td><input type="radio" name="radio1" id="radio1" value="Extremely competent"></td>
									  </tr>
									
									<tr>
									<td width="1"><li></li></td>
									  <td>C</td>
									  <td><input type="radio" name="radio2" id="radio2" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio2" id="radio2" value="Little competent"></td>
									  <td><input type="radio" name="radio2" id="radio2" value="Moderately competent"></td>
									  <td><input type="radio" name="radio2" id="radio2" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>C++</td>
									  <td><input type="radio" name="radio3" id="radio3" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio3" id="radio3" value="Little competent"></td>
									  <td><input type="radio" name="radio3" id="radio3" value="Moderately competent"></td>
									  <td><input type="radio" name="radio3" id="radio3" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>C#</td>
									  <td><input type="radio" name="radio4" id="radio4" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio4" id="radio4" value="Little competent"></td>
									  <td><input type="radio" name="radio4" id="radio4" value="Moderately competent"></td>
									  <td><input type="radio" name="radio4" id="radio4" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Flex</td>
									  <td><input type="radio" name="radio5" id="radio5" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio5" id="radio5" value="Little competent"></td>
									  <td><input type="radio" name="radio5" id="radio5" value="Moderately competent"></td>
									  <td><input type="radio" name="radio5" id="radio5" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Java</td>
									  <td><input type="radio" name="radio6" id="radio6" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio6" id="radio6" value="Little competent"></td>
									  <td><input type="radio" name="radio6" id="radio6" value="Moderately competent"></td>
									  <td><input type="radio" name="radio6" id="radio6" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>JavaScript</td>
									  <td><input type="radio" name="radio7" id="radio7" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio7" id="radio7" value="Little competent"></td>
									  <td><input type="radio" name="radio7" id="radio7" value="Moderately competent"></td>
									  <td><input type="radio" name="radio7" id="radio7" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>LISP</td>
									  <td><input type="radio" name="radio8" id="radio8" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio8" id="radio8" value="Little competent"></td>
									  <td><input type="radio" name="radio8" id="radio8" value="Moderately competent"></td>
									  <td><input type="radio" name="radio8" id="radio8" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Matlab</td>
									  <td><input type="radio" name="radio9" id="radio9" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio9" id="radio9" value="Little competent"></td>
									  <td><input type="radio" name="radio9" id="radio9" value="Moderately competent"></td>
									  <td><input type="radio" name="radio9" id="radio9" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>MySQL</td>
									  <td><input type="radio" name="radio10" id="radio10" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio10" id="radio10" value="Little competent"></td>
									  <td><input type="radio" name="radio10" id="radio10" value="Moderately competent"></td>
									  <td><input type="radio" name="radio10" id="radio10" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Objective-C</td>
									  <td><input type="radio" name="radio11" id="radio11" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio11" id="radio11" value="Little competent"></td>
									  <td><input type="radio" name="radio11" id="radio11" value="Moderately competent"></td>
									  <td><input type="radio" name="radio11" id="radio11" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Pascal</td>
									  <td><input type="radio" name="radio12" id="radio12" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio12" id="radio12" value="Little competent"></td>
									  <td><input type="radio" name="radio12" id="radio12" value="Moderately competent"></td>
									  <td><input type="radio" name="radio12" id="radio12" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Perl</td>
									  <td><input type="radio" name="radio13" id="radio13" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio13" id="radio13" value="Little competent"></td>
									  <td><input type="radio" name="radio13" id="radio13" value="Moderately competent"></td>
									  <td><input type="radio" name="radio13" id="radio13" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>PHP</td>
									  <td><input type="radio" name="radio14" id="radio14" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio14" id="radio14" value="Little competent"></td>
									  <td><input type="radio" name="radio14" id="radio14" value="Moderately competent"></td>
									  <td><input type="radio" name="radio14" id="radio14" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Prolog</td>
									  <td><input type="radio" name="radio15" id="radio15" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio15" id="radio15" value="Little competent"></td>
									  <td><input type="radio" name="radio15" id="radio15" value="Moderately competent"></td>
									  <td><input type="radio" name="radio15" id="radio15" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Python</td>
									  <td><input type="radio" name="radio16" id="radio16" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio16" id="radio16" value="Little competent"></td>
									  <td><input type="radio" name="radio16" id="radio16" value="Moderately competent"></td>
									  <td><input type="radio" name="radio16" id="radio16" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>R</td>
									  <td><input type="radio" name="radio17" id="radio17" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio17" id="radio17" value="Little competent"></td>
									  <td><input type="radio" name="radio17" id="radio17" value="Moderately competent"></td>
									  <td><input type="radio" name="radio17" id="radio17" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Ruby</td>
									  <td><input type="radio" name="radio18" id="radio18" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio18" id="radio18" value="Little competent"></td>
									  <td><input type="radio" name="radio18" id="radio18" value="Moderately competent"></td>
									  <td><input type="radio" name="radio18" id="radio18" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>SQL-Orcale</td>
									  <td><input type="radio" name="radio19" id="radio19" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio19" id="radio19" value="Little competent"></td>
									  <td><input type="radio" name="radio19" id="radio19" value="Moderately competent"></td>
									  <td><input type="radio" name="radio19" id="radio19" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Tcl</td>
									  <td><input type="radio" name="radio20" id="radio20" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio20" id="radio20" value="Little competent"></td>
									  <td><input type="radio" name="radio20" id="radio20" value="Moderately competent"></td>
									  <td><input type="radio" name="radio20" id="radio20" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>T-SQL</td>
									  <td><input type="radio" name="radio21" id="radio21" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio21" id="radio21" value="Little competent"></td>
									  <td><input type="radio" name="radio21" id="radio21" value="Moderately competent"></td>
									  <td><input type="radio" name="radio21" id="radio21" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>VB.NET</td>
									  <td><input type="radio" name="radio22" id="radio22" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio22" id="radio22" value="Little competent"></td>
									  <td><input type="radio" name="radio22" id="radio22" value="Moderately competent"></td>
									  <td><input type="radio" name="radio22" id="radio22" value="Extremely competent"></td>
									</tr>
									
								  </tbody>
								</table>
								</ul>

								<li><p>CMS:</p><li>
								<ul style="list-style-type: circle">
								<table width="500" border="0">
								  <tbody>
									<tr>
									<td width="1">&nbsp;</td>
									  <td width="100">&nbsp;</td>
									  <td width="100">Not at All competent</td>
									  <td width="100">Little competent</td>
									  <td width="100">Moderately competent</td>
									  <td width="100">Extremely competent</td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Concrete 5</td>
									  <td><input type="radio" name="radio24" id="radio24" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio24" id="radio24" value="Little competent"></td>
									  <td><input type="radio" name="radio24" id="radio24" value="Moderately competent"></td>
									  <td><input type="radio" name="radio24" id="radio24" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>DotNetNuke</td>
									  <td><input type="radio" name="radio25" id="radio25" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio25" id="radio25" value="Little competent"></td>
									  <td><input type="radio" name="radio25" id="radio25" value="Moderately competent"></td>
									  <td><input type="radio" name="radio25" id="radio25" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Drupal</td>
									  <td><input type="radio" name="radio26" id="radio26" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio26" id="radio26" value="Little competent"></td>
									  <td><input type="radio" name="radio26" id="radio26" value="Moderately competent"></td>
									  <td><input type="radio" name="radio26" id="radio26" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Joomla</td>
									  <td><input type="radio" name="radio27" id="radio27" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio27" id="radio27" value="Little competent"></td>
									  <td><input type="radio" name="radio27" id="radio27" value="Moderately competent"></td>
									  <td><input type="radio" name="radio27" id="radio27" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Wordpress</td>
									  <td><input type="radio" name="radio28" id="radio28" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio28" id="radio28" value="Little competent"></td>
									  <td><input type="radio" name="radio28" id="radio28" value="Moderately competent"></td>
									  <td><input type="radio" name="radio28" id="radio28" value="Extremely competent"></td>
									</tr>
									
								  </tbody>
								</table>
								</ul>
								<li><p>Operating System:</p></li>
								<ul style="list-style-type: circle">
								<table width="500" border="0">
								  <tbody>
									<tr>
									<td width="1">&nbsp;</td>
									  <td width="100">&nbsp;</td>
									  <td width="100">Not at All competent</td>
									  <td width="100">Little competent</td>
									  <td width="100">Moderately competent</td>
									  <td width="100">Extremely competent</td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Android</td>
									  <td><input type="radio" name="radio30" id="radio30" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio30" id="radio30" value="Little competent"></td>
									  <td><input type="radio" name="radio30" id="radio30" value="Moderately competent"></td>
									  <td><input type="radio" name="radio30" id="radio30" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Chrome OS</td>
									  <td><input type="radio" name="radio31" id="radio31" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio31" id="radio31" value="Little competent"></td>
									  <td><input type="radio" name="radio31" id="radio31" value="Moderately competent"></td>
									  <td><input type="radio" name="radio31" id="radio31" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>iOS</td>
									  <td><input type="radio" name="radio32" id="radio32" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio32" id="radio32" value="Little competent"></td>
									  <td><input type="radio" name="radio32" id="radio32" value="Moderately competent"></td>
									  <td><input type="radio" name="radio32" id="radio32" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Linux</td>
									  <td><input type="radio" name="radio33" id="radio33" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio33" id="radio33" value="Little competent"></td>
									  <td><input type="radio" name="radio33" id="radio33" value="Moderately competent"></td>
									  <td><input type="radio" name="radio33" id="radio33" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>MAC OS</td>
									  <td><input type="radio" name="radio34" id="radio34" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio34" id="radio34" value="Little competent"></td>
									  <td><input type="radio" name="radio34" id="radio34" value="Moderately competent"></td>
									  <td><input type="radio" name="radio34" id="radio34" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Unix</td>
									  <td><input type="radio" name="radio35" id="radio35" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio35" id="radio35" value="Little competent"></td>
									  <td><input type="radio" name="radio35" id="radio35" value="Moderately competent"></td>
									  <td><input type="radio" name="radio35" id="radio35" value="Extremely competent"></td>
									</tr>
									<tr>
									<td width="1"><li></li></td>
									  <td>Windows</td>
									  <td><input type="radio" name="radio36" id="radio36" value="Not at All competent" checked></td>
									  <td><input type="radio" name="radio36" id="radio36" value="Little competent"></td>
									  <td><input type="radio" name="radio36" id="radio36" value="Moderately competent"></td>
									  <td><input type="radio" name="radio36" id="radio36" value="Extremely competent"></td>
									</tr>
								  </ul>
									</ul>
								  </tbody>
								</table>
								<br>
								<input type="submit" name="submit6" value="Insert" class="btn btn-default">
								</form>
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
						<!--  /bootstrap modal 1 -->
					<br>
					
					<h3>Company Information</h3>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">Company Information</button>
								<!-- Modal  -->
							<div id="myModal5" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Company Information</h4>
										</div>
										<div class="modal-body">
									<form method="post" action="">
										<div class="form-group">
										<label for="InputCompany">Company Name</label>
										<input type="text" class="form-control" id="InputCompany" name="InputCompany" placeholder="Company Name" required>
										</div>
										<div class="form-group">
										<label for="InputAddress">Address</label>
										<input type="text" class="form-control" id="InputAddress" name="InputAddress" placeholder="Address" required>
										</div>
										<div class="form-group">
										<label for="InputCity">City</label>
										<input type="text" class="form-control" id="InputCity" name="InputCity" placeholder="City" required>
										</div>
										<div class="form-group">
										<label for="InputPosatal">Postal Code</label>
										<input type="text" class="form-control" id="InputPostal" name="InputPostal" placeholder="PostalCode" required>
										</div>
										<div class="form-group">
										<label for="InputCountry">Country</label>
										<input type="text" class="form-control" id="InputCountry" name="InputCountry" placeholder="Country" required>
										</div>
										<div class="form-group">
										<label for="InputContactFname">Contact Person - First Name</label>
										<input type="text" class="form-control" id="InputContactFname" name="InputContactFname" placeholder="Contact Person - First Name" required>
										</div>
										<div class="form-group">
										<label for="InputContactLname">Contact Person - Last Name</label>
										<input type="text" class="form-control" id="InputContactLname" name="InputContactLname" placeholder="Contact Person - Last Name" required>
										</div>
										<div class="form-group">
										<label for="InputContactPosition">Contact Person - Position</label>
										<input type="text" class="form-control" id="InputContactPosition" name="InputContactPosition" placeholder="Contact Person - Position" required>
										</div>
										<div class="form-group">
										<label for="InputTelephone">Telephone</label>
										<input type="text" class="form-control" id="InputTelephone" name="InputTelephone" placeholder="Telephone" required>
										</div>
										<div class="form-group">
										<label for="InputEmail">Email</label>
										<input type="text" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email" required>
										</div>
										<div class="form-group">
										<label for="InputWebsite">Company Website</label>
										<input type="text" class="form-control" id="InputWebsite" name="InputWebsite" placeholder="Company Website" required>
										</div>
										<div class="form-group">
										<label for="InputNotes">Notes</label>
										<textarea name="InputNotes" rows="3" cols="85"></textarea>
										</div>
							<!--			<div class="form-group">
										<label for="InputPositions">Positions</label>
										<input type="text" class="form-control" id="InputPositions" placeholder="Positions" required>
										</div> -->
										<input type="hidden" name="tokenCompany" value="<?php echo Token::generate(); ?>">
										<input type="submit" name="submit5" value="Insert" class="btn btn-default">
									</form>	
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

							</div>
						</div>
						<!--  /bootstrap modal 1 -->
					
					<br><br>
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