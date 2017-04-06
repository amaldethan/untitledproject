<?php 
ob_start();
session_start();
include('../dbconfig.php');
if(!isset($_SESSION['started']) || (isset($_SESSION['started']) && $_SESSION['started'] !== true))
{
   die('You cannot directly access this page!'); 
}
$id = $_SESSION['id'];
$pack_id = $_GET['tpack_id'];
$_SESSION['tpack_id'] = $pack_id;
$pack_query = mysqli_query($conn,"SELECT * FROM tpack WHERE id = $pack_id");
$pack_res = mysqli_fetch_array($pack_query);
$pack_name = $pack_res['pack_name'];
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

        <div id="page-wrapper">
            <h4><?php echo $pack_name; ?></h4>
        <?php 
                    
                    $namearr = array();
                    $chaparr = array();
                    $idarr = array();

                    $test_query = mysqli_query($conn, "SELECT * FROM tests WHERE pack_id = $pack_id");
                    while($tests = mysqli_fetch_array($test_query)){
                        $name = $tests['name'];
                        $chapter = $tests['chapter'];
                        $tid = $tests['id'];
                        array_push($namearr, $name);
                        array_push($chaparr, $chapter);
                        array_push($idarr, $tid);
                        //$_SESSION['test_id'] = $tests['id'];
                       }

                    for ($i=0; $i < count($idarr) ; $i++) { 
                        
                    
            ?>

        
        <div class="col-sm-4">
            <div class="w3-card-4" style="margin-bottom:10px;">
                <header class="w3-container w3-light-grey">
                    <h3><?php echo $namearr[$i]; ?></h3>
                </header>
                <div class="w3-container" style="margin-top:10px;">
                  <p><b>Chapter : <?php echo $chaparr[$i]; ?></b></p>
                  <hr>
                  
                  <hr>
                  
                </div>
                
                <a role="button" class="w3-button w3-block w3-green w3-hover-blue" href="../tests/start.php?id=<?php echo $idarr[$i]; $_SESSION['test'] = true; ?>">Take Test</a>
                
            </div>
        </div>

    <?php 

       

        
    
    }
     ?>
            
            
            
        </div>
        

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
