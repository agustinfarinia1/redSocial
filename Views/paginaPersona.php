<?php
require_once("validate-session.php");
include('nav-bar.php');
use DAODB\UserDAO as UserDAO;

$userDAO = new UserDAO();
?>
<div class="container">
    <div class="muro-div">
        <div class="text-center"> 
            <table class="table table-bordered">
            <tr>
                <td>
                    <?php echo $_SESSION['loggedUser']->getName(); ?>
                </td>
            </tr>
            </table>
        </div>
    </div>
</div>
