<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administrator Dashboard</title>
	<!-- CSS Files -->
    <link href="./assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/dist/css/admin.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- JS Files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	}); 
	</script>
	
	<script>
	$(window).unload(function(){
    alert("Goodbye!");
});
	</script>
	
	<script>
	function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
</script>
</head>

<div class="se-pre-con"></div>

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
                <a class="navbar-brand" href="index.php">Administrator Dashboard</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
            <li>
            
              <a href="#" onclick="toggleFullScreen()">
                        <i class="fa fa-arrows-alt fa-fw"></i>  
                    </a>
            </li>
           
<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <?php
                        include'version.php';
    // Connection details
$servername = "laughingquoll.net";
$username = "laughin1_updates";
$password = "updates";
$dbname = "laughin1_updates";

// Initiate the MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: ". $conn->connect_error);
} 
$result = mysqli_query($conn, "SELECT * FROM dashboard WHERE id > $version ORDER BY ID DESC");
if ($result->num_rows > 0) {

// output data of each row
while($row = $result->fetch_assoc()) {
    
echo '<li><a href="https://github.com/LaughingQuoll/Administrator-Control-Panel/releases"><div><strong>'.$row['name'].'</strong><span class="pull-right text-muted"><em>'.$row['date'].'</em></span></div><div><div onclick="">'.$row['description'].'</div><div onclick=""><b>'.$row['status'].'</b></div></div></a></li><li class="divider"></li>';

}
} else {
    echo "<li class='text-center'> No Updates</li><li class='divider'></li>";
}

$conn->close();

?><li>
                            <a class="text-center" href="https://github.com/LaughingQuoll/Administrator-Control-Panel/releases">
                                Check Releases <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
            <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                       <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "SELECT * FROM  `mail` WHERE `status`='1' ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {


echo '<li><a href="/messages/"><div><strong>'.$row['name'].'</strong><span class="pull-right text-muted"><em>'.$row['date'].'</em></span></div><div><div onclick="">'.substr($row['message'], 0, 70).'..</div></div></a></li><li class="divider"></li>';

    }
} else {
    echo "<li class='text-center'> No Messages</li><li class='divider'></li>";
}
$conn->close();
?><li>
                            <a class="text-center" href="/mail/">
                                <strong>Read all Mail</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                       <?php
// Create connection
$conn = new mysqli($host, $mysql_user, $mysql_pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} 
$sql = "SELECT * FROM  `tasks` ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
 while($row = $result->fetch_assoc()) {
$date2 = strtotime($row['completion']);
$date1 = strtotime($row['startdate']);

$today = time();
$dateDiff = $date2 - $date1;
$dateDiffForToday = $today - $date1;

$percentage = ($dateDiffForToday / $dateDiff) * 100;
$percentageRounded = round($percentage);
if($percentageRounded < 33){
$colour = "danger";
} else if($percentageRounded < 66){
$colour = "warning";
} else {
$colour = "success";
}
if($percentageRounded > 100){
$percentageRounded = "100";
}

echo '<li><a href="#"><div><p><strong>'.$row['taskname'].'</strong><span class="pull-right text-muted">'.$percentageRounded .'% Complete</span></p><div class="progress progress-striped active"><div class="progress-bar progress-bar-'.$colour.'" role="progressbar" aria-valuenow="'.$percentageRounded .'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentageRounded .'%"><span class="sr-only">'.$percentageRounded .'% Complete ('.$colour.')</span></div></div></div></a></li><li class="divider"></li>';

    }
} else {
    echo "<li class='text-center'> No Tasks</li><li class='divider'></li>";
}
$conn->close();
?><li>
                            <a class="text-center" href="/tasks/">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/password"><i class="fa fa-key fa-fw"></i>Change Password</a>
                        </li>
                        <li><a href="/settings"><i class="fa fa-cog fa-fw"></i>Change Settings</a>
                        </li>
                 
                        <li class="divider"></li>
                        <li><a href="/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="/dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Edit <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            
                        <li class="divider"></li>
                                <li>
                                    <a href="/edit/home/">Home Page <i class="fa fa-home fa-fw"></i></a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                        <a href="/mail"><i class="fa fa-envelope fa-fw"></i> Mail</a>
                        </li>
                        <li>
                        <a href="/blog"><i class="fa fa-comment fa-fw"></i> Blog</a>
                        </li>
                         <li>
                        <a href="/tasks"><i class="fa fa-tasks fa-fw"></i> Tasks</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-upload fa-fw"></i> Uploads<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            
                        <li class="divider"></li>
                        <li>
                                    <a href="/uploads/">New Upload <i class="fa fa-cloud-upload fa-fw"></i></a>
                                </li>
                                <li>
                                    <a href="/uploads/files/">Files <i class="fa fa-file fa-fw"></i></a>
                                </li>
                                
                            </ul>
                        </li>
                       <li>
                        <a href="/users"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        </ul>
                </div>
            </div>
        </nav>