<?php
    require_once "model/person_MO.php";
    class person_CO
    {
        function codebtor()
        {
            $documento=$_POST['asociado'];
            if(strlen($documento)<8 || strlen($documento)>10)
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR"
                ];
        
                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                $conexion=new conexion("sel");
                $person_MO=new person_MO($conexion);
                $docAsociado=$person_MO->consultDocument($_SESSION['pers_id']);


                

                if($docAsociado[0]->pers_document==$documento)
                {
                    $arreglo_respuesta = [
                        "estado"=>"DUPLICADO"
                    ];
            
                    exit(json_encode($arreglo_respuesta));
                }
                else
                {
                    $codeudor=$person_MO->ConsultaNamewithDocument($documento);
                    
                    if(!(empty($codeudor[0]->pers_name)))
                    {
                        require_once "model/savingtotal_MO.php";

                        $savingtotal_MO=new savingtotal_MO($conexion);

                        $current_day = new DateTime("now");
                        $last_day = $savingtotal_MO->month($codeudor[0]->pers_id);
                        $last_day = new DateTime($last_day[0]->sato_month);
                        $diff = $current_day->diff($last_day);
                        if ($current_day < $last_day) {
                            $diff->m = 0;
                        }

                        if($diff->m == 0)
                        {
                            $nombre=$codeudor[0]->pers_name." ".$codeudor[0]->pers_lastname;
                            $arreglo_respuesta = [
                                "estado"=>"EXITO",
                                "nombre"=>$nombre
                            ];
                    
                            exit(json_encode($arreglo_respuesta));
                        }
                        else
                        {
                            $arreglo_respuesta = [
                                "estado"=>"ATRASADO",
                                
                            ];
                    
                            exit(json_encode($arreglo_respuesta));
                        }
                        
                    }
                    else
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                }
            }
        }
        function addPerson()
        {
            $name=htmlentities($_POST['names'],ENT_QUOTES);
            $surnames=htmlentities($_POST['surnames'],ENT_QUOTES);
            $document=htmlentities($_POST['document'],ENT_QUOTES);
            $phone=htmlentities($_POST['phone'],ENT_QUOTES);
            $cargo=htmlentities($_POST['cargo'],ENT_QUOTES);
            if($name=="")
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"El campo NOMBRE est&aacute VAC&IacuteO"
                ];
        
                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                if($surnames=="")
                {
                    $arreglo_respuesta = [
                        "estado"=>"ERROR",
                        "mensaje"=>"El campo APELLIDO est&aacute VAC&IacuteO "
                    ];
            
                    exit(json_encode($arreglo_respuesta));
                }
                else
                {
                    if(strlen ($document)<8 || strlen ($document)>10)
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            "mensaje"=>"El campo DOCUMENTO NO es V&AacuteLIDO "
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                    else
                    {
                        if(!(strlen ($phone)==10))
                        {
                            $arreglo_respuesta = [
                                "estado"=>"ERROR",
                                "mensaje"=>"El campo CELULAR NO es V&AacuteLIDO "
                            ];
                    
                            exit(json_encode($arreglo_respuesta));
                        }
                        else
                        {
                            if($cargo=="")
                            {
                                $arreglo_respuesta = [
                                    "estado"=>"ERROR",
                                    "mensaje"=>"Elija un CARGO"
                                ];
                        
                                exit(json_encode($arreglo_respuesta));
                            }
                            else
                            {
                                $conexion=new conexion("sel");
                                $person_MO= new person_MO($conexion);
                                $arreglo=$person_MO->consultIdwithDocument($document);
                                if($arreglo)
                                {
                                    $arreglo_respuesta = [
                                        "estado"=>"ERROR",
                                        "mensaje"=>"Este documento YA SE ENCUENTRA REGISTRADO"
                                    ];
                            
                                    exit(json_encode($arreglo_respuesta));
                                }
                                else
                                {
                                    $register=$person_MO->consultName($_SESSION['pers_id']);
                                    $registrador=$register[0]->pers_name." ".$register[0]->pers_lastname;
                                    $current_day=date('y-m-d');

                                    $conexion=new conexion("all");
                                    $person_MO= new person_MO($conexion);
                                    
                                    
                                    $person_MO->addPerson($name,$surnames,$document,$phone,$current_day,$registrador);
                                    $arreglo=$person_MO->consultIdwithDocument($document);
                                    
                                    
                                    require_once "controller/user_CO.php";

                                    $user_CO=new user_CO();
                                    $user_CO->addUser($arreglo[0]->pers_id,$document);

                                    require_once "controller/userRole_CO.php";

                                    $userRole_CO=new userRole_CO();
                                    $userRole_CO->addUserRole($arreglo[0]->pers_id,$cargo);

                                    require_once "controller/saving_CO.php";

                                    $saving_CO=new saving_CO();
                                    $saving_CO->addSavingFirst($arreglo[0]->pers_id,10000,date('Y-m-d'),date('Y-m-01'),'Abono aporte');

                                    require_once "controller/savingTotal_CO.php";

                                    $savingTotal_CO=new savingTotal_CO();
                                    $savingTotal_CO->createSavingTotal($arreglo[0]->pers_id,10000,date('Y-m-01'),date('Y-m-d'));

                                    //$asociados_MO->agregarAhorro($cantidad,$current_day,$pers_id,$descripcion,$registrador);
                                    $arreglo_respuesta = [
                                        "estado"=>"EXITO",
                                        "mensaje"=>"Asociado registrado con Exito"
                                    ];
                            
                                    exit(json_encode($arreglo_respuesta));
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>