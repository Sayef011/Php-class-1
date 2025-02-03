<?php
session_start();

$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$phone = $_REQUEST['phone'];
$date = $_REQUEST['date'];
$todaysDate = new DateTime();
$selectDate = new DateTime($date);
$author = $_REQUEST['author'];
$id = $_REQUEST['id'];
$errors = [];


//* Title Validations*//
if (empty($title)) {
    $errors['title-error'] = "Please enter the title";
}else if(strlen($title) < 3){
    $errors['title-error'] = "Title should be more than 3 Character";
}

//*details validations*//
if(empty($details)){
    $errors['detail-error'] = "Please enter the detail";
}else if(strlen($details) < 8 || strlen($details) > 200 ){
    $errors['detail-error'] = "Details should be more than 8 Character and less than 200 character";
}


// Phone validations*//
if (!empty($phone)) {
    if(strlen($phone) != 11){
        $errors["phone-error"] = "Please enter a correct phone number";

    }
}
//* Date validations\\
if($selectDate < $todaysDate){
    $errors["date-error"] = "Please enter a correct date";
}


//* In Errors Occured*//
if(count($errors) > 0){
    //redirects
    $_SESSION['errors']= $errors;
    $_SESSION['old'] = $_REQUEST;
    header("Location:../edit-post.php");
    }else{
        //* Update
        include_once "../database/env.php";
        $qurey = "UPDATE post_list SET title='$title',detail='$details',phone='$phone',date='$date',author='$author' WHERE id = '$id'";
        $result = mysqli_query($conn, $qurey);

        if($result){
            header("Location:../all-post.php");
        }
        
    }


?>