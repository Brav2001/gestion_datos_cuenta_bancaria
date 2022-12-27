<?php
    class roleMenuPermit_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultRead($role_id)
        {
            $sql="SELECT  a.`menu_id` FROM `role_menu_permit` a,  `menu` b  WHERE a.`permit_id`=2 AND a.`role_id`='$role_id' AND b.`menu_id`=a.`menu_id` ORDER BY b.`menu_order`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultWriteApply($role_id)
        {
            $sql="SELECT  `permit_id` FROM `role_menu_permit` WHERE `menu_id`=4 AND `role_id`=$role_id";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultWriteAddPerson($role_id)
        {
            $sql="SELECT  `permit_id` FROM `role_menu_permit` WHERE `menu_id`=6 AND `role_id`=$role_id";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultWriteRegisterSaving($role_id)
        {
            $sql="SELECT  `permit_id` FROM `role_menu_permit` WHERE `menu_id`=7 AND `role_id`=$role_id";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultWrite($role_id,$menu_id)
        {
            $sql="SELECT  `permit_id` FROM `role_menu_permit` WHERE `menu_id`=$menu_id AND `role_id`=$role_id";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>