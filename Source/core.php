<?php
include 'config.php';

$config = include 'config.php';

if ($config['username'] == '' || $config['password'] == '') {
    echo '<meta http-equiv="refresh" content="0; url=install" />';
    exit();
}

session_start();

if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    if ($uname != $config['username']) {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        exit;
    }
} else {
    echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    exit;
}

function head()
{
    include 'config.php';
    
	$config = include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>Malware Scanner &rsaquo; Admin Panel</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Bootstrap Stylesheet-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/skins/skin-purple.min.css">

	<!--Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
	
	<!--Stylesheet-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.min.css" rel="stylesheet">

    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/r-2.4.1/datatables.min.css"/>
	
	<!--DatePicker-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"/>

    <!--SCRIPT-->
    <!--=================================================-->

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    
    <!--DatePicker-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.en-CA.min.js"></script>

</head>

<body class="hold-transition skin-purple sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">

    <a href="dashboard.php" class="logo">
      <span class="logo-mini">Malware<strong>Scanner</strong></span>
      <span class="logo-lg"><i class="fas fa-search"></i> Malware <strong>Scanner</strong></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span><i class="fas fa-bars"></i>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
<?php
    $uname = $_SESSION['sec-username'];
?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i> Account
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="account.php" class="btn btn-default btn-flat"><i class="fa fa-user fa-fw fa-lg"></i> Edit Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <br /><p><?php
        echo $_SESSION['sec-username'];
?></p>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        
        <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
        echo 'class="active"';
    }
?>>
           <a href="dashboard.php">
              <i class="fa fa-home"></i> <span>Dashboard</span>
           </a>
        </li>

        <li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'account.php') {
            echo 'class="active"';
        }
?>>
           <a href="account.php">
              <i class="fa fa-user"></i> <span>Account</span>
           </a>
        </li>

        <li class="header">SECURITY</li>
          
        <li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'malware-scanner.php') {
            echo 'class="active"';
        }
?>>
           <a href="malware-scanner.php">
              <i class="fa fa-search"></i> <span>Malware Scanner</span>
           </a>
        </li>
		
		<li class="header">TOOLS</li>
		
		<li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'security-check.php') {
            echo 'class="active"';
        }
?>>
           <a href="security-check.php">
              <i class="fa fa-check"></i> <span>Security Check</span>
           </a>
        </li>
          
      </ul>
    </section>

  </aside>
<?php
}

function footer()
{
?>
<footer class="main-footer">
    <strong>&copy; <?php
    echo date("Y");
?> <a href="https://codecanyon.net/item/shell-scanner/5609275?ref=Antonov_WEB" target="_blank">Malware Scanner</a></strong>
    
</footer>

</div>

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	
	<!--JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>

	<!--SlimScroll-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

    <!--DataTables-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/r-2.4.1/datatables.min.js"></script>

</body>
</html>
<?php
}
?>