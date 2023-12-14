    <style>
        /* Estilos CSS para centrar el contenido */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #FFF5DD;
        }

        header {
            font-family: 'Poppins' , sans-serif;
            background-color: #FFF5DD;
            text-align: center;
            height: 8%;
        }

        h1,p{
            margin:5px;
        }

        .container {
            text-align: center;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            flex: 1; /* Hace que ocupe todo el espacio disponible */
            margin: 10px;
            background-color: #FFF5DD;
        }

        .item {
            position:relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            text-align: center;
            transition: background-color 0.3s ease;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            filter:blur(1px);
            box-shadow: 4px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .item a {
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: inherit;
            z-index: 1;
        }

        .item-1 {
            background-image: url('./app/img/view.png');

        }

        .item-2 {
            background-image: url('./app/img/trash.jpg');

        }

        .item-3 {
            background-image: url('./app/img/citykids.png');

        }

        .item-4 {
            background-image: url('./app/img/game.webp');
        }
        #add{
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top:10px;
            right: 10px;
            background-color: #FCC34D;
            aspect-ratio: 2/1;
            height: 7vh;
            border:none;
            border-radius: 10px;
            color:#FFF5DD;
            cursor:pointer;
            font-family: 'Poppins', sans-serif;
        }
        #close{
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top:10px;
            left: 10px;
            background-color: #3E0900;
            aspect-ratio: 2/1;
            height: 7vh;
            border:none;
            border-radius: 10px;
            color:#FFF5DD;
            cursor:pointer;
            font-family: 'Poppins', sans-serif; 
        }

    </style>
</head>
<body>
    <header>
        
    <button id="close" onclick="window.location.href = 'index.php?controller=login&action=cerrarSesion'"> Cerrar Sesión</button>
        <div class="container">
            <?php
            if (isset($_SESSION['nombre'])) {
                echo '<h1>' . $_SESSION['nombre'] . '</h1>';
                echo '<p>Bienvenido super usuario</p>';
            } else {
                echo '<p>No se ha iniciado sesión</p>';
            }
            ?>
        </div>
        <button id="add" onclick="window.location.href = 'index.php?controller=login&action=registrarAdmMinijuego'"> Añadir Admins</button>
    </header>
    <div class="grid-container">
        <div class="item item-1"><a href="index.php?controller=login&action=redireccionar&vista=cultural"></a></div>
        <div class="item item-2"><a href="index.php?controller=login&action=redireccionar&vista=trash"></a></div>
        <div class="item item-3"><a href="index.php?controller=login&action=redireccionar&vista=citykids"></a></div>
        <div class="item item-4"><a href="index.php?controller=login&action=redireccionar&vista=pixel"></a></div>
    </div>
</body>
</html>
