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
	$education_name = $_GET["e_name"];
}
$sql = "SELECT * FROM education_detail where education_id=? ORDER BY student_id DESC";
$pds=$pdo->prepare($sql);
$pds->execute(array($education_id));
$row = $pds->fetch();

if (Input::exists()) {
    if(Token::check(Input::get('tokenUG'))) {
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
                'name' => 'start_date'
            ),
			'InputDate12' => array(
                'name' => 'complete_date'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
			try {
                $user->update_education_info(array(
                    'student_id' => Input::get('student_id'),
                    'education_name' => $education_name,
					'major' => Input::get('InputMajor1'),
                    'gpa' => Input::get('InputGPA1'),
					'institution_name' => Input::get('InputUni1'),
					'country_name' => Input::get('InputCountry1'),
					'certifications' => Input::get('InputDate1'),
					'certifications_body' => Input::get('InputDate12'),
                ),$education_id);
				//Session::flash('student_id',Input::get('student_id'));
				//Redirect::to('student-info-educational.php');
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
					<h3>Education Detail</h3>
					
					<?php
					if (!empty($success )) {
					echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
					}
					?>
						
						<form action="" method="post">
										<div class="form-group">
										<label for="student_id">Student ID</label>
										<input type="text" maxlength="9" class="form-control" id="student_id" name="student_id" placeholder="Student ID" value="<?php echo $row['student_id']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputMajor1">Major</label>
										<input type="text" class="form-control" id="InputMajor1" name="InputMajor1" placeholder="Major" value="<?php echo $row['major']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputGPA1">GPA</label>
										<input type="text" class="form-control" id="InputGPA1" name="InputGPA1" placeholder="GPA" value="<?php echo $row['gpa']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputUni1">University/Organization</label>
										<input type="text" class="form-control" id="InputUni1" name="InputUni1" placeholder="University/Organization" value="<?php echo $row['institution_name']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputCountry1">Country</label>
										<input type="text" class="form-control" id="InputCountry1" name="InputCountry1" placeholder="Country" value="<?php echo $row['country_name']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputDate1">Certification</label>
										<input type="text" class="form-control" id="InputDate1" name="InputDate1" placeholder="Certification" value="<?php echo $row['certifications']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputDate12">Certification Body</label>
										<input type="text" class="form-control" id="InputDate12" name="InputDate12" placeholder="Certification Body" value="<?php echo $row['certifications_body']; ?>" required>
										</div>
										<br />
										<input type="hidden" name="tokenUG" value="<?php echo Token::generate(); ?>">
										<input type="submit" name="submit1" value="Update" class="btn btn-default">
									<!--<button type="submit1" class="btn btn-default">Save</button>-->
									</form>
						
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
