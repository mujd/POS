<?php
$app->get('/movimientoTipo', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM movimientotipo;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/movimientoTipo', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO movimientotipo (nombre, signo) VALUES (:nombre, :signo)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("signo", $input['signo']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/movimientoTipo/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE movimientotipo SET nombre = :nombre, signo = :signo WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("signo", $input['signo']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/movimientoTipo/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM movimientotipo WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




