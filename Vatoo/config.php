  <?php
  //$con = mysqli_connect("localhost","root","","dailyexpense");
  //if (mysqli_connect_errno())
   // {
    //echo "Failed to connect to MySQL: " . mysqli_connect_error() ." | Seems like you haven't created the DATABASE with an exact name";
   // }

    $host = 'localhost'; // Adresse du serveur Oracle
    $port = '1521'; // Port d'écoute du serveur Oracle
    $service = 'XE'; // Service de la base de données Oracle
    $username = 'system'; // Nom d'utilisateur Oracle
    $password = 'safidy'; // Mot de passe Oracle

    // Connexion à la base de données Oracle
    $con = oci_connect($username, $password, "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=".$host.")(PORT=".$port.")))(CONNECT_DATA=(SERVICE=".$service.")))");
    //echo "connexion réusi";
    if (!$con) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
  ?>