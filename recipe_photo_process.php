<?php
require_once '../DbManager.php';
try {
  $db = getDb();
  $stt = $db->prepare('INSERT INTO cook(name, type, day, memo) VALUES(:name, :type, :day, :memo)');
  $stt->bindValue(':name', $_POST['name']);
  $stt->bindValue(':type', $_POST['type']);
  $stt->bindValue(':day', $_POST['day']);
  $stt->bindValue(':memo', $_POST['memo']);
  $stt1 = $db->prepare('INSERT INTO photo(type, data) VALUES(:type, :data)');
  $file = fopen($_FILES['photo']['tmp_name'], 'rb');
  $stt1->bindValue(':type', $_FILES['photo']['type'], PDO::PARAM_STR);
  $stt1->bindValue(':data', $file, PDO::PARAM_LOB);
  $stt->execute();
  $stt1->execute();
  $db = NULL;
} catch(PDOException $e) {
  die("エラーメッセージ：{$e->getMessage()}");
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/recipe_photo_form.php');