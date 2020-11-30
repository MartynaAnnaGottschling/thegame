<?php

  session_start();

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
    // show error code
    echo "Error: ".$connection->connect_errno;
  }
  // if connect to database is successful
  else{

    // handle data sent in POST form
    $login = $_POST['login'];
    $password = $_POST['password'];

    // search for user with given credentials
    $sql = "SELECT * FROM users WHERE email='$login' AND password='$password'";

    // perform query on the database
    $query_result = @$connection->query($sql);
    // returns FALSE on failure

    if ($query_result){
      // how many users are in database with given parametres
      // it also can return 0!
      $how_many_users = $query_result->num_rows;

      // if there is at least one such user
      if ($how_many_users>0){
        // fetch result row - associative array
        // save in session variable
        $_SESSION['logged_user'] = $query_result->fetch_assoc();

        // unset failed verification session variable
        unset($_SESSION['error_login']);

        // free the memory associated with the result
        $query_result->free_result();

        // redirect to logged user's game panel
        header('Location: game.php');
      }
      // if there is no such user
      else {
        
        unset($_SESSION['logged_user']);

        // set failed verification session variable
        $_SESSION['error_login'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        // redirect anonimous user to main site
        header('Location: index.php');
      }
    }
    // false value means query is wrong
    else {

    }


    // close connection
    $connection->close();
  }

 ?>
