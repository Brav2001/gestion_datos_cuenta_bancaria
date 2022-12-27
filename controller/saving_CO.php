<?php
    require_once "model/saving_MO.php";
    class saving_CO
    {
        function addSavingFirst($pers_id,$saving_value,$saving_date,$saving_month,$saving_description)
        {
            $conexion=new conexion("sel");

            require_once "model/userRole_MO.php";
            require_once "model/person_MO.php";

            $userRole_MO=new userRole_MO($conexion);
            $person_MO= new person_MO($conexion);
            

            $treasur_id=$userRole_MO->consultTreasurId();
            $saving_treasur=$person_MO->consultName($treasur_id[0]->pers_id);
            $saving_treasur=$saving_treasur[0]->pers_name." ".$saving_treasur[0]->pers_lastname;
            $saving_register=$person_MO->consultName($_SESSION['pers_id']);
            $saving_register=$saving_register[0]->pers_name." ".$saving_register[0]->pers_lastname;

            $conexion=new conexion("all");

            $saving_MO=new saving_MO($conexion);

            $saving_MO->addSaving($pers_id,$saving_value,$saving_date,$saving_month,$saving_description,$saving_register,$saving_treasur);
        }
        function addSaving()
        {
            $saving_value=htmlentities($_POST['valor'],ENT_QUOTES);
            $saving_description=htmlentities($_POST['descripcion'],ENT_QUOTES);
            $pers_id=$_POST['asociado'];
            $mes=htmlentities($_POST['mes'],ENT_QUOTES);
            $ano=htmlentities($_POST['ano'],ENT_QUOTES);
            if($saving_value<10000 || $saving_value>10000)
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"El campo VALOR NO es V&AacuteLIDO"
                ];
        
                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                if(strlen($saving_description)<5 || strlen($saving_description)>100)
                {
                    $arreglo_respuesta = [
                        "estado"=>"ERROR",
                        "mensaje"=>"El campo DESCRIPCI&OacuteN NO es V&AacuteLIDO "
                    ];
            
                    exit(json_encode($arreglo_respuesta));
                }
                else
                {
                    if($mes=='1' || $mes=='2' || $mes=='3' || $mes=='4' || $mes=='5' || $mes=='6' || $mes=='7' || $mes=='8' || $mes=='9' || $mes=='10' || $mes=='11' || $mes=='12' )
                    {
                        if($ano=='2021' || $ano=='2022' || $ano=='2023' || $ano=='2024' || $ano=='2025')
                        {
                            $conexion=new conexion("sel");
                            $saving_MO=new saving_MO($conexion);
                            $saving_month=$ano."-".$mes."-01";
                            $exist=$saving_MO->consultSavingMonth($pers_id,$saving_month);
                            if($exist){
                                $arreglo_respuesta = [
                                    "estado"=>"ERROR",
                                    "mensaje"=>"El usuario ya aportó este mes"
                                ];
                        
                                exit(json_encode($arreglo_respuesta));
                            }
                            else{
                                $conexion=new conexion("sel");

                                require_once "model/userRole_MO.php";
                                require_once "model/person_MO.php";

                                $userRole_MO=new userRole_MO($conexion);
                                $person_MO= new person_MO($conexion);
                                

                                $treasur_id=$userRole_MO->consultTreasurId();
                                $saving_treasur=$person_MO->consultName($treasur_id[0]->pers_id);
                                $saving_treasur=$saving_treasur[0]->pers_name." ".$saving_treasur[0]->pers_lastname;
                                $saving_register=$person_MO->consultName($_SESSION['pers_id']);
                                $saving_register=$saving_register[0]->pers_name." ".$saving_register[0]->pers_lastname;
                                $saving_date=date('Y-m-d');
                                $saving_month=$ano."-".$mes."-01";

                                $conexion=new conexion("all");

                                $saving_MO=new saving_MO($conexion);

                                $saving_MO->addSaving($pers_id,$saving_value,$saving_date,$saving_month,$saving_description,$saving_register,$saving_treasur);

                                require_once "controller/savingTotal_CO.php";

                                $savingtotal_CO= new savingTotal_CO();

                                $savingtotal_CO->updateSaving($pers_id,$saving_value,$saving_month,$saving_date);
                                
                                $arreglo_respuesta = [
                                    "estado"=>"EXITO",
                                    "mensaje"=>"Ahorro registrado con Exito"
                                ];
                    
                                exit(json_encode($arreglo_respuesta));
                            }
                        }
                        else
                        {
                            $arreglo_respuesta = [
                                "estado"=>"ERROR",
                                "mensaje"=>"El campo AÑO NO es V&AacuteLIDO "
                            ];
                    
                            exit(json_encode($arreglo_respuesta));
                        }
                    }
                    else
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            "mensaje"=>"El campo MES NO es V&AacuteLIDO "
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                    
                    
                }
            }
        }
    }
?>