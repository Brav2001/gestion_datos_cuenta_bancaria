<?php
    require_once "library/const.php";
    require_once "library/connect.php";
    require_once "model/credit_MO.php";

    $conexion=new conexion("all");
    $credit_MO=new credit_MO($conexion);

    $credit=$credit_MO->ConsultCreditActivedAll();

    foreach($credit as $credito)
    {
        
        $monto=$credito->credit_capital_debt;

        $created=$credito->created_at;

        if($credito->credit_period_payd==0)
        {
            $firstMonth=$credito->credit_date_cut_first;
            $firstMonth=strtotime($firstMonth);
            $anio=date("Y",$firstMonth);
            $month=date("m",$firstMonth);
            for($i=0;$i<$credito->credit_period;$i++)
            {
                $int=0.02;
                $cuota=round(($int*$monto)/(1-((1+$int)**(-($credito->credit_period-$i)))));
                $interest=$monto*$int;
                $capital=$cuota-round($interest);
                $monto=$monto-$capital;
                if($month==12)
                {
                    $anio=$anio+1;
                    $month=1;
                }else if ($i>0){
                    $month=$month+1;
                }
                $firsdate=$anio."-".$month."-"."01";
                $firsdatend=$anio."-".$month."-"."10";
                $credit_MO->CreateCollectionCredit($credito->credit_id,$i+1,$firsdate,$firsdatend,'debt',$cuota,$created,$capital,$interest);
            }
        }
        else
        {
            $firstMonth=$credito->credit_date_cut_first;
            $firstMonth=strtotime($firstMonth);
            $anio=date("Y",$firstMonth);
            $month=date("m",$firstMonth)-$credito->credit_period_payd;
            for($i=0;$i<$credito->credit_period;$i++)
            {
                $int=0.02;
                $cuota=round(($int*$monto)/(1-((1+$int)**(-($credito->credit_period-$i)))));
                $interest=$monto*$int;
                $capital=$cuota-round($interest);
                $monto=$monto-$capital;
                if($month==12)
                {
                    $anio=$anio+1;
                    $month=1;
                }else if ($i>0){
                    $month=$month+1;
                }
                $state="debt";
                if(($i+1)<=$credito->credit_period_payd)
                {
                    $state="payd";
                }
                $firsdate=$anio."-".$month."-"."01";
                $firsdatend=$anio."-".$month."-"."10";
                $credit_MO->CreateCollectionCredit($credito->credit_id,$i+1,$firsdate,$firsdatend,$state,$cuota,$created,$capital,$interest);
            }
        }
    }

    
    // $firstMonth=strtotime($firstMonth);
    // $anio=date("Y",$firstMonth);
    // $month=date("m",$firstMonth);
    // $monto=$apply[0]->credit_application_value;
    // for($i=0;$i<$apply[0]->credit_application_months;$i++)
    // {
    //     $int=0.02;
    //     $cuota=round(($int*$monto)/(1-((1+$int)**(-($apply[0]->credit_application_months-$i)))));
    //     $interest=$monto*$int;
    //     $capital=$cuota-round($interest);
    //     $monto=$monto-$capital;
    //     if($month==12)
    //     {
    //         $anio=$anio+1;
    //         $month=1;
    //     }else if ($i>0){
    //         $month=$month+1;
    //     }
    //     $firsdate=$anio."-".$month."-"."01";
    //     $firsdatend=$anio."-".$month."-"."10";
    //     $credit_MO->CreateCollectionCredit($credit_id[0]->credit_id,$i+1,$firsdate,$firsdatend,'debt',$cuota,date('Y-m-d H:i:s'),$capital,$interest);
    // }
?>