<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/hello', function () {
    return 'Hello!';
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hola '.$app->escape($name)." <br> <p>Estas son las indicaciones</p>
    <ul><li>
    Diseña e implementa un servicio web con php basado en REST, considera al menos 2 operaciones en el servicio. <ul>
    <li>Despliegue de nombre de Usuario</li><li>Despliegue de información</li></ul>
</li></ul><p> Preguntas a responder
</p><ul><li>¿A qué se refiere la descentralización de servicios web?</li><p>A que toda nuestra aplicación no este y dependa de
los servicios, y capacidades de un único servidor</p>
<li>¿Cómo puede implementarse un entorno con servicios web disponibles aún cuando falle un servidor?</li>
<p>A través de la descentralización de servicios, en varios servidores colocando la misma aplicación, siendo
asi que si existiése algun error en el servidor principal, podriamos hacer uso de algun otro</p></ul>";
});

$app->run();
