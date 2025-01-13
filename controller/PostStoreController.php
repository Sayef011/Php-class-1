 <?php 
 session_start();
 $title = $_REQUEST['title'];
 $details = $_REQUEST['details'];
 $author = $_REQUEST['author'];
 $errors = [];


//Title Validations
if(empty($title)){
    $errors['title-error'] = "Please enter the title";
} else if(strlen($title) < 3){
    $errors['title-error'] = "Title should be more than 3 Character";
}



//Details Validations
if(empty($details)){
    $errors['detail-error'] = "Please enter the detail";
}else if(strlen($details) < 3 || strlen($details) > 10){
    $errors['detail-error'] = "Details should be more than 3 Character and less than 200 character";
}


// if errors occured
if(count($errors) > 0){
    //redirects
    $_SESSION['errors']= $errors;
    header("Location:../index.php");
}else{
    //Store
}