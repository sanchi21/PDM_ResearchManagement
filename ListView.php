<html>
<head>

    <title></title>
    <meta name="description" content="">

    <!-- Mobile viewport optimized -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="includes/css/styles.css" rel="stylesheet">

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="style.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <!-- Include Modernizr in the head, before any other Javascript -->
    <script src="includes/js/modernizr-2.6.2.min.js"></script>

</head>
<body>



<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>


        </div>
    </div>
</div>



<div class="container" id="main">

    <div class="navbar navbar-fixed-top" id="navigation">


        <div class="container">

            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/"><img src="images/logo.png" alt="Your Logo"></a>

            <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Files <strong class="caret"></strong></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Upload Files</a>
                            </li>

                            <li>
                                <a href="#">Download Files</a>
                            </li>

                            <li>
                                <a href="#">Give Permissions</a>
                            </li>

                        </ul><!-- end dropdown-menu -->
                    </li>
                </ul>

                <ul class="nav navbar-nav pull-right">
                    <?php if(isset($_SESSION['username'])): ?>
                        <li class="dropdown open">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                    <?php else: ?>

                        <li class="dropdown">
                            <a href="#myModal" class="dropdown-toggle" data-toggle="modal">
                                <span class="glyphicon glyphicon-user"></span>Login
                                <strong class="caret"></strong>
                            </a>
                        </li>

                    <?php endif; ?>
                </ul><!-- end nav pull-right -->


            </div><!-- end nav-collapse -->

        </div><!-- end container -->


    </div><!-- end navbar -->



    <div class="row" id="bigCallout">

    </div><!-- end row -->


    <div class="row" id="featuresHeading">
        <div class="col-12">
            <h2>My Research Data</h2>

        </div><!-- end col-12 -->

    <!--<div class="row" id="features">
        <div class="col-sm-12 feature">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">View Your Research Data</h3>
                </div><!-- end panel-heading -->

            </div><!-- end panel -->

        </div><!-- end feature -->

    </div><!-- end features -->

<div class="container">
                    <?php

                    require_once("DatabaseControl/DB_Access.php");

                    $dba = new DB_Access();
                    $result = $dba -> getRoots();

                    if($result->num_rows>0)
                    {
                        echo"<ul class='san'>";
                        while ($row = $result->fetch_assoc())
                        {
                            $nm = $row["Name"];
                            echo "<li class='san'><a href='#'>$nm</a>";

                            $files = $dba -> getFiles($nm);
                            if($files->num_rows > 0)
                            {
                                echo"<ul class='san'>";
                                while($row2 = $files->fetch_assoc())
                                {
                                    $nm2 = $row2["Name"]." [".$row2["Size"]."]";
                                    $fid = $row2["File_ID"];
                                    echo "<li class='san'><a href='download.php?id=$fid'>$nm2</a></li>";
                                }
                                echo"</ul>";
                            }
                            echo "</li>";

                        }
                        echo"</ul>";
                    }


                    ?>
</div>

</div><!-- end container -->


<footer>

    <div class="container">
        <div class="row">
            <div class="col-sm-6" id="copyRights">
                <h6>All Rights Reserved</h6>
            </div><!-- end col-sm-6 -->


            <div class="col-sm-6 pull-right" id = "follow">
                <h6>Follow Us on <a href="www.facebook.com">Facebook</a></h6>

            </div><!-- end col-sm-6 -->


        </div><!-- end row -->
    </div><!-- end container -->

</footer>


<!-- All Javascript at the bottom of the page for faster page loading -->

<!-- First try for the online version of jQuery-->
<script src="http://code.jquery.com/jquery.js"></script>

<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

<!-- Bootstrap JS -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="includes/js/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="MultiNestedList.js"></script>
</body>
</html>


