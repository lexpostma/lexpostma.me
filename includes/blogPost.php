<article class="contentBlock">
    <?=$title.$blogHeaderByline.$body?>


<?
    if(isset($basepageTwo) && $basepageTwo == 'post'){
?>
    <div class="blog-share"><? $shareFrom = 'Blog'; include 'sharing.php';?></div>
<?
    }
?>    


</article>