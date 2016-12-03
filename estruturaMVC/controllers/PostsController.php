<?php

class PostsController extends Controller {

    public function index() {
        echo "Lista das Postagens";
    }

    public function ver($id) {
        echo "Nome da noticia que veremos: " . $id;
    }

}
