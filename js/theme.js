jQuery(document).ready(function($) {

	$('body').removeClass('no-js').addClass('js');
	
	// --------------------------------------------------------
	// Quote rotator
	//
	
	if( $('body.home').length != 0 ){
		
		$quotes = $('#quotes li');
		
		// show first
		$quotes.hide().eq(0).show();
		
		$current_quote = $quotes.eq(0);
		
		setInterval( function(){
			
			$current_quote.fadeOut(300);
			$current_quote = $current_quote.next();
			if( $current_quote.length == 0 )
				$current_quote = $quotes.eq(0);
				
			$current_quote.fadeIn(300);
			
		}, 8000);	
		
	}
		
});