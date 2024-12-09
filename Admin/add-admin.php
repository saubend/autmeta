<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Pridėti adminstratorių</h1>
        <br></br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Vardas</td>
                    <td><input type="text" name="full_name" placeholder="Įveskite vardą"></td>
                </tr>
                <tr>
                    <td>Vartotojas</td>
                    <td><input type="text" name="username" placeholder="Vartotojo vardas"></td>
                </tr>
                <tr>
                    <td>Slaptažodis</td>
                    <td><input type="password" name="password" placeholder="Įveskite slaptažodį"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Pridėti" class="btn-primary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

<?php
    if(isset($_POST['submit']))
    {
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $password = md5($_POST['password']); //password encryption
      $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
      ";
        


      $res = mysqli_query($conn, $sql) or die (mysqli_error());
      if($res==true)
      {
        $_SESSION['add'] = "<div class='success'>Administratorius pridėtas sėkmingai</div>";
        header("location:" .SITEURL.'Admin/manage-admin.php');
          }
      else{
        $_SESSION['add'] = "<div class='error'>Administratorius nepridėtas</div>";
        header("location:" .SITEURL.'Admin/manage-admin.php');
      }
      
    }
    
?>