function getTwitter(user, success){
	utils.ajax("twitter/lista-twitts", {
		usuario: user
	}, success);
//	$.ajax({
//		url : 'twitter/lista-twitts.php',
//		type: 'post',
//		data: {
//			usuario: user
//		},
//		dataType: 'xml',
//		success: success
//		
//		
//	});
	
}

function putTwittsDefault(xml){
//	alert(xml)
	var li = "<li>";
	var endLi = "</li>";
	var span = "<span class='data'>";
	var endSpan = "</span> ";
	var p = "<p>";
	var endP = "</p>";
	var a = "<a href='";
	var aComp = "' target='_blank' >";
	var endA = "</a>";
	
	twit = "";
	$(xml).find('data').find('twit').each(function(){
		
		twit += li + p + span + $(this).find('date').text() + endSpan + a + $(this).find("url").text() + aComp + $(this).find('title').text() + endA + endP + endLi;
//		alert(twit)
	});
	
	$('.twitts ul').append(twit);
	
}