<?php
    class interest_MO
    {
        private $connect;

        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultInterestWhitYear($year)
        {
            $sql="SELECT `interest_id`, `interest_value_interest`, `interest_value_arrears`FROM `interest` WHERE `interest_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function createInteres($interest,$arrears,$year,$date)
        {
            $sql="INSERT INTO `interest`(`interest_id`, `interest_value_interest`, `interest_value_arrears`, `interest_year`, `created_at`, `updated_at`) VALUES (DEFAULT,'$interest','$arrears','$year','$date','$date');";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function updateInteresWhitYear($interest,$arrears,$year,$date)
        {
            $sql="UPDATE `interest` SET `interest_value_interest`='$interest',`interest_value_arrears`='$arrears',`updated_at`='$date' WHERE `interest_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>