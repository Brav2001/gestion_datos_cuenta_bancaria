<?php
    require_once "model/userRole_MO.php";
    class userRole_CO
    {
        function addUserRole($pers_id,$role_id)
        {
            if($role_id>=1 && $role_id<=3)
            {
                $conexion= new conexion("all");
                $userRole_MO=new userRole_MO($conexion);
                $userRole_MO->addUserRole($pers_id,$role_id,date('Y-m-d'));
            }
        }
    }
?>