<?php
include('login.php');


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login form</title>
    </head>
    
    <body>
        <table border=0>
            <form action='' method='post'>
                <tr>
                    <td><label>E-Mail:</label></td>
                    <td><input id='name' name='username' placeholder="username@example.com" type='text'></td>
                </tr>
                <tr>
                    <td><label>Passwort:</label></td>
                    <td><input id='password' name='password' placeholder='*********' type='password'></td>
                </tr>
                <tr>
                    <td><input name='submit' type='submit' value=' LOGIN '></td>
                </tr>
                <span><?php echo $error; ?></span>
            </form>
        </table>
    </body>
</html>