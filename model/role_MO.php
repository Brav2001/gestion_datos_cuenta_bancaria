<?php
    class role_MO{
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultRole()
        {
            $sql="SELECT `role_id`, `role_name` FROM `role` WHERE `role_state`='active';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>