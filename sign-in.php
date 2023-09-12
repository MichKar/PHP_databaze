<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Document</title>
</head>

<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section class="form">
            <form action="admin/login.php" method="POST">
                <input type="email" name="login-email"><br>
                <input type="password" name="login-password"><br>
                <input type="submit" value="Přihlásit"><br>
            </form>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>

    <script src="./js/header.js"></script>
</body>

</html>