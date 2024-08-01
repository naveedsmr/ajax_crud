<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_crud");
if (!$conn) {
    die("Connection Error.....<br>" . mysqli_connect_error());
}
if (isset($_POST['work']) && $_POST['work'] == "add") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "INSERT INTO `users`(`name`, `email`) VALUES ('$name','$email')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode(array(
            'statusCode' => 200,
            'msg' => $name . " add successfully.",
        ));
    } else {
        echo json_encode(array(
            'statusCode' => 400,
            'msg' => $name . " is not add." . mysqli_error($conn),
        ));
    }
}
if (isset($_POST['work']) && $_POST['work'] == "update") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode(array(
            'statusCode' => 200,
            'msg' => $name . " updated successfully.",
        ));
    } else {
        echo json_encode(array(
            'statusCode' => 400,
            'msg' => $name . " is not updated." . mysqli_error($conn),
        ));
    }
}
if (isset($_POST['work']) && $_POST['work'] == "getData") {
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($result);
    if ($rows != null || !empty($rows)) {
        echo json_encode(array(
            'statusCode' => 200,
            'data' => $rows,
        ));
    } else {
        echo json_encode(array(
            'statusCode' => 400,
            'msg' => "No Users Available.",
        ));
    }
}
if (isset($_POST['work']) && $_POST['work'] == "delete") {
    $id = $_POST['id'];
    $query = "DELETE FROM `users` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode(array(
            'statusCode' => 200,
            'msg' => "User Deleted successfully.",
        ));
    } else {
        echo json_encode(array(
            'statusCode' => 400,
            'msg' => "User is not Deleted." . mysqli_error($conn),
        ));
    }
}