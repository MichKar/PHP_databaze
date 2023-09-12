<?php

/**
 * 
 * Přidání uživatele do databáze
 * 
 * @param object $connection - připojení do databáze
 * @param string $first_name - křesní jméno uživatele
 * @param string $second_name - příjmení uživatele
 * @param string $email - email uživatele
 * @param string $password - heslo uživatele
 * 
 * @return integer $id - id uživatele
 * 
 */

function createUser($connection, $first_name, $second_name, $email, $password) {
    $sql = "INSERT INTO user (first_name, second_name, email, password)
    VALUES (?, ?, ?, ?)";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ssss", $first_name, $second_name, $email, $password);
        mysqli_stmt_execute($statement);
        $id = mysqli_insert_id($connection);
        return $id;
    }
}

/**
 * Ověření uživatele pomocí emailu a hesla
 * 
 * @param object $connection - připojení do databáze
 * @param string $log_email - email z formuláře pro přihlášení
 * @param string $log_password - heslo z formluáře pro přihlášení
 * 
 * @return boolean true - pokud je přihlášení úspěšné, false - pokud je neúspěšné
 * 
 */

function authentication($connection, $log_email, $log_password) {
    $sql = "SELECT password
            FROM user
            WHERE email = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $log_email);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $password_database = mysqli_fetch_row($result); // zde je v proměnné pole
            $user_password_database = $password_database[0]; // zde se vytáhne 0.prvek z pole (string, hash)

            if ($user_password_database) {
                return password_verify($log_password, $user_password_database);
            }
        }
    } else {
        echo mysqli_error($connection);
    }
}