<?php
$app->get('/ventaDet', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM ventadet;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/ventaDet', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO ventadet (venta_id, articulo_id, cantidad, precio, descuento, total) VALUES (:venta_id, :articulo_id, :cantidad, :precio, :descuento, :total)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("venta_id", $input['venta_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->bindParam("precio", $input['precio']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("total", $input['total']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/ventaDet/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE ventadet SET venta_id = :venta_id, articulo_id = :articulo_id, cantidad = :cantidad, precio = :precio, descuento = :descuento, total = :total WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("venta_id", $input['venta_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("cantidad", $input['cantidad']);
    $sth->bindParam("precio", $input['precio']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("total", $input['total']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/ventaDet/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM ventadet WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




