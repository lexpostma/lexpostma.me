<?    
    # CONNECTION
	define("HOST", getenv('LEXPOSTMA_HOST'));
	define("USER", getenv('LEXPOSTMA_USER'));
	define("PASSWORD", getenv('LEXPOSTMA_PASSWORD'));
	define("DATABASE", getenv('LEXPOSTMA_DATABASE'));

	$con = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    mysqli_set_charset($con, "utf8mb4");
?>