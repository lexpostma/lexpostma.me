<?

    # ============================= #
    # ==== Portfolio variables ==== #
    # ============================= #

    // Unique project characteristics
    $plainTitle         = $row['title'];
    $shortname          = $row['shortname'];
    $summary            = $row['summary'];
    $shareURL           = $portURL.$shortname;
    $title              = '<h1 class="title"><a title="'.$plainTitle.'" href="'.$portURL.$shortname.'">'.$plainTitle.'</a></h1>';
    $postID             = $row['postID'];
    $body               = $row['body'];
    $headerImage        = $coreURL.'public-files/images/portfolio/'.$row['shortname'].'-header.png';

    // Extra details
    $year               = $row['year'];
    $category           = $row['category'];
    $shortcategory      = strtolower($category);
    $course             = $row['course'];
    $assignment         = $row['assignment'];
    $acknowledgments    = $row['acknowledgments'];
    $roleFocus          = $row['roleFocus'];

    // Frontpage attributes
    $archived           = $row['archived'];
    $effectLayers       = $row['3dEffectLayers'];
    $videoid            = $row['videoid'];
    $domainInBrowserUI  = $row['domainInBrowserUI'];
    $relatedBlogpost    = $row['relatedBlogpost'];

    // Dates
    $datePublished      = $row['datePublished'];
    $datePublishedRead  = date("l, j F Y", strtotime($datePublished));
    $datePublishedFull  = date("r", strtotime($datePublished));
    $datePublishedTime  = $datePublishedRead.' at '.date("G:i e", strtotime($datePublished)).' time';
    $datePubISO8601     = date(DATE_ISO8601, strtotime($datePublished));

    $dateUpdated        = $row['dateUpdated'];
    if ($dateUpdated != ""){
        $dateUpdatedRead        = date("j F Y", strtotime($dateUpdated));
        $datePubUpdateISO8601   = date(DATE_ISO8601, strtotime($dateUpdated));
    };
    
    
    
    # ====================================== #
    # ==== Body of the individual page ===== #
    # ====================================== #
    
    use \Michelf\MarkdownExtra;
    if(strpos($body,'<p>') === false){
        $body = MarkdownExtra::defaultTransform($body);
    };
    $body = bodyScanForText($body,$shortname);
    

    





/*

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
        
        if($body != ''){
            $body .= $body;
        } else {
            $body .= '<p>'.$summary.'</p>';
        };
        $body .= '</div>';
    }
    
    
*/

//     $seoImage = bodyScanForImage($body);
    
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
            $clientsComplete .= '<span class="nowrap"><a href="'.makeNewFilterURL('client').'&client='.$clientCountShort.'" title="View projects for '.$clientCount.'">'.$clientCount.'</a></span>';
            
            if (empty($clientPromo) && $row['showLogo'] == 1) { $clientPromo = $clientCountShort; };
        };
