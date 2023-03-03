<html>
    <head>
        <title>Álvaro Tapiador de la Torre</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <style>
            .error{
                color: #FF0000; 
            }

            #contenedor {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-49%, -49%);
                background-color: rgb(239, 174, 88);
                padding: 15px 25px 15px 25px;
            }

            h2, label {
                word-spacing: 4px;
                font-weight: 700;
                font-variant: small-caps;
                text-align: center;
            }

            body {
                background-color: antiquewhite;
                font-family: 'Courier New', Courier, monospace;
            }

            input {
                border-width: 4px;
                border-color: #000000;
                border-style: dotted;
                border-radius: 50px;
            }

        </style>
    </head>
    <body>
        <div id="contenedor">
            <h2>Buscador de libros</h2>
            <div>
                <form name="buscarLibros" id="buscarLibros" method="post" action="javascript:void(0)">
                    @csrf
                    <div>
                        <label for="titulo">Título</label>
                        <input type="text" id="texto" name="texto">
                    </div>          
                    <span id="sugerencias"></span>
                </form>
             </div>
        </div>
        <p> 
            <span id="sugerencias"></span>
        </p>
        </div>
        <script>
            $(document).ready(function(){
                $(document).ready(function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
                    $("#texto").keyup(function(){
                        $.ajax({
                            type: "POST",
                            url: "{{url('/libros/consultar')}}",
                            data: {"q":$("#texto").val()},
                            success: function(data) {
                            let texto = "<br>";
                            for(let i=0;i<data.length;i++)
                            {
                                texto = texto + "<br>" + data[i].titulo; 
                            }
                            
                            $("#sugerencias").html(texto);
                            },
                            error: function(data) {
                                alert("fallo");
                            }
                        });
                    });
                });
            });
        </script>
    </body>
</html>