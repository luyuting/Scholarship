$(function(){
	 $(".title h1").on("click",function(){
	 	console.log($(this).parent().next());
	 	$(this).parent().next().toggle();
	 });
});