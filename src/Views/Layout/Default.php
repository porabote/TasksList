<!DOCTYPE html>
<html lang="ru">
<head>
    <title>BeeJee</title>
    <meta charset="utf-8" />

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">


    <!-- CSS.. -->
    <link rel="stylesheet" href="/css/bootstrap-4.5.0-dist/css/bootstrap.css"/> <!-- ..Core -->

</head>


<body>

<header>
    <!-- Шапка -->
    <div class="header-panel">
        <?php
            if(!isset($_SESSION['username'])) echo '<a href="/users/login/">Войти</a>';
            else echo '<a href="/users/logout/">Выйти</a>';
        ?>
    </div>
    <!-- ...Шапка -->
</header>

<!-- Основная часть -->
<main>

    <?php
        $this->fetch('content');
    ?>

</main>
<!-- ...Основная часть -->


<!-- Футер -->
<footer>
    <div style="padding-top: 300px;" class="copyright">BeeJee Tasks <?=date('Y')?></div>
</footer>
<!-- ...Футер -->




</body>
</html>