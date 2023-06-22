<?php session_start(["use_strict_mode" => true]);
if (isset($_SESSION['login'])) {
    $link = 'profile.php';  
    $text = 'Профиль';
  } else {
    $link = 'login.php';
    $text = 'Вход';
  }?>
<header class="head">

    <div class="panel">

        <div class="righth">
            <img src="logo.png" alt="" class = "logo">
            <h1>Flatout</h1>
        </div>

        <div class="lefth">
            <a href="index.php">На главную страницу</a>
            <a href="">Мои объявления</a>
            <a href="<?php echo $link ?>"><?php echo $text ?></a>
        </div>

    </div>

</header>