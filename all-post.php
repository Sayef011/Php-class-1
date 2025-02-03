<?php
include "./inc/header.php";

require_once "./database/env.php";

$query = "SELECT id, title AS post_title, detail, author FROM  post_list ORDER BY id DESC";

$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, 1);

?>

<main>
    <div class="col-lg-10 mx-auto mt-5">
        <div class="card">
            <div class="card-header">All Posts</div>
            <div class="card-body">

                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Post Tittle</th>
                            <th>Post Details</th>
                            <th>Post Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (empty($posts)){
                        ?>
                            <tr>
                                <td colspan='5' class="text-center">No post found</td>
                            </tr>
                        <?php
                        }
                        foreach ($posts as $index => $post):
                        ?>
                            <tr>
                                <td><?= ++$index; ?></td>
                                <td><?= $post['post_title']; ?></td>
                                <td><?= substr($post['detail'], 0, 50); ?><?= strlen($post['detail']) > 50 ? '...' : '' ?></td>
                                <td class="text-center">
                                    <img src="https://api.dicebear.com/9.x/initials/svg?seed=<?= $post['author']; ?>" alt="" style="width: 40px;height:40px;border-radius:50%;object-fit:cover;object-position:center;" >
                                </td>
                                <td class="text-center">
                                    <a href="./edit-post.php?id=<?= $post['id']; ?>" class="btn btn-warning text-dark btn-sm">Edit</a>
                                    <a href="./controller/postDeleteController.php?id=<?= $post['id']; ?>" class="btn btn-danger mx-2 btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</main>



<?php
include "./inc/footer.php"
?>