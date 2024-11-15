<?php
http_response_code( 200 );
$url = $_SERVER[ 'REQUEST_URI' ];
$page = explode( '/', $url );

$pages = array(
           'kontakt' => array( 'kontakt', 'kontakt.html' ),
           'ueber' => array( '&Uuml;ber uns', 'ueber.html' ),
           'presse' => array( 'Presse', 'presse.html' ),
           'magazin' => array( 'Magazin', 'magazin.html' ),
           'karriere' => array( 'Karriere', 'karriere.html' ),
           'kundenwerben' => array( 'Kunden werben Kunden', 'kundenwerben.html' ),
           'impressum' => array( 'Impressum', 'impressum.html' ),
           'datenschutz' => array( 'Datenschutz', 'datenschutz.html' ),
           'einwilligungseinstellungen' => array( 'Einwilligungseinstellungen', 'einwilligungseinstellungen.html' ),
           'sicherheit' => array( 'Sicherheit', 'sicherheit.html' ),
           'agb' => array( 'Allgemeine Gesch&auml;ftsbedigungen', 'agb.html' ),
           'produkte' => array( 'Produkte', 'produkte.html' ),
           'bon' => array( 'B@ON', 'bon.html' ),
           'ihre' => array( 'Ihre Bankdirect', 'ihre.html' ),
           'service' => array( 'Service-Center', 'service.html' ),
           'firmenkunden' => array( 'Firmenkunden', 'firmenkunden.html' ),
           '404' => array( 'Private Banking', '404.html' ),
         );

if( substr( $page[ 1 ], 0, 7 ) == 'static?' ) {
  $filepath = explode( '?', $page[ 1 ] );
  $file = ( file_exists( urldecode( $filepath[ 1 ] ) ) ) ? urldecode( $filepath[ 1 ] ) : false;
}
$content = ( $pages[ $page[ 1 ] ] ) ? $pages[ $page[ 1 ] ] :  $pages[ '404' ];
$subtitle = 'Persönliche Beratung für jedes Anliegen';

if( $file ) {
  header( 'Content-Description: File Transfer' );
  header( 'Content-Type: application/octet-stream' );
  header( 'Content-Disposition: attachment; filename="'. basename( $file ) .'"' );
  header( 'Expires: 0' );
  header( 'Cache-Control: must-revalidate' );
  header( 'Pragma: public' );
  header( 'Content-Length: '. filesize( $file ) );
  readfile( $file );
  exit;
}

?><!doctype html>
<html lang="de" class="h-100">
<head>
<title><?php echo $content[ 0 ].' @ '; ?>Internet-Filiale - bankdirectdbh</title>
<meta name="description" content="Ihr Finanzpartner im Internet. Mit sicherem Online-Banking, vielen Angeboten und Services für Privat- und Firmenkunden." />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="robots" content="index,follow" />
<meta name="author" content="bankdirect AG//DBH]">
<meta name="application-name" content="bankdirect.dbh"/>
<meta name="cacheVersionQueryParam" content="v=1657275786552" />
<meta name="domainSuffix" content=".bankdirect.de" />
<meta name="generator" content="DBH/2.0.22">
<meta name="bankdirectCifServiceWorker" content="true" />
<meta name="theme-color" content="#ff0000"/>
<meta name="bankdirectCifCallback" content="off" />
<meta name="bankdirectCifChat" content="off" />
<meta name="bankdirectCifVolltextsuche" content="on" />
<meta name="bankdirectCifTelefon" content="on" />
<meta name="bankdirectCifKontaktformular" content="on" />
<meta name="bankdirectCifCobrowsing" content="on" />
<meta name="bankdirectCifVChat" content="off" />
<meta name="bankdirectCifOnlineLegitimation" content="on" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
<style>
body {
  background-image: url("https://unsplash.com/photos/VLg5MhJLTds/download?ixid=MnwxMjA3fDB8MXxhbGx8fHx8fHx8fHwxNjU4MjMyMTY3&force=true&w=1920");
  background-position: contain;
}
.logo-text {
  color: white !important;
}
.text-red {
  color: #ff0000 !important;
}
i.logo {
  font-size: 40px;
  padding-right: 10px;
}
header, footer {
  display: block;
  width: 100%;
  background-color: red;
  color: white;
  position: relative;
}
header {
  padding-top: 1rem !important;
  padding-bottom: 1rem !important;
}
header input {
  border-color: red;
  background-color: white;
  vertical-align: top;
  float: left;
  margin-right: 2px;
  border-radius: 6px;
  height: 40px;
}
.input-group {
  max-width: 350px;
}

.btn-nav {
  text-align: center;
  vertical-align: middle;
  padding: 5px;
  background-color: rgba(68,68,68,0.9);
  width: 183px;
  height: 40px;
  color: white;
  font-weight: bold;
  border-left: 1px solid white;
}
.btnactive {
  background-color: red !important;
  border: none !important;
}

