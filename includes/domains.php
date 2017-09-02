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
    	    if($_SERVER['HTTP_HOST'] ==      'blog.test.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.test.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.test.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.test.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'test.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; };

        $coreURL = $portURL;
    }
    else {
        $portURL = "https://portfolio.lexpostma.me/";
        $blogURL =      "https://blog.lexpostma.me/";
        $resuURL =    "https://resume.lexpostma.me/";
        $abouURL =           "https://lexpostma.me/";

    	// Actual URLs
            if($_SERVER['HTTP_HOST'] ==      'blog.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; };

        $coreURL = $portURL;
    }
?>