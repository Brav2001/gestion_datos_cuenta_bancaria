<?php
    require_once "library/const.php";
    require_once "library/connect.php";
    if(isset($_SESSION['icon']))
    {
        echo("
        <htmlt>
        <body>
        
        </body>
        </html>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: '".$_SESSION['icon']."',
            title: '".$_SESSION['title']."',
            text: '".$_SESSION['text']."'
          })
        </script>
        ");
        unset($_SESSION['icon']);
        unset($_SESSION['title']);
        unset($_SESSION['text']);
    }
    if(isset($_POST['username']) and isset($_POST['userpassword']))
    {
        require_once "controller/user_CO.php";
        $user=$_POST['username'];
        $pass=$_POST['userpassword'];
        $user_CO= new user_CO();
        $user_CO->log_in($user,$pass);
    }
    else if(isset($_SESSION['pers_id']))
    {
        require_once "library/front_controller.php";
        if(isset($_GET['url']))
        {
            $url=$_GET['url'];
        }else
        {
            $url="";
        } 
        $front_controller=new front_controller($url);
    }
    else
    {
        require_once "view/login_VI.php";
        $login_VI=new login_VI();
        $login_VI->log_in();
    }
?>