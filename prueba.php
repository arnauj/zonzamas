<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Moderno con fetch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }
        #loading {
            display: none;


            text-align: center;
        }

        #loading {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 9px solid;
            border-color: #dbdcef;
            border-right-color: #474bff;
            animation: spinner-d3wgkg 1s infinite linear;
            margin-left: 50%;
            top: 20%;
            position:absolute;
        }

        @keyframes spinner-d3wgkg {
            to {
                transform: rotate(1turn);
            }
        }

    </style>
</head>
<body>
    <h1>Ejemplo de AJAX Moderno con fetch</h1>
    <button onclick="fetchJSON()">Cargar Datos JSON</button>
    <button onclick="fetchText()">Cargar Datos Sin JSON</button>

    <div id="loading"></div>

    <div id="result">
        Aquí se mostrarán los resultados.
    </div>
    <script type="text/javascript">


        // Función para mostrar la imagen de carga
        function showLoading() {
            loading.style.display = 'block';
        }
        // Función para ocultar la imagen de carga
        function hideLoading() {
            loading.style.display = 'none';
        }
        function fetchJSON() {
            showLoading(); // Mostrar loading
            fetch('./server-json.php?prueba=hola')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                    return response.json(); // Convertir respuesta a JSON
                })
            .then(data => {
                result.innerHTML = `
                    <p>Mensaje: ${data.mensaje}</p>
                    <p>Fecha: ${data.fecha}</p>
                `;
            })
            .catch(error => {
                result.innerHTML = `<p style="color: red;">Error:${error.message}</p>`;
            })
            .finally(() => {
                hideLoading(); // Ocultar loading
            });
        }


        function fetchText() {
            showLoading(); // Mostrar loading
            fetch('server-text.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                    return response.text(); // Convertir respuesta a texto
                })
            .then(data => {
                result.innerHTML = `<p>${data}</p>`;
            })
            .catch(error => {
                result.innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
            })
            .finally(() => {
                hideLoading(); // Ocultar loading
            });
        }

    </script>
</body>
</html>