$(document).ready(function(){
	//$('#content').load('content/lesson_index.php');


	$('div#nav li a').click(function(){
		var page = $(this).attr('href');
		$('.content').load('content/'+page+'.php');
		return false;
	});
	



});