<?php
    namespace Controllers;

    //use DAOJSON\UserDAO as UserDAO;
    use DAODB\UserDAO as UserDAO;
    use Models\User as User;
    use Models\PHPMailer as PHPMailer;
    use Models\SMTP as SMTP;
    use Models\Exception as Exception;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function crear($name, $lastname, $email, $password)
         {

            
            $user = new User();
            $user->setName($name);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($password);

            try{
                $this->userDAO->add($user);
            }   
            catch(\PDOException $ex)
            {
                echo "entra aca";
                echo $ex->getMessage();
            }
           
            

            require_once(VIEWS_PATH."home.php");
        }
    

        public function Login($email=null, $password=null)
        {
            $user = $this->userDAO->GetByEmail($email);

            if ($user)
            {

                if(($user != null) && ($user->getPassword() === $password))
                {
                    $_SESSION["loggedUser"] = $user;
                    header("Location: " . FRONT_ROOT );
                }
                else {
                    $this->Logout();
                    echo "<script> alert('El email que ingreso no se encuentra registrado');</script>";
                 }
                 
            }
            else {
                $this->Logout();
                echo "<script> alert('Contraseña Incorrecta');</script>";
            }
            
         }

        
        public function Logout()
        {           
            session_destroy();
            require_once(VIEWS_PATH."home.php");  
        }

        public function RecuperarCuenta($email){    // envia un mail al usuario que solicito la recuperacion
            $this->enviarMail($email,"Recuperacion de cuenta","Usted ha solicitado una recuperacion de cuenta","Views/img/qr.png");
        }        


        public function enviarMail($email = "",$encabezado = "",$texto ="",$imagen=null){   // Envia un mail con los datos pasados por parametro
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = USERNAME_MAIL;                     // SMTP username
                $mail->Password   = PASSWORD_MAIL;                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom(USERNAME_MAIL, 'ChinemaCenter');
                $mail->addAddress($email);

                // Attachments
                if($imagen){
                    $mail->addAttachment($imagen,"qr.png");         // Add attachments
                }

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $encabezado;
                $mail->Body    = $texto;

                $mail->send();
                if(!$_SESSION["loggedUser"]){
                    include_once(VIEWS_PATH."home.php");
                }
            } catch (Exception $e) {
                echo "Se produjo un error: {$mail->ErrorInfo}";
            }
        }

        public function buscarUserPorNombre($busqueda){
            return $this->userDAO->buscarUserPorNombreYApellido($busqueda);
        }
    }
?>