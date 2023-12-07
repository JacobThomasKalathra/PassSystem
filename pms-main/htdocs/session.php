<?php
   include('config.php');
   session_start();
   $user_check = $_SESSION['login_user']; // Non Admin User
   $admin_check = $_SESSION['admin_user']; // Admin User
   $sadmin_check = $_SESSION['sadmin_user']; // Super Admin User
   $user_name= $_SESSION['OAM_REMOTE_USER']; // User 
   //$name= $_COOKIE['ORA_UCM_INFO'];
	//$o=explode('~', $name, -1);
	//$user_name=$o[2];

   //Non selection script
 echo '<script type="text/javascript">
if (document.layers) {
    //Capture the MouseDown event.
    document.captureEvents(Event.MOUSEDOWN);
 
    //Disable the OnMouseDown event handler.
    document.onmousedown = function () {
        return false;
    };
}
else {
    //Disable the OnMouseUp event handler.
    document.onmouseup = function (e) {
        if (e != null && e.type == "mouseup") {
            //Check the Mouse Button which is clicked.
            if (e.which == 2 || e.which == 3) {
                //If the Button is middle or right then disable.
                return false;
            }
        }
    };
}
 
//Disable the Context Menu event.
document.oncontextmenu = function () {
    return false;
};
</script>'; 
/////////////////End of the script  
 //setting session variable for user 
   if(isset($_SESSION['login_user'])){
     $ses_sql=("SELECT distinct email FROM user_list where UPPER(email) =UPPER('$user_check')");
	$ses = oci_parse($conn,$ses_sql );
	oci_execute($ses);
    while ($row = oci_fetch_array($ses, OCI_RETURN_NULLS+OCI_ASSOC)) {
	foreach ($row as $item) {
	$login_session = $item; }
}
	$_SESSION['admin_user'] = null;
		 $_SESSION['sadmin_user'] = null;
   }
   
   else{ 
   
//setting session variable for Super Admin   
   if(isset($_SESSION['sadmin_user'])){
         $adm_sql=("SELECT distinct email FROM user_list where UPPER(email) =UPPER('$sadmin_check') and sadmin='Y'");
   $ses1 =  oci_parse($conn, $adm_sql);
			oci_execute($ses1, OCI_DEFAULT);
			    while ($row = oci_fetch_array($ses1, OCI_RETURN_NULLS+OCI_ASSOC)) {
	foreach ($row as $item) {
	$login_session = $item; }
   }
   $_SESSION['admin_user'] = null;
		 //$_SESSION['login_user'] = null;
   }
   
   else {
   
//Setting session variable for Admin	   
   if(isset($_SESSION['admin_user'])){
         $adm_sql=("SELECT distinct email FROM user_list where UPPER(email) =UPPER('$admin_check') and admin='Y'");
		$ses2= oci_parse($conn, $adm_sql);
			oci_execute($ses2, OCI_DEFAULT);
       while ($row = oci_fetch_array($ses2, OCI_RETURN_NULLS+OCI_ASSOC)) {
	foreach ($row as $item) {
	$login_session = $item; }
   }
   $_SESSION['sadmin_user'] = null;
		 //$_SESSION['login_user'] = null;
   }
   
   else{
   //if ($login_session!=$user_check){
	 //   header("location:login.php");
  // }
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   
   }
   }
   
   }   
?>