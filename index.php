<?php
require_once '_connec.php';

$pdo = new\PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstname']); 
$lastname = trim($_POST['lastname']);
$query = "INSERT INTO friend (firstname, lastname) VALUES ('$firstname', '$lastname')";
$statement = $pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();



$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);


foreach($friends as $friend){
    echo $friend['firstname'] . ' ' . $friend['lastname']  .'<br/>'; 
    }
?>

<form action = "" method="POST">
    <label for="firstname">Firstname</label>
    <input type="text" id="firstname" name="firstname">
    <br>
    <label for="lastname">Lastname</label>
    <input type="text" id="lastname" name="lastname">
    <br>
    <button type="submit">Send</button>
</form>