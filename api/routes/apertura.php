<?php
$app->get('/apertura', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM apertura;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/apertura', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO apertura (fecha, usuario_id, apertura) VALUES (:fecha, :usuario_id, apertura)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("apertura", $input['apertura']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/apertura/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE apertura SET fecha = :fecha, usuario_id = :usuario_id, apertura = :apertura WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("apertura", $input['apertura']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/apertura/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM apertura WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




