<?
    # DOMAINS
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($_SERVER['HTTP_HOST'], 'test.lexpostma.me') !== false) {
        $test = true;
        
        $portURL = "http://portfolio.test.lexpostma.me/";
        $blogURL =      "http://blog.test.lexpostma.me/";
        $resuURL =    "http://resume.test.lexpostma.me/";
        $abouURL =           "http://test.lexpostma.me/";
        
    	// MAMP testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.test.lexpostma.me'){ $basepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.test.lexpostma.me'){ $basepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.test.lexpostma.me'){ $basepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.test.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'test.lexpostma.me'){ $basepage = "about";     $baseURL = $abouURL; };

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