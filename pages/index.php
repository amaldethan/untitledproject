<?php 
ob_start();
session_start();
include('../dbconfig.php');
if(!isset($_SESSION['started']) || (isset($_SESSION['started']) && $_SESSION['started'] !== true))
{
   die('You cannot directly access this page!'); 
}
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">

</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            

            <ul class="nav navbar-top-links navbar-right">               
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
                
            </ul>
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-info-circle fa-fw"></i>My Account</a>
                            
                            
                        </li>
                        <li>
                            <a href="profile.php"><i class="fa fa-id-card-o fa-fw"></i>View Profile</a>
                        </li>
                        <li>
                            <a href="edit.php"><i class="fa fa-edit fa-fw"></i>Edit Profile</a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
            
        </nav>

        <?php 
                    
                    
                    
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
                    while($res = mysqli_fetch_array($query)){

                        $fname = $res['fname'];
                        $lname = $res['lname'];
                        $email = $res['uname'];
                    }



        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php echo $fname; ?></h1>
                </div>
                <div class="col-lg-12">
                  
                  <table class="w3-table w3-striped">
                      <tr>
                      <td>Membership Type</td>
                      <td>NA</td>
                      </tr>
                      <tr>
                        <td>Enrollment Date</td>
                        <td>NA</td>
                      </tr>
                      <tr>
                          <td>Number of Tests Taken</td>
                          <td>NA</td>
                      </tr>
                      <tr>
                          <td>Remaining tests</td>
                          <td>NA</td>
                      </tr>
                  </table>  
                       

                </div>
            </div>
            
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<footer class="mainfoot">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <ul class="foot">
                    <li><a class="footlink" href="#">About Us</a></li>
                    <li><a class="footlink" href="#">Terms & Conditions</a></li>
                    <li><a class="footlink" href="#">Pricing</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="foot">
                    <li><a class="footlink" href="#">Privacy Policy</a></li>
                    <li><a class="footlink" href="#">Refunds</a></li>
                    <li><a class="footlink" href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="foot">
                    <li class="foot-li"><a class="fa fa-facebook-official" href="#" style="font-size: 30px;color: white"></a></li>
                    <li class="foot-li"><a class="fa fa-google-plus-official" href="#" style="font-size: 30px;color: white"></a></li>
                    <li class="foot-li"><a class="fa fa-twitter-square" href="#" style="font-size: 30px;color: white"></a></li>
                </ul>
            </div>
            
        </div>
        
    </div>

</footer>



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
