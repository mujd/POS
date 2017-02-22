<?php
$app->get('/ventaCab', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM ventacab;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/ventaCab', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO ventacab (usuario_id, boleta, fecha, total, tarjeta) VALUES (:usuario_id, :boleta, :fecha, :total, :tarjeta)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("boleta", $input['boleta']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("total", $input['total']);
    $sth->bindParam("tarjeta", $input['tarjeta']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/ventaCab/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE ventacab SET usuario_id = :usuario_id, boleta = :boleta, fecha = :fecha, total = :total, tarjeta = :tarjeta WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("boleta", $input['boleta']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("total", $input['total']);
    $sth->bindParam("tarjeta", $input['tarjeta']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/ventaCab/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM ventacab WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




