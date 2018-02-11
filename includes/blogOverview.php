<?
    $blogPostListResult = mysqli_query($con,$coreBlogSQLquery);
    if (mysqli_num_rows($blogPostListResult)==0){
        echo '<aside class="contentBlock noResults"><p class="filterText">There are no blog posts that match all these filters<br><i class="fa fa-frown-o" aria-hidden="true"></i></p></aside>';
    }
    else {

        if(isset($modeFilter) && $modeFilter == 'archive') {
?>
    
    <article class="contentBlock">
        <h1>Archive</h1>
        <p>As of this moment I've published <? echo wordCount()?> words over <? echo postCount() ?> blog posts. Below you'll find an overview of the posts <?if(!empty($dateFilter) || !empty($tagFilter) || !empty($authorFilter) || !empty($searchFilter) || !empty($sourceFilter)){ echo "that match your filter query,";}?> sorted by date.</p>
    </article>
    
<?
            $archiveYearsBlogSQLquery = "
                SELECT datePublished
                FROM blog ".$blogSQLjoinQuery."
                WHERE published = '$pubTest' ".$filterBlogSQLquery." 
                GROUP BY YEAR(datePublished) 
                ORDER BY datePublished DESC;";
    
        	$archiveYearListResult = mysqli_query($con,$archiveYearsBlogSQLquery);
        	while($row = mysqli_fetch_array($archiveYearListResult)){
        
        		$yearList = date("Y", strtotime($row['datePublished']));
        		echo '<article class="contentBlock"><h2>'.$yearList.'</h2><ul class="yearList">';
        
        
        	    $archiveBlogSQLquery = "
        	        SELECT title,shortname,datePublished 
        	        FROM blog ".$blogSQLjoinQuery."                
        	        WHERE published = '$pubTest' AND YEAR(datePublished) = '$yearList' ".$filterBlogSQLquery." 
        	        GROUP BY shortname 
        	        ORDER BY datePublished DESC; ";
    
                $archiveBLogListResult = mysqli_query($con,$archiveBlogSQLquery);
                while($row = mysqli_fetch_array($archiveBLogListResult)){
        
                    $title = $row['title'];
                    $shortname = $row['shortname'];
                    $datePublished = $row['datePublished'];
                    $datePub = date("j M", strtotime($datePublished));
                    
                    echo '<li><span>'.$datePub.'</span><a href="'.$baseURL.$shortname.'" title="'.$title.'">'.$title.'</a></li>';
                }
                echo '</ul></article>';
            }
        } else {
            while($row = mysqli_fetch_array($blogPostListResult)){
            	include '../includes/blogVariables.php';
            	include '../includes/blogPost.php';
            };

            if(isset($prevPostURL) || isset($nextPostURL)){
                echo '<nav class="blogPagination">';
                
                if($basepageTwo == 'post'){ $post1 = "Previous post: "; $post2 = "Next post: ";
                } else {                   $post1 = ""; $post2 = ""; }
                
                
                if(isset($prevPostURL)){
                    echo '<a href="'.$prevPostURL.'" class="prev" title="'.$post1.$prevPostTitle.'"><i class="fa fa-arrow-circle-left"></i>'.$prevPostTitle.'</a>';
                };
                
                if(isset($nextPostURL)){
                    echo '<a href="'.$nextPostURL.'" class="next" title="'.$post2.$nextPostTitle.'">'.$nextPostTitle.'<i class="fa fa-arrow-circle-right"></i></a>';
                };
                
                echo '</nav>';
            }
        }
    }
?>