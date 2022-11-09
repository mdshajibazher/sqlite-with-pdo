<?php

// sqlite3 db.sql
// create table 
// users(id INTEGER PRIMARY KEY AUTOINCREMENT, name CHAR(100), email CHAR(100))
// INSERT INTO users(name,email) vales('john','john@doe.com');



$pdo = new PDO("sqlite:db.sqlite");
$stmt = $pdo->query("SELECT * FROM users");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

$users = [
    ['name' => 'branda','email' => 'branda@gmail.com'],
    ['name' => 'jane','email' => 'jane@gmail.com'],
];

foreach($users as $user){
    $pdo->query("INSERT INTO users(name,email) VALUES('{$user['name']}','{$user['email']}')");
}

$stmt = $pdo->query("SELECT * FROM users");
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));



//Preaped Statement
echo "Preaped Statement";
$prepared_stmt = $pdo->prepare("select * from users where email= ?");
$prepared_stmt->execute(["john@doe.com"]);
print_r($prepared_stmt->fetchAll(PDO::FETCH_ASSOC));