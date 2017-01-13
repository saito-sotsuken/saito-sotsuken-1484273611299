<html>

	<head>
		<title>料理データの登録</title>
	</head>

	<body>
		<form method="POST"  enctype="multipart/form-data"  action="recipe_photo_process.php">
			<p>
				料理名：<br />
				<input type="text" name="name" size="40" maxlength="35" />
			</p>
			<p>
				料理の識別番号：<br />
				<input type="text" name="type" size="5" maxlength="3" />
			</p>
			<p>
				日時：<br />
				<input type="text" name="day" size="10" maxlength="10" />
			</p>
			<p>
				メモ：<br />
				<input type="text" name="memo" size="50" maxlength="30" />
			</p>
			<p>
				画像<br />
			</p>

			<input type="file" name="photo" size="50" />
			<input type="submit" value="登録" />
		</form>
	</body>
</html>