<?
    header('HTTP/1.1 404 Not Found'); //This may be put inside err.php instead
    $_GET['e'] = 404; //Set the variable for the error code (you cannot have a querystring in an include directive).

    $errNum  = 404;
    $errName = 'Page Not Found';
    $errText = 'This page doesn’t exist. Please find your way <a href="#" onclick="historyBackWFallback()">back</a> or a new way forward from the navigation menu.';

    include '../includes/error-index.php';
?>