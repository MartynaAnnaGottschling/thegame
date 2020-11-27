<?php

  // file contains parametres for database connection
  require_once "connectdb.php";
  /*
    use 'require' instead of 'include' because
    'require' will generate a fatal error and stop script
    if the file to be included can't be found

    use 'require_once' instead of 'require' because
    it's needed to be done once
  */

  // connect to database
  $connection = @new mysqli($host,$db_user,$db_password,$db_name);

  // if connection to database failed
  if ($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno;
  }
  // if connect to database is successful
  else{

    echo "Connected to database ".$db_name;

    // close connection
    $connection->close();
  }

 ?>
