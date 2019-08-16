$(document).ready(function(){
	$("#hideLogin").click(function(){
		$("#login").hide()
		$("#register").show()
	})

	$("#hideregister").click(function(){
		$("#login").show()
		$("#register").hide()
	})
})