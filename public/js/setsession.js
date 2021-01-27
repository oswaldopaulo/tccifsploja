function setsession(id){
	
	
	
	
	
	fetch("SessionServlet?id=" + id).then(function(response) {
	  var contentType = response.headers.get("content-type");
	  if(contentType && contentType.indexOf("application/json") !== -1) {
	    return response.json().then(function(json) {
	      // process your JSON further
	      
	      
	     	console.log(json);
	    	

  			$('#carrinhoqtd').empty();
			$('#carrinhoqtd').append(json.conta);
			
			$('#carrinhopreco').empty();
			$('#carrinhopreco').append("R$ " + json.valor);
	    	
			if(id != 0) {
				window.location.href = "carrinho.jsp";
	    	}
	    	 
	    });
	  } else {
	    console.log("Oops, we haven't got JSON!");
	  }
	});
		
	
	}
		

setsession(0)