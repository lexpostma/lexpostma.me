<?=$title?>
<p class="filterText"><?=$summary?></p>

<article class="projectPost">
    <?=$body?>
    

    <div id="infoBlock<?=$shortname?>" class="contentBlock morePostInfoBlock">
<?
    if(isset($clientPromo)){
        $clientPromoImg = $clientPromo;
        if($clientPromo == 'peerby'){ $clientPromoImg .= 'Light'; }
?>
        <a href="<?=makeNewFilterURL('client').'&client='.$clientPromo?>" title="View projects for <?=$clientCount?>"><img class="infoClientLogo" src="/img/logos/<?=$clientPromoImg?>.svg"></a>
<?
    }
?>
        <ul class="fa-ul">
            <?=$portfolioFooter?>
            <li><i class="fa-li fa fa-share-square-o"></i>Share or comment on <? $shareFrom = 'Portfolio'; include 'sharing.php';?></li>
        </ul>        
    </div>
</article>

<aside class="otherProjects">
    <h2>Check out these other projects&hellip;</h2>
<?
    $otherProjectsPortfolioResult = mysqli_query($con,$otherProjectsPortfolioSQLquery);

    while($row = mysqli_fetch_array($otherProjectsPortfolioResult)){
        include 'portfolioVariables.php';
        echo '<div class="portfolioItem">';

?>    
        <a href="/<?=$shortname?>" style="background-image: url(/img/portfolio/<?=$shortname?>-1.png);" title="<?=$plainTitle?>">
            <div class="portfolioItemText">
                <span class="portfolioItemTitle"><?=$plainTitle?></span>
                <span class="portfolioItemSummary"><?=$summary?></span>
                <!-- <span><?=$category.' from '.$year?></span> -->
            </div>
        </a>

<?
        echo '</div>';
    };

?>
</aside>