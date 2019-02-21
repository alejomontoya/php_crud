<?php
include("db.php")
?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) {  ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset();
        }
        ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus required>
                    </div>
                    <div class="form-group">
                        <textarea row="2" name="description" class="form-control" placeholder="Task description" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="save_task" value="Save task" class="btn btn-success btn-block" autofocus>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered text-center animacion">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";
                    $result_task = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_task)) {
                        ?>
                    <tr>
                        <td>
                            <?php echo $row['title'] ?>
                        </td>
                        <td>
                            <?php echo $row['description'] ?>
                        </td>
                        <td>
                            <?php echo $row['created_at'] ?>
                        </td>
                        <td><a href="edit.php?id=<?php echo $row['id']?>">
                                <i class="fas fa-marker text-info"></i></td>
                        </a>
                        <td><a href="delete_task.php?id=<?php echo $row['id']?>">
                                <i class="fas fa-trash-alt text-danger"></i></td>
                        </a>
                    </tr>
                    <?php 
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?> 