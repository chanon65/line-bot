<html>
<head>
<title>ThaiCreate.Com PHP & SQL Server Tutorial</title>
</head>
<body>
<?php
	$objConnect = mssql_connect("DESKTOP-OGFRGSA\SQLEXPRESS","sa","sapwd");
	if($objConnect)
	{
		echo "Database Connected.";
	}
	else
	{
		echo "Database Connect Failed.";
	}

	mssql_close($objConnect);
?>
</body>
</html>