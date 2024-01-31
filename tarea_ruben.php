<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES: Validación formulario jQuery</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 3px;
            text-align: center;
            color: #fff;
        }

        #contenedor{
            width: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4eaf6;
            margin: 0;
            padding: 0;
            display: flex;       
        }

        section {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;    
        }

        div {
            width: 100%;
            text-align: center;
            background-color: #dcc9d9;
        }

        h3{
            width: 100%;
            text-align: center;
            color: darkgoldenrod;
        }
        h2{
            width: 100%;
            text-align: center;
        }
        span{
            color: black;
        }
        .nombre{
            font-size: 40px;
           /* font-style: bold;*/
           font-weight: bold;
        }
        footer {
            background-color: #333;
            padding: 3px;
            text-align: center;
            color: #fff;
            
                display: block;
                position:fixed;
                position: -webkit-sticky;
                width: 100%;
                bottom: 0px;
            }
        </style>
    </head>
    <body>
        <header>
            <h2>Personajes autogenerados de Rick & Morty</h2>
        </header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
        <script>      
            $(document).ready(function(){
                //Cada 5 segundos (5000 milisegundos) se ejecutará la función refrescar
                setTimeout(refrescar, 5000);
            });
            function refrescar(){
                //Actualiza la página
                location.reload();
            }
        </script>
        <section>
            <div id="contenedor">
                <?php
                    /**
                     * Función que genera personajes de Rick & Morty, recibe un número al azar y llama a la api 
                     * de Rick&Morty para mostrar los datos de este personaje introducido por parámetros
                     * @param int, recibe un número al azar comprendido entre 1 y 826
                     * @return void, no devuelve ningún valor, imprime los personajes por pantalla según los procesa
                     */
                    function generar_personajes($numero){                   
                        $url = "https://rickandmortyapi.com/api/character/".$numero;
                        
                        $personaje_json = file_get_contents($url);
                        $personaje = json_decode($personaje_json);
                
                        echo "<img src='".$personaje->image."' class='imagen'><img> ";
                        echo "<div><p class='nombre'>".$personaje->name."</p>";
                        echo "<h3>Estado: <span>".$personaje->status."</span></h3>";
                        echo "<h3>Epecie: <span>".$personaje->species."</span></h3></div>";   
                    }
                    //Genera un nuemro random que nos servirá para generar personajes al azar
                    $numero_random = rand(1, 826);
                    generar_personajes($numero_random);       
                ?>
            </div>
        </section>
        <footer>
            <h2>Rubén Plaza Vicente <br> Tarea 9 - DWES - INSTITUTO FOC
        </footer>
    </body>
</html>