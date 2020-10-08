<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MVC</title>
</head>
<body>
    <header>
        <h1>PHP MVC</h1>
        <a href="<?php echo $zakladni_url; ?>index.php/stranky/domu/">Domů</a>
        <?php
            if(isset($_SESSION["prihlaseny_uzivatel"]))
            {
        ?>
        <a href="<?php echo $zakladni_url; ?>index.php/stranky/profil/">Profil</a>
        <a href="<?php echo $zakladni_url; ?>index.php/prispevky/vytvorit/">Přidat příspěvek</a>
        <?php
            }
            else
            {
        ?>
        <a href="<?php echo $zakladni_url; ?>index.php/uzivatele/registrovat/">Registrace</a>
        <a href="<?php echo $zakladni_url; ?>index.php/uzivatele/prihlasit/">Přihlášení</a>
        <?php
            }
        ?>
    </header>
    <main>
        <?php require_once "router.php"; ?>
    </main>
    <footer>
        &copy; Jakub Šenkýř, 2020
    </footer>
</body>
</html>