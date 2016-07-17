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
$sql = "SELECT * FROM company_information where company_id=?";
$pds=$pdo->prepare($sql);
$pds->execute(array($company_id));
$row = $pds->fetch();

if (Input::exists()) {
    if(Token::check(Input::get('tokenCompany'))) {
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
                $user->update_company_info(array(
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
					),$company_id);
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
					<h3>Company Detail</h3>
					
					<?php
					if (!empty($success )) {
					echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
					}
					?>
						
						<form method="post" action="">
										<div class="form-group">
										<label for="InputCompany">Company Name</label>
										<input type="text" class="form-control" id="InputCompany" name="InputCompany" placeholder="Company Name" value="<?php echo $row['company_name']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputAddress">Address</label>
										<input type="text" class="form-control" id="InputAddress" name="InputAddress" placeholder="Address" value="<?php echo $row['address']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputCity">City</label>
										<input type="text" class="form-control" id="InputCity" name="InputCity" placeholder="City"value="<?php echo $row['city']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputPosatal">Postal Code</label>
										<input type="text" class="form-control" id="InputPostal" name="InputPostal" placeholder="PostalCode" value="<?php echo $row['postal_code']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputCountry">Country</label>
										<input type="text" class="form-control" id="InputCountry" name="InputCountry" placeholder="Country" value="<?php echo $row['country']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputContactFname">Contact Person - First Name</label>
										<input type="text" class="form-control" id="InputContactFname" name="InputContactFname" placeholder="Contact Person - First Name" value="<?php echo $row['p_fname']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputContactLname">Contact Person - Last Name</label>
										<input type="text" class="form-control" id="InputContactLname" name="InputContactLname" placeholder="Contact Person - Last Name" value="<?php echo $row['p_lname']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputContactPosition">Contact Person - Position</label>
										<input type="text" class="form-control" id="InputContactPosition" name="InputContactPosition" placeholder="Contact Person - Position" value="<?php echo $row['p_position']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputTelephone">Telephone</label>
										<input type="text" class="form-control" id="InputTelephone" name="InputTelephone" placeholder="Telephone" value="<?php echo $row['telephone']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputEmail">Email</label>
										<input type="text" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email" value="<?php echo $row['email_id']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputWebsite">Company Website</label>
										<input type="text" class="form-control" id="InputWebsite" name="InputWebsite" placeholder="Company Website" value="<?php echo $row['c_website']; ?>" required>
										</div>
										<div class="form-group">
										<label for="InputNotes">Notes</label>
										<textarea name="InputNotes" rows="3" cols="85"><?php echo $row['notes']; ?></textarea>
										</div>
							<!--			<div class="form-group">
										<label for="InputPositions">Positions</label>
										<input type="text" class="form-control" id="InputPositions" placeholder="Positions" required>
										</div> -->
										<input type="hidden" name="tokenCompany" value="<?php echo Token::generate(); ?>">
										<input type="submit" name="submit1" value="Update" class="btn btn-default">
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
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>