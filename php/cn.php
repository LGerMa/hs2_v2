<?php
function cnx(){
<<<<<<< HEAD
    $host="mysql.hostinger.es";
    $dbUser="u412462617_root";
    $dbPass="insafocoop";
    $myDB="u412462617_insaf";
=======
    $host="localhost";
    $dbUser="root";
    $dbPass="";
    $myDB="insafocoop";
>>>>>>> dev_monti
    $cnx=mysqli_connect($host,$dbUser,$dbPass,$myDB);
    return $cnx;
}

function pruebaCnx(){
<<<<<<< HEAD
    $host="mysql.hostinger.es";
    $dbUser="u412462617_root";
    $dbPass="insafocoop";
    $myDB="u412462617_insaf";
=======
    $host="localhost";
    $dbUser="root";
    $dbPass="";
    $myDB="insafocoop";
>>>>>>> dev_monti
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