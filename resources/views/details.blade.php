@extends('layouts.default')
@section('content')
   <div class="row mb-4 header-generic">
    <h3>Detalhes do Produto</h3>
   </div>
   
   <div class="row mb-4" style="margin-left: 50px; margin-top: 50px; margin-right: 50px">
   
	<div class="col-md-4 detail-grid-col">
		<div class="mb-4">
		<img id="capa" src="img/500x300.png" alt="imagem do produto" class="img-fluid"/>
		
		</div>
		<div id="imagens" class="mb-4">
			
		
		
		</div>
	
	</div>
    <div class="col-md-8 detail-grid-col">
    <h3 id="descricao">Cadeira Escritório Boss Presidente Preta Base Giratória Cromada Altura Ajustável</h3>
    <p>
    	<i class="fas fa-star text-warning"></i>
    	<i class="fas fa-star text-warning"></i>
    	<i class="fas fa-star text-warning"></i>
    	<i class="fas fa-star text-warning"></i>
    	<i class="far fa-star"></i>
    	(6) (Cód.<span id="id"></span>)
    
    </p>
    <p id="ficha">Modelo: Cadeira Escritório Boss Presidente Preta Assento: Madeira Revestida com Espuma e Acabamento em PU Base: Aço Cromado Profundidade: 69 cm Largura: 53 cm Altura Total: Alta 121 cm - Baixa 111 cm Altura do Chão Até o Assento... </p>
    
    <h1 id="preco">R$ 200,00</h1>
    <p> 10x de <span id="cartao"></span> no cartão ja guara</p>
    
    <button type="button" id="bt-carrinho" class="btn btn-danger btn-lg"> <i class="fas fa-cart-plus fa-fw"></i> Comprar </button>    
    
    </div>
	  
	  

	  
  </div>
  <!-- Produtos termina aqui -->
  
  <script type="text/javascript">
  
  
  

fetch("{{ Config::get('api.v1.url') }}/loja?token={!! Config::get('api.v1.token') !!}").then(function(response) {
	  var contentType = response.headers.get("content-type");
	  if(contentType && contentType.indexOf("application/json") !== -1) {
	    return response.json().then(function(json) {
	      // process your JSON further
	      
	      
	     
	    	p = json.Produtos;
	    	 //console.log(p);
	    	 $("#id").html(p[0].ID);
	    	 $("#descricao").html(p[0].Descricao);
	    	 $("#preco").html("R$ " + (p[0].Preco.toFixed(2)).replace(".",","));
	    	 $("#ficha").html(p[0].Ficha);
	    	 $("#cartao").html(p[0].Preco/10);
	    	 
	    	 //$("#capa").src("ImagensServlet?id=" + p[0].ID);
	    	 
	    	 document.getElementById("capa").src= "ImagensServlet?id=" + p[0].ID;
	    	 document.getElementById("bt-carrinho").onclick= function() { setsession( p[0].ID); }
	    	 
	    });
	  } else {
	    console.log("Oops, we haven't got JSON!");
	  }
	});
	
	
	
fetch("ImagensServlet?idc=<%= request.getParameter("id") %>").then(function(response) {
	  var contentType = response.headers.get("content-type");
	  if(contentType && contentType.indexOf("application/json") !== -1) {
	    return response.json().then(function(json) {
	      // process your JSON further
	    	//console.log(json.imagens);
	    	orderAddRow(json.imagens)
	    });
	  } else {
	    console.log("Oops, we haven't got JSON!");
	  }
	});
	
	function orderAddRow($data) {
	    $.each($data,function(index,value) {
	
	            
	            var row = "<a href=\"#\" onclick=\"javascript:loadimg('" + value.ID +  "')\"><img src=\"ImagensServlet?idm=" + value.ID +  "\" alt=\"imagem do produto\" class=\"img-thumbnail\" style=\"width: 120px;height: auto\"/></a>";
	            
	        		$('#imagens').append(row);
	          
	    });
	}
	
	function loadimg(id){
	
		if(id != null) {
		 document.getElementById("capa").src= "ImagensServlet?idm=" + id;
		}
	}

</script>

 @endsection 
