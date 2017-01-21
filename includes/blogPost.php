<article class="contentBlock">
    <?=$title.$blogHeaderByline.$body?>


<?
    if(isset($secondpage) && $secondpage == 'post'){
?>
    <div class="blog-share"><? $shareFrom = 'Blog'; include 'sharing.php';?></div>
<?
    }
?>    


</article>