<?
    $homepage = 'error';
    $secondpage = 'none';
    unset($navName);

    $seoTitle       = $errNum.' • Lex’ website';
    $seoDescription = 'error';
    $seoKeywords    = 'error';
    $seoAuthor      = 'Lex Postma';
    $seoType        = 'website';
?>

<!DOCTYPE HTML>
<html lang="en">
    <? include 'head.php'; ?>
    <body>
        <? include 'navigation.php'; ?>

        <main id="contents" class="<?=$homepage.' '.$secondpage?>">
<!--             <h1 class="filterText"><?=$errNum?></h1> -->
            <article class="contentBlock">
                <h2><?=$errName?><span><?=$errNum?></span></h2>
                <p>
                    <code title="<?=$currentURL ?>"><?=$currentURL ?></code>
                </p>
                <p><?=$errText?></p>
            </article>
        </main>
        <canvas id="c"></canvas>
 		<script type="text/javascript" src="/scripts/matrix.js"></script>
        <script src="/scripts/prism.js"></script>
        <script>
            function historyBackWFallback(fallbackUrl) {
                fallbackUrl = fallbackUrl || 'http://lexpostma.me';
                var prevPage = window.location.href;
            
                window.history.go(-1);
            
                setTimeout( function(){
                    if (window.location.href == prevPage)
                    window.location.href = fallbackUrl;
                }, 500);
            }
        </script>
    </body>
</html>