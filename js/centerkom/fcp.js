    function updatePrice(url)
    {
		var data = {};
    	$$(".inputprice").each(function(elmt) 
    	    {
    			data[elmt.name] =elmt.value;
        	});
    	new Ajax.Request(url, {
  		  method: 'post',
   		  parameters: {'dane' : Object.toJSON(data)},
  		  onSuccess: function(transport) {
  			var jsondata=eval("("+transport.responseText+")") //retrieve result as an JavaScript object
  			var result=jsondata.result
  		    if (result != "OK")
  		      alert('Error : '+result);
  		  }	
  		});
    }