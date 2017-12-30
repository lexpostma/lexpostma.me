<?
    # DOMAINS
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    if (strpos($_SERVER['HTTP_HOST'], 'dev.lexpostma.me') !== false) {
        $test = "ON";
        
        $portURL =        "http://dev.lexpostma.me/";
        $blogURL =   "http://blog.dev.lexpostma.me/";
        $resuURL = "http://resume.dev.lexpostma.me/";
        $abouURL =  "http://about.dev.lexpostma.me/";
        
    	// MAMP testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.dev.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.dev.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.dev.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.dev.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'dev.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; };
    }
    else if (strpos($_SERVER['HTTP_HOST'], 'test.lexpostma.me') !== false) {
        $test = "ON";
        
        $portURL =        "http://test.lexpostma.me/";
        $blogURL =   "http://blog.test.lexpostma.me/";
        $resuURL = "http://resume.test.lexpostma.me/";
        $abouURL =  "http://about.test.lexpostma.me/";
        
    	// Digital Ocean testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.test.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.test.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.test.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.test.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'test.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; };
    }
    else {
        $portURL =           "https://lexpostma.me/";
        $blogURL =      "https://blog.lexpostma.me/";
        $resuURL =    "https://resume.lexpostma.me/";
        $abouURL =     "https://about.lexpostma.me/";
        $commURL =   "https://command.lexpostma.me/";

    	// Actual URLs
            if($_SERVER['HTTP_HOST'] ==      'blog.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; }
    }

    $coreURL = $portURL;
?>