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
                    <input name="title" type="text" placeholder="Post Tittle" class="form-control mb-3">
                    <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['title-error'] ?? null);?>
                    </span>
                   <textarea name="details" class="form-control mb-3" placeholder="Post Details"></textarea>
                   <span class="text-danger mb-1">
                        <?= ($_SESSION['errors'] ['detail-error'] ?? null);?>
                    </span>
                    <input name="author" type="text" placeholder="Post Author" class="form-control mb-3">
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

