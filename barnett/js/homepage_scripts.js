// These are the scripts that make the Homepage work
	var $j = jQuery.noConflict();
	(function($) {
 	$(function() {
	$(document).ready(function() {   


    jQuery(".dynamic-placeholder").keyup(function () {      
            
        var word = $('.dynamic-placeholder').val();
       
            $.ajax({
                url:'../wp-content/themes/barnett/db_search.php',
                type:'GET',
                data:'word=' + word,
                cache: 'false',
                success: function(data){
                    $('#results').html($(data));
                    
                },
                error: function(err){
                   console.log(err.responseText);
                }
            });   
       
    });
 // Homepage search box animation
    var txt = "Tell us what we can help with...",
        timeOut,
        txtLen = txt.length,
        char = 0,
        $ = jQuery;

    function blinking ($element) {
		var placeholder = $element.attr('placeholder'),
			lastChar = placeholder[placeholder.length - 1];

		if (lastChar === "|") {
			placeholder = (placeholder.length) ? placeholder.slice(0, -1) : '|';	
		} else {
			placeholder += '|';
		}

		$element.attr('placeholder', placeholder);
	}
    
    $('.dynamic-placeholder').val('');
    $('.dynamic-placeholder').attr('placeholder', '');
    $('.dynamic-placeholder').attr('placeholder', '|');
    $('.dynamic-placeholder').attr('autocomplete', 'off');
    
    setTimeout(function () {
        (function typeIt() {
            var humanize = Math.round(Math.random() * (200 - 30)) + 30;
            timeOut = setTimeout(function () {
                char++;
                var type = txt.substring(0, char);
                $('.dynamic-placeholder').attr('placeholder', type + '|');
                typeIt();

                if (char == txtLen) {
                    $('.dynamic-placeholder').attr('placeholder', $('.dynamic-placeholder').attr('placeholder').slice(0, -1)) // remove the '|'
                    clearTimeout(timeOut);
                    setInterval(function(){
                    	blinking($('.dynamic-placeholder'))
                    }, 500)
                }
            }, humanize);
        }());
    }, 500);     

	});
	});
	})(jQuery);