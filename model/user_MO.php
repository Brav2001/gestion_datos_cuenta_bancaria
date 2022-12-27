<?php
    class user_MO
    {
        private $connect;
        function __construct($connect)
        {
            $this->connect=$connect;
        }

        function log_in($user)
        {
            $sql="SELECT `pers_id`,`user_pass` FROM `user` WHERE `user_user`='$user';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function changeState($user)
        {
            $sql="UPDATE `user` SET `user_state`='b' WHERE `pers_id`='$user';";
            $this->connect->consultar($sql);
        }
        function selectState($user)
        {
            $sql="SELECT `user_state` FROM `user` WHERE `pers_id`='$user';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function pass($user)
        {
            $sql="SELECT `user_pass` FROM `user` WHERE `pers_id`='$user';";
            $this->connect->consultar($sql);
            return $this->connect->extraerRegistro();
        }
        function changePass($user,$pass,$date)
        {
            $sql="UPDATE `user` SET `user_pass`='$pass',`updated_at`='$date' WHERE `pers_id`='$user'";
            $this->connect->consultar($sql);
        }
        function addUser($pers_id,$user_user,$user_pass,$date)
        {
            $sql="INSERT INTO `user`(`user_id`, `pers_id`, `user_user`, `user_pass`, `created_at`, `updated_at`, `user_state`) VALUES (DEFAULT,'$pers_id','$user_user','$user_pass','$date','$date','a')";
            $this->connect->consultar($sql);
        }
    }
?>