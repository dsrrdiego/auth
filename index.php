<?php
// con Basic Auth (desde Postman lo podemos probar facil)
// echo 'este es el usuario: '. $_SERVER['PHP_AUTH_USER'];
// echo 'y esta la clave: '. $_SERVER['PHP_AUTH_PW'];

// importante tener estas lineas en el htacces:
// <IfModule mod_rewrite.c>
// 	RewriteEngine On
//      RewriteCond %{HTTP:Authorization} ^(.+)$
//      RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
// </IfModule>


// aca va a venir el token:
$token=$_SERVER['HTTP_AUTHORIZATION'];
echo 'este es el token: '.$token.'<br>';

// este token lo podemos descomponer asi:
$basic = explode(" ",$token);

if($basic[0]!="Basic"){
    echo 'no es valido';   
}  
$decod = base64_decode($basic[1]);
echo 'decodificado: '.$decod.'<br>';

$usuarioYcont = explode(":", $decod);
$user = $usuarioYcont[0];
echo 'usuario: '.$user.'<br>';
$pass = $usuarioYcont[1];
echo 'pwd: '.$pass.'<br>';
// si usuario es tal y clave tal: entra.
