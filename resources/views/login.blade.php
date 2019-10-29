<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/login.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#"> <img src="{{ asset('public/images/petflix.svg') }}" class="logo"> </a>
        </nav>

        <div class="content text-light p-5">
            
        <div style="margin-top: -50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-color: #efefef">
                    <div class="modal-body text-dark">
                        <h1 class="mb-3">Acessar</h1>

                        <form class="pl-4 pr-4" method="post" action="{{ action('LoginController@login') }}">
                            @csrf
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Senha</label> 
                                <a href="#" class="text-danger float-right">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-danger btn-block">Acessar</button>
                                
                            
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="checkbox" name="remember"> Lembrar-me
                                </div>
                                <div class="col">
                                    <a class="text-danger" href="#">Esqueci minha senha</a>
                                </div>
                            </div>

                            <div class="text-center mt-5 mb-1">
                                <span>Novo no Petflix? </span>&nbsp;
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#mdRegister">Cadastre-se aqui</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>



        </div>


        <!-- Modal -->
        <div class="modal fade" id="mdRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1 class="mb-3">Registrar</h1>

                        <form class="pl-4 pr-4" method="post" action="{{ action('LoginController@register') }}">
                            @csrf
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Senha</label> 
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-danger btn-block">Registrar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>