<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gangabox :: Orden de Productos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">

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

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
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
                    <img src="{{ asset('img/gangabox.png') }}" class="logoIndex">
                </div>
                
                <h3 class="title"> Orden de Productos</h3>
                
                @if( isset($error) )
                    <div class="alert alert-error">
                        <label>{{$error}}</label> 
                    </div>
                @endif

                @if( isset($success) )
                    <div class="alert alert-success">
                        <label>{{$success}}</label> 
                    </div>
                @endif
                
                <form class="form" method="POST" action="{{ route('upload') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <h3 class="title-form">Subir archivo</h3>
                    <input type="file" class="btnUpdate" value="Subir Catálogo" accept=".xlsx,.xls" name=file  required/>
                    <div class="form-group">
                      <div class="">
                        <button type="submit" class="btn btn-primary">Importar Archivo</button>
                      </div>
                    </div>
                </form>
                <div class="divButton">
                    <a target="_blank" href="{{ route('export') }}" class="btnDownload" >Descargar Catálogo</a>
                </div>
            </div>
        </div>
        <script src="{{asset('js/all.js')}}"></script>
    </body>
</html>
