<?
    require_once '../includes/connection.php';
    require_once '../includes/domains.php';
    
    $basepageTwo = 'home';
    if(isset($_GET['p'])){
        $p = strtolower(mysqli_real_escape_string($con,$_GET['p']));
        if($p == 'credit' || $p == 'credits'){
            $basepage = 'credits';
        } else if($p == 'apple') {
            $basepage = 'apple';
        };
    };
    

    require_once '../includes/Michelf/MarkdownExtra.inc.php';
    require_once '../includes/text-scripts.php';
    require '../includes/prehead-'.$basepage.'.php';
    
    // Giving a small indication of the environment to looking at
    if($currentEnvironment == 'development'){
        $seoTitle = '🐞 ' . $seoTitle;
    } elseif($currentEnvironment == 'test'){
        $seoTitle = '🚧 ' . $seoTitle;
    }

?>

<!DOCTYPE HTML>
<html lang="en" class=" <?=$basepageTwo ?> ">
<?  include '../includes/head.php'; ?>

    <body>
        <div id="top"></div>
<?
    require '../includes/navigationTitle.php';
    require '../includes/navigationTabbar.php';
?>
        <main id="contents" class="<?=$basepage.' '.$basepageTwo?>">
<?


    if( isset($includePage) ){ 
        require ('../includes/'.$includePage);
    } else { 
        echo '404';
    };
    include '../includes/footer.php';
?>
        </main>
        
        <!-- Hide tabbar on scrolling down, but show on scroll up -->
        <script src="/scripts/stickyNavigation.js"></script>
        
        <!-- Action drawer functions and interaction details -->
        <script src="/scripts/actionDrawer.js"></script>
<?
    if(isset($tweetOn)){
?>
        <!-- Embed tweet styling from Twitter -->
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script><script>$(".twitter-tweet").attr({"align":"center"});</script>
<?
    };
?>
    </body>
</html>