<?php
$app->get('/movimiento', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM movimiento;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/movimiento', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO movimiento (fecha, usuario_id, movimientoTipo_id, articulo_id, cantidad) VALUES (:fecha, :usuario_id, :movimientoTipo_id, :articulo_id, :cantidad)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("movimientoTipo_id", $input['movimientoTipo_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/movimiento/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE movimiento SET fecha = :fecha, usuario_id = :usuario_id, movimientoTipo_id = :movimientoTipo_id, articulo_id = :articulo_id, cantidad = :cantidad WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("movimientoTipo_id", $input['movimientoTipo_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/movimiento/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM movimiento WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




