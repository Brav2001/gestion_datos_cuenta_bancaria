<?php
    class userRole_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultRole($pers_id)
        {
            $sql="SELECT  `role_id` FROM `user_role` WHERE `pers_id`='$pers_id'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function addUserRole($pers_id,$role_id,$date)
        {
            $sql="INSERT INTO `user_role`(`usro_id`, `role_id`, `pers_id`, `created_at`, `updated_at`) VALUES (DEFAULT,'$role_id','$pers_id','$date','$date')";
            $this->connect->consultar($sql);
        }
        function consultTreasurId()
        {
            $sql="SELECT  `pers_id` FROM `user_role` WHERE `role_id`=2;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>