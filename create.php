<?php
require_once('Models/Todo.php');
// ユーザーが入力したタスクを変数に格納

$task = $_POST['task'];

// Todoクラスのインスタンスを作成し、変数todoにいれる
$todo = new Todo();

// Todoクラスのcreateメソッドを実行
$todo ->create($task);

header('Location: index.php');


// echo "<br>";
// echo $todo ->table;
// echo "<br>";
// var_dump($todo ->db_manager);
