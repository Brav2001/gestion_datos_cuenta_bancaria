<?php
    class person_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultName($user)
        {
            $sql="SELECT  `pers_name`, `pers_lastname` FROM `person` WHERE `pers_id`='$user';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultPerson($user)
        {
            $sql="SELECT  `pers_document`, `pers_name`, `pers_lastname`, `pers_phone`, `created_at` FROM `person` WHERE `pers_id`='$user'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultDocument($user)
        {
            $sql="SELECT  `pers_document` FROM `person` WHERE `pers_id`='$user'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultaNamewithDocument($document)
        {
            $sql="SELECT  `pers_id`,`pers_name`, `pers_lastname` FROM `person` WHERE `pers_document`='$document';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultIdwithDocument($document)
        {
            $sql="SELECT  `pers_id` FROM `person` WHERE `pers_document`='$document';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function addPerson($name,$surnames,$document,$phone,$current_day,$registrador)
        {
            $sql="INSERT INTO `person`(`pers_id`, `pers_document`, `pers_name`, `pers_lastname`, `pers_phone`, `pers_state`, `created_at`, `updated_at`, `pers_register`) VALUES (DEFAULT,'$document','$name','$surnames','$phone','a','$current_day','$current_day','$registrador')";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();

        }
        function listAllPerson()
        {
            $sql="SELECT `pers_id`, `pers_document`, `pers_name`, `pers_lastname`, `pers_phone` FROM `person` ;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function listPersonName()
        {
            $sql="SELECT `pers_name`, `pers_lastname`FROM `person` ORDER BY `pers_id`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function listPersonId() 
        {
            $sql="SELECT `pers_id` FROM `person` ORDER BY `pers_id`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>