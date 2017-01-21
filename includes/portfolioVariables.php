<?
    // Unique project characteristics
    $plainTitle = $row['title'];
    $shortname  = $row['shortname'];
    $summary    = $row['summary'];
    $shareURL   = 'http://lexpostma.me/'.$shortname;
    $title      = '<h1 class="title"><a title="'.$plainTitle.'" href="/'.$shortname.'">'.$plainTitle.'</a></h1>';
    $postID     = $row['postID'];

    // Extra details
    $year            = $row['year'];
    $category        = $row['category'];
    $shortcategory   = strtolower($category);
    $course          = $row['course'];
    $assignment      = $row['assignment'];
    $acknowledgments = $row['acknowledgments'];
    $roleFocus       = $row['roleFocus'];

    // Favourite projects are selected for frontpage
    $partOfFrontpageSelection = $row['partOfFrontpageSelection'];
    $onlineVisible            = $row['onlineVisible'];
    $initialBody              = $row['initialBody'];
    $videoid                  = $row['videoid'];

    // Some projects have a more detailed individual page
    $extendedBody = $row['extendedBody'];
    $extendedPostPublished = $row['extendedPostPublished'];
    $extendedPubDate = $row['extendedPubDate'];
    $extendedPubDateRead = date("l, j F Y", strtotime($extendedPubDate));
    $extendedPubDateFull = date("r", strtotime($extendedPubDate));
    $extendedPubTime = $extendedPubDateRead.' at '.date("G:i e", strtotime($extendedPubDate)).' time';
    $extendedUpdateDate = $row['extendedUpdateDate'];
    $extendedUpdateDateRead = date("j F Y", strtotime($extendedUpdateDate));
    
    // Body of the individual page
    if($extendedPostPublished == '1'){
        $body = $extendedBody;
    } else{
        $body = '<div class="contentBlock">';
        if($videoid != null){  
            $body .= '
            <figure id="video'.$shortname.'">
        		<iframe src="//player.vimeo.com/video/'.$videoid.'?autoplay=0&title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="1920" height="1080" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
        		</iframe>
        	</figure>';
        } else {
            $body .= '<img src="/public-files/images/portfolio/'.$shortname.'-1.png">';
        };
        
        if($initialBody != ''){
            $body .= $initialBody;
        } else {
            $body .= '<p>'.$summary.'</p>';
        };
        $body .= '</div>';
    }
    use \Michelf\MarkdownExtra;
    if(strpos($body,'<p>') === false){
        $body = MarkdownExtra::defaultTransform($body);
    };
    $body = bodyScan($body,$shortname);

