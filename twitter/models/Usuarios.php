<?php

class Usuarios extends Model {

    public function isLogged() {
        if (isset($_SESSION['twlg']) && !empty($_SESSION['twlg'])) {
            return true;
        }
        
        return false;
    }

}
