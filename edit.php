<?php 
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task where id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description =  $row['description'];
    }
}

if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";

    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Task updated successfully';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}

?>

<?php include('includes/header.php') ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?= $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?= $title ?>" class="form-control" placeholder="Update title" required>
                    </div>
                    <div class="form-group">
                        <textarea row="2" name="description" class="form-control" placeholder="Update description" required><?= $description ?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" name="update">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?> 