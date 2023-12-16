<?php require './database/database.php' ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = isset($_GET['id']) ? $_GET['id'] : '';
}

deleteStudent($id);
require './index.php';
?>