<?php
session_start();
include "./inc/header.php"

?>

    <main>
        <div class="col-lg-5 mx-auto mt-5">
        <div class="card">
            <div class="card-header">Add Post</div>
            <div class="card-body">


                <form method="post" action="./controller/PostStoreController.php">
                    <input value="<?= $_SESSION['old']['title'] ?? null ?>" name="title" type="text" placeholder="Post Tittle" class="form-control mb-3 <?= getErrorClass('title-error') ?>">
                    <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['title-error'] ?? null);?>
                    </span>
                   <textarea name="details" class="form-control mb-3 <?= getErrorClass('detail-error') ?>" placeholder="Post Details"><?= $_SESSION['old']['details'] ?? null ?></textarea>
                   <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['detail-error'] ?? null);?>
                    </span>
                    
                    <input value="<?= $_SESSION['old']['phone'] ?? null ?>" type="number" name="phone" class="form-control mb-2 <?= getErrorClass('phone-error') ?>" placeholder="enter your phone number">
                    <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['phone-error'] ?? null);?>
                    </span>
                    
                    <label class="mt-2" for="date">Select a date</label>
                    <input value="<?= $_SESSION['old']['date'] ?? null ?>" type="date" name="date" id="date" class="form-control mb-3" >
                    <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['date-error'] ?? null);?>
                    </span>

                    <input value="<?= $_SESSION['old']['author'] ?? null ?>" name="author" type="text" placeholder="Post Author" class="form-control mb-3">
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        </div>

    </main>

<?php
include "./inc/footer.php";


session_unset();
?>

