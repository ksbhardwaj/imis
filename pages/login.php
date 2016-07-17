<?php
ob_start();
require_once 'core/init.php';
require_once 'classes/conn.php';
if(isset($_SESSION['username'])) {
	Redirect::to('index.php');
}
if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		if ($_POST['SelectType'] == "admin") {
		$username = $_POST['username'];
		$password = $_POST['password'];
$sql = "SELECT * FROM admin where username=? and password=?";
$pds=$pdo->prepare($sql);
$pds->execute(array($username,$password));
if($row = $pds->fetch()) {
	session_start();
$_SESSION['username'] = $username;
Redirect::to('index.php');
}
else {
	$success="Check Username and Password again!";
}	
}
		if ($_POST['SelectType'] == "student") {
		$username = $_POST['username'];
		$password = $_POST['password'];
			$sql = "SELECT * FROM student_login where username=? and password=?";
			$pds=$pdo->prepare($sql);
			$pds->execute(array($username,$password));
			if($row = $pds->fetch()) {
				session_start();
			$_SESSION['username_student'] = $username;
			Redirect::to('index-student.php');
		} else {
	$success="Check Username and Password again!";
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

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
					<?php
					if (!empty($success )) {
					echo '<div class="alert alert-danger" role="alert">'.$success.'</div>';
					}
					?>
                    <div class="panel-body">
						<form role="form" action="" method="post">
                            <fieldset>
								<div class="form-group">
								 <select name="SelectType" class="form-control">
								  <option value="admin">Admin Login</option>
								  <option value="student">Student Login</option>
								</select> 
								</div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required value="">
                                </div>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
								<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
