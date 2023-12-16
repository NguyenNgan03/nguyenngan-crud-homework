<?php
/**
 * Connect to database
 */
function db() {
    $host = "localhost";
    $dbname = "web_a.sql";
    $user = "root";
    $password = "";
    
    try{
        $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $connect;
    }
    catch(PDOException $e){
        die("connection failed:::: ". $e->getMessage());
    }
}
/**
 * Create new student record
 */
function createStudent($name, $age, $email, $profile) {
    $connect = db();
    try{
        $sql = "INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)";
        $stmt = $connect -> prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt -> bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt -> bindParam(':profile', $profile);
    
        $stmt -> execute();
        echo "value added successfully";
    }catch(PDOException $e){
        echo "Error". $e -> getMessage();
    }
  // Close the connection

}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $connect = db();
    try{
        $sql = "SELECT * FROM student";
        $stmt = $connect -> prepare($sql);

        $stmt -> execute();
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }catch(PDOException $e){
        echo "Error".$e -> getMessage();
        return null;
    }
 
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    $connect = db();
    try{
        $sql = "SELECT * FROM student WHERE id = :id";
        $stmt = $connect -> prepare($sql);
        $stmt -> bindParam(':id', $id);
        $stmt ->execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $result;
    }catch(PDOException $e){
        echo "Error".$e -> getMessage();
        return null;
    }



}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $connect = db();
    try{
        $sql = "DELETE FROM student WHERE id = :id";
        $stmt = $connect -> prepare($sql);
        $stmt ->bindParam(":id", $id);
        $stmt -> execute();
    }
    catch(PDOException $e){
        echo "Error".$e -> getMessage();
    }
    finally{
        $connect = null;
    }
}
/**
 * Update students
 * 
 */
// function updateStudent($id, $name, $age, $email, $profile) {
//     $connect = db();

//     try {
//         $sql = "UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id";
//         $stmt = $connect->prepare($sql);
//         $stmt->bindParam(':id', $id);
//         $stmt->bindParam(':name', $name);
//         $stmt->bindParam(':age', $age);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':profile', $profile);
//         $stmt->execute();

//         echo "Record updated successfully";
//     } catch (PDOException $e) {
//         echo "Error updating record: " . $e->getMessage();
//     } finally {
//         $connect = null; // Close the connection
//     }
// }
function updateStudent($id, $data)
{
    $connect = db();

    try {
        $sql = "UPDATE student SET ";
        $placeholders = [];

        foreach ($data as $column => $value) {
            $sql .= "$column = ?, ";
            $placeholders[] = $value;
        }

        $sql = rtrim($sql, ", ") . " WHERE id = ?";
        $placeholders[] = $id;

        $stmt = $connect->prepare($sql);
        $stmt->execute($placeholders);
    } catch (PDOException $e) {
        echo "Error updating student: " . $e->getMessage();
    }

    $connect = null;
}