 <?php 
//  session_start();
//  $title = $_REQUEST['title'];
//  $details = $_REQUEST['details'];
//  $author = $_REQUEST['author'];
//  $errors = [];


//Title Validations
// if(empty($title)){
//     $errors['title-error'] = "Please enter the title";
// } else if(strlen($title) < 3){
//     $errors['title-error'] = "Title should be more than 3 Character";
// }



//Details Validations
// if(empty($details)){
//     $errors['detail-error'] = "Please enter the detail";
// }else if(strlen($details) < 3 || strlen($details) > 10){
//     $errors['detail-error'] = "Details should be more than 3 Character and less than 200 character";
// }


// if errors occured
// if(count($errors) > 0){
//     //redirects
//     $_SESSION['errors']= $errors;
//     header("Location:../index.php");
// }else{
//     //Store
// }




?>

<?php
session_start();

$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$phone = $_REQUEST['phone'];
$date = $_REQUEST['date'];
$todaysDate = new DateTime();
$selectDate = new DateTime($date);
$author = $_REQUEST['author'];
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
    header("Location:../index.php");
    }else{
        //Store

        require_once "../database/env.php";

       $query = "INSERT INTO post_list(title,detail,phone,date,author)
         VALUES ('$title','$details','$phone','$date','$author')";

        $res = mysqli_query($conn, $query);

        if($res){
        header("Location: ../all-post.php");
    }
    }

?>