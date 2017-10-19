<?php
function bodyScanForText($input,$unique){

    /*** Relative URLs become absolute ***/
    global $coreURL;
    global $blogURL;
    global $portURL;
    
    $input = str_replace('src="/public-files/images/', 'src="'.$coreURL.'public-files/images/', $input);
    $input = str_replace('src="/public-files/videos/', 'src="'.$coreURL.'public-files/videos/', $input);


    /*** Twitter usernames and hashtags become links ***/
	$input = preg_replace('/(^|\s)@([a-z0-9_]+)/i', '$1<a href="http://www.twitter.com/$2">@$2</a>', $input);
	$input = preg_replace('/(^|\s)#([a-z0-9_]+)/i', '$1<a href="http://twitter.com/search?q=%23$2&src=hash">#$2</a>', $input);


    /*** Footnote numbered links include unique string ***/
    $input = str_replace('id="fn:',       'id="fn-'.$unique,       $input);
    $input = str_replace('id="fnref:',    'id="fnref-'.$unique,    $input);
    $input = str_replace('href="#fn:',    'href="#fn-'.$unique,    $input);
    $input = str_replace('href="#fnref:', 'href="#fnref-'.$unique, $input);
    
    $input = str_replace('&#160;&#8617;', '↩︎', $input); // &#160;&#8617;  makes the back-arrow (↩︎) not an emoji  ↩️

    
// videos responsive maken met PHP ipv Javascript


	return $input;
};

function bodyScanForImage($input){

    global $coreURL;

    /*** Get image URL from body to use for SEO ***/
    if (strpos($input, '/public-files/images/') !== false) {

        $matches = array();
        preg_match('/\/public-files\/images(.*?)"/', $input, $matches);
        $seoImage = $coreURL.'public-files/images'.$matches[1];
        return $seoImage;

    };
};

function seoImageSizeScan($image){
    
    /* *
       *     https://stackoverflow.com/questions/3890578/get-image-dimensions
     */

    list($width, $height) = getimagesize($image);

    if($width >= '280' && $height >= '150'){
        return $seoImageSize = 'large';
    } else {
        return $seoImageSize = 'small';        
    };
    
};


function makeNewFilterURL($filterType){

    global $baseURL;
    
    foreach ($_GET as $filter => $value) {
        
        // Strip empty values from the query
        if( !empty($value) ) {
        	$query[$filter]=$value;            
        }

    };
    
    if(empty($query)){ $query = array(); }; // To prevent errors

    // Empty/unset legacy query variables
    unset($query['post']);
    unset($query['part']);
    unset($query['stakeholder']);
    unset($query['s']);
    unset($query['month']);

    // Always start new filter on first page
    unset($query['page']); 
    
    // Make sure p=filter, later add it back
    unset($query['p']); 
    
    // Remove the requested filter
    unset($query[$filterType]); 
    
    
    $cleanQuery = http_build_query($query);

    if($cleanQuery == ''){  $newQuery = 'filter/';    }  // no more existing filters
    else{                   $newQuery = 'filter/'.$cleanQuery;   }; // still existing filters
    
    return $baseURL.$newQuery;
};

function searchHighligths($input,$searchQuery){

//     $input = htmlspecialchars($input);
    $searchExploded = explode(" ", addslashes(urldecode($searchQuery)));

    foreach ($searchExploded as $term){								
		if (is_numeric($term)){ $term = " ".$term; };
		if (strlen($term) !=1){
//             preg_replace(pattern, replace, subject);
			$input = str_replace($term, '<span class="searchhighlight">'.$term.'</span>', $input);
		};
	};

	return $input;
}

function wordCount(){
    
    global $con;
    
    // amount of written words
    $wordCountResult = mysqli_query($con,"SELECT SUM(LENGTH(body) - LENGTH(REPLACE(body, ' ', '')) + 1 ) AS wordCount FROM blog WHERE published = '1';");
	$wordCountNumber = mysqli_fetch_array($wordCountResult)['wordCount'];
	$wordCount = number_format($wordCountNumber,'0',',','.');
    return $wordCount;

}

function postCount(){
    
    global $con;

    // amount of posted posts
    $postCount = mysqli_num_rows(mysqli_query($con,"SELECT id FROM blog WHERE published = '1';"));
    return $postCount;
}

?>