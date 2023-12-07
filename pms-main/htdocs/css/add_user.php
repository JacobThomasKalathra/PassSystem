
  <?php
include("config.php");
include ("session.php");
 
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_POST["userName"]==null ||$_POST["grp"]==null ||  $_POST["subgroup"]==null || $_POST["admin"] ==null){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Empty rows not allowed!')
    window.location.href='adduser.php';
    </SCRIPT>");
	break;
}else
$query = "INSERT INTO user_list (guid, grp, subgroup, admin) VALUES
('" . $_POST["userName"] . "', '" . $_POST["grp"] . "', '" . $_POST["subgroup"] . "', '" . $_POST["admin"] . "')";

if ($conn->query($query) == TRUE) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='adduser.php';
    </SCRIPT>");
	
	unset($_POST);
	//header("Location: adduser.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


 mysqli_close($conn);


?>