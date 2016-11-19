<?php
function cnx(){
    $url = parse_url(getenv("mysql://b8f8f6119ca584:d8a28425@us-cdbr-iron-east-04.cleardb.net/heroku_6ac98248592533a?reconnect=true"));
    $host="us-cdbr-iron-east-04.cleardb.net";
    $dbUser="b8f8f6119ca584";
    $dbPass="d8a28425";
    $myDB="heroku_6ac98248592533a";
    $cnx=mysqli_connect($host,$dbUser,$dbPass,$myDB);
    return $cnx;
}

function pruebaCnx(){
    $url = parse_url(getenv("mysql://b8f8f6119ca584:d8a28425@us-cdbr-iron-east-04.cleardb.net/heroku_6ac98248592533a?reconnect=true"));
    $host="us-cdbr-iron-east-04.cleardb.net";
    $dbUser="b8f8f6119ca584";
    $dbPass="d8a28425";
    $myDB="heroku_6ac98248592533a";
    $cnx=mysqli_connect($host,$dbUser,$dbPass,$myDB);
    $flag=0;
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        //printf("Conexi&oacute;n fallida: %s\n", mysqli_connect_error());
        $flag=0;
       // exit();
    }

    /* comprobar si el servidor sigue funcionando */
    if (mysqli_ping($cnx)) {
        //printf ("¡La conexi&oacute;n est&aacute; bien!\n");
        $flag=1;
    } else {
        //printf ("Error: %s\n", mysqli_error($enlace));
        $flag=0;
    }

    /* cerrar la conexión */
    mysqli_close($cnx);
    return $flag;
}

?>