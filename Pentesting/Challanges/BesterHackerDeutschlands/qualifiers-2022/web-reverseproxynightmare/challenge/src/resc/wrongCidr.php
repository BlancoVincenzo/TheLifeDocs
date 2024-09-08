<?php
header('Content-Type: text/html');
http_response_code(403);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="hero-unit">
        <h1>Fehler</h1>
        <p>Der angegebene IP Adressbereich (CIDR) ist ungültig.</p>
        <p>
            Zugriff verweigert.
        </p>
    </div>
</div>
</body>
</html>

