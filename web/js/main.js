$(function(){
	$('#modalButtonOutstanding').click(function(){
		$('#modalOutstanding').modal('show')
			.find('#modalContentOutstanding')
			.load($(this).attr('value'));
			return false;
	});
});

$(function(){
	$('#modalButtonIssued').click(function(){
		$('#modalIssued').modal('show')
			.find('#modalContentIssued')
			.load($(this).attr('value'));
			return false;
	});
});