<?php

$currentpassword = $_REQUEST['currentpassword'];
$newpassword = $_REQUEST['newpassword'];
$retypenewpassword = $_REQUEST['retypenewpassword'];

echo " Enter your current password ";

if($currentpassword == $newpassword){
 
     echo " Change your new password correctly ";

}
 else{

    echo " Password is changing correct way ";
 }

 if($newpassword == $retypenewpassword){
 
    echo " Password has modified ";

}
  else{
     
       echo " Password is not matching with new password ";
       echo " Please provide the same password as new password ";

  }





?>