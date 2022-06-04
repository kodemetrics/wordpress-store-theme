( function( $ ) {
  
  //Update site link color in real time...
  wp.customize( 'layout', function( value ) {
    value.bind( function( newval ) {
      $('a').css('color', #FFF );
    } );
  } );
  
})(jQuery); 
