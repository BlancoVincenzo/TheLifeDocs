(() => {
  'use strict'

  document.querySelector('#navbarSideCollapse').addEventListener('click', () => {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
  })
})()

$(function(){
  loadChannels();
});

var myAlert = function( type, msg ) {
  $( "div#alert" )
    .addClass( "alert-"+ type )
    .removeClass( "invisible " )
    .html( msg );
};

var loadChannels = function() {
  $.post( "handler.php", { action: "get" }, function() {
  })
  .done(function(data) {
    var data = JSON.parse( data );
    data.channels.forEach(function(channel){
      $( "select#channels ").append( "<option value='"+ channel +"'>"+ channel +"</option>" );
    });
    $( "span#channelCount" ).text( data.count );
  })
  .fail(function(data) {
    myAlert( "danger", "Fail: "+ data );
  });
};

var checkChannel = function() {
  let host = $( "select#channels" ).val();
  $( "h6#checkHeadline" ).text( "Analzye SEO Status for "+host );
  $.post( "handler.php", { action: "ping", host: host }, function() {
  })
  .done(function(data) {
    try {
      var data = JSON.parse( data );
      $( "div#dbhseo-tabs-1" ).html( data.ping );
      $( "div#dbhseo-tabs-2" ).html( data.sitemap );
      $( "div#dbhseo-tabs-3" ).html( data.robotstxt );
    } catch(e) {
      $( "div#dbhseo-tabs-1" ).html( "Error parsing data: "+ e +"<br>"+ data );
    }
  })
  .fail(function(data) {
    myAlert( "danger", "Fail: "+ data );
  });
};

var addChannel = function() {
  let host = $( "input#sitemap-host" ).val();
  $.post( "handler.php", { action: "add", host: host }, function() {
  })
  .done(function(data) {
    myAlert( "success", "Success: "+ data );
  })
  .fail(function() {
    myAlert( "danger", "Fail: "+ data );
  });
};
