<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&family=Rubik+Iso&display=swap" rel="stylesheet">
</head>
<body>
<?php require "header.php"?>
<?php
require_once 'db.php';
$user_query =  $db->query("SELECT * FROM flatout.users WHERE login = '".$_SESSION['login']."'");
$user_row = $user_query->fetch();

if ($user_row['icon'] != 'NULL') {
  $pfp = 'data:image/png;base64,'.$user_row['icon'];
} else {
  $pfp = "https://avatars.dzeninfra.ru/get-zen_doc/1040957/pub_5d835048027a1500ad1416ea_5d8354d9f73d9d00ae609af6/scale_1200";
}?>
<main class="main">
    <div class="table">
        <div class="pict">
            <div class="info">
                <img class="pfp" src="<?php echo $pfp; ?>" alt="Profile Picture">
                <div class="view">
                    <p>Имя профиля: <?php echo($user_row['login'])?></p>
                    <button onclick="window.location.replace('auth.php?out=1')">Выйти</button>
                </div>
            </div>
        </div>
    
    </div>
</main>

<?php require "footer.php"?>

</body>
</html>