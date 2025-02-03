<?php
session_start();
include "./inc/header.php";
include_once "./database/env.php";

$id = $_REQUEST['id'];
$qurey = "SELECT * FROM post_list WHERE id = '$id'";
$result = mysqli_query($conn, $qurey);
$post = mysqli_fetch_assoc($result);

if(empty($post)){
    header("Location:./404.php");
}

?>

    <main>
        <div class="col-lg-5 mx-auto mt-5">
        <div class="card">
            <div class="card-header">Edit Post</div>
            <div class="card-body">


                <form method="post" action="./controller/PostUpdateController.php">
                <input type="hidden" name="id" value="<?= $post['id']; ?>">

                    <input value="<?= $post['title'] ?? null ?>" name="title" type="text" placeholder="Post Tittle" class="form-control mb-3 <?= getErrorClass('title-error') ?>">
                    <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['title-error'] ?? null);?>
                    </span>
                   <textarea name="details" class="form-control mb-3 <?= getErrorClass('detail-error') ?>" placeholder="Post Details"><?= $post['detail'] ?? null ?></textarea>
                   <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['detail-error'] ?? null);?>
                    </span>
                    
                    <input value="<?= $post['phone'] ?? null ?>" type="number" name="phone" class="form-control mb-2 <?= getErrorClass('phone-error') ?>" placeholder="enter your phone number">
                    <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['phone-error'] ?? null);?>
                    </span>
                    
                    <label class="mt-2" for="date">Select a date</label>
                    <input value="<?= $post['date'] ?? null ?>" type="date" name="date" id="date" class="form-control mb-3" >
                    <span class="text-danger mb-1">
                        <?= ($_SESSIONt['errors'] ['date-error'] ?? null);?>
                    </span>

                    <input value="<?= $post['author'] ?? null ?>" name="author" type="text" placeholder="Post Author" class="form-control mb-3">
                    <button class="btn btn-primary">Update post</button>
                </form>
            </div>
        </div>
        </div>

    </main>

<?php
include "./inc/footer.php";


session_unset();
?>
