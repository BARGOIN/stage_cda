<?php

$routeur->addRoute('GET', '/api', function () {
    echo 'on est api';
});

$routeur->addRoute('GET', '/', function () {
    echo 'Acceuil';
});

dd($routeur);