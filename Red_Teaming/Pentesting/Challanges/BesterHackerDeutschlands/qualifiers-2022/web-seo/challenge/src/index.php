<!doctype html>
<html lang="de" class="h-100">
<head>
<title>Das DBH-SEO-Tool: sitemap-Checkcer</title>
<meta name="description" content="Schlechte Rankings waren besser. Optimieren Sie Ihre Onpage-Performance mit dem DBH-SEO-Tool." />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="robots" content="index,follow" />
<meta name="author" content="SEO-Tool//DBH]">
<meta name="generator" content="DBH/2.0.22">
<meta name="theme-color" content="#ff0000"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
<style>
html,
body {
  overflow-x: hidden;
}

body {
  padding-top: 56px;
}

@media (max-width: 991.98px) {
  .offcanvas-collapse {
    position: fixed;
    top: 56px; /* Height of navbar */
    bottom: 0;
    left: 100%;
    width: 100%;
    padding-right: 1rem;
    padding-left: 1rem;
    overflow-y: auto;
    visibility: hidden;
    background-color: #343a40;
    transition: transform .3s ease-in-out, visibility .3s ease-in-out;
  }
  .offcanvas-collapse.open {
    visibility: visible;
    transform: translateX(-100%);
  }
}

.nav-scroller .nav {
  color: rgba(255, 255, 255, .75);
}

.nav-scroller .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
  color: #6c757d;
}

.nav-scroller .nav-link:hover {
  color: #007bff;
}

.nav-scroller .active {
  font-weight: 500;
  color: #343a40;
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: flex;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}
</style>
</head>
<body class="bg-light">


<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="bi bi-ui-checks"></i> DBH-SEO-Tool</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Switch account</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="nav-scroller bg-body shadow-sm">
  <nav class="nav" aria-label="Secondary navigation">
    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
    <a class="nav-link" href="#">
      Sitemaps
      <span id="channelCount" class="badge text-bg-light rounded-pill align-text-bottom"></span>
    </a>
    <a class="nav-link" href="#">robots.txt</a>
    <a class="nav-link" href="#">Explore</a>
    <a class="nav-link" href="#">Suggestions</a>
  </nav>
</div>


<main class="container">
  <div class="d-flex align-items-center my-3 text-white bg-primary rounded shadow-sm">
    <span style="font-size:38px" class="p-3"><i class="bi bi-ui-checks"></i></span>
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">DBH-SEO-Crawler</h1>
      <small>since 2020</small>
    </div>
  </div>

  <div id="alert" class="alert invisible" role="alert"></div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Select Channel</h6>
    <div class="d-flex text-muted pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <select id="channels" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected>Select Channel</option>
          </select>
        </div>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-lg btn-outline-primary" onclick="checkChannel()">Select Channel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 id="checkHeadline" class="border-bottom pb-2 mb-0"></h6>
    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="dbhseo" role="tablist">
      <li class="nav-item" role="presentation">
        <a
          class="nav-link active"
          id="dbhseo-tab-1"
          data-bs-toggle="tab"
          href="#dbhseo-tabs-1"
          role="tab"
          aria-controls="dbhseo-tabs-1"
          aria-selected="true"
          >Status</a
        >
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link"
          id="dbhseo-tab-2"
          data-bs-toggle="tab"
          href="#dbhseo-tabs-2"
          role="tab"
          aria-controls="dbhseo-tabs-2"
          aria-selected="false"
          >sitemap.xml</a
        >
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link"
          id="dbhseo-tab-3"
          data-bs-toggle="tab"
          href="#dbhseo-tabs-3"
          role="tab"
          aria-controls="dbhseo-tabs-3"
          aria-selected="false"
          >robots.txt</a
        >
      </li>
    </ul>
    <!-- /Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="dbhseo-content">
      <div
        class="tab-pane fade show active"
        id="dbhseo-tabs-1"
        role="tabpanel"
        aria-labelledby="dbhseo-tab-1"
      >
      </div>
      <div class="tab-pane fade" id="dbhseo-tabs-2" role="tabpanel" aria-labelledby="dbhseo-tab-2">
      </div>
      <div class="tab-pane fade" id="dbhseo-tabs-3" role="tabpanel" aria-labelledby="dbhseo-tab-3">
      </div>
    </div>
    <!-- /Tabs content -->

  </div>

<!-- we're not allowing any new hosts at this time
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Add new Channel</h6>
    <div class="d-flex text-muted pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <div class="input-group input-group-lg mb-3">
            <span class="input-group-text">https://</span>
            <input type="text" id="sitemap-host" class="form-control" aria-describedby="www.localhost.dbh">
            <span class="input-group-text">/sitemap.xml</span>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-lg btn-outline-primary" onclick="addChannel()">Add Channel</button>
        </div>
      </div>
    </div>
  </div>
-->
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="app.js"></script>
</body>
</html>
