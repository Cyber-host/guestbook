$(document).ready(function(){
	$("#pages").click(function(){
		var goPage = $("#pages").val();
		window.location.href = "/guestbook/main/index/"+goPage;
	});
});