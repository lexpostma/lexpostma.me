<?
    $seoTitle       = 'About Lex';
    $seoDescription = 'Personal blog, portfolio, résumé and more, by Lex Postma. I blog about Apple, tech, apps, design and sometimes sports.';
    $seoKeywords    = 'blog,resume,portfolio,Apple,TU,Delft,design,tech,sport';
    $seoAuthor      = 'Lex Postma';
    $seoType        = 'website';
    $navName        = 'About me';

    if(isset($p)) {
        if($p == 'more'){  // more about me
            $seoTitle       = 'More stuff from Lex';
            $seoDescription = 'More about Lex Postma, including some random stats and his top 5s.'; // his current iOS homescreen, latest backed Kickstarter projects and hardware and software tools he uses.
            $seoKeywords    = 'top5s,stats'; // tools,iOS,homescreen,Kickstarter,software,hardware
            $secondpage     = 'more';
            $includePage    = 'aboutMore.php';  
        } else { // Fallback to custom 404 include page
            include '../includes/error-404-include.php'; exit; //Do not do any more work in this script.
        }
    } else { // main about me page
        $includePage = 'about.php';
    };
?>