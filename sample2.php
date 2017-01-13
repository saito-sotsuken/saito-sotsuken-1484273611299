<?php
require_once '../DbManager.php';


  $db = getDb();
  $stt1 = $db->prepare('SELECT * FROM photo WHERE id =?');
  $stt1->bindValue(1, $_GET['id'] ?: 1);
  $stt1->execute();
  $stt1->bindColumn('type', $type, PDO::PARAM_STR);
  $stt1->bindColumn('data', $data, PDO::PARAM_LOB);
  if ($stt1->fetch(PDO::FETCH_BOUND)) {
    header("Content-Type: {$type}");
    print $data;
  } else {
    print '該当するデータがありません。';
  }
  $db = NULL;
