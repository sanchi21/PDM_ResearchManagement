$(function(){
	$('#myForm').ajaxForm({
		beforeSend:function(){
			$(".progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%');
			$(".sr-only").html(percentComplete+'%');

		
		},
		success:function(){
			$(".progress").hide();

			
		},
		complete:function(response){

		}
	});
	$(".progress").hide();

});

