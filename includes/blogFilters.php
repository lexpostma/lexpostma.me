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

	if(empty($dateFilter)){  $selectDate = "<option>Select</option>"; }
	else{                    $selectDate = ""; }

	while($row = mysqli_fetch_array($yearFilterSelection)){
		$year = date("Y", strtotime($row['datePublished']));
		$selectDate .= "<option disabled></option><optgroup label='$year'>";

        $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year' ";
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
            
            $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year-$monthNum' ";
			if(isset($dateFilter) && isset($monthFilter) && $monthFilter == $monthNum && $yearFilter == $year){ $selectDate .= "selected"; };
            $selectDate .= ">$month";
			if(isset($dateFilter) && isset($monthFilter) && $monthFilter == $monthNum && $yearFilter == $year){ $selectDate .= " $year"; };
            $selectDate .= "</option>";            
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
    	if(empty($authorFilter)){ $selectAuthor = "<option>Select</option><option disabled></option>"; }
    	else{                     $selectAuthor = ""; };

        while($row = mysqli_fetch_array($authorFilterSelection)){
    		$shortauthor = $row['username'];
    		$author = $row['author'];
    		
    		$selectAuthor .= "<option value='".makeNewFilterURL('author')."&author=$shortauthor' ";
    		if(isset($authorFilter) && $authorFilter == $shortauthor){  $selectAuthor .= "selected"; };
    		$selectAuthor .= ">$author</option>";

        }
    }

# ==================== #
# ==== Tag filter ==== #
# ==================== #

	if(empty($tagFilter)){    $selectTag = "<option>Select</option><option disabled></option>"; }
	else{                     $selectTag = ""; };
    
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

        $selectTag .= "<option value='".makeNewFilterURL('tag')."&tag=$shorttag' ";
		if(isset($tagFilter) && $tagFilter == $shorttag){   $selectTag .= "selected"; };
		$selectTag .= ">$tag</option>";
    }
?>

<ul class="cellRowGroup">
    <li class="cellRow <?if(isset($searchFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterInputSearch');">
            <div class="cellIcon search"><i class="fa fa-fw fa-search"></i></div>
            <span class="cellLabel">Search</span>
            <div class="cellValue">
                <form action="/search.php" method="get">
                    <input type="hidden" name="rest"   value="<?=makeNewFilterURL('search');?>">
                    <input type="search" name="search" placeholder="Type" title="Search for blog posts" id="filterInputSearch"
                        <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>>
                </form>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('search')?>">&times;</a>
        </div>
    </li>
    <li class="cellRow <?if(isset($tagFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterSelectTag');">
            <div class="cellIcon tag"><i class="fa fa-fw fa-tag"></i></div>
            <span class="cellLabel">Tag</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" title="Filter by tag" id="filterSelectTag">
                    <?=$selectTag?>
                </select>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('tag')?>">&times;</a>
        </div>
    </li>
<?
    if(isset($selectAuthor)){
?>
    <li class="cellRow <?if(isset($authorFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterSelectAuthor');">
            <div class="cellIcon author"><i class="fa fa-fw fa-user"></i></div>
            <span class="cellLabel">Author</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" title="Filter by author" id="filterSelectAuthor">
                    <?=$selectAuthor?>
                </select>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('author')?>">&times;</a>
        </div>
    </li>
<?
    }
?>
    <li class="cellRow <?if(isset($dateFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterSelectDate');">
            <div class="cellIcon date"><i class="fa fa-fw fa-calendar"></i></div>
            <span class="cellLabel">Publishing date</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" title="Filter by date" id="filterSelectDate">
                    <?=$selectDate?>
                </select>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('date')?>">&times;</a>
        </div>
    </li>
<?
    if($basepageTwo == 'filtered') {
?>
    <li class="cellRow resetFilters">
        <a class="cellRowContent" href="/">
            <span class="cellLabel">Reset all filters</span>
        </a>
    </li>
<?
    }
?>
</ul>



<ul class="cellRowGroup">
<!--         <span class="cellGroupTitle">Download a pdf of my resume</span> -->
    <li class="cellRow">
        <a class="cellRowContent" href="/archive">
            <div class="cellIcon archive"><i class="fa fa-fw fa-archive"></i></div>
            <span class="cellLabel">Archive</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
    <li class="cellRow">
        <a class="cellRowContent" href="/about">
            <div class="cellIcon about"><i class="fa fa-fw fa-pencil"></i></div>
            <span class="cellLabel">About this blog</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
</ul>