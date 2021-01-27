@extends('layouts.default')

@section('content')
<main role="main">

<!-- Aqui começa o banner carrocel -->

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active h500" >
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#EEE"/></svg>
        <div class="container">
          <div class="carousel-caption">
           
           <a href="#"><img src="img/banner-home-generico-ofertas-0917-d-v2.png"/></a>
    
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#EEE"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <a href="#"><img src="{{ asset('img/banner-home-generico-pneus-0915-d.png') }}"/></a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#EEE"/></svg>
        <div class="container">
          <div class="carousel-caption text-right">
           <a href="#"><img src="{{ asset('img/banner-home-generico-selecao-de-smart-tvs-0918-d.png') }}"/></a>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Aqui termina o banner carrocel -->
  
   <!--  Produtos começa aqui -->
   <div class="row mb-4 produto_marging" id="produtos">
   
		<!-- loop -->   
	    
	  
	  <!-- fim do loop -->
	  
	  

	  
  </div>
  <!-- Produtos termina aqui -->
  <script type="text/javascript">

	fetch("{{ Config::get('api.v1.url') }}/loja?token={!! Config::get('api.v1.token') !!}").then(function(response) {
	  var contentType = response.headers.get("content-type");
	  if(contentType && contentType.indexOf("application/json") !== -1) {
	    return response.json().then(function(json) {
	      // process your JSON further
	    	console.log(json);
	    	orderAddRow(json)
	    });
	  } else {
	    console.log("Oops, we haven't got JSON!");
	  }
	});
	
	

	function orderAddRow($data) {
	    $.each($data,function(index,value) {
	     
	            
	        var row = "<div class=\"col-md-3 themed-grid-col text-center\">"
					    + "<a href=\"details.jsp?id=" + value.produto.id + "\">"
						+	"<img src=\"ImagensServlet?id=" +  value.produto.id + "\" alt=\"figura produto\" width=301px height=auto/></a>"
					    + "<div>"
					
						+	"<h4 class=\"nav-link\"><a href=\"details.jsp?id=" + value.ID + "\">" + value.produto.descricao + "</a></h4>"
					
						+	"<h3>R$ " +  value.preco +  "</h3>"
						+ "<button type=\"button\" id=\"bt-carrinho\" onclick=\"setsession(" +  value.produto.id + ")\" class=\"btn btn-danger\"> <i class=\"fas fa-cart-plus fa-fw\"></i> Comprar </button>"
					
						+ "</div></div>";
	   
  	            
	        		$('#produtos').append(row);
  	          
	    });
	}
	</script>
  
  
</main>
@endsection
