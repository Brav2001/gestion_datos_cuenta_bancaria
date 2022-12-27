<?php
    class conexion
    {
        private $link;
        private $result;
        function __construct($user)
        {
            $server=SERVER;
            $dbname=DBNAME;
            if($user=="sel")
            {
                $usuario=DBUSER_SEL_NAME;
                $contraseña=DBUSER_SEL_PASSWORD;
            }
            else if($user=="all")
            {
                $usuario=DBUSER_ALL_NAME;
                $contraseña=DBUSER_ALL_PASSWORD;
            }
            else
            {
                die("usuario no valido");
            }
            try {
                $this->link=new PDO("mysql:host=$server;dbname=$dbname", $usuario, $contraseña);
                
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        function consultar($sql)
        {
            $this->resultado=$this->link->query($sql);
        }
        function extraerRegistro()
        {
            return $this->resultado->fetchAll(PDO::FETCH_OBJ);
        }
        function lastInsertId()
        {
            return $this->link->lastInsertId();
        }
    }
?>