<?php
    class fund_MO
    {
        private $connect;

        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultFundWhitYear($year)
        {
            $sql="";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultFund()
        {
            $sql="SELECT  `fund_value`,  `fund_type` FROM `fund`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function createFund($value,$concept,$type,$year,$date)
        {
            $sql="INSERT INTO `fund`(`fund_id`, `fund_value`, `fund_concept`, `fund_type`, `fund_year`, `created_at`, `updated_at`) VALUES (DEFAULT,'$value','$concept','$type','$year','$date','$date');";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function updateFundWhitYear($value,$year,$date)
        {
            $sql="UPDATE `fund` SET `fund_value`='$value',`updated_at`='$date' WHERE `fund_concept`='Ingreso del 20% de los interes' AND`fund_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>