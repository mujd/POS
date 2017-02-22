<?php
$app->get('/facturaClienteCab', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM facturaclientecab;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/facturaClienteCab', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO facturaclientecab (fecha, usuario_id, cliente_rut, cliente_nombre, cliente_giro, cliente_direccion, cliente_comuna, cliente_telefono, cliente_email, subTotalNeto, descuento, totalNeto, iva, total) VALUES (:fecha, :usuario_id, :cliente_rut, :cliente_nombre, :cliente_giro, :cliente_direccion, :cliente_comuna, :cliente_telefono, :cliente_email, :subTotalNeto, :descuento, :totalNeto, :iva, :total)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("cliente_rut", $input['cliente_rut']);
    $sth->bindParam("cliente_nombre", $input['cliente_nombre']);
    $sth->bindParam("cliente_giro", $input['cliente_giro']);
    $sth->bindParam("cliente_direccion", $input['cliente_direccion']);
    $sth->bindParam("cliente_comuna", $input['cliente_comuna']);
    $sth->bindParam("cliente_telefono", $input['cliente_telefono']);
    $sth->bindParam("cliente_email", $input['cliente_email']);
    $sth->bindParam("subTotalNeto", $input['subTotalNeto']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("totalNeto", $input['totalNeto']);
    $sth->bindParam("iva", $input['iva']);
    $sth->bindParam("total", $input['total']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/facturaClienteCab/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE facturaclientecab SET fecha = :fecha, usuario_id = :usuario_id, cliente_rut = :cliente_rut, cliente_nombre = :cliente_nombre, cliente_giro = :cliente_giro, cliente_direccion = :cliente_direccion, cliente_comuna = :cliente_comuna, cliente_telefono = :cliente_telefono, cliente_email = :cliente_email, subTotalNeto = :subTotalNeto, descuento = :descuento, totalNeto = :totalNeto, iva = :iva, total = :total WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("cliente_rut", $input['cliente_rut']);
    $sth->bindParam("cliente_nombre", $input['cliente_nombre']);
    $sth->bindParam("cliente_giro", $input['cliente_giro']);
    $sth->bindParam("cliente_direccion", $input['cliente_direccion']);
    $sth->bindParam("cliente_comuna", $input['cliente_comuna']);
    $sth->bindParam("cliente_telefono", $input['cliente_telefono']);
    $sth->bindParam("cliente_email", $input['cliente_email']);
    $sth->bindParam("subTotalNeto", $input['subTotalNeto']);
    $sth->bindParam("descuento", $input['descuento']);
    $sth->bindParam("totalNeto", $input['totalNeto']);
    $sth->bindParam("iva", $input['iva']);
    $sth->bindParam("total", $input['total']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/facturaClienteCab/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM facturaclientecab WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




