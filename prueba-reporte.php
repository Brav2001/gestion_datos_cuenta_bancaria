<?php
    
    require_once 'plugins/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    ////////////////////////////////////////////////////////////////////////

    function basico($numero) 
    {
        $valor = array ('un','dos','tres','cuatro','cinco','seis','siete','ocho',
        'nueve','diez','once','doce','trece','catorce','quince','dieciseis','diecisiete','dieciocho','diecinueve','veinte','veintiuno ','vientidos ','veintitrés ', 'veinticuatro','veinticinco',
        'veintiséis','veintisiete','veintiocho','veintinueve');
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
            return 'un millón';
        }
        else 
        {
            $l = strlen($n);
            $c = (int)substr($n,0,$l-6);
            $x = (int)substr($n,-6);
            if($c == 1) 
            {
                $cadena = ' millón ';
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

    $deudor='[NOMBRE DEL DEUDOR]';
    $codeudor='[NOMBRE DEL CODEUDOR]';
    $tesorero='[NOMBRE DEL TESORERO]';
    $cedulaDeudor='1111111111';
    $cedulaCoDeudor='1111111111';
    $cedulaTesorero='1111111111';
    $capitalDeuda='441000';
    $meses=convertir(intval('6')).' meses';
    $capitalDeudaLetra="(".convertir(intval($capitalDeuda)).' pesos colombianos)';
    $fechaHoy=convertirFecha(date('Y-m-d'));
    $fechaPAgo=convertirFecha('2022-07-01');

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
            .dataCredit{
                margin: 0.4rem 0 1.168rem 0 !important;
                letter-spacing: -2px;
                word-spacing: -15px;
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
                    <h4 class="center-align">ACUERDOS Y COMPROMISOS</h4>
                    <hr>
                    <br>
                    <p style="text-align:justify;">Yo, <strong><?php echo $deudor;?></strong> con numero de identidad <strong><?php echo number_format($cedulaDeudor,0,',','.');?></strong> vecino de este municipio y con las capacidades mentales, me hago responsable de la suma de dinero <strong><?php echo $fmt->formatCurrency($capitalDeuda, "COP");?></strong> <strong><?php echo strtoupper($capitalDeudaLetra)?></strong>.</p>
                    <p style="text-align:justify;">Recibo el día <strong><?php echo strtoupper($fechaHoy); ?></strong> la suma estipulada en el acuerdo y me comprometo a pagar oportunamente las cuotas a partir de la fecha  <strong><?php echo strtoupper($fechaPAgo) ?></strong>, conocedor que fue aprobado para ser cancelado por un periodo máximo de <strong><?php echo strtoupper($meses)?></strong>, y teniendo conocimiento previo de las cláusulas abajo expuestas.</p>
                    <span>Clausulas:</span>
                    <ol>
                        <li>Su pago oportuno debe ser entre el 1 al 10 de cada mes.</li>
                        <li>El atraso del pago oportuno de su cuota será sancionado con una multa diaria de 300 pesos.</li>
                        <li>En caso de pago anticipado de la deuda debe cancelar el 100 % de los intereses acordados.</li>
                        <li>En caso de calamidad se le dará la oportunidad de cancelar solo el interés mensual y cobro por mora (En caso de que lo tuviese), con la salvedad que se le prolonga automáticamente.</li>
                        <li>En caso de calamidad solo se le podrá prolongar máximo dos meses, de lo contrario se pondrá a disposición de la junta directiva.</li>
                        <li>Para la solicitud de su crédito debe contar con un codeudor, quien a su vez debe ser socio, mayor de edad y contar con solvencia económica capacitado de asumir la deuda en caso de incumplimiento.</li>
                        <li>Para la solicitud de un crédito deben estar tanto el solicitante como el codeudor al día con los aportes mensuales de la asociación.</li>
                        <li>Para la solicitud de un sobre crédito debe estar al día con al menos el 50 % del capital prestado anteriormente.</li>
                        
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
                            $monto=500000;
                            $int=0.02;
                            $capitaltotal=0;
                            $cuota1=round(($int*$monto)/(1-((1+$int)**(-(6)))));
                            for($i=0;$i<6;$i++)
                            {
                                
                                $cuota=round(($int*$monto)/(1-((1+$int)**(-(6-$i)))));
                                
                                $interes=$interes + round($monto*$int);

                                $capital=$cuota-round($monto*$int);

                                $capitaltotal=$capitaltotal+$capital;
                                
                                ?>
                                <tr>
                                    <td><?php echo($i+1)?></td>
                                    <td><?php echo $fmt->formatCurrency($monto, "COP");?></td>
                                    <td><?php echo $fmt->formatCurrency($monto*$int, "COP");?></td>
                                    <td><?php echo $fmt->formatCurrency($capital, "COP");?></td>
                                    <td><?php echo $fmt->formatCurrency($cuota, "COP");?></td>
                                    <td><?php echo $fmt->formatCurrency($monto-$capital, "COP");?></td>
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
                            <h4 id="capitalPagado" class="dataCredit"><?php echo $fmt->formatCurrency($interes, "COP");?></h4>
                        </div>
                        <div class="col s6">
                            <label for="capitalPagado">Capital total:</label>
                            <h4 id="capitalPagado" class="dataCredit"><?php echo $fmt->formatCurrency($capitaltotal, "COP");?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="capitalPagado">Deuda total:</label>
                            <h4 id="capitalPagado" class="dataCredit"><?php echo $fmt->formatCurrency($capitaltotal+$interes, "COP");?></h4>
                        </div>
                        <div class="col s6">
                            <label for="capitalPagado">Cuota: </label>
                            <h4 id="capitalPagado" class="dataCredit"><?php echo $fmt->formatCurrency($cuota1, "COP");?></h4>
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
    $dompdf->stream("archivo.pdf", array("Attachment" => false));





    
?>