<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;700&family=Rubik+Iso&display=swap" rel="stylesheet">
</head>
<body>

    <?php include_once 'header.php' ?>
        <main class="main">
            <div class="container">
                <div class="reg-form">
                    <h2>
                        ВХОД
                    </h2>
                    <form action="auth.php?log=1" method="POST" class="register">
                        <input class="login-input" type="text" name="login" id="login" placeholder="Логин" require>
                        <input class="login-input" type="password" name="password" id="password" placeholder="Пароль" require>
                        <?php if (isset($_SESSION['message'])) {
                                echo ($_SESSION['message']);
                                unset($_SESSION['message']);
                            }?>
                        <button class="reg-button">Вход</button>
                        
                    </form>
                </div>
            </div>
        </main>
    <?php require "footer.php"?>
</body>
</html>