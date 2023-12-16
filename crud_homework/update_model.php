<?php
require './database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    $student_data = array(
        'name' => $name,
        'age' => $age,
        'email' => $email,
        'profile' => $image_url
    );
}
updateStudent($id, $student_data);
require './index.php';
?>