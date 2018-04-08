$(document).ready(function() {

	var page = $('#currentPage').val();
	var currentGoto = $('#currentGoto').val();

	/*  Sorting  */
	$('#sortByClassOnlyBtn').click(function() {
		var class_id = $('#sortByClassOnly').val();

		setTimeout(function() {
			document.location.href = page + '.php?u=man&&cls=' + class_id;
		});
	});

	$('#sortByClassAndSubjBtn').click(function() {
		var class_id = $('#sortByClassOnly').val();
		var subject_id = $('#sortBySubjOnly').val();

		setTimeout(function() {
			document.location.href = page + '.php?u=' + currentGoto + '&&cls=' + class_id + '&&sub=' + subject_id;
		});
	});

	/*  Switching between schools  */
	$('#MiddleDiv').hide();
	$('#MiddleDiv input').removeAttr("name");
	$('#MiddleDiv select').removeAttr("required");
	$('#MiddleDiv select').removeAttr("name");

	$('#HighDiv').hide();
	$('#HighDiv input').removeAttr("name");
	$('#HighDiv select').removeAttr("required");
	$('#HighDiv select').removeAttr("name");

	$('#ColDiv').hide();
	$('#ColDiv input').removeAttr("name");
	$('#ColDiv select').removeAttr("required");
	$('#ColDiv select').removeAttr("name");

	// When you click Elementary 
	$('#Elementary').click(function() {
		$(this).addClass("active");

		$('#ElementaryDiv').show();
		$('#ElementaryDiv input').attr("name", "type");
		$('#ElementaryDiv select').attr("required");
		$('#ElementaryDiv select').attr("name", "school_id");

		$('#Middle').removeClass("active");
		$('#MiddleDiv').hide();
		$('#MiddleDiv input').removeAttr("name");
		$('#MiddleDiv select').removeAttr("required");
		$('#MiddleDiv select').removeAttr("name");

		$('#High').removeClass("active");
		$('#HighDiv').hide();
		$('#HighDiv input').removeAttr("name");
		$('#HighDiv select').removeAttr("required");
		$('#HighDiv select').removeAttr("name");

		$('#Col').removeClass("active");
		$('#ColDiv').hide();
		$('#ColDiv input').removeAttr("name");
		$('#ColDiv select').removeAttr("required");
		$('#ColDiv select').removeAttr("name");
	});

	// When you click Middle 
	$('#Middle').click(function() {
		$(this).addClass("active");

		$('#MiddleDiv').show();
		$('#MiddleDiv input').attr("name", "type");
		$('#MiddleDiv select').attr("required");
		$('#MiddleDiv select').attr("name", "school_id");

		$('#Elementary').removeClass("active");
		$('#ElementaryDiv').hide();
		$('#ElementaryDiv input').removeAttr("name");
		$('#ElementaryDiv select').removeAttr("required");
		$('#ElementaryDiv select').removeAttr("name");

		$('#High').removeClass("active");
		$('#HighDiv').hide();
		$('#HighDiv input').removeAttr("name");
		$('#HighDiv select').removeAttr("required");
		$('#HighDiv select').removeAttr("name");

		$('#Col').removeClass("active");
		$('#ColDiv').hide();
		$('#ColDiv input').removeAttr("name");
		$('#ColDiv select').removeAttr("required");
		$('#ColDiv select').removeAttr("name");
	});

	// When you click High 
	$('#High').click(function() {
		$(this).addClass("active");

		$('#HighDiv').show();
		$('#HighDiv input').attr("name", "type");
		$('#HighDiv select').attr("required");
		$('#HighDiv select#school_id').attr("name", "school_id");
		$('#HighDiv select#id').attr("name", "identity");

		$('#Elementary').removeClass("active");
		$('#ElementaryDiv').hide();
		$('#ElementaryDiv input').removeAttr("name");
		$('#ElementaryDiv select').removeAttr("required");
		$('#ElementaryDiv select').removeAttr("name");

		$('#Middle').removeClass("active");
		$('#MiddleDiv').hide();
		$('#MiddleDiv input').removeAttr("name");
		$('#MiddleDiv select').removeAttr("required");
		$('#MiddleDiv select').removeAttr("name");

		$('#Col').removeClass("active");
		$('#ColDiv').hide();
		$('#ColDiv input').removeAttr("name");
		$('#ColDiv select').removeAttr("required");
		$('#ColDiv select').removeAttr("name");
	});

	// When you click College 
	$('#Col').click(function() {
		$(this).addClass("active");

		$('#ColDiv').show();
		$('#ColDiv input').attr("name", "type");
		$('#ColDiv select').attr("required");
		$('#ColDiv select#school_id').attr("name", "school_id");
		$('#ColDiv select#id').attr("name", "identity");

		$('#Elementary').removeClass("active");
		$('#ElementaryDiv').hide();
		$('#ElementaryDiv input').removeAttr("name");
		$('#ElementaryDiv select').removeAttr("required");
		$('#ElementaryDiv select').removeAttr("name");

		$('#Middle').removeClass("active");
		$('#MiddleDiv').hide();
		$('#MiddleDiv input').removeAttr("name");
		$('#MiddleDiv select').removeAttr("required");
		$('#MiddleDiv select').removeAttr("name");

		$('#High').removeClass("active");
		$('#HighDiv').hide();
		$('#HighDiv input').removeAttr("name");
		$('#HighDiv select').removeAttr("required");
		$('#HighDiv select').removeAttr("name");
	});

	/*  Deactivate autocomplete */
	$('input').attr("autocomplete", "off");
});