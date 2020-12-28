<?php
require_once("validate-session.php");
include('nav-bar.php');
use DAODB\UserDAO as UserDAO;

$userDAO = new UserDAO();
?>
<div class="container">
    <div class="muro-div">
        <div class="text-center"> 
            <?php if($_POST){ ?>
                <table class="table table-bordered">
                <tr>
                    <td>
                        <?php echo "busqueda: ".$busqueda; ?>
                    </td>
                </tr>
                <?php foreach($personas as $persona){ ?>
                <tr>
                    <td>
                    <?php echo $persona->getName()."-".$persona->getLastname();?>
                    </td>
                </tr>
                <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
