<?php
$mockFiles = array(
    "/" => ["content" => "welcome.php"],
    "/robots.txt" => ["content" => "robots.txt.php"],
    "/s3cur3Fl4g.html" => ["content" => "s3cur3Fl4g.php"]
);

if (!isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    include '../resc/error.php';
}
else{
    if (ip2long($_SERVER["REMOTE_ADDR"]) >= 2886729729 && ip2long($_SERVER["REMOTE_ADDR"]) <= 2886729982) {
        if (isset($mockFiles[$_SERVER['REQUEST_URI']])) {
            include '../resc/' . $mockFiles[$_SERVER['REQUEST_URI']]['content'];
        } else {
            include '../resc/404.php';
        }
    } else {
        include '../resc/wrongCidr.php';
    }
}
?>