<?
    $pageTitle      = 'Lex’ blog';

    $seoTitle       = $pageTitle;
    $seoDescription = 'Personal blog, by Lex Postma. I blog about Apple, tech, apps, design and sometimes sports.'; // also in the feedbuilder
    $seoKeywords    = 'Apple,tech,design,sport,apps';
    $seoAuthor      = 'Lex Postma';
    $seoType        = 'website';
    $navName        = $seoTitle;
    

    $pubTest = 1;  // 2 IS FOR TESTING ONLY!!!

    if(isset($p) && ($p == 'feed' || $p == 'rss' || $p == 'feeds' || $p == 'subscribe')){ // redirect to rss feed
        header ("Location: http://feed.lexpostma.me/blog");
    } else if(isset($p) && $p == 'archive'){ // archive page
        $seoTitle    = 'Archive of Lex’ blog';
        $secondpage  = 'archive';
        $includePage = 'blogArchive.php';
    } else { // list of blog posts;
        $coreBlogSQLquery =	"
            SELECT *, blog.id AS postID FROM blog 
            JOIN authors_creators ON blog.author_id=authors_creators.id 
            JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id
            JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id 
            WHERE published = '$pubTest' ";

        // page numbers
        if(isset($_GET['page'])){     $pageFilter = mysqli_real_escape_string($con,$_GET['page']); /* if($pageFilter < 1){ $pageFilter = 1; }; */ }
        else{                         $pageFilter = 1;      };

        if(isset($p) && $p == 'filter'){ // filters are enabled
            $seoTitle  = 'Lex’ blog filtered';
            $anyFilter = 1;
            if(isset($_GET['date'])){
                $dateFilter = mysqli_real_escape_string($con,$_GET['date']);
                $coreBlogSQLquery .= "AND datePublished BETWEEN ";
				if (strlen($dateFilter)==2){		      $monthFilter=$dateFilter;     $yearFilter=date('Y');       $coreBlogSQLquery .= " '$yearFilter-$monthFilter-01 00:00:00' AND '$yearFilter-$monthFilter-31 23:59:59' ";  }
				elseif (strlen($dateFilter)==4){	                                    $yearFilter=$dateFilter;     $coreBlogSQLquery .= " '$yearFilter-01-01 00:00:00' AND '$yearFilter-12-31 23:59:59'    ";                   }
				elseif (strlen($dateFilter)==7){
					$explodeDate = explode("-", $dateFilter);
					if (    strlen($explodeDate[0])==2){  $monthFilter=$explodeDate[0];	$yearFilter=$explodeDate[1]; $coreBlogSQLquery .= " '$yearFilter-$monthFilter-01 00:00:00' AND '$yearFilter-$monthFilter-31 23:59:59' ";  }
					elseif (strlen($explodeDate[0])==4){  $monthFilter=$explodeDate[1];	$yearFilter=$explodeDate[0]; $coreBlogSQLquery .= " '$yearFilter-$monthFilter-01 00:00:00' AND '$yearFilter-$monthFilter-31 23:59:59' ";  }
				};
				if(isset($monthFilter)){
    				$monthFilterName = date("F", mktime(0, 0, 0, $monthFilter, 10));
				}
            };
            if(isset($_GET['tag'])){
                $tagCheckVar = mysqli_real_escape_string($con,$_GET['tag']);
                $tagCheck = mysqli_query($con,"SELECT shorttag,tag FROM blog_tags WHERE shorttag = '$tagCheckVar';");
                if (mysqli_num_rows($tagCheck)!=0){ // More than 0 matches = existing tag
                    $tagFilter = $tagCheckVar;
                    $tagFilterNice = mysqli_fetch_array($tagCheck)[1];
                    $coreBlogSQLquery .= " AND shorttag = '$tagFilter' ";
                };
            };
            if(isset($_GET['author'])){
                $authorCheckVar = mysqli_real_escape_string($con,$_GET['author']);
                $authorCheck = mysqli_query($con,"SELECT username,author FROM authors_creators WHERE username = '$authorCheckVar';");
                if (mysqli_num_rows($authorCheck)!=0){ // More than 0 matches = existing author
                    $authorFilter = $authorCheckVar;
                    $authorFilterNice = mysqli_fetch_array($authorCheck)[1];
                    $coreBlogSQLquery .= " AND username = '$authorFilter' ";
                };
            };
            if(isset($_GET['source'])){
                $sourceFilter = mysqli_real_escape_string($con,$_GET['source']);
                $sourceExploded = explode(" ", addslashes(urldecode($sourceFilter)));
                
                foreach ($sourceExploded as $sTerm){								
    				if (is_numeric($sTerm)){ $sTerm = " ".$sTerm; };
    				if (strlen($sTerm) !=1){
        				$coreBlogSQLquery .= "AND (sourcetitle LIKE '%$sTerm%' OR source LIKE '%$sTerm%') ";
    				};
    			};
            };
            if(isset($_GET['search'])){
                $searchFilter = mysqli_real_escape_string($con,$_GET['search']);
                $searchExploded = explode(" ", addslashes(urldecode($searchFilter)));
                
                foreach ($searchExploded as $term){								
    				if (is_numeric($term)){ $term = " ".$term; };
    				if (strlen($term) !=1){
        				$coreBlogSQLquery .= "AND (body LIKE '%$term%' OR title LIKE '%$term%' OR author LIKE '%$term%' OR tag LIKE '%$term%' OR sourcetitle LIKE '%$term%' OR source LIKE '%$term%') ";
    				};
    			};
            };
            $secondpage = 'filtered';

            if(empty($dateFilter) && empty($tagFilter) && empty($authorFilter) && empty($searchFilter) && empty($sourceFilter) && $pageFilter <= 1){
                echo '<script language="Javascript">document.location.href="/";</script>';
            }
            else {
                $introTitle = '<p class="filterText"><span><span>Blog posts</span>';
                if(isset($monthFilter)){    $introTitle .= '<span>published in <a                             title="remove date filter"   href="'.makeNewFilterURL('date'  ).'">'.$monthFilterName.' '.$yearFilter.'</a></span>';  }
                elseif(isset($yearFilter)){ $introTitle .= '<span>published in <a                             title="remove date filter"   href="'.makeNewFilterURL('date'  ).'">'.$yearFilter.'</a></span>';  }
                if(isset($authorFilter)){   $introTitle .= '<span>written by <a                               title="remove author filter" href="'.makeNewFilterURL('author').'">'.$authorFilterNice.'</a></span>';  }
                if(isset($tagFilter)){      $introTitle .= '<span>tagged with <a                              title="remove tag filter"    href="'.makeNewFilterURL('tag'   ).'">'.$tagFilterNice.'</a></span>';  }
                if(isset($sourceFilter)){   $introTitle .= '<span>where the original source includes \'<a     title="remove source filter" href="'.makeNewFilterURL('source').'">'.$sourceFilter.'</a>\'</span>';  }
                if(isset($searchFilter)){   $introTitle .= '<span>that include \'<a                           title="remove search filter" href="'.makeNewFilterURL('search').'">'.$searchFilter.'</a>\'</span>';  }                
            }
            if($pageFilter > 1){            $introTitle .= '<span><a                                          title="remove page filter"   href="'.makeNewFilterURL('page'  ).'">page '.$pageFilter.'</a></span>';  }
            $introTitle .= '</span></p>';
        } else if(isset($p)){ // Check if it's an existing blogpost
            $postCheck  = mysqli_query($con,"SELECT shortname FROM blog WHERE published = '$pubTest' AND shortname = '$p';"); // check whether it's a blog post title
            if (mysqli_num_rows($postCheck)!=0){ // More than 0 matches = blog post
                $post = $p;

                $blogPost = mysqli_query($con,"
                    SELECT *, blog.id AS postID FROM blog 
                    JOIN authors_creators ON blog.author_id=authors_creators.id 
                    JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id
                    JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id 
                    WHERE published = '$pubTest' AND shortname = '$post'
                    GROUP BY shortname;");
                $row = mysqli_fetch_array($blogPost);
                include '../includes/blogVariables.php';
    
                $seoTitle          = $plainTitle.' • Lex’ blog';
                $seoDescription    = $summary;
                $seoKeywords       = $tagKeywords.$author;
                $seoAuthor         = $author;
                $seoType           = 'article';
                $secondpage        = 'post';
                $coreBlogSQLquery .= "AND shortname = '$post' ";
            } else { // Fallback to custom 404 include page
                include '../includes/error-404-include.php'; exit; //Do not do any more work in this script.
            }
        }
        $coreBlogSQLquery .= "
            GROUP BY shortname
            ORDER BY datePublished DESC ";

        /* Pagination */
    	$APP = 10; # Articles per page
    
    	$startThisPage = ($APP*$pageFilter)-($APP);
    	$startNextPage = ($APP*$pageFilter);
    	
    	$nextBlogSQLquery = $coreBlogSQLquery;
    	$coreBlogSQLquery .= "LIMIT $startThisPage, $APP;";
    	$nextBlogSQLquery .= "LIMIT $startNextPage, $APP;";
    	
    	/* SQL query to check if there is a next page */	
    	$nextBlogResult = mysqli_query($con,$nextBlogSQLquery);
    	if(mysqli_num_rows($nextBlogResult)!=0){ // more than 0 results for next page, so older articles
        	$nextPage = $pageFilter+1;
        	$prevPostURL = makeNewFilterURL('page').'&page='.$nextPage;
        	$prevPostTitle = 'Older articles';
    	};
    	if($pageFilter != 1){
        	$prevPage = $pageFilter-1;
        	if($prevPage <= 1){  $nextPostURL = makeNewFilterURL('page');   }
        	else {               $nextPostURL = makeNewFilterURL('page').'&page='.$nextPage;   }
        	$nextPostTitle = 'Newer articles';
    	}
    	
    	/* Include and exclude different libraries */
    	$libraryCheck = mysqli_query($con,$coreBlogSQLquery);
        while($row = mysqli_fetch_array($libraryCheck)){
            $addLibraries = $row['Footnote_Code_markDown_Tweet_Math'];
            if(strpos($addLibraries,'f') !== false){ $footnoteOn = 1; };
            if(strpos($addLibraries,'c') !== false){ $codeOn     = 1; };
            if(strpos($addLibraries,'m') !== false){ $mathOn     = 1; };
            if(strpos($addLibraries,'t') !== false){ $tweetOn    = 1; };
        };

        $includePage = 'blogOverview.php';
    };
?>