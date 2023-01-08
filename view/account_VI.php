<?php

class account_VI
{
    function main()
    {
        if (isset($_SESSION['pers_id'])) {
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
            
            $credit=$credit_MO->ConsultCreditActivedforCard($_SESSION['pers_id']);

            $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
        ?>
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
                                            <?php if ($diff->m > 0) {
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
        <?php
        }
    }
    function savingHistory()
    {
        if (isset($_SESSION['pers_id'])) {
            $conexion = new conexion("sel");

            require_once "model/saving_MO.php";
            require_once "model/person_MO.php";
            require_once "model/savingtotal_MO.php";

            $saving_MO = new saving_MO($conexion);
            $person_MO = new person_MO($conexion);
            $savingtotal_MO = new savingtotal_MO($conexion);

            $list = $saving_MO->consultSaving($_SESSION['pers_id']);
            $cant = $saving_MO->amount($_SESSION['pers_id']);
            $cant = ceil($cant[0]->total / 3);
            $data = $person_MO->consultPerson($_SESSION['pers_id']);
            $savingTotal = $savingtotal_MO->savingTotal($_SESSION['pers_id']);

            $current_day = new DateTime("now");
            $last_day = $savingtotal_MO->month($_SESSION['pers_id']);
            $last_day = new DateTime($last_day[0]->sato_month);
            $diff = $current_day->diff($last_day);
            if ($current_day < $last_day) {
                $diff->m = 0;
            }
            $month = $savingtotal_MO->month($_SESSION['pers_id']);
            $value_month=$month[0]->sato_value_month;
            $month = strtotime($month[0]->sato_month);
            $year = date('Y', $month);
            $mont = date('m', $month);
            if($year==2022)
            {
                $value_month=0;
            }
            if($year==2023 && $value_month==15000)
            {
                $value_month=0;
            }

            $listcant = 0;
            $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
            $fmt->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'COP');
            $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
        ?>
            <br>

            <div class="container">
                <div class="row">

                    <div class="col s12 m7">
                        <h4><?php echo ($data[0]->pers_name) ?> <?php echo ($data[0]->pers_lastname) ?></h4>
                        <h5><?php echo ($data[0]->pers_document) ?> </h5>
                        <h6><?php echo ($data[0]->pers_phone) ?> </h6>
                        <h6><?php echo ($data[0]->created_at) ?> </h6>
                    </div>
                    <div class="col s12 m5">
                        <div class="right-align">
                            <div class="card-money card-panel light-blue darken-3 brtc1 ">
                                <label for="ahorro" class="white-text">Total ahorro:</label>
                                <h3 id="ahorro" class="h6-cant white-text "><?php echo $fmt->formatCurrency($savingTotal[0]->sato_value, "COP");?></h3>
                            </div>

                            <?php
                            if ($diff->m > 0) {
                                $debt = $diff->m * 15000;
                                if($value_month)
                                {
                                    $debt=$debt+(15000-$value_month);
                                }
                            ?>
                                <div class="card-money card-panel orange darken-3 brtc1">
                                    <label for="deuda" class="white-text">Total deuda:</label>
                                    <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($debt, "COP");?></h3>
                                </div>
                            <?php
                            } 
                            else if($value_month && $current_day >= $last_day){
                                $debt=(15000-$value_month);
                                ?>
                                    <div class="card-money card-panel orange darken-3 brtc1">
                                        <label for="deuda" class="white-text">Total deuda:</label>
                                        <h3 id="deuda" class="h6-cant white-text"><?php echo $fmt->formatCurrency($debt, "COP") ?></h3>
                                    </div>
                                <?php
                            } 
                            else {
                            ?>
                                <div class="card-money card-panel teal brtc1">
                                    <h7 id="deuda" class="h6-cant white-text card-icon"><i class="material-icons card-icon left">check_circle</i>No hay deudas pendientes</h7>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col s12">
                        <div class="card-panel brtc1">
                            <h5>Historial de aportes</h5>
                            <table class="highlight responsive-table">
                                <thead>
                                    <th>Mes pagado</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                </thead>
                                <tbody class="click">
                                    <?php
                                    $printed=array(0=>'mes');
                                    foreach ($list as $saving) {
                                        $valor = $saving->saving_value;
                                        $fecha = $saving->saving_date;
                                        $fechaPago = $saving->saving_month;
                                        $ano = substr($fechaPago, 0, 4);
                                        $mes = substr($fechaPago, 5, 2);
                                        switch ($mes) {
                                            case '01':
                                                $mes = "Enero";
                                                break;
                                            case '02':
                                                $mes = "Febrero";
                                                break;
                                            case '03':
                                                $mes = "Marzo";
                                                break;
                                            case '04':
                                                $mes = "Abril";
                                                break;
                                            case '05':
                                                $mes = "Mayo";
                                                break;
                                            case '06':
                                                $mes = "Junio";
                                                break;
                                            case '07':
                                                $mes = "Julio";
                                                break;
                                            case '08':
                                                $mes = "Agosto";
                                                break;
                                            case '09':
                                                $mes = "Septimebre";
                                                break;
                                            case '10':
                                                $mes = "Octubre";
                                                break;
                                            case '11':
                                                $mes = "Noviembre";
                                                break;
                                            case '12':
                                                $mes = "Diciembre";
                                                break;
                                        }
                                        $search=$mes." ".$ano;
                                        if(in_array($search, $printed))
                                        {
                                            continue;
                                        }
                                        array_push($printed, $search);
                                        if($ano=='2023' && $valor<15000)
                                        {
                                            foreach ($list as $saving2)
                                            {
                                                $fechaPago2 = $saving2->saving_month;
                                                if(($fechaPago===$fechaPago2)&&($saving2->saving_id!=$saving->saving_id)){
                                                    $valor=$valor+$saving2->saving_value;
                                                }
                                            }
                                        }
                                    ?>
                                        <tr class="modal-trigger" data-target="modal<?php echo ($listcant) ?>">
                                            <td><?php echo ($mes) ?> <?php echo ($ano) ?></td>
                                            <td><?php echo $fmt->formatCurrency($valor, "COP");?></td>
                                            <td><?php echo ($fecha) ?></td>
                                        </tr>
                                    <?php
                                        $listcant++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="right-align" id="paginationButtons">

                            </div>
                        </div>
                    </div>

                    <?php
                    $listcant = 0;
                    $printed=array(0=>'mes');
                    foreach ($list as $saving) {
                        $codigo = $saving->saving_id;
                        $valor = $saving->saving_value;
                        $fecha = $saving->saving_date;
                        $descripcion = $saving->saving_description;
                        $registrador = $saving->saving_register;
                        $treasur = $saving->saving_treasur;
                        $fechaPago = $saving->saving_month;
                        $ano = substr($fechaPago, 0, 4);
                        $mes = substr($fechaPago, 5, 2);
                        switch ($mes) {
                            case '01':
                                $mes = "Enero";
                                break;
                            case '02':
                                $mes = "Febrero";
                                break;
                            case '03':
                                $mes = "Marzo";
                                break;
                            case '04':
                                $mes = "Abril";
                                break;
                            case '05':
                                $mes = "Mayo";
                                break;
                            case '06':
                                $mes = "Junio";
                                break;
                            case '07':
                                $mes = "Julio";
                                break;
                            case '08':
                                $mes = "Agosto";
                                break;
                            case '09':
                                $mes = "Septimebre";
                                break;
                            case '10':
                                $mes = "Octubre";
                                break;
                            case '11':
                                $mes = "Noviembre";
                                break;
                            case '12':
                                $mes = "Diciembre";
                                break;
                        }
                        $search=$mes." ".$ano;
                        if(in_array($search, $printed))
                        {
                            continue;
                        }
                        array_push($printed, $search);
                        if($ano=='2023' && $valor<15000)
                        {
                            $modal="<div id='modal".$listcant."' class='modal brtc1'>
                                    <div class='modal-content'>
                                        <h5>Informaci&oacuten de aporte (Este aporte contiene pagos parciales)</h5>
                                        <hr size='2px' color='black' />
                                        <h6><b>Código:</b> ".$codigo."</h6>
                                        <h6><b>Aportado por:</b> ".$data[0]->pers_name." ".$data[0]->pers_lastname."</h6>
                                        <h6><b>Mes pagado:</b> ".$mes." ".$ano."</h6>
                                        <h6><b>Valor:</b> ".$fmt->formatCurrency($valor, "COP")."</h6>
                                        <h6><b>Descripci&oacuten:</b> ".$descripcion."</h6>
                                        <h6><b>Fecha:</b> ".$fecha."</h6>
                                        <h6><b>Registrado por:</b> ".$registrador."</h6>
                                        <h6><b>Recibido por:</b> ".$treasur."</h6>
                                        <hr size='2px' color='black' />";
                            foreach ($list as $saving2)
                            {
                                $fechaPago2 = $saving2->saving_month;
                                if(($fechaPago===$fechaPago2)&&($saving2->saving_id!=$saving->saving_id)){
                                    $codigo = $saving2->saving_id;
                                    $valor = $saving2->saving_value;
                                    $fecha = $saving2->saving_date;
                                    $descripcion = $saving2->saving_description;
                                    $registrador = $saving2->saving_register;
                                    $treasur = $saving2->saving_treasur;
                                    $fechaPago = $saving2->saving_month;
                                    $ano = substr($fechaPago, 0, 4);
                                    $mes = substr($fechaPago, 5, 2);
                                    switch ($mes) {
                                        case '01':
                                            $mes = "Enero";
                                            break;
                                        case '02':
                                            $mes = "Febrero";
                                            break;
                                        case '03':
                                            $mes = "Marzo";
                                            break;
                                        case '04':
                                            $mes = "Abril";
                                            break;
                                        case '05':
                                            $mes = "Mayo";
                                            break;
                                        case '06':
                                            $mes = "Junio";
                                            break;
                                        case '07':
                                            $mes = "Julio";
                                            break;
                                        case '08':
                                            $mes = "Agosto";
                                            break;
                                        case '09':
                                            $mes = "Septimebre";
                                            break;
                                        case '10':
                                            $mes = "Octubre";
                                            break;
                                        case '11':
                                            $mes = "Noviembre";
                                            break;
                                        case '12':
                                            $mes = "Diciembre";
                                            break;
                                    }
                                    $modal=$modal."<h6><b>Código:</b> ".$codigo."</h6>
                                    <h6><b>Aportado por:</b> ".$data[0]->pers_name." ".$data[0]->pers_lastname."</h6>
                                    <h6><b>Mes pagado:</b> ".$mes." ".$ano."</h6>
                                    <h6><b>Valor:</b> ".$fmt->formatCurrency($valor, "COP")."</h6>
                                    <h6><b>Descripci&oacuten:</b> ".$descripcion."</h6>
                                    <h6><b>Fecha:</b> ".$fecha."</h6>
                                    <h6><b>Registrado por:</b> ".$registrador."</h6>
                                    <h6><b>Recibido por:</b> ".$treasur."</h6>
                                    <hr size='2px' color='black' />";
                                }
                            }
                            $modal=$modal."</div>
                            <div class='modal-footer'>
                                <a class='modal-close waves-effect waves-light btn light-blue darken-2 '>Aceptar</a>
                            </div>
                        </div>";
                        echo $modal;
                        continue;
                        }
                    ?>
                        <div id="modal<?php echo ($listcant) ?>" class="modal brtc1">
                            <div class="modal-content">
                                <h5>Informaci&oacuten de aporte</h5>
                                <h6><b>Código:</b> <?php echo ($codigo) ?></h6>
                                <h6><b>Aportado por:</b> <?php echo ($data[0]->pers_name) ?> <?php echo ($data[0]->pers_lastname) ?></h6>
                                <h6><b>Mes pagado:</b> <?php echo ($mes) ?> <?php echo ($ano) ?></h6>
                                <h6><b>Valor:</b> <?php echo $fmt->formatCurrency($valor, "COP");?></h6>
                                <h6><b>Descripci&oacuten:</b> <?php echo ($descripcion) ?></h6>
                                <h6><b>Fecha:</b> <?php echo ($fecha) ?></h6>
                                <h6><b>Registrado por:</b> <?php echo ($registrador) ?></h6>
                                <h6><b>Recibido por:</b> <?php echo ($treasur) ?></h6>
                            </div>
                            <div class="modal-footer">
                                <a class="modal-close waves-effect waves-light btn light-blue darken-2 ">Aceptar</a>
                            </div>
                        </div>
                    <?php
                        $listcant++;
                    }
                    ?>
                </div>
            </div>
            <script src="dist/js/pagination.js"></script>
            <script src="dist/js/button.js"></script>
            <script src="dist/js/modal.js"></script>
        <?php
        }
    }
    function creditSimulate()
    {
        ?>
        <br>

        <br>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel brtc1">
                        <h5>Simular cr&eacute;dito</h5>
                        <div class="row">

                            <form>

                                <div class="input-field col s12">

                                    <input id="monto" type="text" inputmode="numeric" onKeyPress="return validarMonto(event)" onchange="month();" maxlength="6" minlength="6" class="validate" required>
                                    <label for="monto">Monto:</label>
                                </div>
                                <div class="input-field col s12">


                                    <select id="meses" class="validate" onchange="valmonth()" required disabled>
                                        <option value="" selected disabled>Escriba un monto v&aacute;lido(100000-500000)</option>
                                    </select>
                                    <label for="meses">Meses:</label>
                                </div>
                                <div class="col s12 right-align">
                                    <button class=" btn  waves-effect waves-light light-blue darken-2" type="button" name="action" id="btnsimular" onclick="simular()" disabled>Simular
                                        <i lang="en" class="material-icons right">show_chart</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col s12" id="card-table"></div>
                
            </div>
        </div>
        <script src="dist/js/simulador.js"></script>
        <script>
            document.getElementById("btnsimular").disabled = true;
        </script>
        <?php
    }
    function creditApply()
    {

        $conexion = new conexion("sel");

        require_once "model/creditApply_MO.php";
        require_once "model/roleMenuPermit_MO.php";
        require_once "model/userRole_MO.php";
        require_once "model/savingtotal_MO.php";

        $creditApply_MO = new creditApply_MO($conexion);
        $userRole = new userRole_MO($conexion);
        $roleMenuPermit_MO = new roleMenuPermit_MO($conexion);
        $savingtotal_MO=new savingtotal_MO($conexion);

        $rol = $userRole->consultRole($_SESSION['pers_id']);
        $permit = $roleMenuPermit_MO->consultWriteApply($rol[0]->role_id);
        $write = false;
        foreach ($permit as $permits) {
            if ($permits->permit_id == '3') {
                $write = true;
            }
        }
        $result = $creditApply_MO->consultApply($_SESSION['pers_id'], 'not reviewed');

        $current_day = new DateTime("now");
        $last_day = $savingtotal_MO->month($_SESSION['pers_id']);
        $last_day = new DateTime($last_day[0]->sato_month);
        $diff = $current_day->diff($last_day);
        if ($current_day < $last_day) {
            $diff->m = 0;
        }

        if ($result) {
        ?>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel  brtc1">
                            <div class="center-align">
                                <i lang="en" class="large material-icons blue-text darken-3">access_time</i>
                                <h6>Usted ya tiene una solicitud en proceso, espere a recibir una respuesta de la junta para realizar otra solicitud</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if($diff->m > 0){
            ?>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel  brtc1">
                            <div class="center-align">
                                <i lang="en" class="large material-icons blue-text darken-3">error_outline</i>
                                <h6>Se&ntilde;or(a) Asociado. Recuerde que debe estar al d&iacute;a con los aportes para realizar una solicitud de cr&eacute;dito</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else {
        ?>

            <br>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel brtc1">
                            <h5>Solicitar cr&eacute;dito</h5>
                            <div class="row">

                                <form id="formSolicitar">

                                    <div class="input-field col s12">

                                        <input id="monto" name="monto" type="text" inputmode="numeric" onKeyPress="return validarNum(event)" onchange="month();" maxlength="6" minlength="6" class="validate" required>
                                        <label for="monto">Monto:</label>
                                    </div>
                                    <div class="input-field col s12">


                                        <select id="meses" name="meses" class="validate" onchange="valmonth()" required disabled>
                                            <option value="" selected disabled>Escriba un monto v&aacute;lido(100000-500000)</option>
                                        </select>
                                        <label for="meses">Meses:</label>
                                    </div>
                                    <div class="input-field col s12">

                                        <input id="dcCodeudor" name="dcCodeudor" type="text" inputmode="numeric" onKeyPress="return validarNum(event)" onchange="nameCodeudor();" maxlength="10" minlength="8" disabled required>
                                        <label for="dcCodedudor">Documento Codedudor:</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="Codeudor" name="codeudor" type="text" maxlength="100" minlength="1" class="validate" disabled required>
                                        <label for="Codedudor" id="labelName">Nombre Codedudor:</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <select name="uso" id="uso" onchange="usoDinero()" required disabled>
                                            <option value="" selected disabled>Escoja una opci&oacute;n</option>
                                            <option value="libre">Libre inversión</option>
                                            <option value="urgencia">Urgencia</option>
                                        </select>
                                        <label for="uso">Uso del cr&eacute;dito:</label>
                                    </div>
                                    <div class="input-field col s12" id="mensaje">
                                    </div>
                                    <?php
                                    if ($write) {
                                    ?>
                                        <div class="col s12 right-align">
                                            <button class=" btn  waves-effect waves-light light-blue darken-2" type="button" name="action" id="btnsolicitar" onclick="solicitar()" disabled>Solicitar
                                                <i lang="en" class="material-icons right">attach_money</i>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            if ($write) {
            ?>
                <script src="dist/js/solicitud.js"></script>
        <?php
            }
        }
    }
    function changePass()
    {
        ?>

        <br>
        <div class="container">
            <h5>Configuraci&oacuten</h5>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel brtc1">
                        <h6>Cambiar contrase&ntildea</h6>
                        <form id="cpform">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="password" name="passv" id="passv" autocomplete="current-password" minlength="8" class="validate" required>
                                    <label for="passv">Contrase&ntildea antigua:</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" name="passn1" id="passn1" autocomplete="new-password" onchange="newPass();" class="">
                                    <label for="passn1">Nueva contrase&ntildea:</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" name="passn2" id="passn2" autocomplete="new-password" onchange="newPass();" class="">
                                    <label for="passn2">Confirmar contrase&ntildea:</label>
                                </div>
                            </div>
                        </form>
                        <div class="right-align">
                            <button class=" btn  waves-effect waves-light light-blue darken-2" type="button" id="btncc" name="action" onclick="fcc()">Cambiar
                                <i lang="en" class="material-icons right">vpn_key</i>
                            </button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="dist/js/button.js"></script>
        <script src="dist/js/changePass.js"></script>
        <?php
    }
    function creditActive()
    {
        require_once "model/credit_MO.php";
        require_once "model/payment_MO.php";

        $conexion=new conexion("sel");

        $credit_MO=new credit_MO($conexion);
        $payment_MO=new payment_MO($conexion);

        $result = $credit_MO->ConsultCreditActived($_SESSION['pers_id']);
        
        if($result)
        {
            $collection = $credit_MO->ConsultCollection($result[0]->credit_id);
            $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
            $fmt->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'COP');
            $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
            
            $dateCut=new DateTime($result[0]->credit_date_cut_first);
            $dateCutEnd=new DateTime($result[0]->credit_date_cut_end);
            $current_day=new Datetime("now");

            $saldo=$result[0]->credit_capital_debt-$result[0]->credit_capital_payd;

            $int=0.02;
            $cuotanormal=round(($int*($result[0]->credit_capital_debt-$result[0]->credit_capital_payd))/(1-((1+$int)**(-($result[0]->credit_period-$result[0]->credit_period_payd)))));
            $mora=0;
            $capital=0;
            $interest=0;
            $mora1=0;
            $capital1=0;
            $interest1=0;

            // $diff=$current_day->diff($dateCutEnd);
            
            // if($dateCutEnd>$current_day){
            //     $diff->d=0;
            // } 

            // $payd=$cuota+($diff->d*1000);
            $payment=$payment_MO->consultPayWithCreditId($result[0]->credit_id);
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col s12 card-money  card-panel brtc1">
                        <div class="col s12 m6">
                            
                            <label for="saldo" class="creditLabel">Saldo:</label>
                            <h3 id="saldo" class="h6-cant"><?php echo $fmt->formatCurrency($saldo, "COP");?></h3>
                        </div>
                        <div class="col s12 m6">

                            <?php
                            if($dateCut>$current_day){
                                ?>
                                
                                <br>
                                <div class="card-money card-panel teal brtc1">
                                    <h7 id="deuda" class="h6-cant white-text card-icon"><i class="material-icons card-icon left">check_circle</i> No hay deudas pendientes</h7>
                                </div>
                                <?php
                            }
                            else{
                                $cuota=0;
                                foreach($collection as $cobro)
                                {
                                    $hoy = strtotime(date('d-m-Y'));
                                    if(strtotime($cobro->collection_date_first)<=$hoy && strtotime($cobro->collection_date_end)>=$hoy && $cobro->collection_state=="debt")
                                    {
                                        $cuota=$cuota+$cobro->collection_debt;
                                        if($capital==0){
                                            $capital1=$cobro->collection_debt_capital;
                                        }
                                        if($interest==0){
                                            $interest1=$cobro->collection_debt_interest;
                                        }
                                        $capital=$capital+$cobro->collection_debt_capital;
                                        $interest=$interest+$cobro->collection_debt_interest;
                                    }
                                    if(strtotime($cobro->collection_date_end)<$hoy && $cobro->collection_state=="debt")
                                    {
                                        if($capital==0){
                                            $capital1=$cobro->collection_debt_capital;
                                        }
                                        if($interest==0){
                                            $interest1=$cobro->collection_debt_interest;
                                        }
                                        
                                        $cuota=$cuota+$cobro->collection_debt;
                                        $capital=$capital+$cobro->collection_debt_capital;
                                        $interest=$interest+$cobro->collection_debt_interest;
                                        $diff=$current_day->diff(new DateTime($cobro->collection_date_end));
                                        if($mora==0){
                                            $mora1=$diff->days;
                                        }
                                        $mora=$mora+$diff->days;
                                    }
                                }
                                $payd=$cuota+($mora*300);
                                ?>
                                <div class="click card-money card-panel orange darken-3 brtc1 modal-trigger" href="#modalcobro">
                                    <label for="deuda" class="white-text creditLabel">Total a pagar:</label>
                                    <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($payd, "COP");?></h3>
                                </div>
                                <?php
                            } 
                            ?>
                            
                        </div>
                    </div>
                    <div class="col s12 card-panel card-money brtc1">
                        <div class="col s6 m6">
                            <label for="capitalPagado">Capital Pagado:</label>
                            <h4 id="capitalPagado" class="dataCredit"><?php  echo $fmt->formatCurrency($result[0]->credit_capital_payd, "COP");?></h4>
                        </div>
                        <div class="col s6 m6">
                            <label for="interesPagado">Intereses Pagados:</label>
                            <h4 id="interesPagado" class="dataCredit"><?php  echo $fmt->formatCurrency($result[0]->credit_interest_payd, "COP");?></h4>
                        </div>
                        <!-- <div class="col s12">
                            <hr>
                        </div> -->
                        <div class="col s6 m6">
                            <label for="valorCuota">Valor Cuota:</label>
                            <h4 id="valorCuota" class="dataCredit"><?php  echo $fmt->formatCurrency($cuotanormal, "COP");?></h4>
                        </div>
                        <div class="col s6 m6">
                            <label for="cuotasPagadas">Mora:</label>
                            <h4 id="cuotasPagadas" class="dataCredit"><?php echo $mora?> D&iacute;as</h4>
                        </div>
                        <div class="col s12 m6">
                            <label for="fechaCorte">Fecha Corte:</label>
                            <h4 id="fechaCorte" class="dataCredit"><?php  echo $result[0]->credit_date_cut_first?></h4>
                        </div>
                    </div>
                    <?php
                    if($payment)
                    {
                        foreach($payment as $pago)
                        {
                            ?>
                            <div id="modal<?php echo  $result[0]->credit_id;echo $pago->pay_period  ?>" class="modal brtc1 modal-fixed-footer">
                                <div class="modal-content">
                                    <h5>Informaci&oacuten de pago</h5>
                                    <h6><b>Código pago:</b> <?php echo ($pago->pay_id) ?></h6>
                                    <h6><b>Código crédito:</b> <?php echo $pago->credit_id ?></h6>
                                    <h6><b>Fecha:</b> <?php echo $pago->pay_date ?></h6>
                                    <h6><b>Periodo:</b> <?php echo $pago->pay_period ?></h6>
                                    <h6><b>Valor total:</b><?php  echo $fmt->formatCurrency($pago->pay_value_total, "COP");?></h6>
                                    <h6><b>Valor capital:</b><?php  echo $fmt->formatCurrency($pago->pay_value_capital, "COP");?></h6>
                                    <h6><b>Valor interes:</b><?php  echo $fmt->formatCurrency($pago->pay_value_interest, "COP");?></h6>
                                    <h6><b>Valor mora:</b><?php  echo $fmt->formatCurrency($pago->pay_value_arrears, "COP");?></h6>
                                    <h6><b>Valor excedente:</b><?php  echo $fmt->formatCurrency($pago->pay_surplus, "COP");?></h6>
                                    <h6><b>Registrado por:</b> <?php echo ($pago->pay_register) ?></h6>
                                    <h6><b>Recibido por:</b> <?php echo ($pago->pay_treasurer) ?></h6>
                                </div>
                                <div class="modal-footer">
                                    <a class="modal-close waves-effect waves-light btn light-blue darken-2 ">Aceptar</a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    foreach($collection as $cobro)
                    {
                        $hoy = strtotime(date('d-m-Y'));
                        $dias=0;
                        if(strtotime($cobro->collection_date_end)<$hoy && $cobro->collection_state=="debt")
                        {
                            $diff=$current_day->diff(new DateTime($cobro->collection_date_end));
                            $dias=$diff->days;
                        }
                        if($cobro->collection_state=="debt")
                        {
                            ?>
                            <div id="modal<?php echo $result[0]->credit_id;echo $cobro->collection_period  ?>" class="modal brtc1 modal-fixed-footer">
                                <div class="modal-content">
                                    <h5>Informaci&oacuten de cobro</h5>
                                    <h6><b>Fecha de cobro:</b> <?php echo $cobro->collection_date_first ?></h6>
                                    <h6><b>Pago oportuno:</b> antes de  <?php echo $cobro->collection_date_end ?></h6>
                                    <h6><b>Numero cuota:</b> <?php echo $cobro->collection_period ?></h6>
                                    <h6><b>Valor total:</b><?php  echo $fmt->formatCurrency((($dias*300)+$cobro->collection_debt), "COP");?></h6>
                                    <h6><b>Valor capital:</b><?php  echo $fmt->formatCurrency($cobro->collection_debt_capital, "COP");?></h6>
                                    <h6><b>Valor interes:</b><?php  echo $fmt->formatCurrency($cobro->collection_debt_interest, "COP");?></h6>
                                    <h6><b>Valor mora:</b><?php  echo $fmt->formatCurrency(($dias*300), "COP");?> (<?php  echo $dias?> Días)</h6>
                                </div>
                                <div class="modal-footer">
                                    <a class="modal-close waves-effect waves-light btn light-blue darken-2 ">Aceptar</a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="col s12 card-panel card-money brtc1">
                        <h5>Historial de pagos</h5>
                        <h6>
                            <i class="green-text text-darken-3 tiny material-icons">check_circle</i>Pagado   
                            <i class="grey-text text-darken-3 tiny material-icons">do_not_disturb_on</i>No cobrado 
                            <i class="yellow-text text-darken-3 tiny material-icons">radio_button_checked</i>Actual 
                            <i class="red-text text-darken-3 tiny material-icons">cancel</i>Atrasado 
                        </h6>
                        <table class="highlight ">
                            <thead>
                                <tr>
                                    <td class="center">Estado</td>
                                    <td class="center">Fecha</td>
                                    <td class="center">Cuota</td>
                                    <td class="center">Valor</td>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                $hoy = strtotime(date('d-m-Y'));
                                foreach($collection as $cobro)
                                {
                                    $dias=0;
                                    $valor=0;
                                    $trClass="class='click modal-trigger' data-target='modal".$result[0]->credit_id."$cobro->collection_period'";   
                                    if($cobro->collection_state=="payd")
                                    {
                                        $class="green-text text-darken-3";
                                        $icon="check_circle";
                                        $trClass="class='click modal-trigger' data-target='modal".$result[0]->credit_id."$cobro->collection_period'";
                                        $consult=$payment_MO->consultPayWithCreditIdAndPeriod($result[0]->credit_id,$cobro->collection_period);
                                        $valor=$consult[0]->pay_value_total;
                                    }
                                    if(strtotime($cobro->collection_date_first)>$hoy && $cobro->collection_state=="debt")
                                    {
                                        $class="grey-text text-darken-3";
                                        $icon="do_not_disturb_on";
                                    }
                                    if(strtotime($cobro->collection_date_first)<=$hoy && strtotime($cobro->collection_date_end)>=$hoy && $cobro->collection_state=="debt")
                                    {
                                        $class="yellow-text text-darken-3";
                                        $icon="radio_button_checked";
                                    }
                                    if(strtotime($cobro->collection_date_end)<$hoy && $cobro->collection_state=="debt")
                                    {
                                        $class="red-text text-darken-3";
                                        $icon="cancel";
                                        $diff=$current_day->diff(new DateTime($cobro->collection_date_end));
                                        $dias=$diff->days;
                                    }
                                    if($cobro->collection_state=="debt")
                                    {
                                        $valor=($dias*300)+$cobro->collection_debt;
                                    }
                                    ?>
                                    <!-- class="modal-trigger" data-target="modal<?php echo $cobro->collection_id ?>" -->
                                     <tr <?php echo $trClass;?>> 
                                        <td class="center"><i class="<?php echo $class ?> material-icons"><?php echo $icon ?></i></td>
                                        <td class="center"><?php echo $cobro->collection_date_first?></td>
                                        <td class="center"><?php echo $cobro->collection_period?></td>
                                        <td class="center"><?php  echo $fmt->formatCurrency($valor, "COP");?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
            <div id="modalcobro" class="modal brtc1">
                <div class="modal-content">
                    <h5>Factura cobro</h5>
                    <div class="row">
                        <div class="col s12">
                            <label for="totalcobro">Total:</label>
                            <h4 id="totalcobro"><?php  echo $fmt->formatCurrency($payd, "COP");?></h4>
                        </div>
                        <div class="col s12">
                            <label for="capitalcobro">Capital:</label>
                            <h5 id="capitalcobro"><?php  echo $fmt->formatCurrency($capital, "COP");?></h5>
                        </div>
                        <div class="col s12">
                            <label for="interescobro">Interes:</label>
                            <h5 id="interescobro"><?php  echo $fmt->formatCurrency($interest, "COP");?></h5>
                        </div>
                        <div class="col s12">
                            <label for="moracobro">Mora:</label>
                            <h5 id="moracobro"><?php  echo ($fmt->formatCurrency($mora*300, "COP")." (".$mora." Días)"); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <a  class=" btn modal-close waves-effect waves-light light-blue darken-2 " >Aceptar</a>
                </div>
            </div>
            <script src="dist/js/modal.js"></script>
            <?php
        }
        else
        {
            ?>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel  brtc1">
                            <div class="center-align">
                                <i lang="en" class="large material-icons blue-text text-light-blue text-darken-2">check_circle</i>
                                <h6>Usted no tiene creditos activos por ahora</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
?>