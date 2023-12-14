    <style>

        body::before {
            content: "";
            background-image: url('./app/img/playa.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(6px); /* Cambia "5px" por la cantidad de desenfoque deseada */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
        }

        body {
            color: #414467;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container{
            text-align: center;
        }

        #back{
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top:10px;
            left: 10px;
            background-color: #6F7789;
            aspect-ratio: 1/1;
            width: 3%;
            border:none;
            border-radius: 10px;
            cursor:pointer;
        }

        #close{
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top:10px;
            right: 10px;
            background-color: #3E0900;
            aspect-ratio: 2/1;
            width: 8%;
            border:none;
            border-radius: 10px;
            color:#FFF5DD;
            cursor:pointer;
            font-family: 'Poppins', sans-serif; 
        }
        
    </style>
</head>
<body>
<?php 
        if (isset($_SESSION['perfil'])) {
            echo '<button id="close" onclick="window.location.href = \'index.php?controller=login&action=cerrarSesion\'"> Cerrar Sesión</button>';
        }
    ?>
<?php
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 's') {
    echo '<button id="back" onclick="window.location.href =\'index.php?controller=login&action=redireccionar&vista=super\'"> <img width="80%" src="./app/img/back.png" alt="back"> </button>';
}
?>
<div class="container">
            <?php
            if (isset($_SESSION['nombre'])) {
                echo '<h1>' . $_SESSION['nombre'] . '</h1>';
                echo '<p>Bienvenido a Trash Invader</p>';
            } else {
                echo '<p>No se ha iniciado sesión</p>';
            }
            ?>
        </div>
</body>
</html>