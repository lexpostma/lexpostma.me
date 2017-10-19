<?
    $quoteOn = $row['quote'];
    if($quoteOn == 1){
        $plainTitle = "“".$row['title']."”";
    }
    else {
        $plainTitle = $row['title'];    
    }

    // Unique blog post characteristics
    $shortname = $row['shortname'];
    $summary = $row['summary'];
    $shareURL = $blogURL.$shortname;
    $body = $row['body'];

    use \Michelf\MarkdownExtra;
    if(strpos($row['Footnote_Code_markDown_Tweet_Math'],'d') !== false){
        $body = MarkdownExtra::defaultTransform($body);
    };
    $body = bodyScanForText($body,$shortname);

    $seoImage = bodyScanForImage($body);

    $title = '<h1><a href="'.$blogURL.$shortname.'" title="'.$plainTitle.'">'.$plainTitle.'</a></h1>';
    
    $author = $row['author'];
    $shortauthor = $row['username'];
    
    $source = $row['source'];
    $sourcetitle = $row['sourcetitle'];
    
    $postID = $row['postID'];
    $addLibraries = $row['Footnote_Code_markDown_Tweet_Math'];
    
    // Timestamps
    $datePublished = $row['datePublished'];
    $datePublishedRead = date("l, j F Y", strtotime($datePublished));
    $datePublishedFull = date("r", strtotime($datePublished));
    $datePublishedTime = $datePublishedRead.' at '.date("G:i e", strtotime($datePublished)).' time';
    $datePubISO8601 = date(DATE_ISO8601, strtotime($datePublished));

    $pubDay      = date("l, j", strtotime($datePublished));
    $pubDayNum   = date("j", strtotime($datePublished));
    $pubMonth    = date("F", strtotime($datePublished));
    $pubMonthNum = date("m", strtotime($datePublished));
    $pubYear     = date("Y", strtotime($datePublished));
    $pubStatus   = $row['published'];
    
    $dateUpdated   = $row['dateUpdated'];
    if ($dateUpdated != ""){
        $dateUpdatedRead = date("j F Y", strtotime($dateUpdated));
        $datePubUpdateISO8601 = date(DATE_ISO8601, strtotime($dateUpdated));        
    }

    // LISTING ALL TAGS
    $blogPostTags = mysqli_query($con,"SELECT tag,shorttag FROM blog JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id WHERE shortname = '$shortname' ORDER BY tag ASC;");

    $tagsComplete = '';
    $tagKeywords = '';
    $i = 0;
    while($row = mysqli_fetch_array($blogPostTags)){
        $tag = $row['tag'];
        $shorttag = $row['shorttag'];
        if($i++){  $tagsComplete .= ', '; }
        $tagsComplete .= '<a class="blend" title="View blog posts tagged with '.$tag.'" href="'.makeNewFilterURL('tag').'&tag='.$shorttag.'">'.$tag.'</a>';
        $tagKeywords .= $tag.',';
    }
    $tagsComplete = strrev(implode(strrev(', and'), explode(',', strrev($tagsComplete), 2)));



    // LISTING NEXT AND PREVIOUS ARTICLES
    if(isset($basepageTwo) && $basepageTwo == 'post'){ // only on single post pages
        $blogPostNext  = mysqli_query($con,"SELECT shortname,title FROM blog WHERE datePublished > '$datePublished' AND published = '$pubTest' ORDER BY datePublished ASC LIMIT 1;");
        if(mysqli_num_rows($blogPostNext)!=0){
            $row = mysqli_fetch_array($blogPostNext);
            $nextPostURL   = $baseURL.$row['shortname'];
            $nextPostTitle = $row['title'];
        }
    
        $blogPostPrev = mysqli_query($con,"SELECT shortname,title FROM blog WHERE datePublished < '$datePublished' AND published = '$pubTest' ORDER BY datePublished DESC LIMIT 1;");
        if(mysqli_num_rows($blogPostPrev)!=0){
            $row = mysqli_fetch_array($blogPostPrev);
            $prevPostURL   = $baseURL.$row['shortname'];
            $prevPostTitle = $row['title'];
        }
    }
    
    // Summation of the blog post, extra details, header byline
    $blogHeaderByline = '<p class="blogHeaderByline">By <a class="blend" href="'.makeNewFilterURL('author').'&author='.$shortauthor.'" title="View blog posts written by '.$author.'">'.$author.'</a> on
        <time datetime="'.$datePublished.'" pubdate>'.$pubDayNum.'
            <a class="blend" class="month-year" href="'.makeNewFilterURL('date').'&date='.$pubMonthNum.'-'.$pubYear.'" title="View blog posts from '.$pubMonth.' '.$pubYear.'">'.$pubMonth.'
            </a><a class="blend" href="'.makeNewFilterURL('year').'&date='.$pubYear.'" title="View blog posts from '.$pubYear.'">'.$pubYear.'</a>
        </time>';
    
    if($dateUpdated != ""){ $blogHeaderByline .= '<span>, last updated on '.$dateUpdatedRead.'</span>';       };
                            $blogHeaderByline .= '<span> • Tagged with '.$tagsComplete.'</span></p>';
    if($source != ""){      $gaEvent = "ga('send', 'event', 'Blog', 'Go to the source', '$plainTitle');";
                            $blogHeaderByline .= '<p class="blogHeaderByline"><b>Originally from <a class="source" href="'.$source.'" onclick="'.$gaEvent.'" title="Read directly from the source: '.$sourcetitle.'">'.$sourcetitle.'</a></b></p>';   }



?>