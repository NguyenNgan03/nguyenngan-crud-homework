<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các trường bắt buộc đã được điền đầy đủ hay không
    if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["email"]) && isset($_POST["image_url"])) {
        // Xử lý và chắc chắn dữ liệu đầu vào
        $name = htmlspecialchars($_POST["name"]);
        $age = intval($_POST["age"]); // Chắc chắn rằng age là một số nguyên
        $email = htmlspecialchars($_POST["email"]);
        $image_url = htmlspecialchars($_POST["image_url"]);

        // Gọi hàm thêm sinh viên vào cơ sở dữ liệu
        require_once("database/database.php");
        createStudent($name, $age, $email, $image_url);

        // Chuyển hướng sau khi thêm sinh viên thành công
        header("Location: index.php");
        exit();
    } else {
        echo "Missing required fields.";
    }
}
?>
