<?
    # DOMAINS
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($_SERVER['HTTP_HOST'], 'dev.lexpostma.me') !== false) {
        
        $currentEnvironment = 'development';
        
        $portURL = "http://portfolio.dev.lexpostma.me/";
        $blogURL =      "http://blog.dev.lexpostma.me/";
        $resuURL =    "http://resume.dev.lexpostma.me/";
        $abouURL =           "http://dev.lexpostma.me/";
        
    	// MAMP development URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.dev.lexpostma.me'){ $basepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.dev.lexpostma.me'){ $basepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.dev.lexpostma.me'){ $basepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.dev.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'dev.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; };
        
    } elseif (strpos($_SERVER['HTTP_HOST'], 'test.lexpostma.me') !== false) {

        $currentEnvironment = 'test';
        
        $portURL = "https://portfolio.test.lexpostma.me/";
        $blogURL =      "https://blog.test.lexpostma.me/";
        $resuURL =    "https://resume.test.lexpostma.me/";
        $abouURL =           "https://test.lexpostma.me/";
        
    	// Digital Ocean testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.test.lexpostma.me'){ $basepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.test.lexpostma.me'){ $basepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.test.lexpostma.me'){ $basepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.test.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'test.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; };
        
    } else {

        $currentEnvironment = 'production';

        $portURL = "https://portfolio.lexpostma.me/";
        $blogURL =      "https://blog.lexpostma.me/";
        $resuURL =    "https://resume.lexpostma.me/";
        $abouURL =           "https://lexpostma.me/";

    	// Actual URLs
            if($_SERVER['HTTP_HOST'] ==      'blog.lexpostma.me'){ $basepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.lexpostma.me'){ $basepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.lexpostma.me'){ $basepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; };


    }
    $coreURL = $abouURL;
    
    
    $twitterURL         = 'https://twitter.com/lexpostma';    
    $linkedinURL        = 'http://www.linkedin.com/in/lexpostma';
    $dribbbleURL        = 'http://dribbble.com/lexpostma';

    $blogTwitterURL     = 'https://twitter.com/lexpostmame';
    $blogFeedURL        = 'http://feed.lexpostma.me/blog';
    $blogAppleNewsURL   = 'https://apple.news/TBmjmdpQ6SQaZCn5d7fmEdA';
    $blogJSONURL        = 'http://feed.lexpostma.me/blog'; // TODO

?>