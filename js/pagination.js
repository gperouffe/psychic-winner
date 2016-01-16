$(document).ready(function() {
    $("#results" ).load( 
		"fetch_pages.php", 
		function(){
			$("#loading-div").hide();
		}
	);
	
	
    $("#results").on("click", ".pagination li",
		function (e){
			e.preventDefault();
			if(!$(this).hasClass("grey-text")&&!$(this).hasClass("active")){
				$("#loading-div").show();
				var page = $(this).attr("data-page");
				$("#results").load(
					"fetch_pages.php",
					{"page":page}, 
					function(){
						$("#loading-div").hide();
						$("#results").show();
					}
				);
			}
		}
	);
});