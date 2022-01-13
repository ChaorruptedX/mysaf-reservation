<?php require_once ('../layouts/header.php'); committeeSession(); ?>
<div>
    <h1>My Account</h1>
</div>

<div class="wrapper form">
    <table id="user">
        <tr >
            <th colspan="2" >Account Details</th>
        </tr>
        
        <tr>
            <td><b>Name:</b></td>
            <td>Asyraf Hanif</td>
        </tr>
        
        <tr>
            <td><b>Email:</b></td>
            <td>asyrafteloq@gmail.com</td>
        </tr>
  
        <tr>
            <td><b>Phone Number:</b></td>
            <td>192022</td>
        </tr>

    </table>
    <br>
    <div>
        <a href=""><button class="form submit">Update Account</button></a>
    </div>
</div>

<?php require_once ('../layouts/footer.php'); ?>