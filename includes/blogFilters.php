<?
    // date filter
	$yearFilterSelection = mysqli_query($con,"SELECT datePublished FROM blog WHERE published = '$pubTest' GROUP BY YEAR(datePublished) ORDER BY datePublished ASC;");

	if(empty($dateFilter)){  $selectDate = "<option                                      >Select</option>"; }
	else{                    $selectDate = "<option value='".makeNewFilterURL('date')."' >- Remove date filter</option>"; }

	while($row = mysqli_fetch_array($yearFilterSelection)){
		$year = date("Y", strtotime($row['datePublished']));
		$selectDate .= "<option disabled></option><optgroup label='$year'>";

		if(isset($dateFilter) && $dateFilter == $year){ $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year' selected>Throughout $year</option>";  }
		else{                                           $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year'         >Throughout $year</option>";  };


		$monthFilterSelection = mysqli_query($con,"SELECT datePublished FROM blog WHERE published = '$pubTest' AND datePublished BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 23:59:59' GROUP BY MONTH(datePublished) ORDER BY datePublished ASC;");
		while($row = mysqli_fetch_array($monthFilterSelection)){
			$datetime = strtotime($row['datePublished']);
			$month = date("F", $datetime);
			$monthNum = date("m", $datetime);
            
			if(isset($dateFilter) && isset($monthFilter) && $monthFilter == $monthNum && $yearFilter == $year){ $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year-$monthNum' selected>$month $year</option>";   }
            else{                                                                                               $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year-$monthNum'         >$month</option>";   };
        };
		$selectDate .= "</optgroup>";
    }

    // author filter
    $authorFilterSelection = mysqli_query($con,"SELECT authors_creators.id,authors_creators.author,authors_creators.username FROM blog JOIN authors_creators ON blog.author_id=authors_creators.id WHERE published = '$pubTest' GROUP BY author ORDER BY id ASC;");
	if(mysqli_num_rows($authorFilterSelection)>1){
    	if(empty($authorFilter)){ $selectAuthor = "<option                                        >Select</option><option disabled></option>"; }
    	else{                     $selectAuthor = "<option value='".makeNewFilterURL('author')."' >- Remove author filter</option><option disabled></option>"; };

        while($row = mysqli_fetch_array($authorFilterSelection)){
    		$shortauthor = $row['username'];
    		$author = $row['author'];
    		
    		if(isset($authorFilter) && $authorFilter == $shortauthor){  $selectAuthor .= "<option value='".makeNewFilterURL('author')."&author=$shortauthor' selected>$author</option>";    }
            else{                                                       $selectAuthor .= "<option value='".makeNewFilterURL('author')."&author=$shortauthor'         >$author</option>";    };
        }
    }

    // tag filter
	if(empty($tagFilter)){    $selectTag = "<option                                     >Select</option><option disabled></option>"; }
	else{                     $selectTag = "<option value='".makeNewFilterURL('tag')."' >- Remove tag filter</option><option disabled></option>"; };

    $tagFilterSelection = mysqli_query($con,"SELECT blog_tags.tag,blog_tags.shorttag FROM blog JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id WHERE published = '$pubTest' GROUP BY tag ORDER BY tag ASC;");
    while($row = mysqli_fetch_array($tagFilterSelection)){
		$shorttag = $row['shorttag'];
		$tag = $row['tag'];

		if(isset($tagFilter) && $tagFilter == $shorttag){   $selectTag .= "<option value='".makeNewFilterURL('tag')."&tag=$shorttag' selected>$tag</option>";    }
		else{                                               $selectTag .= "<option value='".makeNewFilterURL('tag')."&tag=$shorttag'         >$tag</option>";    };
    }
?>

<ul class="cellRowGroup">
    <li class="cellRow <?if(isset($searchFilter)){ echo'filterOn';}?>">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-fw fa-search"></i></div>
            <span class="cellLabel">Search</span>
            <div class="cellValue">
                <form class="contentSearchForm" action="/search.php" method="get">
                    <input type="hidden" name="rest"   value="<?=makeNewFilterURL('search');?>">
                    <input type="search" name="search" placeholder="Search for blog posts" title="Search for blog posts"
                        <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>>
                </form>
            </div>
        </a>
    </li>
    <li class="cellRow <?if(isset($tagFilter)){ echo'filterOn';}?>">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-fw fa-tag"></i></div>
            <span class="cellLabel">Tag</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectTag');" onblur="stopFilter('selectTag');" title="Filter by tag">
                    <?=$selectTag?>
                </select>
            </div>
        </a>
    </li>
<?
    if(isset($selectAuthor)){
?>
    <li class="cellRow <?if(isset($authorFilter)){ echo'filterOn';}?>">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-fw fa-user"></i></div>
            <span class="cellLabel">Author</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectAuthor');" onblur="stopFilter('selectAuthor');" title="Filter by author">
                    <?if(isset($selectAuthor)){ echo $selectAuthor;}?>
                </select>
            </div>
        </a>
    </li>
<?
    }
?>
    <li class="cellRow <?if(isset($dateFilter)){ echo'filterOn';}?>">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-fw fa-calendar"></i></div>
            <span class="cellLabel">Publish date</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectDate');" onblur="stopFilter('selectDate');" title="Filter by date">
                    <?=$selectDate?>
                </select>
            </div>
        </a>
    </li>
    <li class="cellRow resetFilters">
        <a href="/">
            <span class="cellLabel">Reset all filters</span>
        </a>
    </li>
</ul>



<ul class="cellRowGroup">
<!--         <span class="cellGroupTitle">Download a pdf of my resume</span> -->
    <li class="cellRow">
        <a href="/archive">
            <div class="cellIcon"><i class="fa fa-fw fa-archive"></i></div>
            <span class="cellLabel">Archive</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
    <li class="cellRow">
        <a href="/about">
            <div class="cellIcon"><i class="fa fa-fw fa-pencil"></i></div>
            <span class="cellLabel">About this blog</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
</ul>