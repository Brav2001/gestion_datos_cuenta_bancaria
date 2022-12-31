<?php
class admin_VI
{
    function addPerson()
    {
        $conexion = new conexion("sel");


        require_once "model/roleMenuPermit_MO.php";
        require_once "model/userRole_MO.php";
        require_once "model/role_MO.php";

        $userRole = new userRole_MO($conexion);
        $roleMenuPermit_MO = new roleMenuPermit_MO($conexion);
        $role_MO = new role_MO($conexion);

        $role = $role_MO->consultRole();

        $rol = $userRole->consultRole($_SESSION['pers_id']);
        $permit = $roleMenuPermit_MO->consultWriteAddPerson($rol[0]->role_id);
        $write = false;
        foreach ($permit as $permits) {
            if ($permits->permit_id == '3') {
                $write = true;
            }
        }
        if ($write) {
        ?>
            <br>
            <br>
            <div class="container">
                <div class="card-panel brtc1">
                    <h5>AGREGAR ASOCIADO</h5>
                    <form id="aggAsociados">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="names" name="names" type="text" maxlength="50" minlength="2" class="validate" required>
                                <label for="names">Nombres:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="surnames" name="surnames" type="text" maxlength="50" minlength="2" class="validate" required>
                                <label for="surnames">Apellidos:</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="document" name="document" inputmode="numeric" onKeyPress="return validar(event)" type="text" maxlength="10" minlength="8" class="validate" required>
                                <label for="document">Documento:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="phone" name="phone" type="text" inputmode="numeric" onKeyPress="return validar(event)" maxlength="10" minlength="10" class="validate" required>
                                <label for="phone">Celular:</label>
                            </div>
                            <div class="input-field col s12">
                                <select name="cargo" id="cargo" required>
                                    <option value="" disabled selected>Escoja una opci&oacuten</option>
                                    <?php
                                    if ($role) {
                                        foreach ($role as $cargo) {
                                    ?>
                                            <option value="<?php echo $cargo->role_id ?>"><?php echo $cargo->role_name ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <label>Cargo</label>
                            </div>
                        </div>
                        <div class="right-align">
                            <button class=" btn  waves-effect waves-light light-blue darken-2" type="button" id="svAsociados" name="action" onclick="add()">Guardar
                                <i lang="en" class="material-icons right">save</i>
                            </button>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
            <script src="dist/js/sideini.js"></script>
            <script src="dist/js/addPerson.js"></script>
        <?php
        } else {
        ?>
            <script>
                $.post('user_CO/log_out', function() {
                    location.href = "index.php";
                })
            </script>
        <?php
        }
    }
    function savingListPerson()
    {
        $conexion = new conexion("sel");

        require_once "model/person_MO.php";
        require_once "model/savingtotal_MO.php";


        $person_MO = new person_MO($conexion);
        $savingtotal_MO = new savingtotal_MO($conexion);

        $listPerson = $person_MO->listAllPerson();
        $current_day = new DateTime("now");
        ?>
        <div class="container">
            <h5>LISTA ASOCIADOS</h5>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel size brtc1">
                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th class="hide-on-med-and-down">Documento</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th class="hide-on-med-and-down">Celular</th>
                                    <th class="center">Deuda</th>
                                </tr>
                            </thead>

                            <tbody class="click ">
                                <?php
                                foreach ($listPerson as $person) {
                                    $last_day = $savingtotal_MO->month($person->pers_id);
                                    $last_day = new DateTime($last_day[0]->sato_month);
                                    $diff = $current_day->diff($last_day);
                                    if ($current_day < $last_day) {
                                        $diff->m = 0;
                                    }
                                    $icon = 'check_circle';
                                    $class = 'green-text  text-darken-3';
                                    if ($diff->m > 0) {
                                        $icon = 'error';
                                        $class = 'orange-text text-darken-3';
                                    }

                                ?>
                                    <tr onclick="infSavingPerson(<?php echo ($person->pers_id) ?>)">
                                        <td class="hide-on-med-and-down"><?php echo ($person->pers_document) ?></td>
                                        <td><?php echo ($person->pers_name) ?></td>
                                        <td><?php echo ($person->pers_lastname) ?></td>
                                        <td class="hide-on-med-and-down"><?php echo ($person->pers_phone) ?></td>
                                        <td class="center"><i class="<?php echo $class ?> material-icons"><?php echo $icon ?></i></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="dist/js/savingPerson.js"></script>

        <?php


    }
    function infSavingPerson()
    {
        if (isset($_SESSION['pers_id'])) {
            $conexion = new conexion("sel");

            require_once "model/saving_MO.php";
            require_once "model/person_MO.php";
            require_once "model/savingtotal_MO.php";
            require_once "model/roleMenuPermit_MO.php";
            require_once "model/userRole_MO.php";

            $pers_id = $_POST['pers_id'];

            $saving_MO = new saving_MO($conexion);
            $person_MO = new person_MO($conexion);
            $savingtotal_MO = new savingtotal_MO($conexion);
            $userRole = new userRole_MO($conexion);
            $roleMenuPermit_MO = new roleMenuPermit_MO($conexion);

            $list = $saving_MO->consultSaving($pers_id);
            $cant = $saving_MO->amount($pers_id);
            $cant = ceil($cant[0]->total / 3);
            $data = $person_MO->consultPerson($pers_id);
            $savingTotal = $savingtotal_MO->savingTotal($pers_id);

            $current_day = new DateTime("now");
            $last_day = $savingtotal_MO->month($pers_id);
            $last_day = new DateTime($last_day[0]->sato_month);
            $diff = $current_day->diff($last_day);

            if ($current_day < $last_day) {
                $diff->m = 0;
            }


            $rol = $userRole->consultRole($_SESSION['pers_id']);
            $permit = $roleMenuPermit_MO->consultWriteRegisterSaving($rol[0]->role_id);
            $write = false;
            foreach ($permit as $permits) {
                if ($permits->permit_id == '3') {
                    $write = true;
                }
            }

            $month = $savingtotal_MO->month($pers_id);
            $month = strtotime($month[0]->sato_month);
            $year = date('Y', $month);
            $mont = date('m', $month);
            if ($mont == 12) {
                $year = $year + 1;
                $mont = 01;
            } else {
                $mont = $mont + 1;
            }


            $listcant = 0;
        ?>
            <br>
            <div class="col s12 pad">
                <a id="tool1" class=" btn  buttonWithShadow btn-small   light-blue darken-2"  onclick="toolclose();"><i class="material-icons">arrow_back</i></a>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col s12 m7">
                        <h4><?php echo ($data[0]->pers_name) ?> <?php echo ($data[0]->pers_lastname) ?></h4>
                        <h5><?php echo ($data[0]->pers_document) ?> </h5>
                        <h6><?php echo ($data[0]->pers_phone) ?> </h6>
                        <h6><?php echo ($data[0]->created_at) ?> </h6>
                        <?php
                        if ($write) {
                        ?>
                            <a id="btnpagoAporte_trigger" class=" buttonWithShadow waves-effect waves-light btn light-blue darken-2 modal-trigger" href="#modalpago"><i class="material-icons left">monetization_on</i>Registrar aporte</a>
                        <?php
                        }
                        ?>

                    </div>

                    <div class="col s12 m5">
                        <div class="right-align">
                            <div class="card-money card-panel light-blue darken-3 brtc1 ">
                                <label for="ahorro" class="white-text">Total ahorro:</label>
                                <h3 id="ahorro" class="h6-cant white-text ">$ <?php echo ($savingTotal[0]->sato_value) ?></h3>
                            </div>

                            <?php
                            if ($diff->m > 0) {
                                $debt = $diff->m * 10000;
                            ?>
                                <div class="card-money card-panel orange darken-3 brtc1">
                                    <label for="deuda" class="white-text">Total deuda:</label>
                                    <h3 id="deuda" class="h6-cant white-text">$ <?php echo ($debt) ?></h3>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="card-money card-panel teal brtc1">
                                    <h7 id="deuda" class="h6-cant white-text card-icon"><i class="material-icons card-icon left">check_circle</i>No hay deudas pendientes</h7>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <?php
                    if ($write) {
                    ?>
                        <div id="modalpago" class="modal brtc1">
                            <div class="modal-content">
                                <h5>Registrar aporte</h5>
                                <form id="formpagoabono">
                                    <div class="row">
                                        <div class="input-field col s4">
                                            <input id="valor" name="valor" type="number" value="10000" min="10000" max="100000" class="validate" required>
                                            <label for="valor" class=" active ">Valor:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="descripcion" name="descripcion" autocomplete="on" minlength="5" maxlength="100" class="validate materialize-textarea" required>Abono aporte</textarea>
                                            <label for="descripcion" class="active">Descripci&oacuten: </label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <select id="ano" name="ano">
                                                <option value="2021" <?php if ($year == 2021) {
                                                                            echo ('selected');
                                                                        } ?>>2021</option>
                                                <option value="2022" <?php if ($year == 2022) {
                                                                            echo ('selected');
                                                                        } ?>>2022</option>
                                                <option value="2023" <?php if ($year == 2023) {
                                                                            echo ('selected');
                                                                        } ?>>2023</option>
                                                <option value="2024" <?php if ($year == 2024) {
                                                                            echo ('selected');
                                                                        } ?>>2024</option>
                                                <option value="2025" <?php if ($year == 2025) {
                                                                            echo ('selected');
                                                                        } ?>>2025</option>
                                            </select>
                                            <label>A&ntilde;o:</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <select id="mes" name="mes">
                                                <option value="1" <?php if ($mont == 1) {
                                                                        echo ('selected');
                                                                    } ?>>Enero</option>
                                                <option value="2" <?php if ($mont == 2) {
                                                                        echo ('selected');
                                                                    } ?>>Febrero</option>
                                                <option value="3" <?php if ($mont == 3) {
                                                                        echo ('selected');
                                                                    } ?>>Marzo</option>
                                                <option value="4" <?php if ($mont == 4) {
                                                                        echo ('selected');
                                                                    } ?>>Abril</option>
                                                <option value="5" <?php if ($mont == 5) {
                                                                        echo ('selected');
                                                                    } ?>>Mayo</option>
                                                <option value="6" <?php if ($mont == 6) {
                                                                        echo ('selected');
                                                                    } ?>>Junio</option>
                                                <option value="7" <?php if ($mont == 7) {
                                                                        echo ('selected');
                                                                    } ?>>Julio</option>
                                                <option value="8" <?php if ($mont == 8) {
                                                                        echo ('selected');
                                                                    } ?>>Agosto</option>
                                                <option value="9" <?php if ($mont == 9) {
                                                                        echo ('selected');
                                                                    } ?>>Septiembre</option>
                                                <option value="10" <?php if ($mont == 10) {
                                                                        echo ('selected');
                                                                    } ?>>Octubre</option>
                                                <option value="11" <?php if ($mont == 11) {
                                                                        echo ('selected');
                                                                    } ?>>Noviembre</option>
                                                <option value="12" <?php if ($mont == 12) {
                                                                        echo ('selected');
                                                                    } ?>>Diciembre</option>
                                            </select>
                                            <label>Mes:</label>
                                        </div>

                                        <div class="col s6">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a  id="btnPagoAporte" class=" btn modal-close waves-effect waves-light light-blue darken-2 " onclick="pagoAporte(<?php echo ($pers_id) ?>)">Registrar</a>
                                <a id="btnPagoAporteCancel" class="btn modal-close waves-effect waves-light red light-red darken-2 ">Cancelar</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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
                                    ?>
                                        <tr class="modal-trigger" data-target="modal<?php echo ($listcant) ?>">
                                            <td><?php echo ($mes) ?> <?php echo ($ano) ?></td>
                                            <td>$ <?php echo ($valor) ?></td>
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
                    ?>
                        <div id="modal<?php echo ($listcant) ?>" class="modal brtc1">
                            <div class="modal-content">
                                <h5>Informaci&oacuten de aporte</h5>
                                <h6><b>Código:</b> <?php echo ($codigo) ?></h6>
                                <h6><b>Aportado por:</b> <?php echo ($data[0]->pers_name) ?> <?php echo ($data[0]->pers_lastname) ?></h6>
                                <h6><b>Mes pagado:</b> <?php echo ($mes) ?> <?php echo ($ano) ?></h6>
                                <h6><b>Valor:</b> <?php echo ($valor) ?></h6>
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
            <?php
            if ($write) {
            ?>
                <script src="dist/js/savingRegister.js"></script>
            <?php
            }
            ?>
            <!-- SweetAlert2 -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="dist/js/pagination.js"></script>
            <script src="dist/js/button.js"></script>
            <script src="dist/js/modal.js"></script>


            <?php
        }
    }
    function creditApplication()
    {
        if (isset($_SESSION['pers_id'])) {

            $conexion = new conexion('sel');

            require_once "model/creditApply_MO.php";
            require_once "model/roleMenuPermit_MO.php";
            require_once "model/userRole_MO.php";


            $creditApply_MO = new creditApply_MO($conexion);
            $userRole = new userRole_MO($conexion);
            $roleMenuPermit_MO = new roleMenuPermit_MO($conexion);

            $rol = $userRole->consultRole($_SESSION['pers_id']);
            $permit = $roleMenuPermit_MO->consultWrite($rol[0]->role_id,8);
            $write = false;
            foreach ($permit as $permits) {
                if ($permits->permit_id == '3') {
                    $write = true;
                }
            }

            $result = $creditApply_MO->ConsultApplyNew();
            if ($result) {
            ?>

                <br>
                <?php
                foreach ($result as $solicitud) {
                    if ($solicitud->credit_application_use == "libre") {
                        $uso = "Libre inversi&oacute;n";
                    } else if ($solicitud->credit_application_use == "urgencia") {
                        $uso = "Urgencia";
                    }
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <div class="card-panel  brtc1">
                                    <div class="row">
                                        <form id="solicitud<?php echo ($solicitud->credit_application_id) ?>">

                                            <?php
                                            if ($solicitud->credit_application_use == "libre") {
                                            ?>
                                                <div class="input-field col s12">
                                                    <input id="fecha<?php echo ($solicitud->credit_application_id) ?>" name="fecha<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->created_at) ?>" disabled>
                                                    <label for="fecha<?php echo ($solicitud->credit_application_id) ?>" class="active">Fecha:</label>
                                                </div>
                                            <?php
                                            } else if ($solicitud->credit_application_use == "urgencia") {
                                            ?>
                                                <div class="input-field col s8">
                                                    <input id="fecha<?php echo ($solicitud->credit_application_id) ?>" name="fecha<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->created_at) ?>" disabled>
                                                    <label for="fecha<?php echo ($solicitud->credit_application_id) ?>" class="active">Fecha:</label>
                                                </div>
                                                <div class="col s4 center-align icon-ad">
                                                    <i lang="en" class=" large material-icons right yellow-text text-darken-3">warning</i>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="input-field col s12">
                                                <input id="uso<?php echo ($solicitud->credit_application_id) ?>" name="uso<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($uso) ?>" disabled>
                                                <label for="uso<?php echo ($solicitud->credit_application_id) ?>" class="active">Uso:</label>
                                            </div>
                                            <div class="input-field col m6 s7">
                                                <input id="deudor<?php echo ($solicitud->credit_application_id) ?>" name="deudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->name_debtor) ?>" disabled>
                                                <label for="deudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Deudor:</label>
                                            </div>
                                            <div class="input-field col m6 s5">
                                                <input id="dcDeudor<?php echo ($solicitud->credit_application_id) ?>" name="dcDeudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->document_debtor) ?>" disabled>
                                                <label for="dcDeudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Documento:</label>
                                            </div>
                                            <div class="input-field col m6 s7">
                                                <input id="deudor<?php echo ($solicitud->credit_application_id) ?>" name="deudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->name_co_debtor) ?>" disabled>
                                                <label for="deudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Codeudor:</label>
                                            </div>
                                            <div class="input-field col m6 s5">
                                                <input id="dcCodeudor<?php echo ($solicitud->credit_application_id) ?>" name="dcCodeudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->document_co_debtor) ?>" disabled>
                                                <label for="dcCodeudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Documento:</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="monto<?php echo ($solicitud->credit_application_id) ?>" name="monto<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->credit_application_value) ?>">
                                                <label for="monto<?php echo ($solicitud->credit_application_id) ?>" class="active">Monto:</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input id="meses<?php echo ($solicitud->credit_application_id) ?>" name="meses<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->credit_application_months) ?>">
                                                <label for="meses<?php echo ($solicitud->credit_application_id) ?>" class="active">Meses:</label>
                                            </div>

                                            <?php
                                            if ($solicitud->credit_application_use == "urgencia") {
                                            ?>
                                                <div class="input-fiel col s12">
                                                    <label for="mensajecaso" class="active">Mensaje:</label>
                                                    <textarea id="mensajecaso" class="materialize-textarea" disabled><?php echo ($solicitud->credit_application_message) ?></textarea>

                                                </div>
                                            <?php
                                            }
                                            if($write) {
                                            ?>
                                            <div class="col s12 right-align">
                                                <button class=" btn  waves-effect waves-light light-blue darken-2" type="button" name="action" id="btnrevisado<?php echo ($solicitud->credit_application_id) ?>" onclick="revisado(<?php echo ($solicitud->credit_application_id) ?>)">Revisado
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
                }

                ?>
                <?php if($write){
                    ?>
                    <script src="dist/js/creditos.js"></script>
                    <?php
                }
                
            
            } else {
            ?>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="card-panel  brtc1">
                                <div class="center-align">
                                    <i lang="en" class="large material-icons blue-text text-light-blue text-darken-2">check_circle</i>
                                    <h6>No hay nuevas solicitudes</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
    function creditApprove()
    {
        if (isset($_SESSION['pers_id'])) {
            $conexion = new conexion('sel');

            require_once "model/creditApply_MO.php";
            require_once "model/roleMenuPermit_MO.php";
            require_once "model/userRole_MO.php";


            $creditApply_MO = new creditApply_MO($conexion);
            $userRole = new userRole_MO($conexion);
            $roleMenuPermit_MO = new roleMenuPermit_MO($conexion);

            $rol = $userRole->consultRole($_SESSION['pers_id']);
            $permit = $roleMenuPermit_MO->consultWrite($rol[0]->role_id,8);
            $write = false;
            foreach ($permit as $permits) {
                if ($permits->permit_id == '3') {
                    $write = true;
                }
            }

            $year = date('Y');
            $mont = date('m');
            $fechaPagomin=strtotime("$year-$mont-01");
            if ($mont == 12) {
                $year = $year + 1;
                $mont = 01;
            } else {
                $mont = $mont + 1;
            }
            $fechaPago=strtotime("$year-$mont-01");
            if ($mont == 10) {
                $year = $year + 1;
                $mont = 03;
            } else {
                $mont = $mont + 3;
            }
            $fechaPagomax=strtotime("$year-$mont-01");
            $result = $creditApply_MO->ConsultApplyApprove();
            if ($result) {
                ?>
                <br>
                <?php
                foreach ($result as $solicitud) {
                    if ($solicitud->credit_application_use == "libre") {
                        $uso = "Libre inversi&oacute;n";
                    } else if ($solicitud->credit_application_use == "urgencia") {
                        $uso = "Urgencia";
                    }
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <div class="card-panel  brtc1">
                                    <div class="row no-marginBottom">
                                        <form id="solicitud<?php echo ($solicitud->credit_application_id) ?>">

                                        <?php
                                            if ($solicitud->credit_application_use == "libre") {
                                            ?>
                                                <div class="input-field col s12">
                                                    <input id="fecha<?php echo ($solicitud->credit_application_id) ?>" name="fecha<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->created_at) ?>" disabled>
                                                    <label for="fecha<?php echo ($solicitud->credit_application_id) ?>" class="active">Fecha:</label>
                                                </div>
                                            <?php
                                            } else if ($solicitud->credit_application_use == "urgencia") {
                                            ?>
                                                <div class="input-field col s8">
                                                    <input id="fecha<?php echo ($solicitud->credit_application_id) ?>" name="fecha<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->created_at) ?>" disabled>
                                                    <label for="fecha<?php echo ($solicitud->credit_application_id) ?>" class="active">Fecha:</label>
                                                </div>
                                                <div class="col s4 center-align icon-ad">
                                                    <i lang="en" class=" large material-icons right yellow-text text-darken-3">warning</i>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="input-field col m6 s7">
                                                <input id="deudor<?php echo ($solicitud->credit_application_id) ?>" name="deudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->name_debtor) ?>" disabled>
                                                <label for="deudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Deudor:</label>
                                            </div>
                                            <div class="input-field col m6 s5">
                                                <input id="dcDeudor<?php echo ($solicitud->credit_application_id) ?>" name="dcDeudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->document_debtor) ?>" disabled>
                                                <label for="dcDeudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Documento:</label>
                                            </div>
                                            <div class="input-field col m6 s7">
                                                <input id="deudor<?php echo ($solicitud->credit_application_id) ?>" name="deudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->name_co_debtor) ?>" disabled>
                                                <label for="deudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Codeudor:</label>
                                            </div>
                                            <div class="input-field col m6 s5">
                                                <input id="dcCodeudor<?php echo ($solicitud->credit_application_id) ?>" name="dcCodeudor<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->document_co_debtor) ?>" disabled>
                                                <label for="dcCodeudor<?php echo ($solicitud->credit_application_id) ?>" class="active">Documento:</label>
                                            </div>
                                            <div class="input-field col m4 s4">
                                                <input id="monto<?php echo ($solicitud->credit_application_id) ?>" name="monto<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->credit_application_value) ?>" disabled>
                                                <label for="monto<?php echo ($solicitud->credit_application_id) ?>" class="active">Monto:</label>
                                            </div>
                                            <div class="input-field col m4 s3">
                                                <input id="meses<?php echo ($solicitud->credit_application_id) ?>" name="meses<?php echo ($solicitud->credit_application_id) ?>" type="text" value="<?php echo ($solicitud->credit_application_months) ?>" disabled>
                                                <label for="meses<?php echo ($solicitud->credit_application_id) ?>" class="active">Meses:</label>
                                            </div>
                                            <div class="input-field col m4 s5">
                                                <input id="primermes<?php echo ($solicitud->credit_application_id) ?>" name="primermes<?php echo ($solicitud->credit_application_id) ?>" type="date" value="<?php echo(date("Y-m-d",$fechaPago)) ?>" min="<?php echo(date("Y-m-d",$fechaPagomin)) ?>" max="<?php echo(date("Y-m-d",$fechaPagomax)) ?>" >
                                                <label for="primermes<?php echo ($solicitud->credit_application_id) ?>" class="active">Primer Mes:</label>
                                            </div>
                                            
                                        <?php
                                        if($write){
                                            ?>
                                           
                                                <div class="col s6 left-align">
                                                    <a class="click pdf-button"   name="action" id="btncontinuar<?php echo($solicitud->credit_application_id)?>" onclick="activedCreditReport(<?php echo($solicitud->credit_application_id)?>)"><img  src="dist/img/icons/pdf.png" alt="pdf" width="50px"></a>
                                                </div>
                                                <div class="col s6 right-align">
                                                    <button class=" btn  waves-effect waves-light light-blue darken-2" type="button"  name="action" id="btncontinuar<?php echo($solicitud->credit_application_id)?>" onclick="continuar(<?php echo($solicitud->credit_application_id)?>)">Continuar</button>
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
                    if($write){
                        ?>
                        <script src="dist/js/creditos.js"></script>
                        <?php
                    }
                }
            }
            else{
                ?>
                    <br>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <div class="card-panel  brtc1">
                                    <div class="center-align">
                                        <i lang="en" class="large material-icons blue-text text-light-blue text-darken-2">check_circle</i>
                                        <h6>No hay cr&eacute;ditos aprobados por ahora</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
            }
        }
    }
    function creditActiveList()
    {
        if(isset($_SESSION['pers_id']))
        {
            $conexion = new conexion('sel');

            require_once "model/credit_MO.php";

            $credit_MO= new credit_MO($conexion);

            $result=$credit_MO->ConsultCreditActivedAll();
            if($result)
            {
                $current_day=new DateTime(date('Y-m-d'));

                ?>
                    <div class="container">
                        <h5>LISTA CR&Eacute;DITOS</h5>
                        <div class="row">
                            <div class="col s12">
                                <div class="card-panel size brtc1">
                                    <table class="highlight">
                                        <thead>
                                            <tr>
                                                <th >ID</th>
                                                <th>Deudor</th>
                                                <th class="hide-on-med-and-down">Documento</th>
                                                <th class="hide-on-med-and-down">Fecha Corte</th>
                                                <th class="center">Deuda</th>
                                            </tr>
                                        </thead>

                                        <tbody class="click ">
                                            <?php
                                            foreach ($result as $person) {
                                                
                                                $date_cut = new DateTime($person->credit_date_cut_first);
                                                $date_cut_end=new DateTime($person->credit_date_cut_end);
                                                
                                                 $icon = 'check_circle';
                                                 $class = 'green-text  text-darken-3';

                                                if($current_day>$date_cut)
                                                {
                                                    $icon = 'error';
                                                    $class = 'orange-text text-darken-3';
                                                }
                                                if($current_day>$date_cut_end)
                                                {
                                                    $icon = 'dangerous';
                                                    $class = 'red-text text-darken-3';
                                                }
                                                

                                            ?>
                                                <tr onclick="infCreditActive(<?php echo ($person->credit_id) ?>)">
                                                    <td ><?php echo ($person->credit_id) ?></td>
                                                    <td><?php echo ($person->name_debtor) ?></td>
                                                    <td class="hide-on-med-and-down"><?php echo ($person->document_debtor) ?></td>
                                                    <td class="hide-on-med-and-down"><?php echo ($person->credit_date_cut_first) ?></td>
                                                    <td class="center"><i class="<?php echo $class ?> material-icons"><?php echo $icon ?></i></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="dist/js/creditActive.js"></script>
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
                                        <h6>No hay cr&eacute;ditos activos por ahora</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
            }
        }
    }
    function infCreditActive()
    {
        if(isset($_SESSION['pers_id']))
        {

            $conexion=new conexion("sel");

            require_once "model/credit_MO.php";
            require_once "model/roleMenuPermit_MO.php";
            require_once "model/userRole_MO.php";
            require_once "model/payment_MO.php";

            $credit_MO=new credit_MO($conexion);
            $userRole = new userRole_MO($conexion);
            $roleMenuPermit_MO = new roleMenuPermit_MO($conexion);
            $payment_MO=new payment_MO($conexion);

            $credit_id = $_POST['credit_id'];
            
            
            $result = $credit_MO->ConsultCreditActivedWithId($credit_id);
            $collection = $credit_MO->ConsultCollection($credit_id);


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

            // $payd=$cuota+($diff->d*300);

            $rol = $userRole->consultRole($_SESSION['pers_id']);
            $permit = $roleMenuPermit_MO->consultWriteRegisterSaving($rol[0]->role_id);
            $write = false;
            foreach ($permit as $permits) {
                if ($permits->permit_id == '3') {
                    $write = true;
                }
            }

            $payment=$payment_MO->consultPayWithCreditId($credit_id);
            ?>
            <br>
            <div class="col s12 pad">
                <a id="tool1" class=" btn  buttonWithShadow btn-small   light-blue darken-2"  onclick="back();"><i class="material-icons">arrow_back</i></a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col s12 card-money  card-panel brtc1">
                        <div class="col s12 m6">
                            
                            <label for="saldo" class="creditLabel">Saldo:</label>
                            <h3 id="saldo" class="h6-cant"><?php echo $fmt->formatCurrency($saldo, "COP");?></h3>
                            <?php
                            if ($write) {
                            ?>
                                <button id="btnpago_trigger" class=" buttonWithShadow waves-effect waves-light btn light-blue darken-2 modal-trigger" href="#modalpago"><i class="material-icons left">monetization_on</i>Registrar Pago</button>
                            <?php
                            }
                            ?>
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
                                <div class=" click card-money card-panel orange darken-3 brtc1 modal-trigger" href="#modalcobro">
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
                            <h4 id="cuotasPagadas" class="dataCredit"><?php echo $mora ?> D&iacute;as</h4>
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
                            <div id="modal<?php echo $credit_id;echo $pago->pay_period  ?>" class="modal brtc1 modal-fixed-footer">
                                <div class="modal-content">
                                    <h5>Informaci&oacuten de pago</h5>
                                    <h6><b>Código pago:</b> <?php echo ($pago->pay_id) ?></h6>
                                    <h6><b>Código crédito:</b> <?php echo $pago->credit_id ?></h6>
                                    <h6><b>Fecha:</b> <?php echo $pago->pay_date ?></h6>
                                    <h6><b>Numero cuota:</b> <?php echo $pago->pay_period ?></h6>
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
                            <div id="modal<?php echo $credit_id;echo $cobro->collection_period  ?>" class="modal brtc1 modal-fixed-footer">
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
                                    $trClass="class='click modal-trigger' data-target='modal"."$credit_id"."$cobro->collection_period'";
                                    if($cobro->collection_state=="payd")
                                    {
                                        $class="green-text text-darken-3";
                                        $icon="check_circle";
                                        $consult=$payment_MO->consultPayWithCreditIdAndPeriod($credit_id,$cobro->collection_period);
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
            <?php
            if ($write) {
                $interes=round($int*($result[0]->credit_capital_debt-$result[0]->credit_capital_payd));
                if($capital1==0)
                {
                    $capital1=$cuotanormal-$interes;
                }
                if($interest1==0)
                {
                    $interest1=$interes;
                }
            ?>
                <div id="modalpago" class="modal brtc1">
                    <div class="modal-content">
                        <h5>Registrar Pago:</h5>
                        <form id="formpago">
                            <div class="row">
                                <div class="col s12">
                                    <label for="capital">Capital: (Total: <?php  echo $fmt->formatCurrency($capital1, "COP");?>)</label>
                                    <input type="number" name="capital" id="capital" value="<?php echo $capital1 ?>" max="<?php echo $capital1 ?>">
                                </div>
                                <div class="col s12">
                                    <label for="interes">Interes: (Total: <?php  echo $fmt->formatCurrency($interest1, "COP");?>)</label>
                                    <input type="number" name="interes" id="interes" value="<?php echo $interest1 ?>" max="<?php echo $interest1 ?>" min="<?php echo $interest1 ?>" disabled>
                                </div>
                                    
                                <div class="col s12">
                                    <label for="mora">Mora: (Total: <?php  echo $fmt->formatCurrency($mora1*300, "COP");?>)</label>
                                    <input type="number" name="mora" id="mora" value="<?php echo $mora1*300 ?>" max="<?php echo $mora1*300 ?>" min="<?php echo $mora1*300 ?>" disabled>
                                
                                </div>
                                <div class="col s12">
                                    <label for="aumentar">Aumentar plazo:</label>
                                    <select name="aumentar" id="aumentar">
                                        <option value="0" selected>0 meses</option>
                                        <option value="1">1 mes</option>
                                        <option value="2">2 meses</option>
                                    </select>
                                </div>
                                <div class="col s12">
                                    <label for="excedente">Excedente:</label>
                                    <input type="number" name="excedente" id="excedente" value="0">
                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnPago" class=" btn modal-close waves-effect waves-light light-blue darken-2 " onclick="savingPayd(<?php echo ($credit_id) ?>)">Registrar</button>
                        <button id="btnPagoCancel" class="btn modal-close waves-effect waves-light red light-red darken-2 ">Cancelar</button>
                    </div> 
                </div>
                <script src="dist/js/savingPayd.js"></script>
            <?php
            }
            ?>
            <script src="dist/js/modal.js"></script>

            <?php
        }
    }
    function wallet()
    {
        $conexion=new conexion("sel");

        require_once 'model/savingtotal_MO.php';
        require_once 'model/credit_MO.php';

        $savingtotal_MO=new savingtotal_MO($conexion);
        $credit_MO=new credit_MO($conexion);

        $aportes=$savingtotal_MO->consultTotalSavingTotal();
        $creditData=$credit_MO->consultCreditInfPayd();

        $totalaporte=0;
        $interes=0;
        $mora=0;
        $surplus=0;
        $capital_debt=0;
        $capital_payd=0;
        foreach($aportes as $aporte)
        {
            $totalaporte=$totalaporte+$aporte->sato_value;
        }
        foreach($creditData as $credit)
        {
            $interes=$interes+$credit->credit_interest_payd;
            $mora=$mora+$credit->credit_arrears_collected;
            $surplus=$surplus+$credit->credit_surplus_collected;
            $capital_debt=$capital_debt+$credit->credit_capital_debt;
            $capital_payd=$capital_payd+$credit->credit_capital_payd;
        }

        $capital=$capital_debt-$capital_payd;
        $cartera=$totalaporte+$interes+$mora+$surplus;
        $disponible=$cartera-$capital;

        $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
        $fmt->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'COP');
        $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
        ?>
        <br>
        <div class="container">
            <div class="row">
                <div class="col s12 card-money  card-panel brtc1">
                    <div class="row no-marginBottom">
                        <div class="col s12">
                            <div class=" click card-money card-panel teal darken-3 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total en cartera:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($cartera, "COP");?></h3>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class=" click card-money card-panel  green darken-1 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total disponible:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($disponible, "COP");?></h3>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class=" click card-money card-panel  lime darken-2 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total aportes:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($totalaporte, "COP");?></h3>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class=" click card-money card-panel light-blue darken-3 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total intereses:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($interes, "COP");?></h3>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class=" click card-money card-panel light-blue darken-3 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total mora:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($mora, "COP");?></h3>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class=" click card-money card-panel light-blue darken-3 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total excedentes:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($surplus, "COP");?></h3>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class=" click card-money card-panel red darken-2 brtc1">
                                <label for="deuda" class="white-text creditLabel">Total prestado:</label>
                                <h3 id="deuda" class="h6-cant white-text"><?php  echo $fmt->formatCurrency($capital, "COP");?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>