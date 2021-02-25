<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <title>Controle de Series</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <a class="navbar navbar-expand-lg" href="{{ route('series.index') }}">Home</a>
        @auth
            <a href="/sair" class="text-danger">Sair</a>
        @endauth

        @guest
            <a href="/entrar" class="text-danger">Entrar</a>
        @endguest
            
        
        
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1> @yield('cabecalho') </h1>
        </div>
        @yield('conteudo')
    </div>
</body>
</html>