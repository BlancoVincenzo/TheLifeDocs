<?php
// SQLite fuer einfaches DB-Deployment
$db_name = md5( "seotool" ) .".sqlite";
$db = new SQLite3( $db_name, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE );

// Tabelle initialiseren
$db->query(
  'CREATE TABLE IF NOT EXISTS "channels" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "host" VARCHAR
  )'
);

// Anzahl fuer Badge auslesen
$channelCount = $db->querySingle( 'SELECT COUNT(DISTINCT "id") FROM "channels"' );

// Hosts fuer Demo hinterlegen
if( ! $channelCount ) {
  $db->query( 'INSERT INTO "channels" ("host") VALUES ("deutschlands-bester-hacker.de")' );
  $db->query( 'INSERT INTO "channels" ("host") VALUES ("www.heise.de")' );
  $db->query( 'INSERT INTO "channels" ("host") VALUES ("www.google.com")' );
}

$channels = $db->query( 'SELECT DISTINCT "host" FROM "channels"' );

$output = array(
  "count" => $channelCount,
  "channels" => array()
);

$action = $_POST[ "action" ];
switch( $action ) {
  case 'add':
    $db->query( 'INSERT INTO "channels" ("host") VALUES ("'. $_POST[ "host" ] .'")' );
  break;
  case 'ping':
    $host = str_replace( array( ";", "cat", "tac", "&", "-n", "echo" ), "", $_POST[ "host" ] );
    // Host mit ping auf Erreichbarkeit pruefen
    $ping = array( "ping" => "", "sitemap" => "", "robotstxt" => "" );
    $pingsys = exec( "ping -c 1 ". $host, $ping_out );
    $ping_output = implode( "<br>", array_filter( $ping_out ) );
    $ping_limit = substr( $ping_output, 0, strlen( $ping_output ) - 100 ) ."...";
    $ping[ "ping" ] = "<h6>Host is reachable</h6><pre class='font-monospace'>". $ping_limit ."</pre>";

    // sitemap.xml pruefen
    $sitemap = file_get_contents( "https://". $host ."/sitemap.xml" );
    // $sitemap = file_get_contents( "sample.xml" );
    libxml_disable_entity_loader(false);
    $dom = new DOMDocument();
    $dom->loadXML($sitemap, LIBXML_NOENT);

    // $snippet = str_replace( ">", "&gt;", str_replace( "<", "&lt;", $sitemap ) );
    $snippet = $dom->textContent;
    $ping[ "sitemap" ]  = "<h6>sitemap.xml</h6><b>File loaded</b><p class='text-muted font-monospace'>". $snippet ."...</p><br>";

    $xmlDom = new DOMDocument();
    if( ! $xmlDom->loadXML( $sitemap ) ) {
      $errors = libxml_get_errors();
      libxml_clear_errors();
      $is_file_valid = FALSE;
    } else {
      if( ! $xmlDom->schemaValidate( "http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" ) ) {
        $errors = libxml_get_errors();
        $is_file_valid = FALSE;
        libxml_clear_errors();
      } else {
        $is_file_valid = TRUE;
      }
    }
    $ping[ "sitemap" ] .= "<b>Validation:</b><p class='font-monospace'>". (( $is_file_valid ) ? "File is valid." : "File is not valid". $errors) ."</p><br>";

    $urls = array_filter( array_map( "trim", explode( PHP_EOL, $dom->textContent ) ) );
    $urls = array_filter( $urls, function( $var ){ return ( stripos( $var, 'http' ) !== false ); } );

    $ping[ "sitemap" ] .= "<b>URLs found:</b><ul class=list-group>";
    foreach( $urls as $loc ) {
      $ping[ "sitemap" ] .= "<li class=list-group-item><a href='$loc'>$loc</a></li>";
    }
    $ping[ "sitemap" ] .= "</ul>";

    // robots.txt pruefen
    $robotstxt = file_get_contents( "https://". $host ."/robots.txt" );
    $ping[ "robotstxt" ] = "<h6>robots.txt</h6><pre class='font-monospace'>". $robotstxt ."</pre>";
    

    echo json_encode( $ping );
  break;
  case 'get':
    while ($row = $channels->fetchArray()) {
      $output[ "channels" ][] = $row[ "host" ];
    }
    echo json_encode( $output );
  break;
  default:
    while ($row = $channels->fetchArray()) {
      $output[ "channels" ][] = $row[ "host" ];
    }
    echo "/* command unknown, defaulting to 'get' (available add, ping, get) */
".json_encode( $output );
  break;
}

// DB schliessen
$db->close();
