<?php

// login123.php

require_once('./dbinfo.inc.php');
//include("config.php");

session_start();

function login_form($message)
{
  echo <<<EOD
  <body style="font-family: Arial, sans-serif;">

  <h2>Login Page</h2>
  <p>$message</p>
  <form action="login123.php" method="POST">
    <p>Username: <input type="text" name="user"></p>

    <p>Password: <input type="text" name="passwd"</p>
    <input type="submit" value="Login">
  </form>
  </body>
EOD;
}

if (!isset($_POST['user']) || !isset($_POST['passwd'])) {
  login_form('Welcome');
} else {
  // Check validity of the supplied username & password
  $c = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
  // Use a "bootstrap" identifier for this administration page
  oci_set_client_identifier($c, 'admin');

  /* $s = oci_parse($c, 'select app_username
                      from   php_sec_admin.php_authentication 
                     where  app_username = :un_bv
                   and    app_password = :pw_bv')   and     admin ='Y'; */
	  $s = oci_parse($c, 'select  email,password  from   user_list  
                     where  email = :un_bv
                     and    password = :pw_bv ');
	
  oci_bind_by_name($s, ":un_bv", $_POST['user']);
  oci_bind_by_name($s, ":pw_bv", $_POST['passwd']);
 
  
  oci_execute($s);
  $r = oci_fetch_array($s, OCI_ASSOC);

  if ($r) {
    // The password matches: the user can use the application

    // Set the user name to be used as the client identifier in
    // future HTTP requests:
    $_SESSION['username'] = $_POST['user'];
	
	$_SESSION['password'] = $_POST['passwd'];
    $pass = $_SESSION['password'];
	$ora_user = $_SESSION['username'];
	
	//echo "Done. . $ora_user ";
    echo <<<EOD
    <body style="font-family: Arial, sans-serif;">

    <h2>Login was successful $ora_user </h2>
    <p><a href="login.php">Now Run the Password Management System</a><p>
    </body>
EOD;
   // exit;
  }
  else {
    // No rows matched so login failed
    login_form('Login failed. Enter Valid usernames/passwords ' .
               'or check with Jacob.thomas@oracle.com');
  }
}

?>