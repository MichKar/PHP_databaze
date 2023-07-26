<?php

    // PŘIPOJENÍ DO DATABÁZE
    require "../assets/database.php";
    require "../assets/zak.php";

    $connection = connectionDB();

    // NAČTENÍ DAT Z DATABÁZE
    if(isset($_GET["id"])) {
        $one_student = getStudent($connection, $_GET["id"]);

            if($one_student) {
                $first_name = $one_student["first_name"];
                $second_name = $one_student["second_name"];
                $age = $one_student["age"];
                $life = $one_student["life"];
                $college = $one_student["college"];
                $id = $one_student["id"];
            } else {
                die ("Student nebyl nalezen.");
            }

    } else {
        die ("ID není zadáno, student nebyl nalezen.");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $life = $_POST["life"];
        $college = $_POST["college"];

        updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id);
    }


?>


<!DOCTYPE html>
<html lang="en">
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

    <h1>Editace žáka</h1>

    <?php require "../assets/formular-zak.php"; ?>

    <?php require "../assets/footer.php"; ?>


    <script src="../js/header.js"></script>
</body>
</html>