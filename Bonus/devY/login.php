<?php
if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['email'];

    $db = new PDO("mysql:host=localhost;dbname=login;charset=utf8", "root", "");
        
    $sql = "SELECT * FROM utilisateur where email = '$email'";
    $result = $db ->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if(password_verify($password,$data[0]["password"]))
        {
            echo "connexion établie";
        }
    }
    else
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateur (email,password) VALUES ('$email','$password')";
        $req = $db->prepare($sql);
        $req->execute();
        echo"Enregistrement effectué";
    }
}