/*
    if(isset($searchFilter)){
		$plainTitle = searchHighligths($plainTitle,$searchFilter);
		$body = searchHighligths($body,$searchFilter);
    }
*/


    
    // LISTING ALL THE CLIENTS
    unset($clientPromo);
    $clientsKeywords = '';

    $portfolioItemClients = mysqli_query($con,"SELECT client,shortclient,showLogo FROM portfolio JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id WHERE shortname = '$shortname' AND shortclient != 'none' ORDER BY priority ASC;");
    if (mysqli_num_rows($portfolioItemClients)!=0){

        $clientsComplete = '';
        $i = 0;
        while($row = mysqli_fetch_array($portfolioItemClients)){
            $clientCount = $row['client'];
            $clientsKeywords .= ','.$clientCount;
            $clientCountShort = $row['shortclient'];
            if (strpos($clientCountShort,'tudelft') !== false){ $clientCountShort = 'tudelft'; };
            
	        if($i++){                       $clientsComplete .= ', '; };
            $clientsComplete .= '<span class="ownName"><a href="'.makeNewFilterURL('client').'&client='.$clientCountShort.'" title="View projects for '.$clientCount.'">'.$clientCount.'</a></span>';
            
            if (empty($clientPromo) && $row['showLogo'] == 1) { $clientPromo = $clientCountShort; };
        };
        $clientsComplete .= '</span>';
        $clientsComplete = strrev(implode(strrev(', and'), explode(',', strrev($clientsComplete), 2)));
    }

    // Main 'more info'-byline
    if(isset($clientsComplete)){
        $moreInfoLine = '<a href="'.makeNewFilterURL('category').'&category='.$shortcategory.'" title="View '.$category.' projects">'.$category.'</a> for '.$clientsComplete.' from
                         <a href="'.makeNewFilterURL('year').'&year='.$year.'" title="View projects from '.$year.'">'.$year.'</a>.';
    } else {
        $moreInfoLine = '<a href="'.makeNewFilterURL('category').'&category='.$shortcategory.'" title="View '.$category.' projects">'.$category.'</a> from
                         <a href="'.makeNewFilterURL('year').'&year='.$year.'" title="View projects from '.$year.'">'.$year.'</a>.';
    };



    // LISTING ALL THE FELLOW CREATORS AND RESPONSIBILITIES
    $creatorsResult = mysqli_query($con,"SELECT author,link,linkedin FROM portfolio JOIN portfolio_creators_relations on portfolio.id=portfolio_creators_relations.project_id JOIN authors_creators on portfolio_creators_relations.creator_id=authors_creators.id WHERE shortname = '$shortname' ORDER BY lastname ASC;");
    if(mysqli_num_rows($creatorsResult)!=0){

        $creatorsComplete = 'Team effort with fellow creators ';
        $i = 0;
    	while($row = mysqli_fetch_array($creatorsResult)){
    		$creatorName = $row['author'];
    		$creatorLink = $row['link'];
    		$creatorLinkedIn = $row['linkedin'];
	        if($i++){                       $creatorsComplete .= ', '; };
    		if($creatorLink != ''){         $creatorsComplete .= '<span class="ownName"><a title="'.$creatorName.'’s website" class="creator" href="'.$creatorLink.'">'.$creatorName.'</a></span>';	 }
    		elseif($creatorLinkedIn != ''){	$creatorsComplete .= '<span class="ownName"><a title="'.$creatorName.'’s LinkedIn" href="'.$creatorLinkedIn.'">'.$creatorName.'</a></span>'; }
    		else{						    $creatorsComplete .= '<span class="ownName">'.$creatorName.'</span>';		                             };

    	};
        $creatorsComplete .= '. ';
        $creatorsComplete = strrev(implode(strrev(', and'), explode(',', strrev($creatorsComplete), 2)));
    	if(isset($roleFocus)){$creatorsComplete .= $roleFocus;};
    }
    elseif(isset($roleFocus)){
    	$creatorsComplete = $roleFocus;
    };
    
    
    
    // Summation of the project, extra details
                                        $portfolioFooter = '<li><i class="fa-li fa fa-info-circle"></i>'.$moreInfoLine.'</li>';

    if(isset($creatorsComplete)){
        if(isset($creatorName)){        $portfolioFooter .= '<li><i class="fa-li fa fa-users"></i>'.$creatorsComplete.'</li>';             }
        else{                           $portfolioFooter .= '<li><i class="fa-li fa fa-user"></i>'.$creatorsComplete.'</li>';              };
    };
    if($course != ""){                  $portfolioFooter .= '<li><i class="fa-li fa fa-graduation-cap"></i><b>Course</b>: '.$course.'.</li>';               };
    if($assignment != ""){              $portfolioFooter .= '<li><i class="fa-li fa fa-file-text"></i><b>Assignment</b>: '.$assignment.'</li>';             };
    if($acknowledgments != ""){         $portfolioFooter .= '<li><i class="fa-li fa fa-thumbs-up"></i><b>Acknowledgments</b>: '.$acknowledgments.'</li>';   };
	if($extendedPubDate != ""){         $portfolioFooter .= '<li><i class="fa-li fa fa-calendar" title="'.$extendedPubTime.'"></i>Posted on <time datetime="'.$extendedPubDate.'" pubdate>'.$extendedPubDateRead.'</time>';
    	if($extendedUpdateDate != ""){  $portfolioFooter .= ', last updated on '.$extendedUpdateDateRead;  }
    	                                $portfolioFooter .= '</li>';
	};
                                	    $portfolioFooter .= '<li><i class="fa-li fa fa-question-circle"></i>Want to know more about '.$plainTitle.'? <span style="white-space:nowrap;">Don’t hesitate to <a href="mailto:hello@lexpostma.me?subject='.$plainTitle.'" title="Email Lex">email me</a>.</span></li>';
