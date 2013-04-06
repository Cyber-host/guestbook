<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="/guestbook/js/jquery.js"></script>
		<script src="/guestbook/js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="/guestbook/css/style.css" />
		<title><?php echo $data['title']; ?></title>
	</head>
	<body>
            <?php echo $data['content']; ?>
	</body>
</html>
