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

    

    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet"> 
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">   
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">

</head>

<body>

    <div id="wrapper">

    <nav class="nav navbar-default">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>              
            </button>
            <a class="navbar-brand" href="#"><b>B' a whiz</b></a>
        </div>
        <div class="collapse navbar-collapse" id="mynav">       
          <ul class="nav navbar-nav navbar-right">

              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Its For You</a></li>
              <li><a href="#">Test Portfolio</a></li>
              <li><a href="#">Pricing</a></li>
              <li><a href="../logout.php">Logout</a></li>
              
           </ul>
        </div>
    </nav>
        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- /.navbar-header -->

         
            

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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <?php 

        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
        while($res = mysqli_fetch_array($query)){

            $fname = $res['fname'];
            $lname = $res['lname'];
            $email = $res['uname'];

        }
        $pro_query = mysqli_query($conn, "SELECT * FROM profile WHERE userid = $id");
        while($pro_res = mysqli_fetch_array($pro_query)){

            $dob = $pro_res['dob'];
            $syll = $pro_res['syllabus'];
            $grade = $pro_res['grade'];
            $city = $pro_res['city'];
            $date = strtotime($dob);
        }

        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Your Profile</h1>
                </div>
                <div class="col-lg-12">
                 <table class="w3-table w3-striped">
                     <tr>
                      <td>First Name</td>
                      <td><?php echo $fname; ?></td>   
                     </tr>
                     <tr>
                      <td>Last Name</td>
                      <td><?php echo $lname; ?></td>   
                     </tr>
                     <tr>
                      <td>Email</td>
                      <td><?php echo $email; ?></td>   
                     </tr>
                     <tr>
                      <td>Date Of Birth</td>
                      <td><?php echo date('d/m/Y', $date); ?></td>   
                     </tr>
                     <tr>
                      <td>Syllabus</td>
                      <td><?php echo $syll; ?></td>   
                     </tr>
                     <tr>
                      <td>Grade</td>
                      <td><?php echo $grade; ?></td>   
                     </tr>
                     <tr>
                      <td>City</td>
                      <td><?php echo $city; ?></td>   
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
