<?php
class login_VI
{
    function __construct()
    {
    }

    function log_in()
    {

?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="dist/css/materialize.min.css">
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <link rel="stylesheet" href="dist/css/log.css">
            <title>ASOFAMILIA</title>
        </head>

        <body>
            <header>
            </header>
            <main>
                <div class="container  box">

                    <div class="col s12 card-panel">
                        <h5 class="center-align">Ingresar</h5>
                        <br>
                        <form id="logForm" method="post" onsubmit="return valiLog()">
                            <div class="col s12 input-field ">
                                <i lang="en" class="material-icons prefix">person</i>
                                <input type="text" id="user" inputmode="numeric" onKeyPress="return validarUser(event)" autocomplete="username" maxlength="10" minlength="8" name="username" class="validate" required>
                                <label for="user">usuario</label>

                            </div>
                            <div class="row">
                                <div class="col s11 input-field">
                                    <i lang="en" class="material-icons prefix">vpn_key</i>
                                    <input type="password" id="pas" name="userpassword" maxlength="45" minlength="8" class="validate" autocomplete="current-password" required>

                                    <label for="pas">contraseña</label>
                                </div>
                                <br><a onclick="viewPass();"><i lang="en" id="eye" class=" material-icons nac cursor ">visibility_off</i></a>
                            </div>
                            <div class="center-align col s12 right-align">
                                <button class="btn waves-effect waves-light " type="submit" name="btnlogin" lang="es">Iniciar sesión<i lang="en" class="material-icons left">send</i></button>

                            </div>
                        </form>
                        <br>
                    </div>
                </div>

                </div>
            </main>
            <footer>
            </footer>




            <!-- JQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <!-- Compiled and minified JavaScript -->
            <script src="dist/js/materialize.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="dist/js/log.js"></script>
        </body>

        </html>
<?php
    }
}
?>