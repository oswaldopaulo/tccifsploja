@extends('layouts.default')
@section('content')
  <div class="row mb-4" style="margin-left: 100px; margin-top: 50px; margin-right: 100px">
    <h3><i class="fas fa-user fa-fw"></i>Autenticar</h3>
  
 
   </div>
   
      <div style="margin-left: 100px;">
      @foreach ($errors->all() as $error)
        <ul class="nav flex-column"> 
        <li class="nav-item"> <span class="help-block text-danger"><strong>{{ $error }}</strong> </span> </li>
        
        </ul>
    @endforeach
	</div>
   
   
   <div class="row mb-4" style="margin-left: 20px; margin-top: 50px; margin-right: 20px">
   

	<div class="col-md-5 detail-grid-col" style="background-color: Gainsboro; margin: 10px">
		<h3>Logar no site</h3>
    <div class="row mb-4" style="margin: 20px;" >
	     <div class="col-md-12">
	  
	    	 
	 
	    
	    	<form role="form" action="{{ route('login') }}" class="form" method="post">
			 {{ csrf_field() }}
			 <input type="hidden" name="token" value="{!! Config::get('api.v1.token') !!}">
			 <input type="hidden" name="loginidempresa" id="loginidempresa" value="">
			 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                       <input  type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                       
                              
                    </div>
              </div>   
			 
    			 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                        <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
        			       <input  type="password" class="form-control" name="password" required>

                    	</div>
                    
            	</div>
            	
            	
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
            	
				
             	
                 
             
             	
        
               
					
					
					<button type="submit" class="btn btn-primary btn-lg">Entrar</button>
					 <a class="btn btn-link" href="{{ route('password.request') }}">
                                   Esqueceu a senha?
                                </a>
				
            </form>
	     </div>
	    
     </div>
     
     
   
		 
	</div>
    <div class="col-md-5 detail-grid-col" style="background-color: Gainsboro; margin: 10px">
    
    <h3>Não cadastrado? Registre-se</h3>
    <div class="row mb-4" style="margin: 20px;" >
	     <div class="col-md-12">
	      
	     
	    	 

	    	 	<form role="form" action="{{ route('register') }}" class="form" method="post">
	    	 	 {{ csrf_field() }}
	    	 	 <input type="hidden" name="token" value="{!! Config::get('api.v1.token') !!}">
				 <input type="hidden" name="idempresa" id="idempresa" value="">
			 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    </div>
              </div>   
			 
			 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                       <input  type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                             
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

	  
  </div>


  
   @endsection 