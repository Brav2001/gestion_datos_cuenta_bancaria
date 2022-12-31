<?php
    class credit_MO
    {
        private $connect;

        function __construct($connect)
        {
            $this->connect=$connect;
        }
        function activeCredit($id,$pers_id_debtor,$pers_id_co_debtor,$name_debtor,$name_co_debtor,$document_debtor,$document_co_debtor,$monto,$monto_payd,$interes,$interes_payd,$mora,$credit_application_months,$months_payd,$firsdate,$firsdatend,$state,$date)
        {
            $sql="INSERT INTO `credit`(`credit_id`, `application_id`, `pers_id_debtor`, `pers_id_codebtor`, `name_debtor`, `name_cobetor`, `document_debtor`, `document_codebtor`, `credit_capital_debt`, `credit_capital_payd`, `credit_interest_debt`, `credit_interest_payd`, `credit_arrears_collected`, `credit_period`,`credit_period_payd`, `credit_date_cut_first`, `credit_date_cut_end`, `credit_state`, `created_at`, `updated_at`) VALUES (DEFAULT,'$id','$pers_id_debtor]','$pers_id_co_debtor','$name_debtor','$name_co_debtor','$document_debtor','$document_co_debtor','$monto','$monto_payd','$interes','$interes_payd','$mora','$credit_application_months','$months_payd','$firsdate','$firsdatend','$state','$date','$date');";
            $this->connect->consultar($sql);
        }
        function ConsultCreditActived($user)
        {
            $sql="SELECT `credit_id`, `application_id` , `pers_id_codebtor`, `name_debtor`, `name_cobetor`, `document_debtor`, `document_codebtor`, `credit_capital_debt`, `credit_capital_payd`, `credit_interest_debt`, `credit_interest_payd`, `credit_arrears_collected`, `credit_period`,`credit_period_payd`, `credit_date_cut_first`, `credit_date_cut_end`, `credit_state`, `created_at`, `updated_at` FROM `credit` WHERE `credit_state`='active' AND `pers_id_debtor`='$user';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultCreditActivedforCard($user)
        {
            $sql="SELECT   `credit_capital_debt`, `credit_capital_payd`, `credit_date_cut_first` FROM `credit` WHERE `credit_state`='active' AND `pers_id_debtor`='$user';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultCreditActivedAll()
        {
            $sql="SELECT `credit_id`, `application_id`, `pers_id_debtor`, `pers_id_codebtor`, `name_debtor`, `name_cobetor`, `document_debtor`, `document_codebtor`, `credit_capital_debt`, `credit_capital_payd`, `credit_interest_debt`, `credit_interest_payd`, `credit_arrears_collected`, `credit_period`, `credit_period_payd`, `credit_date_cut_first`, `credit_date_cut_end`, `created_at`, `updated_at` FROM `credit` WHERE `credit_state`='active';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultCreditActivedWithId($id)
        {
            $sql="SELECT  `application_id`, `pers_id_debtor`, `pers_id_codebtor`, `name_debtor`, `name_cobetor`, `document_debtor`, `document_codebtor`, `credit_capital_debt`, `credit_capital_payd`, `credit_interest_debt`, `credit_interest_payd`, `credit_arrears_collected`,`credit_surplus_collected`, `credit_period`, `credit_period_payd`, `credit_date_cut_first`, `credit_date_cut_end`, `created_at`, `updated_at` FROM `credit` WHERE `credit_state`='active' AND `credit_id`='$id';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function updateCreditForPay($credit_id,$credit_capital_payd,$credit_interest_payd,$credit_arrears_collected,$credit_surplus_collected,$credit_period,$credit_period_payd,$credit_date_cut_first,$credit_date_cut_end,$date)
        {
            $sql="UPDATE `credit` SET `credit_capital_payd`='$credit_capital_payd',`credit_interest_payd`='$credit_interest_payd',`credit_arrears_collected`='$credit_arrears_collected',`credit_surplus_collected`='$credit_surplus_collected',`credit_period`='$credit_period',`credit_period_payd`='$credit_period_payd',`credit_date_cut_first`='$credit_date_cut_first',`credit_date_cut_end`='$credit_date_cut_end',`updated_at`='$date' WHERE `credit_id`='$credit_id';";
            $this->connect->consultar($sql);
            return true;
        }
        function creditChangeState($credit_id,$state,$date)
        {
            $sql="UPDATE `credit` SET `credit_state`='$state',`updated_at`='$date' WHERE `credit_id`='$credit_id';";
            $this->connect->consultar($sql);
            return true;
        }
        function consultCreditInfPayd()
        {
            $sql="SELECT `credit_capital_debt`, `credit_capital_payd`,`credit_interest_payd`, `credit_arrears_collected`, `credit_surplus_collected` FROM `credit`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultCreditIdWithApplyId($id)
        {
            $sql="SELECT `credit_id` FROM `credit` WHERE `application_id`='$id';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function CreateCollectionCredit($credit_id,$collection_period,$collection_date_first,$collection_date_end,$collection_state,$collection_debt,$date,$capital,$interest)
        {
            $sql="INSERT INTO `collection`(`collection_id`, `credit_id`, `collection_period`, `collection_date_first`, `collection_date_end`, `collection_state`, `collection_debt`, `created_at`, `updated_at`,  `collection_debt_capital`, `collection_debt_interest`)VALUES (DEFAULT,'$credit_id','$collection_period','$collection_date_first','$collection_date_end','$collection_state','$collection_debt','$date','$date','$capital','$interest');";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultCollection($credit_id)
        {
            $sql="SELECT * FROM `collection` WHERE `credit_id`='$credit_id' ORDER BY `collection_period`;";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function UpdateCreditCollection($state,$date,$credit_id,$period)
        {
            $sql="UPDATE `collection` SET `collection_state`='$state', `updated_at`='$date' WHERE `credit_id`='$credit_id' AND `collection_period`='$period';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function ConsultCollectionForIncrease($credit_id,$period)
        {
            $sql="SELECT  `collection_date_first`, `collection_debt`, `collection_debt_capital`, `collection_debt_interest` FROM `collection` WHERE `credit_id`='$credit_id' AND `collection_period`='$period'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function UpdateCreditCollectionForIncrease($state,$debt,$date,$capital,$interest,$credit_id,$period)
        {
            $sql="UPDATE `collection` SET `collection_state`='$state',`collection_debt`='$debt',`updated_at`='$date',`collection_debt_capital`='$capital',`collection_debt_interest`='$interest' WHERE `credit_id`='$credit_id' AND `collection_period`='$period'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function DeleteCreditCollectionForIncrease($credit_id,$period)
        {
            $sql="DELETE FROM `collection` WHERE `credit_id`='$credit_id' AND `collection_period`='$period'";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
    }

?>