<?php
    require_once "model/user_MO.php";
    class user_CO
    {
        function __construct(){}
       
        function log_in($user,$pass)
        {
            if(strlen($user)<8 || strlen($user)>10)
            {
                $_SESSION['icon']="error";
                $_SESSION['title']="Error";
                $_SESSION['text']="El usuario no existe";

            }
            else if(strlen($pass)<8 || strlen($pass)>45)
            {
                $_SESSION['icon']="error";
                $_SESSION['title']="Error";
                $_SESSION['text']="La contraseña es incorrecta";
            }
            else{
                $conexion=new conexion("sel");
                $user_MO=new user_MO($conexion);
                $arreglo=$user_MO->log_in($user,$pass);
                if($arreglo)
                {
                    //exit($arreglo[0]->acce_clave);
                    $state=$user_MO->selectState($arreglo[0]->pers_id);
                    if($state[0]->user_state=='a')
                    {
                        
                        if(password_verify($pass,$arreglo[0]->user_pass)){
                            require_once "model/person_MO.php";
                            require_once "model/log_MO.php";
                            $conexion=new conexion("all");
                            $person_MO=new person_MO($conexion);
                            $person=$person_MO->consultName($arreglo[0]->pers_id);
                            $current_date=date('Y-m-d H:i:s');
                            $log_MO=new log_MO($conexion);
                            $log_MO->log($person[0]->pers_name,$person[0]->pers_lastname,$current_date,$arreglo[0]->pers_id);
                            if(isset($_SESSION['user']))
                            {
                                unset($_SESSION['user']);
                                unset($_SESSION['user_cant']);
                            }
                            $_SESSION['pers_id']=$arreglo[0]->pers_id;

                        }
                        else
                        {
                            
                            if(isset($_SESSION['user']))
                            {
                                if($_SESSION['user']==$user)
                                {
                                    $_SESSION['user_cant']=$_SESSION['user_cant']+1;
                                }
                                else
                                {
                                    $_SESSION['user']=$user;
                                    $_SESSION['user_cant']=1;
                                }
                                if($_SESSION['user_cant']==5)
                                {
                                    $conexion=new conexion("all");
                                    $user_MO=new user_MO($conexion);
                                    $user_MO->changeState($arreglo[0]->pers_id);
                                    $_SESSION['icon']="error";
                                    $_SESSION['title']="Usuario bloqueado";
                                    $_SESSION['text']="Este usuario ha sido bloqueado por demasiados intentos fallidos, contacte con el administrador para desbloquear su cuenta.";
                                }
                                else if($_SESSION['user_cant']>5)
                                {
                                    $_SESSION['icon']="error";
                                    $_SESSION['title']="Usuario bloqueado";
                                    $_SESSION['text']="Este usuario ha sido bloqueado por demasiados intentos fallidos, contacte con el administrador para desbloquear su cuenta.";
                                }
                                else
                                {
                                    $_SESSION['icon']="error";
                                    $_SESSION['title']="Error";
                                    $_SESSION['text']="Usuario o contraseña incorrectos";
                                }
                            }
                            else
                            {
                                $_SESSION['user']=$user;
                                $_SESSION['user_cant']=1;
                                $_SESSION['icon']="error";
                                $_SESSION['title']="Error";
                                $_SESSION['text']="Usuario o contraseña incorrectos";
                            }
                        }
                    }
                    else
                    {
                        $_SESSION['icon']="error";
                        $_SESSION['title']="Error";
                        $_SESSION['text']="Este usuario ha sido bloqueado por demasiados intentos fallidos, contacte con el administrador para desbloquear su cuenta.";
                    }
                }
                else
                {
                    $_SESSION['icon']="error";
                    $_SESSION['title']="Error";
                    $_SESSION['text']="Usuario o contraseña incorrectos";
                }
            }
            header("location:index.php");
        }
        function log_out()
        {
           session_destroy();
           header("location:index.php");
        }
        function valitePass()
        {
            $cv=$_POST['passv'];
            $c1=$_POST['passn1'];
            $c2=$_POST['passn2'];
            $user=$_SESSION['pers_id'];
            if($cv=="")
            {
                $arreglo_respuesta = [
                    "estado"=>"ERROR",
                    "mensaje"=>"El campo CONTRASE&NtildeA ANTIGUA est&aacute VAC&IacuteO "
                ];
        
                exit(json_encode($arreglo_respuesta));
            }
            else
            {
                if(strlen($cv)<8)
                {
                    $arreglo_respuesta = [
                        "estado"=>"ERROR",
                        "mensaje"=>"El campo CONTRASE&NtildeA ANTIGUA NO es V&AacuteLIDO "
                    ];
            
                    exit(json_encode($arreglo_respuesta));
                }
                else
                {
                    if($c1=="")
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            "mensaje"=>"El campo NUEVA CONTRASE&NtildeA  est&aacute VAC&IacuteO "
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                    elseif(strlen($c1)<8)
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            "mensaje"=>"El campo NUEVA CONTRASE&NtildeA NO es V&AacuteLIDO "
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                    elseif($c2=="")
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            "mensaje"=>"El campo CONFIRMAR CONTRASE&NtildeA  est&aacute VAC&IacuteO "
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                    elseif(strlen($c2)<8)
                    {
                        $arreglo_respuesta = [
                            "estado"=>"ERROR",
                            "mensaje"=>"El campo  CONFIRMAR CONTRASE&NtildeA NO es V&AacuteLIDO "
                        ];
                
                        exit(json_encode($arreglo_respuesta));
                    }
                    elseif($c1==$c2)
                    {
                        $conexion=new conexion("sel");
                        $user_MO=new user_MO($conexion);
                        $cvv=$user_MO->pass($user);
                        if(password_verify($cv,$cvv[0]->user_pass))
                        {
                            $arreglo_respuesta = [
                                "estado"=>"EXITO",
                                "mensaje"=>"sisi "
                            ];
                    
                            exit(json_encode($arreglo_respuesta));
                        }
                        else
                        {
                            $arreglo_respuesta = [
                                "estado"=>"ERROR",
                                "mensaje"=>"La CONTRASE&NtildeA ANTIGUA NO COINCIDE CON LA REGISTRADA "
                            ];
                    
                            exit(json_encode($arreglo_respuesta));
                        }
                    }
                    
                }
            }
        }
        function changePass()
        {
            $c1=$_POST['passn1'];
            $user=$_SESSION['pers_id'];
            $save=password_hash($c1,PASSWORD_DEFAULT);
            $conexion=new conexion("all");
            $user_MO=new user_MO($conexion);
            $user_MO->changePass($user,$save,date('Y-m-d'));
            
            $arreglo_respuesta = [
                "estado"=>"EXITO"
            ];
        
            exit(json_encode($arreglo_respuesta));
        }
        function addUser($pers_id,$document)
        {
            $conexion=new conexion("all");
            $user_MO=new user_MO($conexion);
            $save=password_hash($document,PASSWORD_DEFAULT);
            $user_MO->addUser($pers_id,$document,$save,date('Y-m-d'));
        }
    }
?>