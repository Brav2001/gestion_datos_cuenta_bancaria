<?php
    class payment_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function addPay($credit_id,$pay_value_total,$capital,$interes,$mora,$excedente,$date,$pay_period,$register,$treasur)
        {
            $sql="INSERT INTO `payment`(`pay_id`, `credit_id`, `pay_value_total`, `pay_value_capital`, `pay_value_interest`, `pay_value_arrears`, `pay_surplus`, `pay_date`, `pay_period`, `pay_register`, `pay_treasurer`) 
            VALUES (DEFAULT,'$credit_id','$pay_value_total','$capital','$interes','$mora','$excedente','$date','$pay_period','$register','$treasur');";
            $this->connect->consultar($sql);
            return true;
        }
        function consultPayWithCreditId($credit_id)
        {
            $sql="SELECT `pay_id`,`credit_id`, `pay_value_total`, `pay_value_capital`, `pay_value_interest`, `pay_value_arrears`, `pay_surplus`, `pay_date`, `pay_period`, `pay_register`, `pay_treasurer` FROM `payment` WHERE `credit_id`='$credit_id' ORDER BY `pay_period` DESC;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultPayWithCreditIdAndPeriod($credit_id,$period)
        {
            $sql="SELECT `pay_value_total` FROM `payment` WHERE `credit_id`='$credit_id' AND `pay_period`='$period';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>