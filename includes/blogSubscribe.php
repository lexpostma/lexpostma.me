<div class="wrappedBox" id="foldBarWithLinks">
        <a href="<? echo $blogFeedURL; ?>" target="_blank" title="Subscribe via RSS" onclick="ga('send', 'event', 'Navigation', 'Subscribe', 'RSS blog');" class="rss">
            <i class="fa fa-rss"></i>RSS feed
    </a><?
        if( $detect->isiOS() ) {
    ?><a href="<? echo $blogAppleNewsURL ?>" target="_blank" title="Subscribe on Apple News" onclick="ga('send', 'event', 'Navigation', 'Subscribe', 'Apple News');" class="appleNews">
            <i class="fa fa-newspaper-o"></i>Apple News
    </a><?
        }
    ?><a href="<? echo $blogTwitterURL ?>" target="_blank" title="Follow this blog on Twitter @lexpostmame" onclick="ga('send', 'event', 'Navigation', 'Subscribe', 'Twitter website');" class="twitter">
            <i class="fa fa-twitter"></i>@lexpostmame
    </a>
</div>