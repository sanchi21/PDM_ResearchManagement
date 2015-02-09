$(function(){
	var obj=$('.drop');
	
	obj.on('dragover',function(e){
		e.stopPropagation()
		e.preventDefault();
		$(this).css('border',"2px solid #16a085");
	});
	
	obj.on('drop',function(e){
		e.stopPropagation()
		e.preventDefault();
		$(this).css('border',"2px dotted #bdc3c7");
		
		var files=e.originalEvent.dataTransfer.files;
		var file=files[0];
		//console.log(file);
		upload(file);
	});
	
	function upload(file){
		xhr = new XMLHttpRequest();

		//initiate request
		xhr.open('post','drop.php',true);

		//set headers
		xhr.setRequestHeader('Content-Type',"multipart/form-data");
		xhr.setRequestHeader('X-Fie-Name',file.fileName);
		xhr.setRequestHeader('X-File-Size',file.fileSize);
		xhr.setRequestHeader('X-File-Type',file.fileType);

		//send the file
		xhr.send(file);

		xhr.upload.addEventListener("progress",function(e){
			var progress=(e.loaded/e.total)*100;
			$(".progress").show();
			$(".progress-bar").css('width',progress+"%");
		},false);

		//upload complete check

		xhr.onreadystatechange = function(e){
			if(xhr.readyState===4)
			{
				if(xhr.status==200)
				{
					$(".progress").hide();
					//$(".image").html("<img src='"+xhr.response.responseText+"' width = '100%' />")
				}
			}

		}





	}
});