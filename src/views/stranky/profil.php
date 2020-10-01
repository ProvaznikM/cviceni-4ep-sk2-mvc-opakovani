<?php
    global $zakladni_url;

    if(!isset($_SESSION["prihlaseny_uzivatel"]))
    {
        header("location:".$zakladni_url."index.php/stranky/chyba/");
        die();
    }
?>

<p>Jste přihlášeni jako <b><?php echo $_SESSION["prihlaseny_uzivatel"] ?></b>.</p>
<a href="<?php echo $zakladni_url; ?>index.php/prispevek/vytvorit/">Přidat příspěvek</a>

<form action="<?php echo $zakladni_url; ?>index.php/uzivatele/odhlasit/">
    <input type="submit" value="Odhlásit" />
</form>
