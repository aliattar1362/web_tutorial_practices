/* script.js */

$(function() {

	// DRAGGABLE
	// https://jqueryui.com/draggable/
	$('.box').draggable();
	$('#box1').draggable({ scroll: true, revert: "invalid" });
	$('#box2').draggable({ axis: "x" });
	$('#box3').draggable({ axis: "y" });
	$('#box4').draggable({ containment: ".container", revert: "invalid" });

	// DROPPABLE
	// https://jqueryui.com/droppable/

	$('#droppable').droppable({
		accept: '#box1',
		drop: function() {
			$(this).text("when a box got attitude, drop it like it's hot!");
		}
	});

	// SORTABLE
	// https://jguery.com/sortable

	$('#sortable').sortable({ connectWith: "#sortableToo", placeholder: "placeholderBox" });
	$('#sortableToo').sortable({ connectWith: "#sortable", placeholder: "placeholderBox" });

	// ACCORDION
	// https://jguery.com/accordion

	$('#accordion').accordion({ collapsible: true, heightStyle: "content" });

	// DATEPICKER
	// // https://jguery.com/datepicker
	$('.date').datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		showButtonPanel: true,
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 2,
		minDate: -1,
		//minDate: "-1W",
		//minDate: "-1W -3D",
		maxDate: "+1W +4D"
	});

	// TO DO LIST

	$('#todoList ul').sortable({
		items: "li:not('.listTitle, .addItem')",
		connectWith: "ul",
		dropOnEmpty: true,
		placeholder: "emptySpace"
	});

	$('input').keydown(function(e) {
		if (e.keyCode == 13) {
			var item = $(this).val();
            $(this).parent().parent().append('<li>' + item + '</li>');
			$(this).val('');
		}
	});

	$('#trash').droppable({
		drop: function(event, ui) {
			ui.draggable.remove();
		}
	});

});