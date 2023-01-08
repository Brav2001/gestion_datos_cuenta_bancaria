<?php
    class return_MO
    {
        private $connect;

        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultReturnWhitYear($year)
        {
            $sql="SELECT  `return_value`FROM `return` WHERE  `return_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function createReturn($value,$year,$date)
        {
            $sql="INSERT INTO `return`(`return_id`, `return_value`, `return_value_real`, `return_year`, `created_at`, `updated_at`) VALUES (DEFAULT,'$value','0','$year','$date','$date');";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function updateReturnWhitYear($value,$year,$date)
        {
            $sql="UPDATE `return` SET `return_value`='$value',`updated_at`='$date' WHERE `return_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>