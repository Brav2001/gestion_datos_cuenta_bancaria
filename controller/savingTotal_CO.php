<?php
    require_once "model/savingtotal_MO.php";
    class savingTotal_CO
    {
        function createSavingTotal($pers_id,$sato_value,$sato_month,$date)
        {
            $conexion =new conexion("all");
            $savingTotal_MO=new savingtotal_MO($conexion);
            $savingTotal_MO->createSavingTotal($pers_id,$sato_value,$sato_month,$date);
        }
        function updateSaving($pers_id,$saving_value,$value_month,$sato_month,$updated_at)
        {
            $conexion=new conexion("sel");
            $savingTotal_MO=new savingtotal_MO($conexion);
            
            $last=$savingTotal_MO->saving($pers_id);

            $total=$last[0]->sato_value+$saving_value;

            $month=$savingTotal_MO->month($pers_id);
            $month=new DateTime($month[0]->sato_month);
            $curren_month=new DateTime($sato_month);

            if($month>$curren_month)
            {
                $conexion =new conexion("all");
                $savingTotal_MO=new savingtotal_MO($conexion);
                $value_month=15000;
                $savingTotal_MO->updateSavingWithOutMonth($pers_id,$total,$value_month,$updated_at);
            }
            else if($month==$curren_month)
            {
                $conexion =new conexion("all");
                $savingTotal_MO=new savingtotal_MO($conexion);
                $savingTotal_MO->updateSavingWithOutMonth($pers_id,$total,$value_month,$updated_at);
            }
            else
            {
                $conexion =new conexion("all");
                $savingTotal_MO=new savingtotal_MO($conexion);

                
                $savingTotal_MO->updateSaving($pers_id,$total,$value_month,$sato_month,$updated_at);
            }

            

        }
    }
?>