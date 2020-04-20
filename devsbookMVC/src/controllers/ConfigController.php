<?php
namespace src\controllers;

use core\Controller;
use src\handlers\UserHandler;
use DateTime;

class ConfigController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
        
    }

    public function index(){
        //Mensagem exibida na tela, caso exista.
        $flash = "";        
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        //Montando a tela de configuração do usuário
        $this->render('config',[
            'loggedUser' => $this->loggedUser,
            'flash' => $flash                
        ]);
    }

    public function configAction(){
        //Recebe os dados do formulário
        $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST,'password');
        $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $birthdate = filter_input(INPUT_POST,'birthdate',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST,'city',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $work = filter_input(INPUT_POST,'work',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $avatar = filter_input(INPUT_POST,'avatarFile');
        $cover = filter_input(INPUT_POST,'coverFile');
        $newPassword = filter_input(INPUT_POST,'newPassword');

        //Pega os dados do usuário logado no BD
        $user = UserHandler::getUser($this->loggedUser->id, false);
        
        //Verificação do email
        if ($this->loggedUser->email != $email) {
            if ((UserHandler::emailExists($email)) && ($email != $user->email)) {
                $_SESSION['flash'] = "Email já utilizado por outro usuário";
                $this->redirect("/config");
            }
        }
        
        //Verificação da senha
        if ($password != $newPassword) {
            $_SESSION['flash'] = "Campos 'Nova Senha' e 'Confirmar Nova Senha' diferentes! ";
            $this->redirect("/config");
        } 

        //Verificação da data
        $birthdate = explode('/', $birthdate);
        if (count($birthdate) != 3) {
            $_SESSION['flash'] = 'Data de nascimento inválida!';
            $this->redirect('/config');
        }

        $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
        if (!strtotime($birthdate)) {
            $_SESSION['flash'] = 'Data de nascimento inválida!';
            $this->redirect('/config');
        }

        //Verificão do avatar
        if (empty($avatar)) {
            $avatar = $user->avatar;
        }
        //Verificão da capa
        if (empty($cover)) {
            $cover = $user->cover;
        }

        UserHandler::updateUser($this->loggedUser->id, $email, $password, $name, $birthdate, $city, $work, $avatar, $cover);   
        $this->redirect("/config");   
    }

}