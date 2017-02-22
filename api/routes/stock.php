<?php
$app->get('/stock', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM stock;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/stock', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO stock (articulo_id, fecha, stock, costo, venta) VALUES (:articulo_id, :fecha, :stock, :costo, :venta)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("stock", $input['stock']);
    $sth->bindParam("costo", $input['costo']);
    $sth->bindParam("venta", $input['venta']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/stock/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE stock SET articulo_id = :articulo_id, fecha = :fecha, stock = :stock, costo = :costo, venta = :venta WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("stock", $input['stock']);
    $sth->bindParam("costo", $input['costo']);
    $sth->bindParam("venta", $input['venta']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/stock/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM stock WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




