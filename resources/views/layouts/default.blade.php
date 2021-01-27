<!doctype html>
<html lang="pt_BR">
<head>
<meta charset="ISO-8859-1">
<title>Lojinha Ja Guara</title>
<link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('vendor/fontawesome-free-5.13.1-web/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css')  }}">
   <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
<header>
<!-- Menu come�a aqui -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand">Ja Guara</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample03">
  
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.jsp">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contatos </a>
      </li>
     

    </ul>
         <form class="form-inline my-2 my-md-0">
      <input id="search"class="form-control" type="text" placeholder="Search">
       <div class="input-group-append">
                        <button class="btn btn-primary"  onclick="pesquisar()"><i class="fas fa-search"></i></button>
                    </div>
    </form>
    <ul class="navbar-nav">
    

        <li class="nav-item dropdown">
        @auth
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user">{{ Auth::user()->name }}</i> </a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
        
  
      <a class="dropdown-item" href="profile.jsp">Profile </a>
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="LoginServlet" method="POST" style="display: none;">



                                          <input type="hidden" value="1" name="logout">



                                 </form>
  
  
   		
   	
        </div>
        @else
        
                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user">Entrar</i> </a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
        
     <a class="dropdown-item" href="login.jsp">Entrar / Registar </a>
      
     
        
   	</a>
        
   		 @endauth
      </li>
    
     <li class="nav-item">
      <a class="nav-link" href="carrinho.jsp"><span class="text-primary" id="carrinhoqtd"></span><i class="fas fa-cart-plus fa-fw"></i> Carrinho <span class="text-primary" id="carrinhopreco"></span></a>
      </li>
      
  
      </ul>
   
  </div>
</nav>


<!-- Menu termina aqui -->

</header>

@yield('content')

</body>

<footer class="container py-5">
  <div class="row mb-4">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
      <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
    </div>
    <div class="col-6 col-md">
      <h5>Sub Rodap�</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
      
      </ul>
    </div>
     <div class="col-6 col-md">
      <h5>Sub Rodap�</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
      
      </ul>
    </div>
      <div class="col-6 col-md">
      <h5>Sub Rodap�</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
      
      </ul>
    </div>
       <div class="col-6 col-md">
      <h5>Sub Rodap�</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
        <li><a class="text-muted" href="#">Link Rodap� </a></li>
      
      </ul>
    </div>
    
  </div>
  
   <div class="row mb-4">
       
      <div class="card-body">
        <h6 class="card-title" id="footerEmpresa">Empresa</h6>
        <p class="card-text"><strong>CNPJ:</strong> <span id="footerCnpj"></span> <strong>Endere�:</strong> <span id="footerEndereco"></span>, <span id="footerNum"></span> text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
   
   </div>
</footer>


<script src="{{ asset ('js/jquery-3.5.1.slim.min.js') }}" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery.slim.min.js') }}"><\/script>')</script><script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript">
fetch("{{ Config::get('api.v1.url') }}/empresa?token={!! Config::get('api.v1.token') !!}" ).then(function(response) {
	  var contentType = response.headers.get("content-type");
	  if(contentType && contentType.indexOf("application/json") !== -1) {
	    return response.json().then(function(json) {
	      // process your JSON further
	      
	      
	     
	    	//p = json.Produtos;
	    	 console.log(json);
	    	
	    	 $("#footerEmpresa").html(json[0].nome);
	    	 $("#footerCnpj").html(json[0].cpf);
	    	 $("#footerEndereco").html(json[0].des_end);
	    	 $("#footerNum").html(json[0].num_end);
	    
	    	 
	    	 //$("#capa").src("ImagensServlet?id=" + p[0].ID);
	    	 
	    	
	    	 
	    });
	  } else {
	    console.log("Oops, we haven't got JSON!");
	  }
	});
	
</script>
</html>