<?php require_once ('../layouts/header.php'); userSession(); ?>
<div>
    <h1>My Account</h1>
</div>

<form method="post" action="update-profile.php">
    <div class="wrapper form">
        <table id="user">
            <tr >
                <th colspan="2" >Account Details</th>
            </tr>
        
            <tr>
                <td><b>Name:</b></td>
                <td><input class="input form" type="text" name="name" value=""></td>
            </tr>
            
            <tr>
                <td><b>Email:</b></td>
                <td><input class="input form" type="email" name="email" value=""></td>
            </tr>
    
            <tr>
                <td><b>Phone Number:</b></td>
                <td><input class="input form" type="number" name="tel_no" value=""></td>
            </tr>
            <tr>
                <td><b>Reset Password:</b></td>
                <td><input class="input form" type="password" name="password" value=""></td>
            </tr>
        </table>

        <div>
            <a href="<?= constant("BASEURL") . 'public/user/update-account.php' ?>"><button class="form submit">Update Account</button></a>
        </div>
    </div> 
</form>

<?php require_once ('../layouts/footer.php'); ?>
