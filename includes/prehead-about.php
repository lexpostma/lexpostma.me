<?
    $basepageTitle  = 'About Lex';
    $navigationName = 'about';

    $seoTitle       = $basepageTitle;
    $seoDescription = 'Personal blog, portfolio, résumé and more, by Lex Postma. I blog about Apple, tech, apps, design and sometimes sports.';
    $seoKeywords    = 'blog,resume,portfolio,Apple,TU,Delft,design,tech,sport';
    $seoAuthor      = 'Lex Postma';
    $seoType        = 'website';

    if(isset($p)) {
        if($p == 'allfunfacts'){  // Show all fun facts

            $funfacts       = true;
            $includePage    = 'about.php';  

/*
        } else if($p == 'more'){  // more about me
            $seoTitle       = 'More stuff from Lex';
            $seoDescription = 'More about Lex Postma, including some random stats and his top 5s.'; // his current iOS homescreen, latest backed Kickstarter projects and hardware and software tools he uses.
            $seoKeywords    = 'top5s,stats'; // tools,iOS,homescreen,Kickstarter,software,hardware
            $basepageTwo    = 'more';
            $includePage    = 'aboutMore.php';
*/

        } else if($p == 'credits' || $p == 'credit'){  // Credits

            $seoTitle       = 'Credits for Lex’ website';
            $seoDescription = $basepageTitle;
            $seoKeywords    = 'credits';

            $basepageTwo    = 'credits';
            $includePage    = 'credits.php';  

        } else if($p == 'copyright'){  // Copyright

            $seoTitle       = 'Copyright for Lex’ website';
            $seoDescription = $basepageTitle;
            $seoKeywords    = 'copyright';

            $basepageTwo    = 'copyright';
            $includePage    = 'copyright.php';  

        } else if($p == 'apple'){  // Apple page

            $seoTitle       = 'Lex Postma → ';
            $seoDescription = 'Motivation letter from Lex Postma to Apple.';
            $seoKeywords    = 'Apple,design,iOS,culture,passion,software,hardware,prototyping';

            $basepageTwo    = 'apple';
            $includePage    = 'apple.php';  

            $disableTitlebar = true;

        } else { // Fallback to custom 404 include page
            include '../includes/error-404-include.php'; exit; //Do not do any more work in this script.
        }
    } else { // main about me page
        $includePage = 'about.php';
    
        $disableTitlebar = true;
        $disableFooter   = true;
    

    };
?>