<?php
$maxage = 31536000;

if( $_GET && $_GET[ 'c' ] && intval( $_GET[ 'c' ] ) > 0 ) {

} else {
  header( 'Location: '. $_SERVER[ 'PHP_SELF' ] .'?c='. $maxage );
}
?><!doctype html>
<html lang="de">
<head>
<title>bankdirect Login - Ihr Online Banking & Brokerage | bankdirect.dbh</title>
<meta name="description" content="Hier anmelden für Ihr Online Banking: Girokonto, Depot und Wertpapiere. &#9658; bankdirect login" />

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
<meta name="theme-color" content="#28373c"/>
<meta name="msapplication-TileImage" content="/mstile-144x144.png" />
<meta name="msapplication-TileColor" content="#FFFFFF" />
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
html,
body {
  height: 100%;
}
body {
  align-items: center;
  background-color: #f5f5f5;
}
.logo-text {
  color: #fff500 !important;
}
i.logo {
  font-size: 40px;
  padding-right: 10px;
}
header, nav, footer {
  display: block;
  width: 100%;
  background-color:#28373c;
  color: #f5f5f5;
  position: relative;
}
header {
  padding-top: 1rem !important;
}
header span {
  color: white;
}
nav:after, footer:before {
  content:"";
  background: linear-gradient(-90deg,#fff500,#f7f406 14%,#c6f127 48%,#7aeb5b 70%,#44cf6e);
  display: block;
  height: 0.25rem;
  width: 100%;
  position: absolute;
}
nav:after {
  bottom: 0;
}
footer:before {
  margin-top: -0.25rem;
}
input[type=search] {
  background:none;
  color: #939b9d;
  border-radius: 1.18rem;
  border: 1px solid #939b9d
}
.btn-login {
  background:none;
  border-radius: 1.18rem;
  border: 1px solid #fff500;
  color: #fff500 !important;
}
.btn-loginbig {
  background-color:#fff500;
  border-radius: 1.18rem;
  border: 1px solid #fff500;
}

.form-signin {
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input {
  border-radius: 1.18rem;
}

.form-signin input[type="text"],
.form-signin input[type="file"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.main {
  min-height: 600px;
}
</style>
</head>
<body class="text-center">
<main>
  <header>
    <div class="container d-flex flex-wrap justify-content-center">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-decoration-none logo-text">
        <i class="bi bi-piggy-bank logo"></i>
        <span class="fs-4 logo-text">bankdirect</span>
      </a>
      <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
        <input type="search" class="form-control" placeholder="WKN, ISIN, Name" aria-label="Search">
      </form>
      <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
        <input type="search" class="form-control" placeholder="Volltextsuche..." aria-label="Search">
      </form>
    </div>
  </header>
  <nav class="py-2 border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
<li class="nav-item"><a href="#" class="nav-link link-light px-2 active" aria-current="page">Persönlicher Bereich</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Informer</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Girokonto</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Geldanlage</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Depot</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Wertpapierhandel</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Kredite</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2">Hilfe & Service</a></li>
      </ul>
      <ul class="nav">
        <li class="nav-item"><a href="#" class="nav-link px-2 btn-login">Login</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 btn-login">Kunde werden</a></li>
      </ul>
    </div>
  </nav>

<div class="container d-flex flex-wrap justify-content-center main">
  <div class="row">
    <div class="col mt-3 mb-5">
      <h1 class="h3 mb-3 fw-normal"><i class="bi bi-piggy-bank logo"></i><br>bankdirect Sicherheitsnews</h1>
      <p class="text-dark">Bleiben Sie up-to-date und sch&uuml;tzen Sie sich gegen Cracker und Scammer.</p>
      <div class="list-group">
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
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Kontakt</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Über uns</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Presse</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Magazin</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Karriere</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Community</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Apps</a></li>
<li class="nav-item"><a href="#" class="nav-link link-light px-2" aria-current="page">Kunden werben Kunden</a></li>
</ul>
    </div>
    <div class="row">
      <ul class="nav small">
<li class="nav-item"><a href="#" class="nav-link link-secondary px-2" aria-current="page">Impressum</a></li>
<li class="nav-item"><a href="#" class="nav-link link-secondary px-2" aria-current="page">Datenschutz</a></li>
<li class="nav-item"><a href="#" class="nav-link link-secondary px-2" aria-current="page">Einwilligungseinstellungen</a></li>
<li class="nav-item"><a href="#" class="nav-link link-secondary px-2" aria-current="page">Sicherheit</a></li>
<li class="nav-item"><a href="#" class="nav-link link-secondary px-2" aria-current="page">Nutzungsbedingungen</a></li>
<li class="nav-item"><a href="#" class="nav-link link-secondary px-2" aria-current="page">AGB</a></li>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script type="text/javascript" src="app.js?c=<?php echo intval( $_GET[ 'c' ] ); ?>"></script>
</body>
</html>
