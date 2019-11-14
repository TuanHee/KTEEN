<?php 
include '../config/test_input.php';

if(isset($_POST['add_menu'])){
    $foodname = $category_ID = $image = $price = "";

    $foodname = test_input($_POST['name']);
    $category_ID = test_input($_POST['category_ID']);
    $image = test_input("S".$_SESSION['kteen_stall_id']."_".$foodname.".jpg");
    $price = test_input($_POST['price']);

    $sql = "INSERT INTO menu_approve (name, stall_ID, category_ID, image, price, available) VALUES ('$foodname', '".$_SESSION['kteen_stall_id']."', '$category_ID', '$image', '$price', '1');";
    $result = $conn->query($sql);

    $target_dir = "../images/" . $_SESSION['stall_username'] . "/menu/";
    $target_file = $target_dir.$image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["addmenu"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
    if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg") {
            echo "Sorry, only JPG file are allowed.";
            $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            echo "<script>alert('Add Successful')</script>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $conn->close();
    header('location: menu.php');
}

?>