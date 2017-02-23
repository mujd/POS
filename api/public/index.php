<?php
//http://localhost:32000/clientes
require 'vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "pos";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

$app = new Slim\App(["settings" => $config]);

$container = $app->getContainer();

$corsOptions = array(
  "origin" => "*",
  "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
  "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
);
$cors = new \CorsSlim\CorsSlim($corsOptions);
$app->add($cors);

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->exec("set names utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

require_once('routes/apertura.php');
require_once('routes/articulo.php');
require_once('routes/categoria.php');
require_once('routes/cierreCab.php');
require_once('routes/cierreDet.php');
require_once('routes/cliente.php');
require_once('routes/clienteContacto.php');
require_once('routes/facturaClienteCab.php');
require_once('routes/facturaClienteDet.php');
require_once('routes/facturaProveedorCab.php');
require_once('routes/facturaProveedorDet.php');
require_once('routes/formato.php');
require_once('routes/marca.php');
require_once('routes/movimiento.php');
require_once('routes/movimientoTipo.php');
require_once('routes/proveedor.php');
require_once('routes/proveedorVendedor.php');
require_once('routes/stock.php');
require_once('routes/unidad.php');
require_once('routes/usuario.php');
require_once('routes/ventaCab.php');
require_once('routes/ventaDet.php');


$app->run();
