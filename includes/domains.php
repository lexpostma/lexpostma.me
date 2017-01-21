<?
    # DOMAINS
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($_SERVER['HTTP_HOST'], 'lex.test') !== false) {
        $test = "ON";
        
        $portURL =      "http://lex.test/";
        $blogURL = "http://blog.lex.test/";
        $resuURL = "http://resu.lex.test/";
        $abouURL = "http://abou.lex.test/";
        $commURL = "http://comm.lex.test/";
        
    	// MAMP testing URLs
    	    if($_SERVER['HTTP_HOST'] == 'blog.lex.test'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] == 'resu.lex.test'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] == 'abou.lex.test'){ $homepage = "about";     $baseURL = $abouURL; }
//     	elseif($_SERVER['HTTP_HOST'] == 'comm.lex.test'){ $homepage = "command";   $baseURL = $commURL; } // not in use
        elseif($_SERVER['HTTP_HOST'] == 'port.lex.test'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==      'lex.test'){ $homepage = "portfolio"; $baseURL = $portURL; };

        $coreURL = $portURL;
    }
    else {
        $portURL =           "http://lexpostma.me/";
        $blogURL =      "http://blog.lexpostma.me/";
        $resuURL =    "http://resume.lexpostma.me/";
        $abouURL =     "http://about.lexpostma.me/";
        $commURL =   "http://command.lexpostma.me/";

    	// Actual URLs
            if($_SERVER['HTTP_HOST'] ==      'blog.lexpostma.me'){ $homepage = "blog";      $baseURL = $blogURL; }
    	elseif($_SERVER['HTTP_HOST'] ==    'resume.lexpostma.me'){ $homepage = "resume";    $baseURL = $resuURL; }
    	elseif($_SERVER['HTTP_HOST'] ==     'about.lexpostma.me'){ $homepage = "about";     $baseURL = $abouURL; }
//     	elseif($_SERVER['HTTP_HOST'] ==   'command.lexpostma.me'){ $homepage = "command";   $baseURL = $commURL; } // not in use
        elseif($_SERVER['HTTP_HOST'] == 'portfolio.lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; } // legacy URL
    	elseif($_SERVER['HTTP_HOST'] ==           'lexpostma.me'){ $homepage = "portfolio"; $baseURL = $portURL; }

        $coreURL = $portURL;
    }
?>