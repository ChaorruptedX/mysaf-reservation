<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/profile.css' ?>">

</head>
<body style align="center">
    <!-- Main -->
    <div class="main">
    <img src="<?= constant("BASEURL") . 'assets/image/user1.png' ?>" style="width:20%">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td>User ID</td>
                            <td>:</td>
                            <td><input id="uid"  readonly value="<?php echo $userId ?>"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input id="uname"  readonly value="<?php echo $uname ?>"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><input type="text" name="name"  pattern="[A-Za-z\s]{3,50}" title="Alphabets only" value="<?php echo $name ?>"></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>:</td>
                            <td><input type="text" name="contact"  value="<?php echo $contact ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email"  value="<?php echo $email ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="text" name="psswrd"  value="<?php echo $psswrd ?>"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" name="updateAcc" value="Update">
            </div>
        </div>
    <!-- End -->
</body>
</html>