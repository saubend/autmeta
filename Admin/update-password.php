<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Keisti slaptažodį</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Slaptažodis: </td>
                    <td>
                        <input type="password" name="current_password" placeholder = "Senas slaptažodis">
                    </td>
                </tr>
                <tr>
                    <td>Naujas slaptažodis: </td>
                    <td>
                    <input type="password" name="new_password" placeholder="Naujas slaptažodis">
                    </td>
                </tr>
                <tr>
                    <td>Patvirtinti slaptažodį: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Patvirtinkite slaptažodį">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Pakeisti slaptažodį" class="btn-secondary">
                    </td>
                </tr>

            </table>



        </form>


    </div>    
</div>

<?php
        if(isset($_POST['submit']))
        {
            $id=$_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            $res = mysqli_query($conn, $sql);
            if($res==true)
            {
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    if($new_password==$confirm_password)
                    {
                        $sql2="UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id=$id
                            ";
                        $res2=mysqli_query($conn, $sql2);
                        if($res2==true)
                        {
                            $_SESSION['change-pws'] = "<div class='success'>Slaptažodis pakeistas</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');        
                        }
                        else
                        {
                            $_SESSION['change-pws'] = "<div class='error'>Slaptažodžio pakeisti nepavyko</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        $_SESSION['pws-not-match'] = "<div class='error'>Slaptažodis nesutampa</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    $_SESSION['user-not-found'] = "<div class='error'>Neteisingas slaptažodis</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

        }




?>










<?php include('partials/footer.php'); ?>