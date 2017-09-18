<?
//     echo $introTitle;

    $portfolioListResult = mysqli_query($con,$corePortfolioSQLquery);
    if (mysqli_num_rows($portfolioListResult)==0){
        
        // Empty state, if no projects are found
        echo '<aside class="contentBlock noResults"><p class="filterText">There are no projects that match all these filters<br><i class="fa fa-frown-o" aria-hidden="true"></i></p></aside>';
        
    } else {
        
?>
    <div class="overviewPortfolio">
<?
        
        while($row = mysqli_fetch_array($portfolioListResult)){

            include 'portfolioVariables.php';

?>
        <div class="portfolioItem">
            <div class="portfolioItemImage" style="background-image: url(/public-files/images/portfolio/<?=$shortname?>-1.png);" alt="<?=$plainTitle?>">
<?
             if( !empty($videoid) ){
?>
                <a href="http://vimeo.com/<?=$videoid?>" 
                        class="video-in-link play" 
                        onclick="ga('send', 'event', 'Portfolio', 'Play video', '<?=$plainTitle?>');" 
                        title="Play <?=$plainTitle?>'s video">
                    <? include 'navigationIcons/play.svg';?>
                </a>
                <div class="video-container">
                <!--
                    <figure id="video<?=$shortname?>">
                		<iframe src="//player.vimeo.com/video/<?=$videoid?>?autoplay=1&title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="1920" height="1080" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                		</iframe>
                	</figure>   
                -->
                </div>
<?
             }
?>

            </div>
            <a href="/<?=$shortname?>" title="<?=$plainTitle?>" class="projectTitle"><?=$plainTitle?></a>
<!--             <div class="year"><span><?=$year?></span></div> -->
            <p class="portfolioItemSummary"><?=$summary?></p>
            <hr>
        </div>
<?
        };
?>
    </div>
<?
    };

?>

<!-- Script for inline videos onclick -->
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){
       $("a.video-in-link").one('click',function(){
          var anchor = $(this).next("div.video-container");
          anchor.html(anchor.html().replace('<!--','').replace('-->',''));
          anchor.removeAttr('href');
          anchor.addClass('show');
          return false;
       })
    })
    //]]>
</script>



<script src="/scripts/jquery.hover3d.js"></script>



<script>

$(".portfolioItem").hover3d({
	selector: ".portfolioItemImage",
	shine: true,
	sensitivity: 20,
});

</script>
