<?php 
    session_start();
    $conn = new PDO("mysql:host=127.0.0.1;dbname=hotel_de_asiana", $_SESSION['user'], $_SESSION['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['delete'])) {
        $table = $_GET['table'];
        $id = $_GET['id'];
        $field = $_GET['field'];
        try {
            $conn->exec("DELETE FROM $table WHERE $field=$id");
            header('Location: ../dashboard#table-'.$table);
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['add-room'])) {
        $type = $_POST['type'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $rate = $_POST['rate'];
        try {
            $conn->exec("INSERT INTO room(type, status, location, rate) VALUES ('$type', '$status', '$location', $rate)");
            header('Location: ../dashboard');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-room'])) {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $rate = $_POST['rate'];
        try {
            $conn->exec("UPDATE room SET type='$type', status='$status', location='$location', rate=$rate WHERE no=$id");
            header('Location: ../dashboard');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['add-food'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $portion = $_POST['portion'];
        try {
            $conn->exec("INSERT INTO food(name, type, amount, portion) VALUES ('$name', '$type', '$amount', '$portion')");
            header('Location: ../dashboard#table-food');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-food'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $portion = $_POST['portion'];
        try {
            $conn->exec("UPDATE food SET name='$name', type='$type', amount='$amount', portion='$portion' WHERE id=$id");
            header('Location: ../dashboard#table-food');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['add-food-order'])) {
        $guest_id = $_POST['guest'];
        $food_id = $_POST['food'];
        try {
            $conn->exec("INSERT INTO food_order(guest_id, food_id, date) VALUES ('$guest_id', '$food_id', NOW())");
            header('Location: ../dashboard#table-food-order');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-food-order'])) {
        $guest_id = $_POST['guest'];
        $food_id = $_POST['food'];
        $date = $_POST['date'];
        try {
            $conn->exec("UPDATE food_order SET guest_id='$guest_id', food_id='$food_id' WHERE date='$date'");
            header('Location: ../dashboard#table-food-order');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['add-company'])) {
        $name = $_POST['name'];
        $billing_address = $_POST['billing_address'];
        try {
            $result = $conn->exec("INSERT INTO guest(type) VALUES ('company')");
            $id = $conn->lastInsertId();
            $conn->exec("INSERT INTO company(name, billing_address, guest_id) VALUES ('$name', '$billing_address', $id)");
            header('Location: ../dashboard#table-company');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_GET['delete-food-order'])) {
        $date = $_GET['date'];
        try {
            $conn->exec("DELETE FROM food_order WHERE date='$date'");
            header('Location: ../dashboard#table-food-order');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-company'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $billing_address = $_POST['billing_address'];
        try {
            $conn->exec("UPDATE company SET name='$name', billing_address='$billing_address' WHERE id=$id");
            header('Location: ../dashboard#table-company');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['add-individual'])) {
        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        try {
            $result = $conn->exec("INSERT INTO guest(type) VALUES ('individual')");
            $id = $conn->lastInsertId();
            $conn->exec("INSERT INTO individual VALUES ($nic, '$name', '$gender', $id)");
            header('Location: ../dashboard#table-individual');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-individual'])) {
        $guest_id = $_POST['guest_id'];
        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        try {
            $conn->exec("UPDATE individual SET nic='$nic', name='$name', gender='$gender' WHERE guest_id=$guest_id");
            header('Location: ../dashboard#table-individual');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['add-family'])) {
        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        try {
            $result = $conn->exec("INSERT INTO guest(type) VALUES ('family')");
            $id = $conn->lastInsertId();
            $conn->exec("INSERT INTO family VALUES ($nic, '$name', '$gender', $id)");
            header('Location: ../dashboard#table-family');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    if (isset($_POST['edit-family'])) {
        $guest_id = $_POST['guest_id'];
        $nic = $_POST['nic'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        try {
            $conn->exec("UPDATE family SET head_nic='$nic', head_name='$name', head_gender='$gender' WHERE guest_id=$guest_id");
            header('Location: ../dashboard#table-family');
        }catch (PDOException $e) {
            header('Location: ../dashboard?error="'.str_replace(PHP_EOL, '', $e).'"');
        }
    }
    $con = null;
?>
