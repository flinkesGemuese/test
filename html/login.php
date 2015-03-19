<?php
session_start();
include_once 'db_connect.php';
$error = '';

if(isset($_POST['submit']))
{
    if (!empty($_POST['username']) && !empty($_POST['password']))
    {
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
        
        if (mysqli_connect_errno())
        {
            $error = 'asdsf';
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $query = "SELECT id, email, name, surname FROM users WHERE `password` = '$password' AND `email` = '$username';";
        
        
        if ($result = mysqli_query($db, $query))
        {
            if ($row = $result->fetch_object())
            {
                $_SESSION['id'] =  $row->id;
                $_SESSION['email'] = $row->email;
                $_SESSION['name'] = $row->name;
                $_SESSION['surname'] = $row->surname;
                $error = 'Login!';
                header("location: profile.php"); // Redirecting To Other Page
            }
            else
                $error = 'Unknown error';
        }
        else
            $error = 'Benutzername oder Passwort falsch!';
        
    }
    else
        $error = 'Geben Sie den Benutzernamen und Passwort ein!';
}
?>