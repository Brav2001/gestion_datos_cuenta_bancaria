<?php
    class payment_CO
    {
        function savingPay()
        {
            
            $credit_id=$_POST['credit_id'];
            $capital=$_POST['capital'];
            $interes=$_POST['interes'];
            $mora=$_POST['mora'];
            $aumentar=$_POST['aumentar'];
            $excedente=$_POST['excedente'];

            

            if( $capital>=0 && $interes>0 && $mora >=0 && $aumentar>=0 && $excedente>=0 )
            {
                $conexion=new conexion('sel');

                require_once 'model/credit_MO.php';

                $credit_MO=new credit_MO($conexion);

                $credit=$credit_MO->ConsultCreditActivedWithId($credit_id);

                if($credit)
                {
                    require_once 'model/person_MO.php';
                    require_once 'model/userRole_MO.php';
                    

                    $person_MO=new person_MO($conexion);
                    $userRole_MO=new userRole_MO($conexion);
                    

                    $treasur_id=$userRole_MO->consultTreasurId();

                    $treasur=$person_MO->consultName($treasur_id[0]->pers_id);
                    $treasur=$treasur[0]->pers_name." ".$treasur[0]->pers_lastname;
                    $register=$person_MO->consultName($_SESSION['pers_id']);
                    $register=$register[0]->pers_name." ".$register[0]->pers_lastname;
                    $pay_value_total=$capital+$interes+$mora+$excedente;
                    $pay_period=$credit[0]->credit_period_payd+1;

                    $conexion=new conexion('all');

                    require_once 'model/payment_MO.php';

                    $payment_MO=new payment_MO($conexion);

                    $pay=$payment_MO->addPay($credit_id,$pay_value_total,$capital,$interes,$mora,$excedente,date('Y-m-d H:i:s'),$pay_period,$register,$treasur);
                    if($pay)
                    {
                        $credit_MO=new credit_MO($conexion);

                        $credit_capital_payd=$credit[0]->credit_capital_payd+$capital;
                        $credit_interest_payd=$credit[0]->credit_interest_payd+$interes;
                        $credit_arrears_collected=$credit[0]->credit_arrears_collected+$mora;
                        $credit_surplus_collected=$credit[0]->credit_surplus_collected+$excedente;
                        $credit_period=$credit[0]->credit_period+$aumentar;
                        $credit_period_payd=$pay_period;


                        $credit_date_cut_first=strtotime($credit[0]->credit_date_cut_first);
                        $year=date('Y',$credit_date_cut_first);
                        $month=date('m',$credit_date_cut_first);
                        if($month==12)
                        {
                            $year +=1;
                            $month =1;
                        }
                        else
                        {
                            $month +=1;
                        }
                        $credit_date_cut_first=$year."-".$month."-01";


                        $credit_date_cut_end=strtotime($credit[0]->credit_date_cut_end);
                        $year=date('Y',$credit_date_cut_end);
                        $month=date('m',$credit_date_cut_end);
                        if($month==12)
                        {
                            $year +=1;
                            $month =1;
                        }
                        else
                        {
                            $month +=1;
                        }
                        $credit_date_cut_end=$year."-".$month."-10";

                        $upCredit=$credit_MO->updateCreditForPay($credit_id,$credit_capital_payd,$credit_interest_payd,$credit_arrears_collected,$credit_surplus_collected,$credit_period,$credit_period_payd,$credit_date_cut_first,$credit_date_cut_end,date('Y-m-d H:i:s'));
                        if($upCredit)
                        {
                            $credit_MO->UpdateCreditCollection('payd',date('Y-m-d H:i:s'),$credit_id,$pay_period);
                            if($credit_capital_payd==$credit[0]->credit_capital_debt && $credit_interest_payd==$credit[0]->credit_interest_debt)
                            {
                                $upCredit=$credit_MO->creditChangeState($credit_id,'payd',date('Y-m-d H:i:s'));
                                $arreglo_respuesta=[
                                    "estado"=>"COMPLETADO"
                                ];
                                exit(json_encode($arreglo_respuesta));
                            }
                            else
                            {
                                $arreglo_respuesta=[
                                    "estado"=>"EXITO"
                                ];
                                exit(json_encode($arreglo_respuesta));
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
    }
?>