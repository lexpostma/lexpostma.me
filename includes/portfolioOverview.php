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
            <div class="portfolioItemHoverEffect move">
<?
            if( !empty($videoid) ){
?>
                <div class="videoContainer">
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
                <div class="portfolioItemVisualContainer <?=$shortname ?>">

<?
            if ($category == 'Website') {
?>
                    <div class="effect-layer layer-0 portfolioItemWebbar" >
                        <span class="browserUI"><span class="red">•</span><span class="yellow">•</span><span class="green">•</span></span>
                        <span class="url"><?=$domainInBrowserUI?></span>
                    </div>

<?
            }
            
            
            $layerCount = 1;
            while ( $effectLayers != $layerCount-1) {
?>
                    <div class="effect-layer layer-<?=$layerCount?>" style="background-image: url(../public-files/images/portfolio-3d-effect/<?=$shortname ?>-layer-<?=$layerCount?>.png); "></div>
<?
                $layerCount = $layerCount+1;
            }

?>
                    <a href="/<?=$shortname?>" class="effect-layer layer-<?=$layerCount?> portfolioItemLink" ></a>
                </div>
            </div>
            <a href="/<?=$shortname?>" title="<?=$plainTitle?>" class="projectTitle"><? if($archived == '1'){ echo '<i class="fa fa-archive"></i> '; }?><?=$plainTitle?></a>
<?
            if( !empty($videoid) ){
?>
            <a href="#" stuff="http://vimeo.com/<?=$videoid?>" class="video-in-link portfolioItemPlayVideo" 
                    onclick="ga('send', 'event', 'Portfolio', 'Play video', '<?=$plainTitle?>');" 
                    title="Play <?=$plainTitle?>'s video">
                <i class="fa fa-play-circle"></i>
            </a>
<?
            }
?>
<!--             <div class="year"><span><?=$year?></span></div> -->
            <hr>
            <p class="portfolioItemSummary"><?=$summary?></p>


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
          var anchor1 = $(this).siblings("div.portfolioItemHoverEffect");
          var anchor2 = anchor1.children("div.videoContainer");
//           anchor1.removeClass('move');
//           anchor1.removeAttr('href');
          anchor2.html(anchor2.html().replace('<!--','').replace('-->',''));
          anchor2.addClass('show');
          $(this).addClass('hide');
          return false;
       })
    })
    //]]>
</script>



<script src="/scripts/jquery.hover3d.js"></script>



<script>

$(".portfolioItemHoverEffect.move").hover3d({
	selector: ".portfolioItemVisualContainer",
// 	shine: true,
	sensitivity: 10,
});

</script>
