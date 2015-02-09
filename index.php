<?php
/**
 * Created by PhpStorm.
 * User: abhay adm
 * Date: 2/9/2015
 * Time: 12:23 PM
 */ ?>


<html>
<head>
    <title>Research Management</title>

    <!--styles-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
    <style>
        body {
            font-family: 'Oswald', sans-serif;
        }
    </style>

    <!--scripts-->
    <script src = "https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>



</head>
<body>
<!--NavBar-->
<nav class="navbar navbar-default" style="background-color: #A3C9BE">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Files <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="dropdown-toggle" data-target="#modalUpload" data-toggle="modal" role="button" aria-expanded="false">Upload</a></li>
                        <li><a href="#">Download</a></li>
                        <li><a href="#">Permissions</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-target="#loginModal" data-toggle="modal" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Login <span class="caret"></span></a>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!--modalLogin-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <table style="width: 100%">
                    <tr>
                        <td>
                            <input type="text" class="form-control" placeholder="User id">

                        </td>
                    </tr>
                    <tr>
                        <td style="height: 2px">


                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input tyoe="text" class="form-control" placeholder="password">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">

                <center><button type="button" class="btn btn-success">Sign In</button></center>
            </div>
        </div>
    </div>
</div>

<!-- UploadModal -->
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    Upload Files</h4>
            </div>
            <div class="modal-body">
                <form action="upload.php" id="myForm" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <input type="file" name="file" id="file" class = "btn btn-default btn-sm">
                            </td>
                            <td>

                            </td>
                            <td>

                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                    <!-- savePath: -->
                                    <select name="sltDirectory" id="sltDirectory">
                                        <?php
                                        $resultDirectory = mysqli_query($con,"SELECT DISTINCT(`Folder`), `userId` FROM `pdm`.`storage` WHERE Staff_ID='$Staff_ID'");
                                        while($row = mysqli_fetch_array($resultDirectory)) {
                                            echo '<option value="'.$row['Folder'].'">'. $row['Folder'].' </option>';
                                        }
                                        ?>
                                    </select>
                                    <!-- savePath: -->
                                    <select id="addLabel">
                                        <option value="cheese">Public</option>
                                        <option value="tomatoes">Private</option>
                                    </select>
                                    <button type="submit" value="Upload" class = "btn btn-default" name="btnUpload" style="height: 34px"><span class="glyphicon glyphicon-send" aria-hidden="true"> </span> Upload</button>
                                    <button type="reset" value="Clear" class = "btn btn-default" style="height: 34px" ><span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> Clear</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>

                            <td>

                            </td>
                            <td></td></tr>
                    </table>


                </form>
                <div class="drop">Drag and Drop file here</div>
                <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				<span class="sr-only">0% complete</span">
                    </div>
                </div>
                <?php  $remainingSpace = $storageSize-$usedSpace; ?>

                <b><p style="font-size: 10px"><?php  echo round($usedSpace,2)." kB of ".$storageSize." kB used"." ("; echo ($remainingSpace/$storageSize)*100; echo "%) "; ?></p></b>




                <!-- Initialize the sltDirectory plugin: -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#sltDirectory').multiselect();
                    });
                </script>
                <!-- Initialize the addLabel plugin: -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#addLabel').multiselect();
                    });
                </script>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<!--content main-->
<div class = "container">
    <div class="col-xs-12 col-sm-10 col-md-12 col-lg-12" style="inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
        <H2>Welcome to Research Management</h2><BR>
        <!--panelLeft-->
        <div class="col-xs-12 col-sm-10 col-md-4 col-lg-4" style="background-color:#fffff"; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
        <div class="panel panel-default">
            <div class="panel-heading"><b><center><H4>View Your Research Data</H4></center></b></div>
            <div class="panel-body">

                <!-- Indicates caution should be taken with this action -->
                <button type="button" class="btn btn-warning" style="width: 100%">GO</button>

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-10 col-md-4 col-lg-4" style="background-color:#fffff"; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
    <div class="panel panel-default">
        <div class="panel-heading"><b><center><H4>Share Research file</H4></center></b></div>
        <div class="panel-body">

            <!-- Indicates a dangerous or potentially negative action -->
            <button type="button" class="btn btn-danger" style="width: 100%">GO</button>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-10 col-md-4 col-lg-4" style="background-color:#fffff"; box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
<div class="panel panel-default">
    <div class="panel-heading"><b><center><H4>Get Additional Space</H4></center></b></div>
    <div class="panel-body">

        <!-- Contextual button for informational alert messages -->
        <button type="button" class="btn btn-info" style="width: 100%">GO</button>
    </div>
</div>
</div>

<nav class="navbar navbar-default navbar-fixed-bottom" style="background-color: #333">
    <div class="container">
        ...
    </div>
</nav>



</body>
</html>
