<?
    $seoSiteName = 'Lex Postma.me';
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
        <title><?=$seoTitle?></title>
<?
    if($basepageTwo == 'apple' || $currentEnvironment !== 'production'){?>
        <meta name="robots" content="noindex" />
<?
    };
?>
        <base href="<?=$baseURL?>">

        <!-- Icons -->
        <link rel="mask-icon" href="/images/icons/safariPinnedTabPixelBounds.svg" color="#4B0082">
        <link rel="shortcut icon" type="image/ico" href="/images/icons/favicon.png" />
        
        <!-- Standard SEO / Google -->
        <meta name="description" content="<?=$seoDescription?>" />
        <meta name="keywords" content="<?=$seoKeywords?>" />
        <meta name="author" content="<?=$seoAuthor?>" />
        <meta name="copyright" content="Copyright (c) 2011-<?=date('Y')?> by Lex Postma" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?
    if($currentEnvironment == 'test'){
?>
        <meta name='robots' content='noindex,nofollow' />
<?
    };
    if(isset($nextPostTitle)){?>
        <link rel="next" title="<?=$nextPostTitle?>" href="<?=$nextPostURL?>">
<?
    };
    if(isset($prevPostTitle)){?>
        <link rel="prev" title="<?=$prevPostTitle?>" href="<?=$prevPostURL?>">
<?
    };
    
    if(isset($canonicalWorthy)){
        $canonicalURL = $baseURL.$canonicalWorthy;
    } else {
        $canonicalURL = $baseURL;
    }
?>
        <link rel="canonical" href="<?=$canonicalURL?>" />
        <link rel="author" href="/humans.txt">
        <link rel="license" href="/copyright">
<?
    if($basepage == 'blog'){
?>
        <link rel="alternate" href="<?=$blogFeedURL?>" type="application/rss+xml" title="RSS">
        <link rel="archives" href="<?=$blogURL?>filter/mode=archive">
<?
    } else if ($basepage == 'portfolio'){
?>
        <link rel="archives" href="<?=$portURL?>all">
<?

    }
?>
        <link rel="index" href="<?=$coreURL?>">

        <!-- Open Graph protocol / Facebook -->
        <meta property="og:title" content="<?=$seoTitle?>" />
        <meta property="og:description" content="<?=$seoDescription?>" />
        <meta property="og:url" content="<?=$currentURL?>" />
<?  if(isset($seoImage)){?>
        <meta property="og:image" content="<?=$seoImage?>"/>
        <meta property="og:image:secure_url" content="<?=$seoImage?>"/>
<?  }; ?>
        <meta property="og:type" content="<?=$seoType?>" />
        <meta property="og:site_name" content="<?=$seoSiteName?>" />
        <meta property="fb:admins" content="1308188724" />
<?  if(isset($seoPubDate)){?>
        <meta property="article:published_time" content="<?=$seoPubDate?>"/>
<?  };
    if(isset($seoPubDateUpdate)){?>
        <meta property="article:modified_time" content="<?=$seoPubDateUpdate?>"/>
<?  }; ?>
        <meta property="article:publisher" content="<?=$seoSiteName?>" />
        <meta property="article:author" content="<?=$seoAuthor?>" />
        
        <!-- Twitter (Cards) -->
        <meta name="twitter:widgets:link-color" content="#F04400" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:url" content="<?=$currentURL?>">
        <meta name="twitter:title" content="<?=$seoTitle?>">
        <meta name="twitter:description" content="<?=$seoDescription?>">
<?
    if(isset($seoImage)){
        $seoImageSize = seoImageSizeScan($seoImage);
        if ($seoImageSize == 'large'){
?>
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image:src" content="<?=$seoImage?>">
<?            
        } else {
?>
        <meta name="twitter:image" content="<?=$seoImage?>">
        <meta name="twitter:card" content="summary">
<?
        };
    } else {
?>
        <meta name="twitter:card" content="summary">
<?            
    }
?>
        <meta name="twitter:creator" content="@lexpostma">
        <meta name="twitter:site" content="@lexpostmame">
        
        <!-- Apple / iOS -->
<?
    if(isset($customIcon)) {
?>
        <meta name="apple-mobile-web-app-title" content="   ‍   " />
<?
    } else {
?>
        <meta name="apple-mobile-web-app-title" content="Lex Postma" />
<?
    }
