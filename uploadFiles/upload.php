<?php
//dbConnect
$con=mysqli_connect("localhost","root","","pdm");
$sql = "SELECT * FROM users WHERE First_Name = 'abhayan'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
$storageSize = $row['Storage_Limit'];
$usedSpace = $row['Used_Space'];
$_SESSION['$storageSize']=$storageSize;
$fileDirectory = $_POST['sltDirectory'];

$Staff_ID=1234;

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $remainingSpace=$storageSize-$usedSpace;
    if($fileSize<$remainingSpace)
    {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

            $fileSize  = ($_FILES["file"]["size"] / 1024);
            $fileName=  $_FILES["file"]["name"];
            $file = "upload/".$_FILES["file"]["name"];
            $usedSpace = $usedSpace+$fileSize;

            $sqlUsedSpace= "UPDATE `pdm`.`users` SET Used_Space = '$usedSpace' WHERE First_Name = 'Abhayan'";
            $queryUsedSpace=mysqli_query($con,$sqlUsedSpace);

            $sqlFileStorage= " INSERT INTO `pdm`.`storage` (`File_ID`, `Name`, `File_Path`, `Type`, `Size`, `Folder`, `Staff_ID`, `File_Access`, `File_Share`) VALUES (NULL,'$fileName', '$file','$imageFileType','$fileSize', '$fileDirectory','$Staff_ID', 'public', '');";
            $queryFileStorage =mysqli_query($con,$sqlFileStorage);



        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    else
    {
        echo "not enough space";
    }
}
?> 