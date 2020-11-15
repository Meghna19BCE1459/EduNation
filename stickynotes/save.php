<?php
//place this code on top of all the pages which you need to authenticate

//--- Authenticate code begins here ---
session_start();
//checks if the login session is true

$username = $_SESSION['sess_user'];

// --- Authenticate code ends here ---

include ('config.php');
$id = $_POST["id"]; 
if(isset($_POST['text'])) {
$text = $_POST['text'];
}
if(isset($_POST['left'])){
$left = $_POST["left"]; 
}if(isset($_POST["top"]))
$top = $_POST["top"]; 
if(isset($_POST['text'])) {
$success_update = mysqli_query($con,"UPDATE sticky_notes SET message='$text' WHERE username='$username' AND id='$id' ");
$sel = mysqli_query($con,"select message from sticky_notes WHERE username='$username' AND id='$id'");
$res = mysqli_fetch_array($sel,MYSQLI_ASSOC);

$message = '<div class="form-group">
            <textarea id="'.$id.'"  class="quick" onchange="">'.$res['message'].'</textarea>
        </div>
       <button data-vendor-id="" data-act="send" onClick="getText('.$id.')" class="btn btn-info save_notes">Save</button>';

 outputJSON($res['message'],'success',$message);

}
if($top || $left) {
$success_update = mysqli_query($con,"UPDATE sticky_notes SET _left='$left', _top='$top' WHERE username='$username' AND id='$id' ");
}

?>