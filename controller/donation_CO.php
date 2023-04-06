<?php
    class donation_CO
    {
        function savingDonationForPartner()
        {
            $pers_id=htmlentities($_POST['id'],ENT_QUOTES);
            $pers_name=htmlentities($_POST['names'],ENT_QUOTES);
            $value=htmlentities($_POST['valor'],ENT_QUOTES);
            $concepto=htmlentities($_POST['conceptoIngreso'],ENT_QUOTES);

            if( !$pers_id || !$pers_name || !$value || !$concepto || $value<100)
            {
                $arreglo_respuesta=[
                    "estado"=>"ERROR"
                ];
                exit(json_encode($arreglo_respuesta));
            }

            $conexion=new conexion('all');
            $currentDay=strtotime(date('Y-m-d'));
            $year=date('Y',$currentDay);

            require_once 'model/donations_MO.php';

            $donations_MO=new donations_MO($conexion);

            $donations_MO->registerDonationForPartners($pers_id,$pers_name,$value,$concepto,$year,date('Y-m-d'));
            $arreglo_respuesta=[
                "estado"=>"EXITO"
            ];
            exit(json_encode($arreglo_respuesta));
        }
    }
?>