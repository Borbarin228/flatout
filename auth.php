<?php

session_start(["use_strict_mode" => true]);

if (isset($_GET['log'])) {
    require_once 'db.php';

    $query = $db->query("SELECT * FROM flatout.users WHERE login = '".$_POST['login']."'");

    if ($row = $query->fetch()) {
        if ($_POST['password'] == $row['password']) {
            $_SESSION['user_id'] = $row['usr_id'];
            $_SESSION['login'] = $row['login'];
            header("Location: profile.php");
            die();

        } else {
            $_SESSION['message'] = 'Введен неправильный пароль';
            header("Location: login.php");
            die();
        }
        
    } else {
        $_SESSION['message'] = 'Введен неправильный логин'; 
        header("Location: login.php");
        die();
    }

    
}

if (isset($_GET['reg'])) {
    require_once 'db.php';

    $query = $db->query("SELECT * FROM flatout.users WHERE login = '".$_POST['login']."'");
    if (isset($_FILES['file'])) {
        $fp = fopen($_FILES['file']['tmp_name'], 'rb');
        $bin_img = base64_encode(fread($fp, $_FILES['file']['size']));
        fclose($fp);
    } else {
        $bin_img = 'NULL';
    }

    if ($row = $query->fetch()) {
        $_SESSION['message'] = 'Такой пользователь уже существует';
        header("Location: register.php");
        die();
    } else {
        $user_id_query = $db->query("SELECT MAX(usr_id) FROM flatout.users");
        $user_id_row = $user_id_query->fetch();
        $user_id = $user_id_row['max'] + 1;
        $db->query("INSERT INTO flatout.users(usr_id, login, password, icon) VALUES (".$user_id.", '".$_POST['login']."', '".$_POST['password']."', '".$bin_img."')");
        $_SESSION['user_id'] = $user_id;
        $_SESSION['login'] = $_POST['login'];
        header("Location: profile.php");
        die();
    }

    
}

if (isset($_GET['out'])) {
    session_unset();
    header("Location: index.php");
    die();
}