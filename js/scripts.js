$(window).load(function(){
	$('#perk-slider-desktop').bxSlider({
	    minSlides: 3,
	    maxSlides: 3,
	    slideWidth: 340,
	    slideMargin: 25,
	    pager: false,
	    moveSlides: 1,
        onSliderLoad: function(){
            $("#slider-wrapper-desktop").css("visibility", "visible");
        }
	});

	$('#perk-slider-mobile').bxSlider({
	    minSlides: 1,
	    maxSlides: 1,
	    slideWidth: 340,
	    pager: false,
	    moveSlides: 1,
        onSliderLoad: function(){
            $("#slider-wrapper-mobile").css("visibility", "visible");
        }
	});

	$('.ga').on('click', function() {
	  var $eventLabel = $(this).attr("data-clicked");
	  ga('send', 'event', 'links', 'clicked', $eventLabel); 
	});

    $("#prize-entry-button").click(function(e){
        e.preventDefault();
        validateEntryForm();
    });

    $("#hr-share-button").click(function(e){
        e.preventDefault();
        validateHRShareForm();
    });

    

    function validateEntryForm(){
        //Put the error message and submit button into buttons for performance
        var $errorContainer = $("#formError");
        var $submitButton = $("#share-submit");
        //Stop resubmitting while checking is happening
        $submitButton.prop('disabled', true); 
        $errorContainer.html("");

        //Serverside validation
            var $formData = $("#success-form").serialize();
            $.ajax({
            type: 'POST',
            url: "includes/game-success-form.php",
            data: $formData,
            success: function(response) {

                switch(response){

                    case "balloon":
                    window.location.href = "prize-win.php?prize=balloon";
                    break;
                    case "adventure":
                    window.location.href = "prize-win.php?prize=adventure";
                    break;
                    case "vr":
                    window.location.href = "prize-win.php?prize=vr";
                    break;
                    case "massage":
                    window.location.href = "prize-win.php?prize=massage";
                    break;
                    case "cinema":
                    window.location.href = "prize-win.php?prize=cinema";
                    break;
                    case "coffee":
                    window.location.href = "prize-win.php?prize=coffee";
                    break;
                    case "voucher":
                    window.location.href = "prize-win.php?prize=voucher";
                    break;
                    case "lose":
                    window.location.href = "prize-lose.php";
                    break;
                    default:
                    //If the response contains errors, display them.
                    $errorContainer.html(response);   
                    $submitButton.prop('disabled', false);   
                    break;
                }

 

         
                
            },
            //If something server based goes wrong, output a generic message.
            error: function(jqXHR, exception) {
                $errorContainer.html("Sorry, something went wrong.  Please try again.");
                $submitButton.prop('disabled', false);
            }
            });
    }

    function validateHRShareForm(){
        //Put the error message and submit button into buttons for performance
        var $errorContainer = $("#formError");
        var $submitButton = $("#hr-share-button");
        //Stop resubmitting while checking is happening
        $submitButton.prop('disabled', true); 
        $errorContainer.html("");

        //Serverside validation
            var $formData = $("#hr-share-form").serialize();
            $.ajax({
            type: 'POST',
            url: "includes/hr-entry-form.php",
            data: $formData,
            success: function(response) {
                //If the response is blank, no validation errors have occured so redirect the user.
                if (response=="success") {
                    window.location.href = "share.php";
                } else {
                //If the respone contains errors, display them.
                    $errorContainer.html(response);   
                    $submitButton.prop('disabled', false);            
                }
            },
            //If something server based goes wrong, output a generic message.
            error: function(jqXHR, exception) {
                $errorContainer.html("Sorry, something went wrong.  Please try again.");
                $submitButton.prop('disabled', false);
            }
            });

    }

});
