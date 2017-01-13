<html>
<head>
<title>料理の検索</title>
</head>

<body>
<!-----料理名検索----->
<form method="POST" action="sample.php">
料理名：
<input type="text" name="name" size="20" />
<input type="submit" value="検索" />
</form>

<?php
if ($_POST['name'] != '') {
	require_once '../DbManager.php';
	try {
		$db = getDb();
		$stt = $db->prepare('SELECT * FROM cook WHERE name LIKE ?');
		$stt->bindValue(1, '%'.$_POST['name'].'%');
		$stt->execute();
		print '<ul>';
		while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
			$id=$row['id'];
			print "<li>{$row['name']} ({$row['memo']})</li>";
			print("<img src=\"sample2.php?id=" . $id . "\">");
		}
		print '</ul>';
		
	$db = NULL;
	} catch (PDOException $e) {
		print("エラーメッセージ：".$e->getMessage());
	}
}else{
	print("料理名を入力してください。<BR>\n");
}
?>
</body>
</html>
