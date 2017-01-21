<?

$scale_id = json_encode($_POST["scale_id"]);
$weging =   json_encode($_POST["scale_val"]);
$stable =   json_encode($_POST["scale_stability"]);
$token =    json_encode($_POST["token"]);

file_put_contents("../rechtstreex/wegingen.json", $scale_id.",".$weging.",".$stable.",".$token);

?>