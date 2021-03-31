<?php 
//  session_start();
// header('Location: index.php?ruta=inicio');
 
//  if (isset($_SESSION['sessionStart'])) {
//      echo '<p>algo esta de la magle</p>';
//     //  header('Location: index.php?ruta=inicio');
//  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" />
    <meta name="author" content="El Colegio de San Luis - UTIC" />
    <meta name="theme-color" content="#ffffff" />
    <title>El Colegio de San Luis :: Apps</title>
    <!-- Loading Indicator -->
    <!-- <script src="assets/js/pace.min.js"></script> -->
    <!-- <link href="assets/css/pace.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="./assets/css/fomantic.css">
</head>

<body id="root">
    <div class="container">
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui raised very padded text container segment">
            <div class="column">
                <h2 class="ui teal image header">
                    <!-- <img src="assets/images/logo.png" class="image"> -->
                    <div class="content">
                        Ingresa tu cuenta
                    </div>
                </h2>
                <form class="ui large form" id="formLogin">
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input id="txtEmail" type="email" name="username" placeholder="Correo electronico o nombre usuario">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input id="txtPassword" type="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="ui fluid large teal submit button">Login</div>
                    </div>

                    <div class="ui error message"></div>

                </form>

                <div class="ui message">
                    Eres nuevo? <a href="#">Registraste</a>
                </div>
            </div>
        </div>
    </div>
    <input type='hidden' name='HFSessionStart' id="HFSessionStart" value="" />




    </div><!-- End pusher -->
    </div><!-- End main container -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
    <script src="https://kit.fontawesome.com/d27fce1847.js" crossorigin="anonymous"></script>
    <script src="assets/plugins/waitme/waitMe.js"></script>
    <!-- <script src="assets/js/g-master.js"></script> -->
    <script src="assets/js/p-login.js"></script>

</body>

</html>