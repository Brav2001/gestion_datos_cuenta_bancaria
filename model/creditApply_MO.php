<?php
    class creditApply_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function consultApply($pers_id,$state)
        {
            $sql="SELECT `credit_application_id` FROM `credit_application` WHERE `pers_id_debtor`='$pers_id' AND `credit_application_state`='$state'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function application($value,$month,$name_deptor,$name_codeudor,$dc_deptor,$dc_codeudor,$id_deptor,$id_codeptor,$current_date,$state,$use,$message)
        {
            $sql="INSERT INTO `credit_application`(`credit_application_id`, `pers_id_debtor`, `pers_id_co_debtor`, `name_debtor`, `name_co_debtor`, `document_debtor`, `document_co_debtor`, `credit_application_value`, `credit_application_months`, `credit_application_use`, `credit_application_message`, `credit_application_state`, `created_at`, `updated_at`)VALUES (DEFAULT,'$id_deptor','$id_codeptor','$name_deptor','$name_codeudor','$dc_deptor','$dc_codeudor','$value','$month','$use','$message','$state','$current_date','$current_date')";
            $this->connect->consultar($sql);
            return "true";
        } 
        function ConsultApplyNew()
        {
            $sql="SELECT `credit_application_id`, `name_debtor`, `name_co_debtor`, `document_debtor`, `document_co_debtor`, `credit_application_value`, `credit_application_months`, `credit_application_use`, `credit_application_message`, `created_at` FROM `credit_application` WHERE `credit_application_state`='not reviewed' ORDER BY `created_at` ASC;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultApplyApprove()
        {
            $sql="SELECT `credit_application_id`, `name_debtor`, `name_co_debtor`, `document_debtor`, `document_co_debtor`, `credit_application_value`, `credit_application_months`, `credit_application_use`, `credit_application_message`, `created_at` FROM `credit_application` WHERE `credit_application_state`='reviewed pre-approved' ORDER BY `created_at` ASC;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function consultApplyNotReviwed($id)
        {
            $sql="SELECT  `pers_id_debtor`, `pers_id_co_debtor`, `name_debtor`, `name_co_debtor`, `document_debtor`, `document_co_debtor` FROM `credit_application` WHERE `credit_application_id`='$id' AND `credit_application_state`='not reviewed';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function changeStateApprove($id,$meses,$monto,$state,$update_at)
        {
            $sql="UPDATE `credit_application` SET `credit_application_value`='$monto',`credit_application_months`='$meses',`credit_application_state`='$state',`updated_at`='$update_at' WHERE `credit_application_id`='$id';";
            $this->connect->consultar($sql);
        }
        function changeStateDeny($id,$state,$update_at)
        {
            $sql="UPDATE `credit_application` SET `credit_application_state`='$state',`updated_at`='$update_at' WHERE `credit_application_id`='$id';";
            $this->connect->consultar($sql);
        }
        function consultApplyApproveWithId($id)
        {
            $sql="SELECT  `pers_id_debtor`, `pers_id_co_debtor`, `name_debtor`, `name_co_debtor`, `document_debtor`, `document_co_debtor`, `credit_application_value`, `credit_application_months` FROM `credit_application` WHERE `credit_application_id`='$id' AND `credit_application_state`='reviewed pre-approved';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }
?>