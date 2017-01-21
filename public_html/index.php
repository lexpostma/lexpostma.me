<?
    require_once '../includes/connection.php';
    require_once '../includes/domains.php';
    
    $secondpage = 'home';
    if(isset($_GET['p'])){
        $p = strtolower(mysqli_real_escape_string($con,$_GET['p']));
        if($p == 'credit' || $p == 'credits'){
            $homepage = 'credits';
        } else if($p == 'apple') {
            $homepage = 'apple';
        };
    };
    

    require_once '../includes/Michelf/MarkdownExtra.inc.php';
    require_once '../includes/text-scripts.php';
    require '../includes/prehead-'.$homepage.'.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<?  include '../includes/head.php'; ?>

    <body>
        <div id="top"></div>
<?
    require '../includes/navigation.php';
?>
        <main id="contents" class="<?=$homepage.' '.$secondpage?>">
            <? if(isset($includePage)){ require ('../includes/'.$includePage); } else{ echo '404'; }; ?>
        </main>
<?
    include '../includes/footer.php';

    if(isset($tweetOn)){?>		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script><script>$(".twitter-tweet").attr({"align":"center"});</script><?};
	if(isset($codeOn)){?>		<script src="/scripts/prism.js"></script><?};
?>
    </body>
</html>