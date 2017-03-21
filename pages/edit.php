<?php
ob_start();
session_start();
if(!isset($_SESSION['started']) || (isset($_SESSION['started']) && $_SESSION['started'] !== true))
{
   die('You cannot directly access this page!'); 
}
include("../dbconfig.php");
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
            //$date = strtotime($dob);
        }

        ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Profile</h1>
                </div>
                <div class="col-lg-12">


                <div class="w3-container">

                    <form method="POST" class="w3-container">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="w3-input w3-border" type="text" name="f_name" id="f_name" value="<?php echo $fname; ?>">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="w3-input w3-border" type="text" name="l_name" id="l_name" value="<?php echo $lname; ?>">
                        </div>
                        <div class="form-group">
                            <label>Syllabus</label>
                            <input class="w3-input w3-border" type="text" name="syllabus" id="syllabus" value="<?php echo $syll; ?>">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input class="w3-input w3-border" type="date" name="date" id="date" value="<?php echo $dob;?>">
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input class="w3-input w3-border" type="text" name="class" id="class" value="<?php echo $grade;?>">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input class="w3-input w3-border" type="text" name="loc" id="loc" value="<?php echo $city;?>">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input class="w3-btn w3-teal" type="submit" name="submit" id="submit" value="submit" style="width:150px;height:50px;">
                        </div>
                    </form>
                        
                    </div>    

                    
                </div>
            </div>
            
            <?php 

                if(isset($_POST['submit'])){

                    $f_name = $_POST['f_name'];
                    $l_name = $_POST['l_name'];
                    $syllabus = $_POST['syllabus'];
                    $date = date('Y-m-d', strtotime($_POST['date']));
                    $class = $_POST['class'];
                    $loc = $_POST['loc'];

                    $uinsert = mysqli_query($conn, 'UPDATE users SET fname = "'.$f_name.'", lname = "'.$l_name.'" WHERE id = "'.$id.'"');
                    $pinsert = mysqli_query($conn, 'UPDATE profile SET dob = "'.$date.'", syllabus = "'.$syllabus.'",  grade = "'.$class.'", city = "'.$loc.'" WHERE userid = "'.$id.'"');

                    if($uinsert && $pinsert){

                        header('Location: profile.php?id='.$id.'');
                    }
                    else {
                        echo mysqli_error($conn);
                    }
                }

            ?>
           
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
