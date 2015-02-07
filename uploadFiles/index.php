<?php
session_start();

$con=mysqli_connect("localhost","root","","pdm");
$sql = "SELECT * FROM users WHERE First_Name = 'Abhayan'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
$storageSize = $row['Storage_Limit'];
$usedSpace = $row['Used_Space'];
$Staff_ID=001;

?>
<html>
<head>
    <title>
        PDM | File Upload
    </title>
    <!--scripts-->
    <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="bootstrap-3.3.2-dist/js/bootstrap.js"></script>


    <script src="script.js"></script>
	<script src="drop.js"></script>


    <!--styles-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="drop.css">
    
</head>
<body>
<script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-multiselect.css" type="text/css"/>

<!-- Button upload modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpload">
    Upload Files
</button>

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
                                        $resultDirectory = mysqli_query($con,"SELECT DISTINCT(`Folder`), `Staff_ID` FROM `pdm`.`storage` WHERE Staff_ID='001'");
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


	
	
	
</body>
</html>
