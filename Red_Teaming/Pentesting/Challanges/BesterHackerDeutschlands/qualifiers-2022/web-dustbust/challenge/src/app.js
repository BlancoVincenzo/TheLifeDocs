<?php

header( 'Content-Type: application/javascript' );

if( sizeof( $_GET ) > 1 ) {
  header("Cache-Contr: Who do you call?");
  header("Cache-Control: DBH{CacheBusters2022}");
} else {
  header("Cache-Control: public, max-age=31536000");
  header("Cached: 1");
}

if( !file_exists( 'cert.xml' ) ) {
  $bsi = file_get_contents( 'https://wid.cert-bund.de/content/public/securityAdvisory/rss' );
  $xml = simplexml_load_string( $bsi );
  file_put_contents( 'cert.xml', $bsi );
}
$bsi = file_get_contents( 'cert.xml' );
$xml = simplexml_load_string( $bsi );

?>
$(function(){
  $( 'div.list-group' ).append('<?php
foreach( $xml->channel->item as $item ) {
  $dateTime = \DateTime::createFromFormat( 'D, d M Y H:i:s O', $item->pubDate );
  $dateTime->setTimezone( new \DateTimeZone( 'UTC' ) );
  $diff = $dateTime->diff( new \DateTime( 'now', new \DateTimeZone( 'UTC' ) ) );
  echo '<a href="'.$item->link.'" class="list-group-item list-group-item-action" aria-current="true" target="_blank"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1">'. htmlentities( $item->title ).'</h5><small>vor '. $diff->d .' Tagen</small></div><p class="mb-1">'. str_replace( "\n", '<br />', htmlentities( $item->description ) ) .'</p><small>Ein Sicherheitshinweis des Buerger-CERT.</small></a>';
}
?>');
});
