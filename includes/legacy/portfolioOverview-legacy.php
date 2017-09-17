<?
    echo $introTitle;

    $portfolioListResult = mysqli_query($con,$corePortfolioSQLquery);
    if (mysqli_num_rows($portfolioListResult)==0){
        echo '<aside class="contentBlock noResults"><p class="filterText">There are no projects that match all these filters<br><i class="fa fa-frown-o" aria-hidden="true"></i></p></aside>';
    }
    else {
        echo '<div class="overviewPortfolio">';
        while($row = mysqli_fetch_array($portfolioListResult)){
            include 'portfolioVariables.php';
            echo '<div class="portfolioItem">';

            if(isset($videoFilter)){ // video items
?>
            <a href="http://vimeo.com/<?=$videoid?>" class="video-in-link play" onclick="ga('send', 'event', 'Portfolio', 'Play video', '<?=$plainTitle?>');" style="background-image: url(/public-files/images/portfolio/<?=$shortname?>-1.png);" title="Play <?=$plainTitle?>'s video">
                <div class="portfolioItemText">
                    <span class="portfolioItemPlayButton"><i class="fa fa-play-circle"></i></span>
                    <span class="portfolioItemTitle"><?=$plainTitle?></span>
                </div>
            </a>
            <div class="video-container">
                <!--
                    <a class="portfolioLinkOnVideo" href="/<?=$shortname?>" title="<?=$plainTitle?>"><?=$plainTitle?><i class="fa fa-angle-right"></i></a>
                    <figure id="video<?=$shortname?>">
                		<iframe src="//player.vimeo.com/video/<?=$videoid?>?autoplay=1&title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="1920" height="1080" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                		</iframe>
                	</figure>   
                -->
            </div>

<?                
            } else { // regular portfolio items
?>
            <a href="/<?=$shortname?>" style="background-image: url(/public-files/images/portfolio/<?=$shortname?>-1.png);" title="<?=$plainTitle?>">
                <div class="portfolioItemText">
                    <span class="portfolioItemTitle"><?=$plainTitle?></span>
                    <span class="portfolioItemSummary"><?=$summary?></span>
                    <!-- <span><?=$category.' from '.$year?></span> -->
                </div>
            </a>

<?
            };
            echo '</div>';
        };
        echo '</div>';
    };
    
    
    if(isset($videoFilter)){ // script to have inline videos onclick
?>

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
<?
    }
?>