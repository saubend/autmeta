<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Administratoriai</h1>
        <br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
        }

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset ($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pws-not-match']))
        {
            echo $_SESSION['pws-not-match'];
            unset ($_SESSION['pws-not-match']);
        }
        if(isset($_SESSION['change-pws']))
        {
            echo $_SESSION['change-pws'];
            unset ($_SESSION['change-pws']);
        }
        ?>
<br><br>

        <a href="add-admin.php" class="btn-primary">Pridėti</a>
        <br></br>
        <table class = "tbl-full">
            <tr>
                <th>Nr.</th>
                <th>Vardas</th>
                <th>Vartotojas</th>
                <th>Veiksmai</th>
            </tr>

<?php

$sql = "SELECT * FROM tbl_admin";
$res = mysqli_query($conn, $sql);
if($res == true)
{
    $count= mysqli_num_rows($res);
    if ($count>0)
    {
        while($rows=mysqli_fetch_assoc($res))
        {
            $id = $rows['id'];
            $full_name=$rows['full_name'];
            $username=$rows['username'];
        
                ?>

                <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                    
                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Atnaujinti</a>
                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Keisti slaptažodį</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-delete">Ištrinti</a>
                </td>
                </tr>

                <?php
        }
    }
    else
    {

    }
}


?>

            
        </table>


    </div>
</div>

<?php include('partials/footer.php'); ?>