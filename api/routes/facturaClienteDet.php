<?php
$app->get('/facturaClienteDet', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM facturaclientedet;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/facturaClienteDet', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO facturaclientedet (factura_id, articulo_id, descuento, subTotalNeto, descuento, totalNeto) VALUES (:factura_id, :articulo_id, :descuento, :subTotalNeto, :descuento, :totalNeto)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("factura_id", $input['factura_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("subTotalNeto", $input['subTotalNeto']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("totalNeto", $input['totalNeto']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/facturaClienteDet/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE facturaclientedet SET factura_id = :factura_id, articulo_id = :articulo_id, descuento = :descuento, subTotalNeto = :subTotalNeto, descuento = :descuento, totalNeto = :totalNeto WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("factura_id", $input['factura_id']);
    $sth->bindParam("articulo_id", $input['articulo_id']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("subTotalNeto", $input['subTotalNeto']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("totalNeto", $input['totalNeto']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/facturaClienteDet/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM facturaclientedet WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});

