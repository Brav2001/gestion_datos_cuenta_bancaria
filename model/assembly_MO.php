<?php
    class assembly_MO
    {
        private $connect;

        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultAssemblyWhitYear($year)
        {
            $sql="SELECT  `assembly_value` FROM `assembly` WHERE  `assembly_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function createAssembly($value,$year,$date)
        {
            $sql="INSERT INTO `assembly`(`assembly_id`, `assembly_value`, `assembly_value_real`, `assembly_year`, `created_at`, `updated_at`) VALUES (DEFAULT,'$value','0','$year','$date','$date');";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function updateAssemblyWhitYear($value,$year,$date)
        {
            $sql="UPDATE `assembly` SET `assembly_value`='$value',`updated_at`='$date' WHERE `assembly_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>