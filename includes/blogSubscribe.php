<ul class="cellRowGroup">
    <li class="cellRow">
        <a class="cellRowContent" href="<?=$blogTwitterURL?>">
            <div class="cellIcon twitter"><i class="fa fa-fw fa-twitter"></i></div>
            <span class="cellLabel">Follow @lexpostmame</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>

    <li class="cellRow">
        <a class="cellRowContent" href="<?=$blogFeedURL?>">
            <div class="cellIcon rss"><i class="fa fa-fw fa-rss"></i></div>
            <span class="cellLabel">RSS feed</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>


<?
    if ($currentEnvironment !== 'production') {
?>

    <li class="cellRow">
        <a class="cellRowContent" href="<?=$blogJSONURL?>">
            <div class="cellIcon json"><i class="fa fa-fw fa-code"></i></div>
            <span class="cellLabel">JSON feed</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>


    <li class="cellRow">
        <a class="cellRowContent" href="<?=$blogAppleNewsURL?>">
            <div class="cellIcon appleNews"><i class="fa fa-fw fa-newspaper-o"></i></div>
            <span class="cellLabel">Apple News</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
    
<?
    }
?>
</ul>