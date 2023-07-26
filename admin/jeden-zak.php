<?php


// PŘIPOJENÍ DO DATABÁZE

require "../assets/database.php";
require "../assets/zak.php";

$connection = connectionDB();


// NAČTENÍ DAT Z DATABÁZE

if (isset($_GET["id"]) and is_numeric($_GET["id"])) {
    $students = getStudent($connection, $_GET["id"]);

}
?>






<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Document</title>
</head>
<body>

<?php require "../assets/admin-header.php"; ?>

    <main>
        <section class="main-heading">
            <h1>Informace o žákovi</h1>
        </section>

        <section>
            <?php if ($students === null): ?>
                <p>Žák nenalezen</p>
            <?php else:  ?>
                <h2><?= htmlspecialchars($students["first_name"]) . " " . htmlspecialchars($students["second_name"]);  ?> </h2>
                <p>Věk: <?= htmlspecialchars($students["age"]); ?> </p>
                <p>Dodatečné informace: <?= htmlspecialchars($students["life"]); ?> </p>
                <p>Kolej: <?= htmlspecialchars($students["college"]); ?> </p>
            <?php endif ?>
        </section>

        <section class="buttons">
            <a href="editace-zaka.php?id=<?= $students['id'];?>">Editovat</a>
            <a href="delete-zak.php?id=<?= $students['id'];?>">Smazat</a>
        </section>


    </main>

    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>