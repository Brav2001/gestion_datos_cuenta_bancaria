<?php
    class menu_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function options($menu_id,$menu_group)
        {
            $sql="SELECT  `menu_name`, `menu_route`, `menu_icon`  FROM `menu` WHERE `menu_id`=$menu_id AND `menu_group`='$menu_group' AND `menu_state`='active'; ";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>