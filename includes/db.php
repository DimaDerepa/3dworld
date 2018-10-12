<?


$connection = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['name']
);

if( $connection == false )
	{
		echo 'Error connection with database!!!<br>';
		echo mysqli_connect_error();
		exit();
	}