//         $clientsComplete .= '</span>';
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

    $moreInfoLineSansClient = '<a href="'.makeNewFilterURL('category').'&category='.$shortcategory.'" title="View '.$category.' projects">'.$category.'</a> from
                     <a href="'.makeNewFilterURL('year').'&year='.$year.'" title="View projects from '.$year.'">'.$year.'</a>.';


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
    		if($creatorLink != ''){         $creatorsComplete .= '<span class="nowrap"><a title="'.$creatorName.'’s website" class="creator" href="'.$creatorLink.'">'.$creatorName.'</a></span>';	 }
    		elseif($creatorLinkedIn != ''){	$creatorsComplete .= '<span class="nowrap"><a title="'.$creatorName.'’s LinkedIn" href="'.$creatorLinkedIn.'">'.$creatorName.'</a></span>'; }
    		else{						    $creatorsComplete .= '<span class="nowrap">'.$creatorName.'</span>';		                             };

    	};
        $creatorsComplete .= '. ';
        $creatorsComplete = strrev(implode(strrev(', and'), explode(',', strrev($creatorsComplete), 2)));
    	if(isset($roleFocus)){$creatorsComplete .= $roleFocus;};
    }
    elseif(isset($roleFocus)){
    	$creatorsComplete = $roleFocus;
    };
    
    
    
    // Summation of the project, extra details
    $portfolioFooterCells = '';

    $cellIcon = 'fa-info-circle';
    $cellLabel = $moreInfoLineSansClient;
    $cellRowClasses = 'indent';
    $portfolioFooterCells .= include('cellRow.php');

    if( isset($clientsComplete) ){
        $cellIcon = 'fa-building';
        $cellLabel = $clientsComplete;
        $cellRowClasses = 'indent';
        $portfolioFooterCells .= include('cellRow.php');
    };

    if( isset($creatorsComplete) ){
        if(isset($creatorName)){        $cellIcon = 'fa-users'; }
        else{                           $cellIcon = 'fa-user';  };
        $cellLabel = $creatorsComplete;
        $cellRowClasses = 'indent';
        $portfolioFooterCells .= include('cellRow.php');
    };
    
    if( $course !== NULL ){
        $cellIcon = 'fa-graduation-cap';
        $cellLabel = '<b>Course</b>: '.$course;
        $cellRowClasses = 'indent';
        $portfolioFooterCells .= include('cellRow.php');
    };

    if( $assignment !== NULL ){
        $cellIcon = 'fa-file-text';
        $cellLabel = '<b>Assignment</b>: '.$assignment;
        $cellRowClasses = 'indent';
        $portfolioFooterCells .= include('cellRow.php');
    };

    if( $acknowledgments !== NULL ){
        $cellIcon = 'fa-thumbs-up';
        $cellLabel = '<b>Acknowledgments</b>: '.$acknowledgments;
        $cellRowClasses = 'indent';
        $portfolioFooterCells .= include('cellRow.php');
    };


    $cellIcon = 'fa-calendar';
    $cellLabel = 'Posted on <time datetime="'.$datePublished.'" pubdate>'.$datePublishedRead.'</time>';
	if($dateUpdated != ""){             $cellLabel .= ', last updated on '.$dateUpdatedRead;  }
	$cellRowClasses = 'indent last';
    $portfolioFooterCells .= include('cellRow.php');

    if ( $relatedBlogpost !== NULL ){
        
        $portfolioFooterCells .= '
        <li class="cellRow">
            <a class="cellRowContent" href="'.$blogURL.$relatedBlogpost.'">
                <div class="cellIcon"><i class="fa fa-fw fa-pencil"></i></div>
                <span class="cellLabel">Read more about this project on my blog</span>
                <div class="cellClosingIcon chevron">'. file_get_contents( '../includes/navigationIcons/chevron.svg' ) .'</div>
            </a>
        </li>';
        
    };
    
    if ( $domainInBrowserUI !== NULL ){

        $portfolioFooterCells .= '
        <li class="cellRow">
            <a class="cellRowContent" href="http://'.$domainInBrowserUI.'" target="_blank">
                <div class="cellIcon"><i class="fa fa-fw fa-link"></i></div>
                <span class="cellLabel">'.$domainInBrowserUI.'</span>
                <div class="cellClosingIcon chevron">'. file_get_contents( '../includes/navigationIcons/chevron.svg' ) .'</div>
            </a>
        </li>';

    };

    
    // Loading photos for PhotoSwipe photo slider
    $photoGallery = '';
    
    if ( $videoid !== NULL ){
        
        $videoEmbedLink = 'https://player.vimeo.com/video/'.$videoid.'?autoplay=1&title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff';
        
        $videoEmbed = '
            <div class="photoswipeVideoWrapper">
                <div class="videoContainer">
                    <iframe class="pswp__video" src="'.$videoEmbedLink.'" width="1920" height="1080" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>';
        
        $photoGallery .= '
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="'.$videoEmbedLink.'" itemprop="contentUrl" data-size="1920x1080" data-type="video" data-video=\''.$videoEmbed.'\' class="photoswipeVideoThumb">
                    <img src="'.$portURL.'public-files/images/portfolio/'.$shortname.'-header.png'.'" itemprop="thumbnail">
                    <div class="photoswipeVideoThumbPlayIcon">'.file_get_contents( '../includes/navigationIcons/play.svg' ).'</div>
                </a>
            </figure>';
    };
    
    $portfolioPhotoQuery = "SELECT * FROM portfolio_photos WHERE portfolioProject_id = '$postID' ORDER BY volgorde ASC";
    $portfolioPhotoResult = mysqli_query($con,$portfolioPhotoQuery);

    while($row = mysqli_fetch_array($portfolioPhotoResult)){
        $photoCaption       = $row['caption'];
        $photoPath          = $portURL.'public-files/images/portfolio/'.$shortname.'-'.$row['fileName'];
        $photoThumbPath     = $portURL.'public-files/images/portfolio/'.$shortname.'-'.$row['fileName'];
        $photoDescription   = $row['imageDescription'];
        
        $photoGallery .= '
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="'.$photoPath.'" itemprop="contentUrl" data-size="'.imageSizeScan($photoThumbPath).'">
                    <img src="'.$photoThumbPath.'" itemprop="thumbnail" alt="'.$photoDescription.'" />
                </a>
                <figcaption itemprop="caption description">'.$photoCaption.'</figcaption>
            </figure>';
    };





