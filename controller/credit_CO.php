<?php
    require_once "model/creditApply_MO.php";
    require_once "model/credit_MO.php";
    class credit_CO
    {
        function apply()
        {
            $monto=htmlentities($_POST['monto'],ENT_QUOTES);
            if($monto<10000 || $monto>500000)
            {
                $arreglo_respuesta=[
                    "estado"=>"ERROR"
                ];

                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                $meses=htmlentities($_POST['meses'],ENT_QUOTES);
                if($meses<1 || $meses>12)
                {
                    $arreglo_respuesta=[
                        "estado"=>"ERROR"
                    ];

                    exit(json_encode($arreglo_respuesta));
                }
                else
                {
                    $dcCodeudor=htmlentities($_POST['dcCodeudor'],ENT_QUOTES);
                    if(strlen($dcCodeudor)<8 || strlen($dcCodeudor)>10)
                    {
                        $arreglo_respuesta=[
                            "estado"=>"ERROR"
                        ];
    
                        exit(json_encode($arreglo_respuesta));
                    }
                    else
                    {
                        // $current_day=date("j");
                        // if($current_day>=20)
                        // {
                        //     $primermes=htmlentities($_POST['primermes'],ENT_QUOTES);
                        //     if($primermes=="")
                        //     {
                        //         $arreglo_respuesta=[
                        //             "estado"=>"ERROR"
                        //         ];
            
                        //         exit(json_encode($arreglo_respuesta));
                        //     }
                        //     else
                        //     {
                        //         $year=date("Y");
                        //         if(date("n")=="11")
                        //         {
                        //             if($primermes=="1")
                        //             {
                        //                 $year=date("Y")+1;
                        //             }
                        //             else if($primermes=="12")
                        //             {
                        //                 $year=date("Y");
                        //             }
                        //         }
                        //         else if(date("n")=="12")
                        //         {
                        //             if($primermes=="1")
                        //             {
                        //                 $year=date("Y")+1;
                        //             }
                        //             else if($primermes=="2")
                        //             {
                        //                 $year=date("Y")+1;
                        //             }
                        //         }
                        //     }
                        // }
                        // else
                        // {
                        //     if(date("n")=="12")
                        //     {
                        //         $primermes="1";
                        //         $year=date("Y")+1;
                        //     }
                        //     else
                        //     {
                        //         $primermes=date("n")+1;
                        //         $year=date("Y");
                        //     }
                        // }
                        $uso=htmlentities($_POST['uso'],ENT_QUOTES);
                        if($uso=="libre")
                        {
                            $mensaje="---";
                        }
                        else if($uso=="urgencia")
                        {
                            $mensaje=htmlentities($_POST['mensajecaso'],ENT_QUOTES);
                            if(!(is_string($mensaje)))
                            {
                                $arreglo_respuesta=[
                                    "estado"=>"ERROR"
                                ];
                                exit(json_encode($arreglo_respuesta));
                            }

                        }
                        else
                        {
                            $arreglo_respuesta=[
                                "estado"=>"ERROR"
                            ];
                            exit(json_encode($arreglo_respuesta));
                        }
                        $conexion=new conexion("sel");
                        require_once "model/person_MO.php";
                        $person_MO=new person_MO($conexion);
                        $cIdCodeudor=$person_MO->consultIdwithDocument($dcCodeudor);
                        if($cIdCodeudor)
                        {
                            $nCodeudor=$person_MO->consultName($cIdCodeudor[0]->pers_id);
                            $nDeudor=$person_MO->consultName($_SESSION['pers_id']);
                            $dcDeudor=$person_MO->consultDocument($_SESSION['pers_id']);
                            $nameCodeudor=$nCodeudor[0]->pers_name." ".$nCodeudor[0]->pers_lastname;
                            $nameDeudor=$nDeudor[0]->pers_name." ".$nDeudor[0]->pers_lastname;
                            //$primerCobro=$year."-".$primermes."-1";
                            $conexion=new conexion("all");
                            $creditApply_MO=new creditApply_MO($conexion);
                            $result=$creditApply_MO->application($monto,$meses,$nameDeudor,$nameCodeudor,$dcDeudor[0]->pers_document,$dcCodeudor,$_SESSION['pers_id'],$cIdCodeudor[0]->pers_id,date("Y-m-d H:i:s"),"not reviewed",$uso,$mensaje);
                            if($result)
                            {
                                $arreglo_respuesta=[
                                    "estado"=>"EXITO"
                                ];
            
                                exit(json_encode($arreglo_respuesta));
                            }
                            else
                            {
                                $arreglo_respuesta=[
                                    "estado"=>"ERROR"
                                ];
            
                                exit(json_encode($arreglo_respuesta));
                            }
                        }
                        else
                        {
                            $arreglo_respuesta=[
                                "estado"=>"ERROR"
                            ];
        
                            exit(json_encode($arreglo_respuesta));
                        }

                    }
                }
            }
        }
        function approveApply()
        {
            $id=htmlentities($_POST['socr_id'],ENT_QUOTES);
            
            if(is_numeric($id))
            {
                $conexion=new conexion("sel");
                $creditApply_MO=new creditApply_MO($conexion);
                $result=$creditApply_MO->consultApplyNotReviwed($id);
                if($result)
                {
                    $monto=htmlentities($_POST["monto$id"],ENT_QUOTES);
                    if(is_numeric($monto))
                    {
                        if($monto>=100000 && $monto<=500000)
                        {
                            $meses=htmlentities($_POST["meses$id"],ENT_QUOTES);
                            if(is_numeric($meses))
                            {
                                if($meses>=1 && $meses<=12)
                                {
                                    $conexion=new conexion("all");
                                    
                                    $creditApply_MO=new creditApply_MO($conexion);
                                    
                                    $creditApply_MO->changeStateApprove($id,$meses,$monto,"reviewed pre-approved",date("Y-m-d H:i:s"));
                                    $arreglo_respuesta=[
                                        "estado"=>"EXITO"
                                    ];
                                    exit(json_encode($arreglo_respuesta));
                                }
                            }
                        }
                    }
                }
            }
            $arreglo_respuesta=[
                "estado"=>"ERROR"
            ];
            exit(json_encode($arreglo_respuesta));
            
        }
        function denyApply()
        {
            $id=htmlentities($_POST['socr_id'],ENT_QUOTES);
            if(is_numeric($id))
            {
                $conexion=new conexion("all");
                $creditApply_MO=new creditApply_MO($conexion);
                $creditApply_MO->changeStateDeny($id,'reviewed deny',date("Y-m-d H:i:s"));
                $arreglo_respuesta=[
                    "estado"=>"EXITO"
                ];
                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                $arreglo_respuesta=[
                    "estado"=>"ERROR"
                ];
                exit(json_encode($arreglo_respuesta));
            }
        }
        function cancelCredit()
        {
            $id=htmlentities($_POST['socr_id'],ENT_QUOTES);
            if(is_numeric($id))
            {
                $conexion=new conexion("all");
                $creditApply_MO=new creditApply_MO($conexion);
                $creditApply_MO->changeStateDeny($id,'reviewed pre-approved canceled',date("Y-m-d H:i:s"));
                $arreglo_respuesta=[
                    "estado"=>"EXITO"
                ];
                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                $arreglo_respuesta=[
                    "estado"=>"ERROR"
                ];
                exit(json_encode($arreglo_respuesta));
            }
        }
        function activeCredit()
        {
            $id=htmlentities($_POST['socr_id'],ENT_QUOTES);
            $firstMonth=htmlentities($_POST["primermes$id"],ENT_QUOTES);
            
            if(is_numeric($id))
            {
                $conexion=new conexion("sel");
                $creditApply_MO=new creditApply_MO($conexion);
                $apply=$creditApply_MO->consultApplyApproveWithId($id);

                if($apply)
                {
                    $firstMonth=strtotime($firstMonth);
                    $firsdate=date('Y-m',$firstMonth)."-01";
                    $firsdatend=date('Y-m',$firstMonth)."-10";
                    $firstMonth=new DateTime($firsdate);
                    $current_day = new DateTime(date("Y-m-01"));
                    
                    $diff = $current_day->diff($firstMonth);
                    
                    if ($current_day < $firstMonth) {
                        if($diff->m==1 || $diff->m==2)
                        {
                            $interes=0;
                            $monto=$apply[0]->credit_application_value;
                            for($i=0;$i<$apply[0]->credit_application_months;$i++)
                            {
                                $int=0.02;
                                $cuota=round(($int*$monto)/(1-((1+$int)**(-($apply[0]->credit_application_months-$i)))));
                                
                                $interes=$interes + round($monto*$int);

                                $capital=$cuota-round($monto*$int);
                                $monto=$monto-$capital;
                            }
                            
                            $conexion = new conexion("all");
                            $credit_MO=new credit_MO($conexion);
                            $credit_MO->activeCredit($id,$apply[0]->pers_id_debtor,$apply[0]->pers_id_co_debtor,$apply[0]->name_debtor,$apply[0]->name_co_debtor,$apply[0]->document_debtor,$apply[0]->document_co_debtor,$apply[0]->credit_application_value,0,$interes,0,0,$apply[0]->credit_application_months,0,$firsdate,$firsdatend,"active",date('Y-m-d H:i:s'));


                            $creditApply_MO=new creditApply_MO($conexion);
                            $creditApply_MO->changeStateDeny($id,"reviewed actived",date('Y-m-d H:i:S'));

                            $credit_MO=new credit_MO($conexion);
                            $credit_id=$credit_MO->ConsultCreditIdWithApplyId($id);
                            if($credit_id){
                                $firstMonth=htmlentities($_POST["primermes$id"],ENT_QUOTES);
                                $firstMonth=strtotime($firstMonth);
                                $anio=date("Y",$firstMonth);
                                $month=date("m",$firstMonth);
                                $monto=$apply[0]->credit_application_value;
                                for($i=0;$i<$apply[0]->credit_application_months;$i++)
                                {
                                    $int=0.02;
                                    $cuota=round(($int*$monto)/(1-((1+$int)**(-($apply[0]->credit_application_months-$i)))));
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
                                    $credit_MO->CreateCollectionCredit($credit_id[0]->credit_id,$i+1,$firsdate,$firsdatend,'debt',$cuota,date('Y-m-d H:i:s'),$capital,$interest);
                                }
                                $arreglo_respuesta=[
                                    "estado"=>"EXITO"
                                ];
                                exit(json_encode($arreglo_respuesta));
                            }                                                                                                                                                                                   
                        }
                    }
                }

                
            }
            else
            {
                $arreglo_respuesta=[
                    "estado"=>"ERROR"
                ];
                exit(json_encode($arreglo_respuesta));
            }
        }
        function activeCreditReport()
        {
            $id=htmlentities($_POST['socr_id'],ENT_QUOTES);
            $firstMonth=htmlentities($_POST["primermes$id"],ENT_QUOTES);
            
            if(is_numeric($id))
            {
                $conexion=new conexion("sel");
                $creditApply_MO=new creditApply_MO($conexion);
                $apply=$creditApply_MO->consultApplyApproveWithId($id);

                if($apply)
                {
                    $firstMonth=strtotime($firstMonth);
                    $firstdate=date('Y-m',$firstMonth)."-01";
                    
                    $firstMonth=new DateTime($firstdate);
                    $current_day = new DateTime(date("Y-m-01"));
                    
                    $diff = $current_day->diff($firstMonth);
                    
                    if ($current_day < $firstMonth) {
                        if($diff->m==1 || $diff->m==2)
                        {
                            $_SESSION['activeCreditReportId']=$id;
                            $_SESSION['activeCreditReportFirsDate']=$firstdate;
                            
                            $arreglo_respuesta=[
                                "estado"=>"EXITO"
                            ];
                            exit(json_encode($arreglo_respuesta));
                        }
                    }
                }

                
            }
            else
            {
                $arreglo_respuesta=[
                    "estado"=>"ERROR"
                ];
                exit(json_encode($arreglo_respuesta));
            }
        }
    }
?>