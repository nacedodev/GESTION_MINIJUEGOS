    <style>
        body{
            background-color: #252637;
            color: #6F7789;
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
            echo '<p>Bienvenido a Cultural Chain</p>';
        } else {
            echo '<p>No se ha iniciado sesión</p>';
        }
        ?>
    </div>
</body>
</html>