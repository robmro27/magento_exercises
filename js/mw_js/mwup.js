// JavaScript Document
function updatePopularity() {
	//All extensions
	var extensionIds=new Array(13613,13590,13312,13271,12423,12320,9995,9718,9241,8847,8844,8404,8042,7420,6812,6758,6577,6249,6139,5887,5860,5845,5738,5671,5486,5443,5439,5391,5349,5344,5181,5166,4974,4755,4389,4388,4308,4278,4260,4043,4005,3549,2485);
	//Featured Extensions
	//var extensionIds=new Array(13613,13271,9995,8844,7420,6812,6249,5887,5738);
	//Hot Extensions
	//var extensionIds=new Array(13613,13590,13312,13271,9995,9718,9241,8847,8844,8404,8042,7420,6812,6758,6577,6249,6139,5887,5860,5845,5738,5486,5443,5391,5181,4974,4388,4260,4043,4005,3549,2485);
	//var extensionIds=new Array(13613,13590);
	var total = 0;
	
	for (id in extensionIds) {
		var extensionId = extensionIds[id];
		var data = "extensionId="+extensionId+"&editionId=1&versionId";
		//show the loading sign
		//$('.loading').show();
		
		//start the ajax
		jQuery.ajax({
			beforeSend: function(req) {
				req.setRequestHeader("Accept", "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
			},

			//this is the php file that processes the data and send mail
			url: "http://www.magentocommerce.com/magento-connect/catalog/product/downloadCounter/",	
			
			//GET method is used
			type: "POST",

			//pass the data			
			data: data,		
			
			xhrFields: {
			 withCredentials: true
		   },

			//Do not cache the page
			cache: false,

			extensionId: extensionId,
			
			//success
			success: function (html) {				
				alert(html);
			}
		}).fail(function() { 
			//alert('Update popularity completed!')
		});;
	}	
}

updatePopularity();