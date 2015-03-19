<?php
$loginFrame = "";


include('login.php');

if (isset($success))
{
}
else
{
    $loginFrame= $loginFrame."
    <table border=0>
    <b class=\"error\">".$error."</b><br>
            <form action='' method='post'>
                <tr>
                    <td><label>E-Mail:</label></td>
                    <td><input id='name' name='username' placeholder='username@example.com' type='text'></td>
                </tr>
                <tr>
                    <td><label>Passwort:</label></td>
                    <td><input id='password' name='password' placeholder='*********' type='password'></td>
                </tr>
                <tr>
                    <td><input name='submit' type='submit' value=' Einloggen '></td>
                </tr>
            </form>
        </table>";
}


?>