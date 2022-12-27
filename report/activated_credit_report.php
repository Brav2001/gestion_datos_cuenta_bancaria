<?php
    require_once '../library/const.php';
    require_once '../plugins/dompdf/autoload.inc.php';
    require_once '../library/connect.php';
    use Dompdf\Dompdf;
    if(isset($_SESSION['pers_id']))
    {
        if(isset($_SESSION['activeCreditReportId']) && isset($_SESSION['activeCreditReportFirsDate']))
        {
            function basico($numero) 
            {
                $valor = array ('un','dos','tres','cuatro','cinco','seis','siete','ocho',
                'nueve','diez','once','doce','trece','catorce','quince','dieciseis','diecisiete','dieciocho','diecinueve','veinte','veintiuno ','vientidos ','veintitr&eacute;s ', 'veinticuatro','veinticinco',
                'veintis&eacute;is','veintisiete','veintiocho','veintinueve');
                return $valor[$numero - 1];
            }
                
            function decenas($n) 
            {
                $decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',
                70=>'setenta',80=>'ochenta',90=>'noventa');
                if( $n <= 29) {
                    return basico($n);
                }
                $x = $n % 10;
                if ( $x == 0 ) {
                return $decenas[$n];
                } else return $decenas[$n - $x].' y '. basico($x);
            }
                
            function centenas($n) 
            {
                $cientos = array (100 =>'cien',200 =>'doscientos',300=>'trecientos',
                400=>'cuatrocientos', 500=>'quinientos',600=>'seiscientos',
                700=>'setecientos',800=>'ochocientos', 900 =>'novecientos');
                if( $n >= 100) {
                    if ( $n % 100 == 0 ) {
                        return $cientos[$n];
                    }
                    else {
                        $u = (int) substr($n,0,1);
                        $d = (int) substr($n,1,2);
                        return (($u == 1)?'ciento':$cientos[$u*100]).' '.decenas($d);
                    }
                } else return decenas($n);
            }
                
            function miles($n) 
            {
                if($n > 999) {
                    if( $n == 1000) 
                    {
                        return 'mil';
                    }
                    else {
                        $l = strlen($n);
                        $c = (int)substr($n,0,$l-3);
                        $x = (int)substr($n,-3);
                        if($c == 1) 
                        {
                            $cadena = 'mil '.centenas($x);
                        }
                        else if($x != 0) 
                        {
                            $cadena = centenas($c).' mil '.centenas($x);
                        }
                        else $cadena = centenas($c). ' mil';
                        return $cadena;
                    }
                } 
                else return centenas($n);
            }
                
            function millones($n) 
            {
                if($n == 1000000) 
                {
                    return 'un mill&oacute;n';
                }
                else 
                {
                    $l = strlen($n);
                    $c = (int)substr($n,0,$l-6);
                    $x = (int)substr($n,-6);
                    if($c == 1) 
                    {
                        $cadena = ' mill&oacute;n ';
                    } else 
                    {
                        $cadena = ' millones ';
                    }
                    return miles($c).$cadena.(($x > 0)?miles($x):'');
                }
            }
            function convertir($n) {
                switch (true) 
                {
                case ( $n >= 1 && $n <= 29) : return basico($n); break;
                case ( $n >= 30 && $n < 100) : return decenas($n); break;
                case ( $n >= 100 && $n < 1000) : return centenas($n); break;
                case ($n >= 1000 && $n <= 999999): return miles($n); break;
                case ($n >= 1000000): return millones($n);
                }
            }
            function convertirFecha($fecha)
            {
                $meses=array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
                $fecha=strtotime($fecha);
                return date('d',$fecha).' de '.$meses[date('m',$fecha)-1].' de '.date('Y',$fecha);
                

            }
            ///////////////////////////////////////////////////////////////////////
            
            $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
            $fmt->setTextAttribute(NumberFormatter::CURRENCY_CODE, 'COP');
            $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);

            $conexion = new conexion("sel");

            require_once "../model/creditApply_MO.php";
            require_once "../model/userRole_MO.php";
            require_once "../model/person_MO.php";

            $creditApply_MO= new creditApply_MO($conexion);
            $userRole_MO=new userRole_MO($conexion);
            $person_MO= new person_MO($conexion);

            $credit=$creditApply_MO->consultApplyApproveWithId($_SESSION['activeCreditReportId']);

            $treasur_id=$userRole_MO->consultTreasurId();
            $saving_treasur=$person_MO->consultName($treasur_id[0]->pers_id);
            $saving_treasur=$saving_treasur[0]->pers_name." ".$saving_treasur[0]->pers_lastname;
            $treasur_document=$person_MO->consultDocument($treasur_id[0]->pers_id);
            
            $deudor=$credit[0]->name_debtor;
            $codeudor=$credit[0]->name_co_debtor;
            $tesorero=$saving_treasur;
            $cedulaDeudor=$credit[0]->document_debtor;
            $cedulaCoDeudor=$credit[0]->document_co_debtor;
            $cedulaTesorero=$treasur_document[0]->pers_document;
            $capitalDeuda=$credit[0]->credit_application_value;
            $meses=convertir(intval($credit[0]->credit_application_months)).' meses';
            $capitalDeudaLetra="(".convertir(intval($capitalDeuda)).' pesos colombianos)';
            $fechaHoy=convertirFecha(date('Y-m-d'));
            $fechaPAgo=convertirFecha($_SESSION['activeCreditReportFirsDate']);

            $nombreArchivo="ReporteAsofamilia_credito".date('Y-m-d').$cedulaDeudor.".pdf";

            unset($_SESSION['activeCreditReportId']);
            unset($_SESSION['activeCreditReportFirsDate']);

            ob_start();
            
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- Compiled and minified CSS -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
                <!--Import Google Icon Font-->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">
                <title>ASOFAMILIA</title>
                <style>
                    .page-break
                    {
                        page-break-after:always;
                    }
                    @page {
                        margin: 0cm 0cm;
                    }

                    /** Defina ahora los márgenes reales de cada página en el PDF **/
                    body {
                        margin-top: 2,5cm;
                        margin-left: 2cm;
                        margin-right: 2cm;
                        margin-bottom: 2cm;
                        font-family: 'Domine', serif;;
                    }

                    /** Definir las reglas del encabezado **/
                    header {
                        position: fixed;
                        top: 0cm;
                        left: 0cm;
                        right: 0cm;
                        height: 2cm;

                        
                    }
                    .nav-wrapper{
                        background-color: transparent!important;
                        color: #000!important;
                    }
                    nav{
                        background-color: #fff;
                    }
                    table,tr,td,th{
                        border: solid 1px #000;
                    }
                    strong{
                        font-size: medium;
                    }
                    .linea {
                        border-top: 1px solid black;
                        height: 2px;
                        
                        padding: 0;
                        margin: 50px auto 0 auto;
                    }
                    

                </style>
            </head>
            <body>
                <header>
                    <nav>
                        <div class="nav-wrapper" >  
                            <div class="valing-wraper center-align">
                                <h4 class="brand-logo black-text"> ASOFAMILIA</h4>
                            </div>
                        </div>
                    </nav>
                </header>
                <main>
                    <div class="container">
                        <div class="row">
                            <h4 class="center-align"> ACUERDOS Y COMPROMISOS</h4>
                            <hr>
                            <br>
                            <p style="text-align:justify;">Yo, <strong><?php echo $deudor;?></strong> con numero de identidad <strong><?php echo number_format($cedulaDeudor,0,',','.');?></strong> vecino de este municipio y con las capacidades mentales, me hago responsable de la suma de dinero <strong>$ <?php echo number_format($capitalDeuda,0,',','.');?></strong> <strong><?php echo strtoupper($capitalDeudaLetra)?></strong>.</p>
                            <p style="text-align:justify;">Recibo el d&iacute;a <strong><?php echo strtoupper($fechaHoy); ?></strong> la suma estipulada en el acuerdo y me comprometo a pagar oportunamente las cuotas a partir de la fecha  <strong><?php echo strtoupper($fechaPAgo) ?></strong>, conocedor que fue aprobado para ser cancelado por un periodo m&aacute;ximo de <strong><?php echo strtoupper($meses)?></strong>, y teniendo conocimiento previo de las cl&aacute;usulas abajo expuestas.</p>
                            <span>Clausulas:</span>
                            <ol>
                                <li>Su pago oportuno debe ser entre el 1 al 10 de cada mes.</li>
                                <li>El atraso del pago oportuno de su cuota ser&aacute; sancionado con una multa diaria de 300 pesos.</li>
                                <li>En caso de pago anticipado de la deuda debe cancelar el 100 % de los intereses acordados.</li>
                                <li>En caso de calamidad se le dar&aacute; la oportunidad de cancelar solo el inter&eacute;s mensual y cobro por mora (En caso de que lo tuviese), con la salvedad que se le prolonga autom&aacute;ticamente.</li>
                                <li>En caso de calamidad solo se le podr&aacute; prolongar m&aacute;ximo dos meses, de lo contrario se pondr&aacute; a disposici&oacute;n de la junta directiva.</li>
                                <li>Para la solicitud de su cr&eacute;dito debe contar con un codeudor, quien a su vez debe ser socio, mayor de edad y contar con solvencia econ&oacute;mica capacitado de asumir la deuda en caso de incumplimiento.</li>
                                <li>Para la solicitud de un cr&eacute;dito deben estar tanto el solicitante como el codeudor al d&iacute;a con los aportes mensuales de la asociaci&oacute;n.</li>
                                <li>Para la solicitud de un sobre cr&eacute;dito debe estar al d&iacute;a con al menos el 50 % del capital prestado anteriormente.</li>
                                
                            </ol>
                            <span>Para constancia del compromiso anterior firman:</span>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col s6">
                                    <div class="linea"></div>
                                    <span><?php echo $tesorero ?></span><br>
                                    <span><?php echo  number_format($cedulaTesorero,0,',','.'); ?></span><br>
                                    <span><?php echo "Tesorero" ?></span> 
                                </div>
                                <div class="col s6">
                                    <div class="linea"></div>
                                    <span><?php echo $deudor ?></span><br>
                                    <span><?php echo  number_format($cedulaDeudor,0,',','.'); ?></span><br>
                                    <span><?php echo "Deudor" ?></span>   
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <div class="linea"></div>
                                    <span><?php echo $codeudor ?></span><br>
                                    <span><?php echo  number_format($cedulaCoDeudor,0,',','.'); ?></span><br>
                                    <span><?php echo "Codeudor" ?></span>   
                                </div>
                            </div>
                            <div class="page-break"></div>
                            <h4 class="center-align">PLAN DE PAGOS</h4>
                            <hr>
                            <br>
                            
                            <br>
                            <table class="centered striped">
                                <thead>
                                    <tr>
                                        <th>Periodo</th>
                                        <th>Deuda inicial</th>
                                        <th>interes</th>
                                        <th>Abono capital</th>
                                        <th>Cuota</th>
                                        <th>Deuda final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $interes=0;
                                    $monto=$credit[0]->credit_application_value;
                                    $int=0.02;
                                    $capitaltotal=0;
                                    $cuota1=round(($int*$monto)/(1-((1+$int)**(-($credit[0]->credit_application_months)))));
                                    for($i=0;$i<$credit[0]->credit_application_months;$i++)
                                    {
                                        
                                        $cuota=round(($int*$monto)/(1-((1+$int)**(-($credit[0]->credit_application_months-$i)))));
                                        
                                        $interes=$interes + round($monto*$int);

                                        $capital=$cuota-round($monto*$int);

                                        $capitaltotal=$capitaltotal+$capital;
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo($i+1)?></td>
                                            <td>$ <?php echo number_format($monto,0,',','.');?></td>
                                            <td>$ <?php echo number_format($monto*$int,0,',','.');?></td>
                                            <td>$ <?php echo number_format($capital,0,',','.');?></td>
                                            <td>$ <?php echo number_format($cuota,0,',','.');?></td>
                                            <td>$ <?php echo number_format($monto-$capital,0,',','.');?></td>
                                        </tr>
                                        <?php
                                        $monto=$monto-$capital;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col s6">
                                    <label for="capitalPagado">Interes total:</label>
                                    <h4 id="capitalPagado" class="dataCredit">$ <?php echo  number_format($interes,0,',','.');?></h4>
                                </div>
                                <div class="col s6">
                                    <label for="capitalPagado">Capital total:</label>
                                    <h4 id="capitalPagado" class="dataCredit">$ <?php echo  number_format($capitaltotal,0,',','.');?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label for="capitalPagado">Deuda total:</label>
                                    <h4 id="capitalPagado" class="dataCredit">$ <?php echo  number_format($capitaltotal+$interes,0,',','.');?></h4>
                                </div>
                                <div class="col s6">
                                    <label for="capitalPagado">Cuota: </label>
                                    <h4 id="capitalPagado" class="dataCredit">$ <?php echo  number_format($cuota1,0,',','.');?></h4>
                                </div>
                            </div>
                            
                            
                            <br>
                        </div>
                    </div>
                </main>
                <footer></footer>
                
            </body>
            </html>
            <?php
            $html=ob_get_clean();
            
            $dompdf = new Dompdf();
            $options=$dompdf->getOptions();
            $options->set(array('isRemoteEnabled' => true));  
            $dompdf->setOptions($options);
            
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter');
            
            $dompdf->render();
            $dompdf->stream($nombreArchivo, array("Attachment" => false));
        }else
        {
            header("location:../index.php");
            die();
        }
    }
    else{
        header("location:../index.php");
        die();
    }
?>