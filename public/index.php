<?php
use Libs\App;
use Libs\Http\Request;


 

require '../vendor/autoload.php';


$app = new App();
$response = $app->run(Request::fromGlobals());
$response->send();


//  echo '<pre>';
//  var_dump($response);
//  echo '</pre>';
