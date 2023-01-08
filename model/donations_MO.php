<?php
    class donations_MO
    {
        private $connect;

        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultDonationsWhitYearForCredits($year)
        {
            $sql="SELECT `donations_value` FROM `donations` WHERE `donations_concept`='Excedente de créditos' AND `donations_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultDonationsForCredits()
        {
            $sql="SELECT `donations_value`,`donations_type` FROM `donations` WHERE `person_name`='Excedente de créditos';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function createDonations($value,$year,$date)
        {
            $sql="INSERT INTO `donations`(`donations_id`, `pers_id`, `person_name`, `donations_value`, `donations_concept`, `donations_type`, `donations_year`, `created_at`, `updated_at`) VALUES (DEFAULT,NULL,'Excedente de créditos','$value','Excedente de créditos','i','$year','$date','$date');";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function updateDonationsWhitYearForCredits($value,$year,$date)
        {
            $sql="UPDATE `donations` SET `donations_value`='$value',`updated_at`='$date' WHERE `donations_concept`='Excedente de créditos' AND `donations_year`='$year';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultDonationsForPartners()
        {
            $sql="SELECT `donations_value`,`donations_type` FROM `donations` WHERE `person_name`!='Excedente de créditos';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function registerDonationForPartners($pers_id,$pers_name,$value,$concept,$year,$date)
        {
            $sql="INSERT INTO `donations`(`donations_id`, `pers_id`, `person_name`, `donations_value`, `donations_concept`, `donations_type`, `donations_year`, `created_at`, `updated_at`) 
            VALUES (DEFAULT,'$pers_id','$pers_name','$value','$concept','i','$year','$date','$date')";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>