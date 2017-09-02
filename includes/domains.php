<?
    # DOMAINS
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($_SERVER['HTTP_HOST'], 'dev.lexpostma.me') !== false) {
        $test = true;
        
        $portURL = "http://portfolio.dev.lexpostma.me/";
        $blogURL =      "http://blog.dev.lexpostma.me/";
        $resuURL =    "http://resume.dev.lexpostma.me/";
        $abouURL =           "http://dev.lexpostma.me/";
        
    	// MAMP testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.dev.lexpostma.me'){ $basepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.dev.lexpostma.me'){ $basepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.dev.lexpostma.me'){ $basepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.dev.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'dev.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; };

        $coreURL = $portURL;
    }
    else {
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

        $coreURL = $portURL;
    }
?>