<?php
        session_start();
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: ../interfaceLogin.php');
         if($_SESSION['usuario'] == 'admin@@@'){
               unset($_SESSION['usuario']);
                unset($_SESSION['senha']);

                header('Location: ../interfaceLogin.php?Logout');
         }

        ?>
