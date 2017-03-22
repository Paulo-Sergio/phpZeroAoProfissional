<?php

define("BASE_URL", "http://localhost/phpZeroAoProfissional/slimFrameworks/public/");
// Routes

$app->get('/', function($request, $response, $args) {
    $lista = new Lista($this->db);
    $args['lista'] = $lista->getLista();

    return $this->renderer->render($response, 'home.phtml', $args);
});

$app->get('/add', function($request, $response, $args) {
    return $this->renderer->render($response, 'add.phtml', $args);
});

$app->post('/add', function($request, $response, $args) {
    $data = $request->getParsedBody();
    $lista = new Lista($this->db);
    $lista->add($data);

    return $response->withStatus(302)->withHeader("Location", BASE_URL);
});

$app->get('/edit/{id}', function ($request, $response, $args) {
    $lista = new Lista($this->db);
    $args['info'] = $lista->getContato($args['id']);

    return $this->renderer->render($response, 'edit.phtml', $args);
});

$app->post('/edit/{id}', function($request, $response, $args) {
    $data = $request->getParsedBody();
    $lista = new Lista($this->db);
    $lista->update($data, $args['id']);

    return $response->withStatus(302)->withHeader("Location", BASE_URL);
});

$app->get('/del/{id}', function($request, $response, $args) {
    $lista = new Lista($this->db);
    $lista->delete($args['id']);
    
    return $response->withStatus(302)->withHeader("Location", BASE_URL);
});
