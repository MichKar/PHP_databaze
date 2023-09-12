<form method="POST">
        <input type="text" name="first_name" placeholder="Jméno" value='<?= htmlspecialchars($first_name) ?>' required>
        <br>
        <input type="text" name="second_name" placeholder="Příjmení" value='<?= htmlspecialchars($second_name) ?>' required>
        <br>
        <input type="number" name="age" min="10" placeholder="Věk" value='<?= htmlspecialchars($age) ?>' required>
        <br>
        <textarea name="life" placeholder="Podrobnější informace"><?= htmlspecialchars($life) ?> </textarea>
        <br>
        <input type="text" name="college" placeholder="Kolej" value='<?= htmlspecialchars($college) ?>'>
        <br>
        <input type="submit" value="Uložit" name="submit">
        <br>
</form>