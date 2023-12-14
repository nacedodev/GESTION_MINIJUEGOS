    <!--Stylesheet-->
    <style>
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body{
    background-color: #252637;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #F4C01A
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 450px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 20px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
#error{
    text-align: center;
    color: white;
    font-size: 1vw;
    font-family: 'Poppins', sans-serif;
    text-shadow: 2px 2px 4px #ff512f;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 23%;
    left: 50%;
}

        input[type='text'],
        input[type='password'] {
            transition: border-color 0.6s ease, filter 0.6s ease;
        }

        input[type='text']:focus,
        input[type='password']:focus {
            border: 2px solid white;
            filter: drop-shadow(0 0 0.2em white);
        }

        input[type='text']:focus::placeholder,
        input[type='password']:focus::placeholder {
            animation: hidetext 0.3s ease;
        }


        input::placeholder {
            opacity: 0.1; /* Aquí puedes ajustar el valor de opacidad según tus necesidades */
        }
        
        @keyframes hidetext{
            0%{
                opacity: 0.1;
            }
            100%{
                opacity: 0;
            }
        }

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <?php if(isset($_GET['mensaje'])): ?> <!-- Si nos llega algún tipo de mensaje desde el controlador , lo mostramos-->
        <p id="error"><?php echo $_GET['mensaje']; ?></p>
    <?php endif; ?>
    <form method="post" action="index.php?controller=login&action=verificarCredenciales">
    <h3>Login</h3>
    
        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

