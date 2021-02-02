@extends('layouts.default')
@section('content')
 <form role="form" action="{{ url('transacao') }}" class="form" method="post" >
   {{ csrf_field() }}
  <div class="row mb-4" style="margin-left: 20px; margin-top: 50px; margin-right: 20px">
    <h3><i class="fas fa-cart-plus fa-fw"></i> Finalizar Pedido </h3>
   </div>
   
   <div class="row mb-4" style="margin-left: 20px; margin-top: 50px; margin-right: 20px">
   

	<div class="col-md-8 detail-grid-col">
		<div class="col-md-12">
			
			<ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Compras</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Configurações</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              	
              	<div class="col-md-12 detail-grid-col">
            		<div class="col-md-12">
            			<div class="row mb-4" style="border-bottom: 1px solid;" >
            			     <div class="col-md-4">
            			    	 Pedido
            			     </div>
            			      <div class="col-md-2">
            			    	 Data
            			     </div>
            			       <div class="col-md-2">
            			    	 Valor
            			     </div>
            			      <div class="col-md-4">
            			    	 Status
            			     </div>
            			  </div>
            	     </div>
            	     
            	     <div class="col-md-12" id="produtos">
            		
            			  
            	     </div>
            	</div>
				
				
				</div>
				
				
				
              	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              	
              	
              	<div style="margin: 10px">
              	<h1>Meus Dados</h1>
              		<form role="form" action="{{ url('profile') }}" class="form" method="post">
            	    	 	 {{ csrf_field() }}
            	    	 	 <input type="hidden" name="token" value="{!! Config::get('api.v1.token') !!}">
            				 <input type="hidden" name="idempresa" id="idempresa" value="">
            			 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required autofocus>
            
                                </div>
                          </div>   
            			 
            			 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                   <input  type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
            
                                         
                                </div>
                          </div>   
            			 
                			 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                    <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                                    <div class="col-sm-10">
                    			       <input  type="password" class="form-control" name="password" required>
            
                                           
                                	</div>
                                
                        	</div>
                        	
                        	 <div class="form-group row">
                                    <label for="confirma" class="col-sm-2 col-form-label">Confirma</label>
                                    <div class="col-sm-10">
                    			     	 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                	</div>
                                
                        	</div>
                        	
            				
                         	
                             
                         
                         	
                    
                           
            					
            					
            					<button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            				
           			 </form>
           			 </div>
              	
              	</div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
			
			
			
			
	     </div>
	     
	     <div class="col-md-12" id="produtos">
		
			  
	     </div>
	</div>
	
	<div class="col-md-4 detail-grid-col">
	
	{{ session('warning') }}
	
	<div class="card bg-light mb-3">
      <div class="card-header"> <h5>Endereço de Entrega</h5></div>
      <div class="card-body row col-md-12">
      
       <div class="col-md-4 detail-grid-col">
            <div class="card bg-light mb-4">
              <div class="card-header"><input type="radio" name="cep" id="cep" value="1" onchange="getcep(this.value)" checked> {{Auth::user()->cep}} </div>
              <div class="card-body">
              <p style="margin: 0" > {{ Auth::user()->name }} </p>
               <p style="margin: 0" > {{ Auth::user()->rua }}, {{ Auth::user()->numero }}  </p>
               <p style="margin: 0" > {{ Auth::user()->bairro }} </p>
               <p style="margin: 0" > {{ Auth::user()->cidade }}/{{ Auth::user()->uf }}  </p>
              
       
               
              </div>
            </div>
        </div>
          
      </div>
    </div>
    
    
 
    
    
		
		        
	
	</div>
	
    
     
		 
		  
		    
		 
	  
	  </div>

	</form>  

  <script type="text/javascript">
  	$.cookie.json = true;
	t = $.cookie('produtos');

	orderAddRow(t)
	

	
	function orderAddRow($data) {
		var valor = 0;
	    $.each($data,function(index,value) {
	    	
	    	valor += value.preco * value.qtd;
	        
	            
	            
	        var row = 	"<div class=\"row mb-4\" style=\"border-bottom: 1px solid;\" >"
		     + "<div class=\"col-md-4\">"
		     
			+	"<input type=\"hidden\" id=\"idloja\" name=\"idloja[]\" value=\"" +  value.idloja + "\">"
		    +	"<img src=\"{{ Config::get('api.v1.pics') }}/getbyitem/" +  value.produto.id + "\" alt=\"imagem do produto\" class=\"img-thumbnail\" style=\"width: 75px;height: autopx;  float: left; margin-right: 10px\"/>"
		    	
			+   "<h6>" + value.produto.descricao + "</h6>"
		   // +	"<p>descricao</p>"
		    + "</div>"
		    +  "<div class=\"col-md-2\">"
		    +	 "<input name=\"qtd[]\" type=\"number\" class=\"form-control\" value=\"" + value.qtd + "\" style=\"width: 50px\" />"
		    + "</div>"
		    +   "<div class=\"col-md-2\">"
		    +	"<a href=# onclick(remove_carrinho("+  value.produto.id +")) ><i class=\"far fa-trash-alt fa-2x\"></i></a>"
		    + "</div>"
		    +  "<div class=\"col-md-4\">"
		    +	 "R$ " + value.preco * value.qtd + ""
		    + "</div>"
		  +   "</div>";
  	            
	        		$('#produtos').append(row);
  	          
	    });
	    
	    total2.value = valor.toFixed(2);
		total.value = valor.toFixed(2);
	
	    
	}
  </script>
  
 <script type="text/javascript">
 function getcep(cep){

		$('#frete').empty();
		
		if(cep==''){
			$('#frete').append("CEP em branco");
			return false;
		
		}
	 fetch("{{ Config::get('api.v1.micro') }}/frete/{!! Config::get('api.v1.token') !!}/" + cep   ).then(function(response) {
		  var contentType = response.headers.get("content-type");
		  if(contentType && contentType.indexOf("application/json") !== -1) {
		    return response.json().then(function(json) {
		      // process your JSON further
		    		
		   		//console.log(json);
				orderAddRow(json)
				
				
		    });
		  } else {
		    console.log("nada");
		  }
		});

		

 }

	function orderAddRow($data) {
	    $.each($data,function(index,value) {

		    first = true;

	    	if(value.resultado==1){

		    	first?r="required":r="";
    	    	 var row = "<p><input type=\"radio\" name=\"frete\" class=\"form-check form-check-inline\" " + r +" onchange=\"calcular("+ value.valor +")\" value=\"" + value.tipo + "|" +  value.valor + "\"> " + value.tipo.toUpperCase() + " " + value.valor_rs + "</p>";
    	    	 first=false;
                
        		$('#frete').append(row);
	    	} else {

	    		$('#frete').append(value.resultado_txt);
	    		return false;

	    	}
	
	       // console.log(value.tipo);
	          
	    });
	}


 	function calcular(frete){
 		
		var valor = parseFloat(total2.value);
		valor += parseFloat(frete);
 		total.value = valor.toFixed(2);
 	 	
 	}

 	getcep({{ Auth::user()->cep }});
</script>
  
  
@endsection