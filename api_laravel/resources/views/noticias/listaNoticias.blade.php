<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            table.comBordaSimples {
                border-collapse: collapse; /* CSS2 */
                /* background: #FFFFF0; */
                margin-top: 25px;
            }
            
            table.comBordaSimples td {
                border: 1px solid black;
            }
            
            table.comBordaSimples th {
                border: 1px solid black;
                background: #F0FFF0;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                           API - Noticias <br> Listagem completa de not??cias
                </div>

                <div class="links">
                    <a href="{{ route('elastic.search') }}">Elastic Search</a>
                    <a href="{{ route('lista.noticias') }}">Noticias Postgres</a>
                </div>
                <table class="table comBordaSimples">
                    <tr>
                        <td><b>Titulo</b></td>
                        <td><b>Subtitulo</b></td>
                        <td><b>Fonte</b></td>
                        <td><b>URL</b></td>
                        <td><b>Publica????o</b></td>
                    </tr>
                    
                    @foreach ($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->subtitulo }}</td>
                            <td>{{ $noticia->fonte }}</td>
                            <td>{{ $noticia->url }}</td>
                            <td>{{ $noticia->data_publicacao }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
