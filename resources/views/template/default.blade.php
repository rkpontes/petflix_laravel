<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
        <link href="{{ asset('public/assets/css/jquery.yu2fvl.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/assets/css/default.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ route('index') }}"> <img src="{{ asset('public/images/petflix.svg') }}" class="logo"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ empty(request()->input()) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{ route('index') }}">Início</a>
                    </li>
                    <li class="nav-item {{ (request()->input('featured')) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{ route('browser', ['featured' => 1]) }}">Destaques</a>
                    </li>
                    <li class="nav-item {{ (request()->input('recently')) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{ route('browser', ['recently' => 1]) }}">Adicionados recentemente</a>
                    </li>
                </ul>
                
                <div class="col-md-3">
                    <form class="form-inline my-2 my-lg-0 mr-5 input-group" id="frm-search" method="get">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-black" onclick="alert('form send')">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                        <input class="form-control mr-sm-2 bg-black" type="search" name="search" placeholder="Pesquisar vídeos...">
                    </form>
                </div>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-danger btn-sm mt-2 mr-3 ml-1" title="Adicionar Vídeos" data-toggle="modal" data-target="#mdAddVideo" >
                            <i class="fa fa-play" ></i>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('public/images/profile.jpg') }}" class="profile-image" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </nav>


        <div class="content text-light p-5">
            @yield('content')
        </div>


        <!-- Modal Adicionar Vídeo-->
        <div class="modal fade" id="mdAddVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Vídeo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ action('VideosController@store') }}">
                            @csrf

                            <div class="form-group">
                                <label>Vídeo</label>
                                <input type="text" name="url" class="form-control" placeholder="https://www.youtube.com/watch?v=????????????" required>
                                <small class="form-text text-muted">Copie e cole a URL do vídeo no Youtube que deseja adicionar.</small>
                            </div>
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="title" class="form-control" placeholder="Título do seu video..." required>
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" placeholder="Descrição do seu vídeo..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Categoria</label>
                                <select name="category" class="form-control" required>
                                    <option>Selecione uma categoria</option>
                                    @foreach(App\Category::all() as $category)
                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="featured" class="form-check-input">
                                <label class="form-check-label">Vídeo destaque?</label>
                            </div>
                            <button type="submit" class="btn btn-danger float-right">Adicionar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="{{ asset('public/assets/js/jquery.yu2fvl.js') }}"></script>
        
        

    </body>
</html>