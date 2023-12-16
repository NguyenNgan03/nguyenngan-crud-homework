<?php require_once('partial/header.php'); ?>
<?php
require './database/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
}
$student = selectOnestudent($id);
?>
<div class="container p-4">
    <form action="update_model.php" method="post">
        <input name="id" value="<?php echo $student['id'] ?>" hidden>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $student['name'] ?>">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $student['age'] ?>">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $student['email'] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Image URL" name="image_url" value="<?php echo $student['profile'] ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
    </form>
</div>
<?php require_once('partial/footer.php'); ?>