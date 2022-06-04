(function( $ ) {
	$(function() {
		var url = MyAutocomplete.url + "?action=my_search";
    //console.log(url);
		$( "#s" ).autocomplete({
			source: url,
			delay: 500,
			minLength: 3
		}).data("ui-autocomplete")._renderItem = function( ul, item ) {
    return $( "<li class='ui-autocomplete-row'></li>" )
        .data( "item.autocomplete", item )
        .append(item.url)
        //.append( "<a href"+ item.link +">" + item.label+"</a>" )
        .appendTo( ul );
    };

	});

})( jQuery );