.main {
  min-height: 600px;
}
</style>
</head>
<body class="h-100 text-center text-white bg-light">
<main>
  <header>
    <div class="container d-flex flex-wrap justify-content-end align-items-center">
      <div class="col">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-decoration-none logo-text">
          <i class="bi bi-piggy-bank logo"></i>
          <span class="fs-4 logo-text">bankdirect</span>
        </a>
      </div>
      <div class="col">
        <form role="search">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">PIN/TAN</span>
            <input type="text" name="Kunde" class="form-control" placeholder="Anmeldename" aria-label="Anmeldename" aria-describedby="basic-addon1">
            <input type="password" name="PIN" class="form-control" placeholder="PIN" aria-label="PIN" aria-describedby="basic-addon1">
          </div>
        </form>
      </div>
      <div class="col">
        <form role="search">
          <div class="input-group">
            <button class="btn btn-light" type="button" id="button-addon1"><i class="bi bi-search"></i></button>
            <input type="search" class="form-control" placeholder="Wonach möchten Sie suchen?" aria-label="Wonach möchten Sie suchen?" aria-describedby="button-addon1">
          </div>
        </form>
      </div>
    </div>
  </header>
  <nav class="py-2">
    <div class="container d-flex flex-wrap justify-content-center">
      <div class="btn-group" role="group" aria-label="Top-Navigation">
        <a role="button" href="/" class="btn btn-nav btnactive"><i class="bi bi-house-door-fill"></i></a>
        <a role="button" href="/produkte" class="btn btn-nav">Produkte</a>
        <a role="button" href="/bon" class="btn btn-nav">B@ON</a>
        <a role="button" href="/ihre" class="btn btn-nav">Ihre bankdirect</a>
        <a role="button" href="/service" class="btn btn-nav">Service-Center</a>
        <a role="button" href="/firmenkunden" class="btn btn-nav">Firmenkunden</a>
      </div>
    </div>
  </nav>

<div class="container d-flex flex-wrap justify-content-center main">
  <div class="row align-items-center w-100">

<div class="card text-start ms-auto py-5 w-100">
  <div class="card-body">
    <h2 class="card-title text-red"><?php echo $content[ 0 ]; ?></h2>
    <h5 class="card-subtitle mb-2 text-dark"><?php echo $subtitle; ?></h5>
    <div class="card-text text-dark"><?php readfile( $content[ 1 ] ); ?></div>
  </div>
</div>

  </div>
</div>


  <footer>
  <div class="container d-flex flex-wrap">
    <div class="row mt-3">
    <div class="col-3">
      <a href="#" class="d-flex align-items-center mb-3 text-decoration-none logo-text">
        <i class="bi bi-piggy-bank logo"></i>
        <span class="fs-4">bankdirect</span>
      </a>
    </div>

    <div class="col-9">
    <div class="row">
      <ul class="nav">
        <li class="nav-item"><a href="/kontakt" class="nav-link link-light px-2" aria-current="page">Kontakt</a></li>
        <li class="nav-item"><a href="/ueber" class="nav-link link-light px-2" aria-current="page">Über uns</a></li>
        <li class="nav-item"><a href="/presse" class="nav-link link-light px-2" aria-current="page">Presse</a></li>
        <li class="nav-item"><a href="/magazin" class="nav-link link-light px-2" aria-current="page">Magazin</a></li>
        <li class="nav-item"><a href="/karriere" class="nav-link link-light px-2" aria-current="page">Karriere</a></li>
        <li class="nav-item"><a href="/kundenwerben" class="nav-link link-light px-2" aria-current="page">Kunden werben Kunden</a></li>
      </ul>
    </div>
    <div class="row">
      <ul class="nav small">
        <li class="nav-item"><a href="/impressum" class="nav-link link-secondary px-2" aria-current="page">Impressum</a></li>
        <li class="nav-item"><a href="/datenschutz" class="nav-link link-secondary px-2" aria-current="page">Datenschutz</a></li>
        <li class="nav-item"><a href="/einwilligungseinstellungen" class="nav-link link-secondary px-2" aria-current="page">Einwilligungseinstellungen</a></li>
        <li class="nav-item"><a href="/sicherheit" class="nav-link link-secondary px-2" aria-current="page">Sicherheit</a></li>
        <li class="nav-item"><a href="/agb" class="nav-link link-secondary px-2" aria-current="page">AGB</a></li>
      </ul>
    </div>
    </div>
  <div class="row text-align-center small mb-3">
      <p class="text-secondary">&copy; bankdirect - eine Marke von Deutschlands Bester Hacker</p>
  </div>
</div>
  </footer>
</main>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
