@extends('layouts.default')
@section('content')

  <div class="row mb-4" style="margin-left: 100px; margin-top: 50px; margin-right: 100px">
    <h3><i class="fas fa-cart-plus fa-fw"></i> Meu Carrinho</h3>
   </div>
   
   <div class="row mb-4" style="margin-left: 100px; margin-top: 50px; margin-right: 100px">
   

	<div class="col-md-8 detail-grid-col">
		<div class="col-md-12">
			<div class="row mb-4" style="border-bottom: 1px solid;" >
			     <div class="col-md-4">
			    	 Produto
			     </div>
			      <div class="col-md-2">
			    	 Qtd
			     </div>
			       <div class="col-md-2">
			    	 X
			     </div>
			      <div class="col-md-4">
			    	 Preço
			     </div>
			  </div>
	     </div>
	     
	     <div class="col-md-12" id="produtos">
		
			  
	     </div>
	</div>
    <div class="col-md-4 detail-grid-col" style="background-color: Gainsboro;">
    
    <h3>Endereço de Entrega</h3>
    <div class="row mb-4" style="margin: 20px; border-bottom: 1px solid;" >
    	
    	
	     <div class="col-md-4">
	    	 <label for="cep">Cep</label> 
	     </div>
	     
	     
	      <div class="col-md-8" style="text-align: right;">
	    	 <div class="input-group"> 
    	    	 <input type="text" id="cep" name="cep" class="form-control" size="8" placeholder="Dig. o Cep"> 
    	    	  <div class="input-group-append">
    	    	  	<button class="btn btn-primary" onclick="getcep(cep.value)">Calcular Frete</button>
    	    	  </div>
	    	  </div>
	     </div>
	       <div class="col-md-12">
	    	 Rua <span id="rua">teste </span>,<span id="">teste </span> 
	     </div>
	      
     </div>
    
    <h3>Resumo do Pedido</h3>
    <div class="row mb-4" style="margin: 20px; border-bottom: 1px solid;" >
	     <div class="col-md-8">
	    	 Subtotal
	     </div>
	      <div class="col-md-4" style="text-align: right;">
	    	 <div id="valor"> R$ 999,99</div>
	     </div>
	       <div class="col-md-8">
	    	 Frete
	     </div>
	      <div class="col-md-4" style="text-align: right;">
	    	 R$ 0,0
	     </div>
     </div>
     
     
   
    <div class="row mb-4" style="margin-left: 20px; margin-right: 20px; margin-top: 0px" >
	     <div class="col-md-8">
	    	 <h5>Total</h5>
	     </div>
	      <div class="col-md-4" style="text-align: right;">
	    	 <h5> <span id="total"> R$ 999,99 </span></h5>
	     </div>
	      
     </div>
     
		 
		    <button type="button" class="btn btn-danger btn-lg" style="width: 80%; margin-left: 10%; margin-right: auto; "> <i class="fas fa-cart-plus fa-fw"></i> Continuar </button>
		    <p style="margin-left: 10%; margin-right: 20px; margin-top: 20px;"><a href="index.jsp"> Continuar Comprando</a> </p>
		    <p style="margin-left: 20px; margin-right: 20px; margin-top: 20px; text-align: center;"><i class="fas fa-info-circle" style="color: RoyalBlue"></i> Se voc� possuir cupom ou vale poder� usar na proxima etapa</p>    
		    
		 
	  
	  </div>

	  
  </div>

  <script type="text/javascript">
  	$.cookie.json = true;
	t = $.cookie('produtos');

	orderAddRow(t)
	

	
	function orderAddRow($data) {
		var valor = 0;
	    $.each($data,function(index,value) {
	    	
	    	valor += value.preco;
	        
	            
	            
	        var row = 	"<div class=\"row mb-4\" style=\"border-bottom: 1px solid;\" >"
		     + "<div class=\"col-md-4\">"
		     
			+	"<input type=\"hidden\" id=\"idloja\" value=\"" +  value.idloja + "\">"
		    +	"<img src=\"{{ Config::get('api.v1.pics') }}/getbyitem/" +  value.produto.id + "\" alt=\"imagem do produto\" class=\"img-thumbnail\" style=\"width: 75px;height: autopx;  float: left; margin-right: 10px\"/>"
		    	
			+   "<h6>" + value.produto.descricao + "</h6>"
		   // +	"<p>descricao</p>"
		    + "</div>"
		    +  "<div class=\"col-md-2\">"
		    +	 "<input name=\"qtd\" type=\"number\" class=\"form-control\" value=\"" + value.qtd + "\" style=\"width: 50px\" />"
		    + "</div>"
		    +   "<div class=\"col-md-2\">"
		    +	"<a href=# onclick(remove_carrinho("+  value.produto.id +")) ><i class=\"far fa-trash-alt fa-2x\"></i></a>"
		    + "</div>"
		    +  "<div class=\"col-md-4\">"
		    +	 "R$ " + value.preco + ""
		    + "</div>"
		  +   "</div>";
  	            
	        		$('#produtos').append(row);
  	          
	    });
	    
	    $('#valor').empty();
		$('#valor').append(("R$ " + valor.toFixed(2)).replace(".",","));
		
		$('#total').empty();
		$('#total').append(("R$ " + valor.toFixed(2)).replace(".",","));
	
	    
	}
  </script>
  
 <script type="text/javascript">
 function getcep(cep){

	 fetch("{{ Config::get('api.v1.micro') }}/frete/{!! Config::get('api.v1.token') !!}/" + cep).then(function(response) {
		  var contentType = response.headers.get("content-type");
		  if(contentType && contentType.indexOf("application/json") !== -1) {
		    return response.json().then(function(json) {
		      // process your JSON further
		      
		      
		   		
			
		   		
		   		
		   		console.log(json);



		   		//console.log($.cookie('produtos'));
	  			//$('#carrinhoqtd').empty();
				//$('#carrinhoqtd').append(t.length);
				
				

				
				
		    });
		  } else {
		    console.log("Oops, we haven't got JSON!");
		  }
		});

 }

</script>
  
  
@endsection