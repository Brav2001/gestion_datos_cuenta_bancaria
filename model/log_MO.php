<?php 
    class log_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function log($pers_name,$pers_lastname,$current_date,$pers_id)
        {
            $sql="INSERT INTO `log`(`log_id`, `pers_id`, `log_name`, `log_lastname`, `log_date`) VALUES (DEFAULT,'$pers_id','$pers_name','$pers_lastname','$current_date')";
            $this->connect->consultar($sql);
        }
    }
?>