?>
        <meta name="apple-mobile-web-app-capable" content="no" /> <!-- TODO: yes -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
<?
    if(isset($customIcon)) {
        $iconPath = '/images/icons/custom/white-on-black-border/';
    } else if($currentEnvironment == 'production' ){
        $iconPath = '/images/icons/';
    } else if($currentEnvironment == 'test' ){
        $iconPath = '/images/icons/test/';
    } else {
        $iconPath = '/images/icons/dev/';
    }
?>
        <link rel="apple-touch-icon-precomposed" 	sizes="120x120"		href="<?=$iconPath?>Icon-60@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="180x180"		href="<?=$iconPath?>Icon-60@3x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="76x76"		href="<?=$iconPath?>Icon-76.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="152x152"		href="<?=$iconPath?>Icon-76@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="167x167"		href="<?=$iconPath?>Icon-83.5@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="80x80"		href="<?=$iconPath?>Icon-Small-40@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="60x60"		href="<?=$iconPath?>Icon-Small-60.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="120x120"		href="<?=$iconPath?>Icon-Small-60@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="180x180"		href="<?=$iconPath?>Icon-Small-60@3x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="29x29"		href="<?=$iconPath?>Icon-Small.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="58x58"		href="<?=$iconPath?>Icon-Small@2x.png" />
        <link rel="apple-touch-icon-precomposed" 	sizes="87x87"		href="<?=$iconPath?>Icon-Small@3x.png" />

        <!-- Microsoft / Metro -->
        <meta name="msapplication-TileColor" content="#47257E">
        <meta name="msapplication-TileImage" content="/images/icons/metro.png">

        <!-- Pinterest -->
        <meta name="p:domain_verify" content="06c4f3327c9c9b5ae87545dc4fa3a3ad"/>

        <!-- Styles and scripts -->
        <link rel="stylesheet" href="/styles/normalize.css">
        <link rel="stylesheet" href="/styles/global.css">
        <link rel="stylesheet" href="/styles/navigation.css">
        <link rel="stylesheet" href="/styles/<?=$basepage?>.css">
        <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="/scripts/jquery-1.12.0.min.js"></script>

<?
//         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
//         <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>


    if(isset($footnoteOn) || $basepage == 'resume'){
?>
        <!-- Bigfoot • jQuery plugin for empowering footnotes -->
    	<script type="text/javascript" src="/scripts/bigfoot.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="/styles/bigfoot-number.css" />
    	<script type="text/javascript">
    	    var bigfoot = $.bigfoot(
    	        {
                    positionContent		: "true",
<?
        if ($basepage == 'resume'){?>
                    actionOriginalFN    : "delete",
<?
        }
        else{?>
    		        actionOriginalFN    : "ignore", // "delete", "hide", or "ignore"
                    preventPageScroll   : false,
                    numberResetSelector : "article",
<?      }?>
    	        }
    	    );
    	</script>
<?
    };


    // detect whether browser is mobile, use FastClick to optimize touches
    require_once("Mobile_Detect.php");
    $detect = new Mobile_Detect();
//     if( $detect ->isMobile()) {};

?>

		<!-- FitVids.js • a lightweight, easy-to-use jQuery plugin for fluid width video embeds -->
        <script src="/scripts/jquery.fitvids.js"></script>
        <script>
          $(document).ready(function(){
            $("#contents").fitVids();
          });
        </script>

		
		<!-- PlusAnchor • smooth scrolling to anchors -->
		<script type="text/javascript" src="/scripts/jquery.plusanchor.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('body').plusAnchor({
				    easing: 'swing', // defaults are 'swing' and 'linear'. Else requires the easing.js plugin
				    speed:  300      // milisecons it takes to complete a transition
				});	
			});
		</script>

<?
    if ( $basepage == 'portfolio' && $basepageTwo == 'post' && $photoGallery !== '' ){
?>

        <!-- PhotoSwipe • JavaScript gallery, no dependencies -->
        <link rel="stylesheet" href="/styles/photoswipe.css"> 
        <link rel="stylesheet" href="/styles/default-skin/default-skin.css"> 
        <script src="/scripts/photoswipe.min.js"></script> 
        <script src="/scripts/photoswipe-ui-default.min.js"></script> 

<?
    }
?>
		<!-- Google Analytics -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-41655156-1', 'auto');
          ga('send', 'pageview');
        
        </script>
    </head>