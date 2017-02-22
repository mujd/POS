<?php
$app->get('/cierreCab', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM cierrecab;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/cierreCab', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO cierrecab (fecha, usuario_id, apertura, total, efectivo, tarjeta, contabilizacion, diferencia) VALUES (:fecha, :usuario_id, :apertura, :total, :efectivo, :tarjeta, :contabilizacion, :diferencia)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("apertura", $input['apertura']);
    $sth->bindParam("total", $input['total']);
    $sth->bindParam("efectivo", $input['efectivo']);
    $sth->bindParam("tarjeta", $input['tarjeta']);
    $sth->bindParam("contabilizacion", $input['contabilizacion']);
    $sth->bindParam("diferencia", $input['diferencia']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/cierreCab/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE cierrecab SET fecha = :fecha, usuario_id = :usuario_id, apertura = :apertura, total = :total, efectivo = :efectivo, tarjeta = :tarjeta WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("apertura", $input['apertura']);
    $sth->bindParam("total", $input['total']);
    $sth->bindParam("efectivo", $input['efectivo']);
    $sth->bindParam("tarjeta", $input['tarjeta']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/cierreCab/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM cierrecab WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




