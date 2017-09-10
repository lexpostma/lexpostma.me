<?
    $basepageTitle  = 'Lex’ portfolio';
    $navigationName = 'portfolio';
    
    $seoTitle       = $basepageTitle;
    $seoDescription = 'Portfolio by Lex Postma. I design things.'; // also in the feedbuilder
    $seoKeywords    = 'portfolio,Apple,TU,Delft,design';
    $seoAuthor      = 'Lex Postma';
    $seoType        = 'website';

    $introTitle = '<p class="filterText">A selection of the projects that I worked on, both individually and in teams.</p>';
    
    $corePortfolioSQLquery = "
        SELECT *, portfolio.id AS postID FROM portfolio
        JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id
        JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id
        JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id
        WHERE onlineVisible = '1' ";
    if(isset($p)) {
        if($p == 'feed' || $p == 'rss' || $p == 'feeds' || $p == 'subscribe') { // redirect to rss feed
            header ("Location: http://feed.lexpostma.me/portfolio");

/*
        } else if($p == 'videos' || $p == 'video') { // videos grid
            $seoTitle       = 'Lex’ video portfolio';
            $seoDescription = 'Videos by Lex Postma.';
            $seoKeywords   .= ',video,editing,directing,concepts';
    
            $corePortfolioSQLquery .= " AND videoid != '' ";
            $includePage = 'portfolioOverview.php';
            $basepageTwo     = 'videos';
    
            $videoFilter    = 1;
            $introTitle = '<p class="filterText">Concept videos that I made and/or worked on.</p>';

        } else if($p == 'icon' || $p == 'icons') { // icons
            $seoTitle       = 'Lex’ icon portfolio';
            $seoDescription = 'Icons by Lex Postma.';
            $seoKeywords   .= ',icons,apps,iOS,macOS';
    
            $corePortfolioSQLquery .= " AND shortcategory = 'icon' ";
            $includePage = 'portfolioOverview.php';
            $basepageTwo     = 'icons';
    
            $iconFilter    = 1;
            $introTitle = '<p class="filterText">Icons I made, mostly for fun.</p>';
        
*/
/*
        } else if($p == 'apple'){  // Apple page
            $seoTitle       = 'Lex Postma → ';
            $seoDescription = 'Motivation letter from Lex Postma to Apple.';
            $seoKeywords    = 'Apple,design,iOS,culture,passion,software,hardware,prototyping';
            $basepageTwo     = 'apple';
            $includePage    = 'apple.php';  
*/


        } else if($p == 'filter') { // big overview grid filtered
            $seoTitle    = 'Lex’ portfolio filtered';
    
            $includePage = 'portfolioOverview.php';
            $basepageTwo  = 'filtered';
    
            $anyFilter   = 1;
    
            if(isset($_GET['category'])){
                $categoryCheckVar = mysqli_real_escape_string($con,$_GET['category']);
                $categoryCheck = mysqli_query($con,"SELECT shortcategory,category FROM portfolio_categories WHERE shortcategory = '$categoryCheckVar';");
                if (mysqli_num_rows($categoryCheck)!=0){ // More than 0 matches = existing category
                    $categoryFilter = $categoryCheckVar;
                    $categoryFilterNice = mysqli_fetch_array($categoryCheck)[1];
                    $corePortfolioSQLquery .= " AND shortcategory = '$categoryFilter' ";
                };
            };
            if(isset($_GET['year'])){
                $yearCheckVar = mysqli_real_escape_string($con,$_GET['year']);
                $yearCheck = mysqli_query($con,"SELECT year FROM portfolio WHERE year = '$yearCheckVar';");
                if (mysqli_num_rows($yearCheck)!=0){ // More than 0 matches = existing year
                    $yearFilter = $yearCheckVar;
                    $corePortfolioSQLquery .= " AND year = '$yearFilter' ";
                };
            };
            if(isset($_GET['client'])){
                $clientCheckVar = mysqli_real_escape_string($con,$_GET['client']);
                $clientCheck = mysqli_query($con,"SELECT shortclient,client FROM portfolio_clients WHERE shortclient = '$clientCheckVar';");
                if (mysqli_num_rows($clientCheck)!=0){ // More than 0 matches = existing client
                    $clientFilter = $clientCheckVar;
                    $clientFilterNice = mysqli_fetch_array($clientCheck)[1];
                    $corePortfolioSQLquery .= " AND shortclient LIKE '%$clientFilter%' ";
                };
            };
            if(isset($_GET['type'])){
                $typeCheckVar = mysqli_real_escape_string($con,$_GET['type']);
                if ($typeCheckVar == 'video') {
                    $typeCheck = mysqli_query($con,"SELECT videoid FROM portfolio WHERE videoid != '';");
                    if (mysqli_num_rows($typeCheck)!=0){ // More than 0 matches = existing client
                        $typeFilter = 'video';
                        $corePortfolioSQLquery .= " AND videoid != '' ";
                    };
                };
            };
            if(isset($_GET['search'])){
                $searchFilter = mysqli_real_escape_string($con,$_GET['search']);
                $searchExploded = explode(" ", addslashes(urldecode($searchFilter)));
                
                foreach ($searchExploded as $term){								
    				if (is_numeric($term)){ $term = " ".$term; };
    				if (strlen($term) !=1){
        				$corePortfolioSQLquery .= " AND (summary LIKE '%$term%' OR title LIKE '%$term%' OR initialBody LIKE '%$term%' OR extendedBody LIKE '%$term%' OR course LIKE '%$term%' OR assignment LIKE '%$term%' OR acknowledgments LIKE '%$term%' OR category LIKE '%$term%' OR client LIKE '%$term%') ";
    				};
    			};
            };
    
            if(empty($yearFilter) && empty($clientFilter) && empty($categoryFilter) && empty($typeFilter) && empty($searchFilter)){
                echo '<script language="Javascript">document.location.href="/";</script>';
            } else {
/*
                $introTitle = '<p class="filterText"><span>';
                if(isset($categoryFilter)){ $introTitle .= '<span><a      title="remove category filter" href="'.makeNewFilterURL('category').'">'.$categoryFilterNice.'</a> design projects</span> ';  }
                else{                       $introTitle .= 'Projects ';}
                if(isset($yearFilter)){     $introTitle .= '<span>from <a    title="remove year filter"   href="'.makeNewFilterURL('year').'">'.$yearFilter.'</a></span>';  }
                if(isset($clientFilter)){   $introTitle .= '<span>for <a     title="remove client filter"    href="'.makeNewFilterURL('client').'">'.$clientFilterNice.'</a></span>';  }
                if(isset($searchFilter)){   $introTitle .= '<span>that include \'<a  title="remove search filter" href="'.makeNewFilterURL('search').'">'.$searchFilter.'</a>\'</span>';  }                
                $introTitle .= '</span><p>';
*/
                $filterbarText = '';
                if(isset($categoryFilter)){                         $filterbarText .= $categoryFilterNice.' design projects';  }
                else{                                               $filterbarText .= 'Projects';}
                if(isset($searchFilter)){                           $filterbarText .= '<span>that include \'<span class="searchTerms">'.$searchFilter.'</span>\'</span>';  }
                if(isset($typeFilter) && $typeFilter == 'video'){   $filterbarText .= '<span>with videos</span>'; }
                if(isset($yearFilter)){                             $filterbarText .= '<span>from '.$yearFilter.'</span>';  }
                if(isset($clientFilter)){                           $filterbarText .= '<span>for '.$clientFilterNice.'</span>';  }

                $filterbarText .= '.';
            }
            
        } else { // probably some individual project page
            $projectCheck = mysqli_query($con,"SELECT shortname FROM portfolio WHERE onlineVisible = '1' AND shortname = '$p';"); // check whether it's a project title
            if (mysqli_num_rows($projectCheck)!=0){ // More than 0 matches = project post, individual extended post
                $post = $p;
    
                $portfolioPost = mysqli_query($con,"SELECT *, portfolio.id AS postID FROM portfolio JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id WHERE onlineVisible = '1' AND shortname = '$post'; ");
                $row = mysqli_fetch_array($portfolioPost);
                include '../includes/portfolioVariables.php';
    
                $seoTitle       = $plainTitle.' • Lex’ portfolio';
                $seoDescription = $summary;
                $seoKeywords    = $category.$clientsKeywords;
                $seoType        = 'article';
                $includePage    = 'portfolioProject.php';
                $basepageTwo     = 'post';
                
                // Get 2 random projects, to display at bottom of project detail page
                $otherProjectsPortfolioSQLquery = $corePortfolioSQLquery." AND shortname != '$post' GROUP BY shortname ORDER BY rand() ASC LIMIT 2; ";
                                
                $corePortfolioSQLquery .= " AND shortname = '$post' ";
            }
            else { // Fallback to custom 404 include page
                include '../includes/error-404-include.php'; exit; //Do not do any more work in this script.
            }
        }
    }
    else {
        $includePage = 'portfolioOverview.php';
        $corePortfolioSQLquery .= " AND partOfFrontpageSelection = '1' ";
    }
    
    $corePortfolioSQLquery .= "
        GROUP BY shortname
        ORDER BY volgorde ASC ";
?>