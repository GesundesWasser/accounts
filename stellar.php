<?php 
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapselordnung</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="img/x-icon">
    <link rel="stylesheet" type="text/css" href="stellar.css">
<script src="cookie.js"></script>
</head>
<body>

<header>
    <a href="site">
    <img src="img/wwagoinc.png" alt="WWAGO Inc.">
    </a>
    </header>

<main>

    <!-- Show the Cookie Popup -->
    <div id="cookieConsent" style="display: none; background-color: rgba(0, 0, 0, 0.8); color: #fff; position: fixed; bottom: 0; left: 0; width: 100%; padding: 20px; text-align: center; z-index: 9999;">
        This website uses cookies to ensure you get the best experience on our website.
        <button style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; margin-left: 20px;" onclick="acceptCookies()">Accept</button>
    </div>

        <section id="section1">
            <h2>Oh Nein, Der Tower Brennt!</h2>
            <p>WENN DER DIE SIRENE HÖRT, FÜHLT ER SICH SEHR GESTÖRT!</p>
            <button onclick="window.location.href='video/tower-fire.html'">Anzeigen</button>
        </section>

        <section id="section2">
            <h2>Mystery Video</h2>
            <p>ITS A MYSTERY!</p>
            <button onclick="window.location.href='video/rickroll.html'">Anzeigen</button>
        </section>

        <section id="section3">
            <h2>DEBUG-SECTION</h2>
            <p>USERNAME: <?php echo $_SESSION['name']; ?></p>
            <button disabled>Coming Soon...</button>
        </section>

        <section id="section4">
            <h2>PLACEHOLDER</h2>
            <p>TEXT</p>
            <button disabled>Coming Soon...</button>
        </section>

</main>

<footer>
<p>&copy; WWAGO Studios</p>    
<p>&copy; Jakobsoft Inc.</p>
</footer>

<?php 
} else {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}
?>