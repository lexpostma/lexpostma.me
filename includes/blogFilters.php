<?
    
# ===================== #
# ==== Date filter ==== #
# ===================== #

    $yearFilterSelectionQuery = "SELECT datePublished 
                                 FROM blog 
                                 WHERE published = '$pubTest' 
                                 GROUP BY YEAR(datePublished) 
                                 ORDER BY datePublished ASC;";
                                 
	$yearFilterSelection = mysqli_query($con,$yearFilterSelectionQuery);

    $selectDate = "<option value=''>Select</option>";

	while($row = mysqli_fetch_array($yearFilterSelection)){
		$year = date("Y", strtotime($row['datePublished']));
		$selectDate .= "<option disabled></option><optgroup label='$year'>";

        $selectDate .= "<option value='$year' class='fullYear' ";
		if(isset($dateFilter) && $dateFilter == $year){ $selectDate .= "selected";  };
        $selectDate .= ">throughout $year</option>";

        $monthFilterSelectionQuery = "SELECT datePublished 
                                      FROM blog 
                                      WHERE published = '$pubTest' 
                                      AND datePublished BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 23:59:59' 
                                      GROUP BY MONTH(datePublished) 
                                      ORDER BY datePublished ASC;";

		$monthFilterSelection = mysqli_query($con,$monthFilterSelectionQuery);
		while($row = mysqli_fetch_array($monthFilterSelection)){
			$datetime = strtotime($row['datePublished']);
			$month = date("F", $datetime);
			$monthNum = date("m", $datetime);
            
            $selectDate .= "<option value='$year-$monthNum' ";
			if(isset($dateFilter) && isset($monthFilter) && $monthFilter == $monthNum && $yearFilter == $year){ $selectDate .= "selected"; };
            $selectDate .= ">$month $year</option>";            
        };
		$selectDate .= "</optgroup>";
    }

# ======================= #
# ==== Author filter ==== #
# ======================= #

    $authorFilterSelectionQuery = "SELECT authors_creators.id,authors_creators.author,authors_creators.username 
                                   FROM blog JOIN authors_creators ON blog.author_id=authors_creators.id 
                                   WHERE published = '$pubTest' 
                                   GROUP BY author 
                                   ORDER BY id ASC;";

    $authorFilterSelection = mysqli_query($con,$authorFilterSelectionQuery);

	if(mysqli_num_rows($authorFilterSelection)>1){
    	$selectAuthor = "<option value=''>Select</option><option disabled></option>";

        while($row = mysqli_fetch_array($authorFilterSelection)){
    		$shortauthor = $row['username'];
    		$author = $row['author'];
    		
    		$selectAuthor .= "<option value='$shortauthor' ";
    		if(isset($authorFilter) && $authorFilter == $shortauthor){  $selectAuthor .= "selected"; };
    		$selectAuthor .= ">$author</option>";

        }
    }

# ==================== #
# ==== Tag filter ==== #
# ==================== #

    $selectTag = "<option value=''>Select</option><option disabled></option>";
    
    $tagFilterSelectionQuery = "SELECT blog_tags.tag,blog_tags.shorttag 
                                FROM blog 
                                JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id 
                                JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id 
                                WHERE published = '$pubTest' 
                                GROUP BY tag 
                                ORDER BY tag ASC;";

    $tagFilterSelection = mysqli_query($con,$tagFilterSelectionQuery);
    
    while($row = mysqli_fetch_array($tagFilterSelection)){
		$shorttag = $row['shorttag'];
		$tag = $row['tag'];

        $selectTag .= "<option value='$shorttag' ";
		if(isset($tagFilter) && $tagFilter == $shorttag){   $selectTag .= "selected"; };
		$selectTag .= ">$tag</option>";
    }
    
    
# ======================== #
# ==== Archive filter ==== #
# ======================== #

    $archiveCheckbox = ' value="archive" ';
    if(isset($modeFilter) && $modeFilter == 'archive'){ 
        $archiveCheckbox .= ' checked ';
    };


?>

<form action="/filtering.php" method="get" id="filteringForm">
    <ul class="cellRowGroup">
<!--     <lh>Filter blog posts</lh> -->


<?
    $inputSearchForWhat = 'blog posts';
    include 'filterSearchRow.php';



    $cellIconClass = 'tag';
    $cellIconFontAwesome = 'tag';
    $cellLabel = 'Tag';
    $selectItems = $selectTag;
    
    include 'filterSelectRow.php';



    $cellIconClass = 'date';
    $cellIconFontAwesome = 'calendar';
    $cellLabel = 'Publishing date';
    $selectItems = $selectDate;
    
    include 'filterSelectRow.php';


    if ( isset($selectAuthor) ) {
        $cellIconClass = 'author';
        $cellIconFontAwesome = 'user';
        $cellLabel = 'Author';
        $selectItems = $selectAuthor;
        
        include 'filterSelectRow.php';   
    }

?>
    </ul>
    <ul class="cellRowGroup">
<?
    
    
    $cellIconClass = 'archive';
    $cellIconFontAwesome = 'archive';
    $cellLabel = 'View titles only';
    $toggleName = 'mode';
    $toggleMode = $archiveCheckbox;
    
    include 'filterToggleRow.php';

    
?>

    </ul>
</form>



<? 
    include 'filterFinalButton.php';
?>