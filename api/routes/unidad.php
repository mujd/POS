<?php
$app->get('/unidad', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM unidad;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/unidad', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO unidad (nombre) VALUES (:nombre)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/unidad/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE unidad SET nombre = :nombre WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/unidad/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM unidad WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




