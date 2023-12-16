<?php require_once('partial/header.php'); ?>
<?php require_once("database/database.php");?>
    <div class="container p-4">
        <div class="d-flex justify-content-end p-2">
            <a href="./create_html.php" class="btn btn-primary">Add +</a>
        </div>
        <?php
            $data = selectAllStudents();
            foreach($data as $student):
        ?>
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="card-image mr-3">
                        <img class="img-fluid" width="200" src="<?php echo $student['profile'] ?>" alt="">
                    </div>
                    <div class="info">
                        <h1 class="display-4">Name: <?php echo $student['name'] ?> </h1>
                        <strong>Age: <?php echo $student['age'] ?> </strong> 
                        <p>Email: <?php echo $student['email'] ?></p>
                    </div>
                </div>
                <div class="action d-flex justify-content-end">
                    <a href="./update_html.php" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                    <a href="./delete_model.php" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <?php
            endforeach;
        ?>
    </div>
<?php require_once('partial/footer.php'); ?>