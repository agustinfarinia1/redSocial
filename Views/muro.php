<?php
require_once("validate-session.php");
include('nav-bar.php');
use DAODB\UserDAO as UserDAO;

$userDAO = new UserDAO();
?>
<div class="container">
    <div class="muro-div">
        <div class="text-center"> 
            <table class="table">
            <tr>
                <td class="table-primary"><h3>Publicar:</h3><br>
                <form action="<?php echo  FRONT_ROOT."Publicacion/addPublicacion"?>" method="post"> 

                    <div class="form-group green-border-focus">
                    <textarea class="form-control" name="texto" id="exampleFormControlTextarea5" rows="3" maxlength="250" placeholder="Publicar comentario..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Publicar</button>
                </form>
                </td>
            </tr>

            </table>
        </div>

        <div class="text-center"> 
            <?php foreach($publicaciones as $publicacion){?>
                <table class="table table-bordered">
                <tr>
                    <?php
                        ?> <td WIDTH="300"><?php if(strlen($publicacion->getTexto()) > 160){echo "<br>";} echo $userDAO->GetById($publicacion->getIdUsuario())->getName()." - ".$userDAO->GetById($publicacion->getIdUsuario())->getLastname(); ?></td>
                        <td align="center"> <?php
                        if (strlen($publicacion->getTexto()) > 80){
                            $texto = str_split($publicacion->getTexto(), 80); ?>
                            <?php
                                foreach($texto as $partes){?>
                                    <?php echo $partes; ?>
                                <?php }
                                ?> </td> 
                        <?php }
                        else{
                            echo $publicacion->getTexto(); ?>
                            </td> 
                        <?php }
                    ?>
                    <td WIDTH="50"> <?php if(strlen($publicacion->getTexto()) > 160){echo "<br>";} ?>
                    <button type="button" class="btn btn-light">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button>
                    </td>
                </tr>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
