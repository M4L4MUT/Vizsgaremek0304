<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $myusername = $_POST['myusername'];
    $mypassword = $_POST['mypassword'];

    // Itt hívd meg a login függvényt
    $db->login($myusername, $mypassword);
}
?>

<div id="login">
    <div id="bg"></div>

    <form method="post" action="index.php?menu=fooldal">
        <div class="form-field">
            <input type="text" name="myusername" placeholder="Felhasználónév" required/>
        </div>

        <div class="form-field">
            <input type="password" name="mypassword" placeholder="Jelszó" required/>
        </div>
        <a href="index.php?menu=register"><p>Még nem regisztráltál?</p></a>
        <div class="form-field">
            <button class="btn" type="submit" name="login" value="1">Bejelentkezés</button>
        </div>
        
    </form>
</div>
