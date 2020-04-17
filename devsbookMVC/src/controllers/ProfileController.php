<?php
namespace src\controllers;

use core\Controller;
use src\handlers\UserHandler;

class ProfileController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
        
    }

    public function index($atts = []) {
        $id = $this->loggedUser->id; // meu proprio ID

        if (!empty($atts['id'])) {
            $id = $atts['id'];
        }

        $user = UserHandler::getUser($id, true);

        if (!$user) {
            $this->redirect('/');
        }
        
        $this->render('profile', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

}