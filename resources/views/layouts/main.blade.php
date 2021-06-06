<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        
        <!-- header -->

        <header id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                    <a href="/" class="navbar-brand">
                        <img src="/images/logo.svg" alt="Logo" class="img-fluid">
                    </a>
                    <button 
                        class="navbar-toggler" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link">Evento</a>
                            </li>
                            <li class="nav-item">
                                <a href="/events/create" class="nav-link">Criar Evento</a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Meus eventos</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a 
                                        href="/logout" class="nav-link"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                    >
                                        Sair
                                    </a>
                                </form>
                            </li>
                            @endauth

                            @guest
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <!-- header     -->

        <main id="main">
            @if(session('msg'))
                <div class="alert alert-success text-center">
                    <p>{{session('msg')}}</p>
                </div>
            @endif
            @yield('content')
        </main>

        <!-- footer -->

        <footer class="text-center py-3 mt-3">
            <p>Todos os direitos &copy; 2021</p>
        </footer>

        <!-- footer -->
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"
        ></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>