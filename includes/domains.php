<?
    # DOMAINS
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    if (strpos($_SERVER['HTTP_HOST'], 'dev.2017.lexpostma.me') !== false) {
        $test = "ON";
        
        $portURL =        "http://dev.2017.lexpostma.me/";
        $blogURL =   "http://blog.dev.2017.lexpostma.me/";
        $resuURL = "http://resume.dev.2017.lexpostma.me/";
        $abouURL =  "http://about.dev.2017.lexpostma.me/";
        
    	// MAMP testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.dev.2017.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.dev.2017.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.dev.2017.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.dev.2017.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'dev.2017.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; };
    }
    else if (strpos($_SERVER['HTTP_HOST'], 'test.2017.lexpostma.me') !== false) {
        $test = "ON";
        
        $portURL =        "https://test.2017.lexpostma.me/";
        $blogURL =   "https://blog.test.2017.lexpostma.me/";
        $resuURL = "https://resume.test.2017.lexpostma.me/";
        $abouURL =  "https://about.test.2017.lexpostma.me/";
        
    	// Digital Ocean testing URLs
    	    if($_SERVER['HTTP_HOST'] ==      'blog.test.2017.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.test.2017.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.test.2017.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.test.2017.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'test.2017.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; };
    }
    else {
        $portURL =           "https://2017.lexpostma.me/";
        $blogURL =      "https://blog.2017.lexpostma.me/";
        $resuURL =    "https://resume.2017.lexpostma.me/";
        $abouURL =     "https://about.2017.lexpostma.me/";
        $commURL =   "https://command.2017.lexpostma.me/";

    	// Actual URLs
            if($_SERVER['HTTP_HOST'] ==      'blog.2017.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.2017.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.2017.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.2017.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           '2017.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; }
    }

    $coreURL = $portURL;
?>