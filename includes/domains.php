<?
    # DOMAINS
    $productionDomain  = 'lexpostma.me';            // Actual URL
    $testingDomain     = 'test.'.$productionDomain; // Digital Ocean testing URL
    $developmentDomain = 'dev.'.$productionDomain;  // MAMP development URL

    
    if (strpos($_SERVER['HTTP_HOST'], $developmentDomain) !== false) {
        
        $currentEnvironment = 'development';
        $currentDomain = $developmentDomain;
        $httpType = 'http://';
        
    } elseif (strpos($_SERVER['HTTP_HOST'], $testingDomain) !== false) {

        $currentEnvironment = 'test';
        $currentDomain = $testingDomain;
        $httpType = 'https://';

    } else {

        $currentEnvironment = 'production';
        $currentDomain = $productionDomain;
        $httpType = 'https://';

    }

    $portURL = $httpType."portfolio.".  $currentDomain."/";
    $blogURL = $httpType."blog.".       $currentDomain."/";
    $resuURL = $httpType."resume.".     $currentDomain."/";
    $abouURL = $httpType.               $currentDomain."/";

        if($_SERVER['HTTP_HOST'] ==      'blog.'.$currentDomain ){ $basepage = "blog";      $baseURL = $blogURL; }
	elseif($_SERVER['HTTP_HOST'] ==    'resume.'.$currentDomain ){ $basepage = "resume";    $baseURL = $resuURL; }
    elseif($_SERVER['HTTP_HOST'] == 'portfolio.'.$currentDomain ){ $basepage = "portfolio"; $baseURL = $portURL; }
	elseif($_SERVER['HTTP_HOST'] ==     'about.'.$currentDomain ){ $basepage = "about";     $baseURL = $abouURL; } // legacy URL
	elseif($_SERVER['HTTP_HOST'] ==              $currentDomain ){ $basepage = "about";     $baseURL = $abouURL; };


    $coreURL = $abouURL;
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";    
    
    $twitterURL         = 'https://twitter.com/lexpostma';    
    $linkedinURL        = 'https://www.linkedin.com/in/lexpostma';
    $dribbbleURL        = 'https://dribbble.com/lexpostma';

    $blogTwitterURL     = 'https://twitter.com/lexpostmame';
    $blogFeedURL        = 'http://feed.lexpostma.me/blog';
    $blogAppleNewsURL   = 'https://apple.news/TBmjmdpQ6SQaZCn5d7fmEdA';
    $blogJSONURL        = 'http://feed.lexpostma.me/blog'; // TODO

?>