<?php
    class saving_MO{
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultSaving($pers_id)
        {
            $sql="SELECT * FROM `saving` WHERE `pers_id`='$pers_id' ORDER BY `saving_month` DESC, `saving_date` DESC ";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function amount($pers_id)
        {
            $sql="SELECT COUNT('saving_id') as 'total' FROM `saving` WHERE `pers_id`='$pers_id' ORDER BY `saving_month` DESC, `saving_date` DESC";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function addSaving($pers_id,$saving_value,$saving_date,$saving_month,$saving_description,$saving_register,$saving_treasur)
        {
            $sql="INSERT INTO `saving`(`saving_id`, `pers_id`, `saving_value`, `saving_date`, `saving_month`, `saving_description`, `saving_register`, `saving_treasur`) VALUES (DEFAULT,'$pers_id','$saving_value','$saving_date','$saving_month','$saving_description','$saving_register','$saving_treasur')";
            $this->connect->consultar($sql);
        }
        function consultSavingMonth($pers_id,$saving_month)
        {
            $sql="SELECT `saving_id` FROM `saving` WHERE  `pers_id`='$pers_id' and `saving_month`='$saving_month'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultValueLastMonth($pers_id,$saving_month)
        {
            $sql="SELECT `sato_value_month` FROM `saving_total` WHERE `pers_id`='$pers_id' AND `sato_month`='$saving_month'; ";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>