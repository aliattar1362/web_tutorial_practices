// script.js 

$(function() {

	$('h1').css("color","red");

	$('button').click(function() {
		$('#box').fadeOut(1000);
	});  

    
	/* ----------------
	   jQuery Selectors
	   ---------------- */

	 // Grouping Selectors  
	//$('h2, h3, h4').css("border","solid 1px red");

	//ID Selector
	//$('div#container').css("border","solid 1px red");

	//class Selector
	//$('p.lead').css("border","solid 1px red");

	//Psudo-element Selector
	//$('li:first').css("border","solid 1px red");

	//$('p:even').css('border','solid 1px red');

	//$('p:odd').css('border','solid 1px red');

	//Descendant Selector
	//$('div em').css('border','solid 1px red');

	//Child Selector
	//$('div > p').css('border','solid 1px red');

	//jQuery Header Selector
	//$(':header').css('border','solid 1px red');

	//jQuery Contains Selector
	//$('div:contains("Ali")').css('border','solid 1px red');

	/* --------------------
	   jQuery EVENT METHODS
	   -------------------- */

	$('#box').click(function() {
		alert('you clicked the box');
	});

	$('input').blur(function() {
		if ( $(this).val() == "" ) {
			$(this).css('border','solid 1px red');
			$('#box').text('Forgot to add text?');
		}
	});

	$('input').keydown(function() {
		if ($(this).val() != "") {
			$(this).css('border','solid 1px #777');
			$('#box').text('Thanks for that');
		}
	});

	$('#box').hover(function () {
		$(this).text('you hovered in!');
	}, function() {
		$(this).text('you hovered out!');
	});

	/* ---------------
	   jQUERY CHAINING
	   --------------- */

	$('.notification-bar').delay(1000).slideDown().delay(1000).fadeOut();

	/* ----------------
	   jQUERY HIDE/SHOW
	   ---------------- */

	//$('h1').hide();
	//$('div.hidden').delay(1000).show();
	//$('p').fadeOut();
	//$('div.hidden').fadeIn(1000);

	$('#box1').click(function() {
		$(this).fadeTo(2000,0.75,function() {
			// animation is complete
			$(this).slideUp();
		});
	});

	$('div.hidden').slideDown();

	$('button').click(function() {
		$('#box1').slideToggle();
	});

	/* ----------------
	    jQUERY ANIMATE
	   ---------------- */

	$('#left').click(function(){
	 	$('.box').animate({
	 		left: "-=40px",
	 		fontsize: "+=2px"
		}, function() {
		// animation is complete
		});
	});

	$('#up').click(function(){
	 	$('.box').animate({
	 		top: "-=40px",
	 		opacity: "+=0.1"
		}, function() {
		// animation is complete
		});
	});

	$('#right').click(function(){
	 	$('.box').animate({
	 		left: "+=40px",
	 		fontsize: "-=2px"
		}, function() {
		// animation is complete
		});
	});

	$('#down').click(function(){
	 	$('.box').animate({
	 		top: "+=40px",
	 		opacity: "-=0.1"
		}, function() {
		// animation is complete
		});
	});


	/* ----------------
	    jQUERY CSS
	   ---------------- */

	$('#circle2').css({
		'background':'#8a8d22',
		'display':'inline-block',
		'color':'white',
		'text-align':'center',
		'line-height':'140px',
		'height':'140px',
		'width':'140px',
	}).addClass('circleShape');

	/* ------------------
        jQUERY CAR RACE
       ------------------ */
    $('#go').click(function() {

    	// build a function that checks to see if a car has won the race
    	function checkIfComplete() {
    			if (isComplete == false) {
    				isComplete = true;
    			} else {
    				place = 'second';
    			}
    	}

    	// get the width of the cars
    	var carWidth = $('#car1').width();

    	// get the width of racetrack
    	var racetrackWidth = $(window).width() - carWidth;

    	// generate a random # between 1 and 5000
    	var raceTime1 = Math.floor((Math.random() * 5000) + 1);
    	var raceTime2 = Math.floor((Math.random() * 5000) + 1);

    	// set a flag variable to FALSE by default
    	var isComplete = false;

    	// set a flag variable to FIRST by default;
    	var place = 'first';

    	// animate car 1
    	$('#car1').animate({

    		// move the car width of the race track
    		left: racetrackWidth


    	}, raceTime1, function() {

    		// animation is complete

    		// run a function
    		checkIfComplete();

    		// give some text feedback in the race info box
    		$('#raceInfo1 span').text('Finished in ' + place +
    		' place and clocked in at ' + raceTime1 + ' milliseconds');
    	});

    	// animate car 2
    	$('#car2').animate({

    		// move the car width of the race track
    		left: racetrackWidth


    	}, raceTime2, function() {
    		// animation is complete

    		// run a function
    		checkIfComplete();

    		// give some text feedback in the race info box
    		$('#raceInfo2 span').text('Finished in ' + place +
    		' place and clocked in at ' + raceTime2 + ' milliseconds');
    	});

    });

    // reset the race
    $('#reset').click(function() {

    	$('.car').css('left','0');
    	$('.raceInfo span').text('');

    });

});