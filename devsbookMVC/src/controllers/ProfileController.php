<?php
namespace src\controllers;

use core\Controller;
use DateTime;
use src\handlers\PostHandler;
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
        $page = intval(filter_input(INPUT_GET, 'page'));

        $id = $this->loggedUser->id; // meu proprio ID

        if (!empty($atts['id'])) {
            $id = $atts['id']; // ID de outro usuário
        }

        $user = UserHandler::getUser($id, true);

        if (!$user) {
            $this->redirect('/');
        }

        $dateFrom = new DateTime($user->birthdate);
        $dateTo = new DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        $feed = PostHandler::getUserFeed($id, $page, $this->loggedUser->id);
        
        $this->render('profile', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed
        ]);
    }

}