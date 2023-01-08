<?php
class dashboard
{
    function __construct()
    {
    }

    function app()
    {
        $conexion = new conexion("sel");
        require_once "model/person_MO.php";
        require_once "model/savingtotal_MO.php";
        require_once "model/userRole_MO.php";
        require_once "model/roleMenuPermit_MO.php";
        require_once "model/menu_MO.php";
        require_once "model/credit_MO.php";

        $person_MO = new person_MO($conexion);
        $savingtotal_MO = new savingtotal_MO($conexion);
        $userRole = new userRole_MO($conexion);
        $rmp = new roleMenuPermit_MO($conexion);
        $menu_MO = new menu_MO($conexion);
        $credit_MO=new credit_MO($conexion);

        $name = $person_MO->consultName($_SESSION['pers_id']);
        $current_day = new DateTime("now");
        $consult_last_day = $savingtotal_MO->month($_SESSION['pers_id']);
        $last_day = new DateTime($consult_last_day[0]->sato_month);
        $diff = $current_day->diff($last_day);
        if ($current_day < $last_day) {
            $diff->m = 0;
        }
        $card = $savingtotal_MO->saving($_SESSION['pers_id']);
        $rol = $userRole->consultRole($_SESSION['pers_id']);
        $menu = $rmp->consultRead($rol[0]->role_id);
        $credit=$credit_MO->ConsultCreditActivedforCard($_SESSION['pers_id']);

        $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
        
        

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
            
            <link rel="stylesheet" href="dist/css/sidenav.css">
            <link rel="stylesheet" href="dist/css/style1.css">
            <link rel="stylesheet" href="dist/css/preloader.css">
            <title>ASOFAMILIA</title>
        </head>

        <body>
            <header>
                <div class="navbar-fixed">
                    <nav class="navbar white">
                        <div class="nav-wrapper">
                            <a class="brand-logo black-text click" onclick="pages('account_VI/main')">AsoFamilia</a>
                            <a data-target="sidenav-left" class="sidenav-trigger left">
                                <i class="click material-icons black-text">menu</i>
                            </a>
                        </div>
                    </nav>
                </div>
                <ul id="sidenav-left" class="sidenav sidenav-fixed">
                    <li>
                        <div class="user-view end">

                            <a><span class="name black-text"><b><?php echo ($name[0]->pers_name) ?> <?php echo ($name[0]->pers_lastname) ?></b></span></a>

                        </div>
                    </li>
                    <?php if ($rol[0]->role_id == 1) {
                        foreach ($menu as $option) {
                            $opt = $menu_MO->options($option->menu_id, 'my_account');
                            if ($opt) {
                    ?>
                                <li><a class="end click sidenav-close" onclick="pages('<?php echo $opt[0]->menu_route ?>')"><?php echo $opt[0]->menu_name ?><i class="material-icons item-icon"><?php echo $opt[0]->menu_icon ?></i></a></li>
                        <?php
                            }
                        }
                        ?>

                        <li><a class="end click" onclick="log_out()">SALIR <i class="material-icons rigth item-icon">exit_to_app</i></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li>
                                    <a class="collapsible-header">MI CUENTA<i class="material-icons right dicon">keyboard_arrow_down</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <?php
                                            foreach ($menu as $option) {
                                                $opt = $menu_MO->options($option->menu_id, 'my_account');
                                                if ($opt) {
                                            ?>
                                                    <li><a class="click sidenav-close" onclick="pages('<?php echo $opt[0]->menu_route ?>')"><?php echo $opt[0]->menu_name ?><i class="material-icons item-icon"><?php echo $opt[0]->menu_icon ?></i></a></li>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="collapsible-header">ASOCIACI&Oacute;N<i class="material-icons right dicon">keyboard_arrow_down</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <?php
                                            foreach ($menu as $option) {
                                                $opt = $menu_MO->options($option->menu_id, 'association');
                                                if ($opt) {
                                            ?>
                                                    <li><a class="click sidenav-close" onclick="pages('<?php echo $opt[0]->menu_route ?>')"><?php echo $opt[0]->menu_name ?><i class="material-icons item-icon"><?php echo $opt[0]->menu_icon ?></i></a></li>
                                            <?php

                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="end click" onclick="log_out()">SALIR <i class="material-icons rigth item-icon">exit_to_app</i></a>
                        </li>
                    <?php
                    } ?>
                </ul>


            </header>
            <main id="content">
                
                <div class="container-cards">
                    <br>
                    <br class="hide-on-med-and-down">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card small card-basic brtc click" onclick="pages('account_VI/savingHistory');">

                                <div class="card-content white-text">
                                    <img src="dist/img/card/map.png" class="map-img">
                                    
                                    <div class="row">
                                        <div class="col s12">
                                            <span class="card-title">Aportes</span>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col s2">
                                            <br>
                                            <img src="dist/img/card/chip.png" width="50px" class="chip-img">
                                        </div>
                                        <div class="col s10 right-align">
                                            <label class="cards-label" for="ahorro">Total ahorro:</label>
                                            <h3 id="ahorro" class="h6-cant-card"><?php
                                            $fmt->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'COP');
                                            $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                            echo $fmt->formatCurrency($card[0]->sato_value, "COP");?></h3>
                                        </div>
                                    </div>
                                    <div class="left-align">
                                        <label class="cards-label" for="ult">Ultimo aporte:</label>
                                        <h5 id="ult" class="h6-cant-card"><?php echo ($card[0]->updated_at) ?>
                                            <?php if ($diff->m > 0 ) {
                                            ?>
                                                <i class="deuda-icon material-icons right">error</i>
                                            <?php
                                            }
                                            if($consult_last_day[0]->sato_value_month<15000 &&  $current_day >= $last_day)
                                            {
                                                ?>
                                                <i class="deuda-icon material-icons right">error</i>
                                                <?php
                                            } 
                                            else {
                                            ?>
                                                <i class="deuda-icon material-icons right">check_circle</i>
                                            <?php
                                            } ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($credit)
                        {
                            $dateCut=new DateTime($credit[0]->credit_date_cut_first);
                            $current_day=new Datetime("now");

                            $saldo=$credit[0]->credit_capital_debt-$credit[0]->credit_capital_payd;
                            ?>
                            <div class="col s12 m6">
                                <div class="card small card-gold brtc click" onclick="pages('account_VI/creditActive');">

                                    <div class="card-content white-text">
                                        <img src="dist/img/card/map2-bg.png" class="map-img">
                                        
                                        <div class="row">
                                            <div class="col s12">
                                                <span class="card-title">Cr&eacute;dito</span>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col s2">
                                                <br>
                                                <img src="dist/img/card/chip.png" width="50px" class="chip-img">
                                            </div>
                                            <div class="col s10 right-align">
                                                <label class="cards-label" for="ahorro">Saldo:</label>
                                                <h3 id="ahorro" class="h6-cant-card"><?php
                                                $fmt->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'COP');
                                                $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                                                echo $fmt->formatCurrency($saldo, "COP");?></h3>
                                            </div>
                                        </div>
                                        <div class="left-align">
                                            <label class="cards-label" for="ult">Fecha de corte:</label>
                                            <h5 id="ult" class="h6-cant-card"><?php echo ($credit[0]->credit_date_cut_first) ?>
                                                <?php if ($dateCut>$current_day) {
                                                ?>
                                                    <i class="deuda-icon material-icons right">check_circle</i>
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="deuda-icon material-icons right">error</i>
                                                <?php
                                                } ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } 
                        ?>
                    </div>
                </div>
            </main>
            <footer></footer>
            <!-- JQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <!-- Compiled and minified JavaScript -->
            <script src="dist/js/materialize.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="dist/js/sideini.js"></script>
            <script src="dist/js/function.js"></script>
            <script src="dist/js/button.js"></script>
        </body>

        </html>
<?php
    }
}
?>