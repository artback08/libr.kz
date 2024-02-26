<?php


function redirect($address){
    header("Location:" . URL . "/" . $address);
    exit;
}

function dd($obj){
    echo '<pre>';
    print_r($obj);
    echo '</pre>';
}


function find_admin_by_id($admin_id) {
    global $connection;

    $safe_admin_id = mysqli_real_escape_string($connection, $admin_id);

    $query  = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE id = {$safe_admin_id} ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)) {
        return $admin;
    } else {
        return null;
    }
}

function find_admin_by_username($username) {
    global $connection;

    $safe_username = mysqli_real_escape_string($connection, $username);

    $query  = "SELECT * ";
    $query .= "FROM admins ";
    $query .= "WHERE username = '{$safe_username}' ";
    $query .= "LIMIT 1";
    $admin_set = mysqli_query($connection, $query);
    confirm_query($admin_set);
    if($admin = mysqli_fetch_assoc($admin_set)) {
        return $admin;
    } else {
        return null;
    }
}

function attempt_login($username, $password) {
    $admin = find_admin_by_username($username);
    if($admin) {
        // Found Admin, now check password
        if (password_check($password, $admin["hashed_password"])) {
            // password matches
            return $admin;
        } else {
            // password doea not match
            return false;
        }
    } else {
        return false;
    }
}

function logged_in() {
    return isset($_SESSION['admin_id']);
}

function confirm_logged_in() {
    if(!logged_in()) {
        redirect_to("login.php");
    }
}