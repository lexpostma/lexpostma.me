<?
    if(isset($introTitle)){ echo $introTitle; };

    $blogPostListResult = mysqli_query($con,$coreBlogSQLquery);
    if (mysqli_num_rows($blogPostListResult)==0){
        echo '<aside class="contentBlock noResults"><p class="filterText">There are no blog posts that match all these filters<br><i class="fa fa-frown-o" aria-hidden="true"></i></p></aside>';
    }
    else {
        while($row = mysqli_fetch_array($blogPostListResult)){
        	include '../includes/blogVariables.php';
        	include '../includes/blogPost.php';
        };        
    }

    if(isset($prevPostURL) || isset($nextPostURL)){
        echo '<nav class="blogPagination">';
        
        if($secondpage == 'post'){ $post1 = "Previous post: "; $post2 = "Next post: ";
        } else {                   $post1 = ""; $post2 = ""; }
        
        
        if(isset($prevPostURL)){
            echo '<a href="'.$prevPostURL.'" class="prev" title="'.$post1.$prevPostTitle.'"><i class="fa fa-arrow-circle-left"></i>'.$prevPostTitle.'</a>';
        };
        
        if(isset($nextPostURL)){
            echo '<a href="'.$nextPostURL.'" class="next" title="'.$post2.$nextPostTitle.'">'.$nextPostTitle.'<i class="fa fa-arrow-circle-right"></i></a>';
        };
        
        echo '</nav>';
    }
?>