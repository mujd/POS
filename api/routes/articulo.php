<?php
$app->get('/articulo', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM articulo;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/articulo', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO articulo (codigo, categoria_id, marca_id, descripcion, formato_id, cantidad, unidad_id, articulo, estado) VALUES (:codigo, :categoria_id, :marca_id, :descripcion, :formato_id, :cantidad, :unidad_id, :articulo, :estado)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("codigo", $input['codigo']);
    $sth->bindParam("categoria_id", $input['categoria_id']);
    $sth->bindParam("marca_id", $input['marca_id']);
    $sth->bindParam("descripcion", $input['descripcion']);
    $sth->bindParam("formato_id", $input['formato_id']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->bindParam("unidad_id", $input['unidad_id']);
    $sth->bindParam("articulo", $input['articulo']);
    $sth->bindParam("estado", $input['estado']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/articulo/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE articulo SET codigo = :codigo, categoria_id = :categoria_id, marca_id = :marca_id, descripcion = :descripcion, formato_id = :formato_id, cantidad = :cantidad, unidad_id = :unidad_id, articulo = :articulo, estado = :estado WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("codigo", $input['codigo']);
    $sth->bindParam("categoria_id", $input['categoria_id']);
    $sth->bindParam("marca_id", $input['marca_id']);
    $sth->bindParam("descripcion", $input['descripcion']);
    $sth->bindParam("formato_id", $input['formato_id']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->bindParam("unidad_id", $input['unidad_id']);
    $sth->bindParam("articulo", $input['articulo']);
    $sth->bindParam("estado", $input['estado']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/articulo/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM articulo WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




