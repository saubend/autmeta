<?php 
include('../config/constants.php');
$id=$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id=$id";
$res= mysqli_query($conn, $sql);
if($res==true)
{
    //echo "Administratorius ištrintas";
    $_SESSION['delete'] = "<div class='success'>Administratorius ištrintas</div>";
    header('location:'.SITEURL.'Admin/manage-admin.php');
}
else
{
    $_SESSION['delete']="<div class='error'>Administratoriaus nepavyko ištrinti</div>";
    header('location:'.SITEURL.'Admin/manage-admin.php');
    //echo "Administratoriaus nepavyko ištrinti";
}
?>