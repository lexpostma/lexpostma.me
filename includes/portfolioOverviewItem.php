<?
            include 'portfolioVariables.php';
?>

        <div class="portfolioItem" id="<?=$shortname?>">
            <div class="portfolioItemVisualContainer move">
<?
            if( !empty($videoid) || $basepageTwo !== 'post'){
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
                <div class="portfolioItemLayerContainer">

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

            <div class="cellRow projectTitle">
                <a class="cellRowContent" href="/<?=$shortname?>" title="<?=$plainTitle?>">
                    <span class="cellLabel"><?=$plainTitle?><? if($archived == '1'){ echo '<i class="fa fa-archive" title="This project was archived"></i>'; }?></span>
                    <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
                </a>
            </div>
<?
            if($basepageTwo !== 'post'){
?>
            <div class="cellRow projectSummary">
                <div class="cellRowContent">
                    <hr>
                    <p class="portfolioItemSummary">
                        <span class="year"><span><?=$year?></span></span>
<?
                    echo $summary;
                if( !empty($videoid) && $basepageTwo !== 'post'){
?>
                        <br>
                        <a href="#<?=$shortname?>" stuff="http://vimeo.com/<?=$videoid?>" class="video-in-link portfolioItemPlayVideo" 
                                onclick="ga('send', 'event', 'Portfolio', 'Play video', '<?=$plainTitle?>');" 
                                title="Play <?=$plainTitle?>'s video"><span class="watch">Watch</span><span class="playing">Playing</span> the video<span class="playing">&hellip;</span>
                            <i class="fa fa-play-circle"></i>
                        </a>
<?
                }
?>
                    </p>
                </div>
            </div>
<?
            }
?>
        </div>