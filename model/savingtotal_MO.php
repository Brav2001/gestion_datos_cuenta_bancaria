<?php
    class savingtotal_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function month($pers_id)
        {
            $sql="SELECT  `sato_month`,`sato_value_month`FROM `saving_total` WHERE `pers_id`='$pers_id';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function saving($pers_id)
        {
            $sql="SELECT  `sato_value`,  `updated_at` FROM `saving_total` WHERE `pers_id`='$pers_id'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function savingTotal($pers_id)
        {
            $sql="SELECT  `sato_value` FROM `saving_total` WHERE `pers_id`='$pers_id'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function createSavingTotal($pers_id,$sato_value,$sato_month,$date)
        {
            $sql="INSERT INTO `saving_total`(`sato_id`, `pers_id`, `sato_value`, `sato_month`, `created_at`, `updated_at`) VALUES (DEFAULT,'$pers_id','$sato_value','$sato_month','$date','$date')";
            $this->connect->consultar($sql);
        }
        function updateSaving($pers_id,$total,$value_month,$sato_month,$updated_at)
        {
            $sql="UPDATE `saving_total` SET `sato_value`='$total',`sato_month`='$sato_month',`sato_value_month`='$value_month',`updated_at`='$updated_at' WHERE `pers_id`='$pers_id'";
            $this->connect->consultar($sql);
        }
        function updateSavingWithOutMonth($pers_id,$total,$value_month,$updated_at)
        {
            $sql="UPDATE `saving_total` SET `sato_value`='$total',`sato_value_month`='$value_month',`updated_at`='$updated_at' WHERE `pers_id`='$pers_id'";
            $this->connect->consultar($sql);
        }
        function consultTotalSavingTotal()
        {
            $sql="SELECT `sato_value` FROM `saving_total`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        
    }
?>