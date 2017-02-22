<?php
$app->get('/facturaProveedorDet', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM facturaproveedordet;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/facturaProveedorDet', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO facturaproveedordet (factura_id, articulo_id, codigo, descripcion, cantidad, neto) VALUES (:factura_id, :articulo_id, :codigo, :descripcion, :cantidad, :neto)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("factura_id", $input['factura_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("codigo", $input['codigo']);
    $sth->bindParam("descripcion", $input['descripcion']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->bindParam("neto", $input['neto']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/facturaProveedorDet/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE facturaproveedordet SET factura_id = :factura_id, articulo_id = :articulo_id, codigo = :codigo, descripcion = :descripcion, cantidad = :cantidad, neto = :neto WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("factura_id", $input['factura_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("codigo", $input['codigo']);
    $sth->bindParam("descripcion", $input['descripcion']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->bindParam("neto", $input['neto']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/facturaProveedorDet/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM facturaproveedordet WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




