<?
    // date filter
	$yearFilterSelection = mysqli_query($con,"SELECT datePublished FROM blog WHERE published = '$pubTest' GROUP BY YEAR(datePublished) ORDER BY datePublished ASC;");

	if(empty($dateFilter)){  $selectDate = "<option                                      >Filter by date</option>"; }
	else{                    $selectDate = "<option value='".makeNewFilterURL('date')."' >- Remove date filter</option>"; }

	while($row = mysqli_fetch_array($yearFilterSelection)){
		$year = date("Y", strtotime($row['datePublished']));
		$selectDate .= "<option disabled></option><optgroup label='$year'>";

		if(isset($dateFilter) && $dateFilter == $year){ $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year' selected>Published throughout $year</option>";  }
		else{                                           $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year'         >Throughout $year</option>";  };


		$monthFilterSelection = mysqli_query($con,"SELECT datePublished FROM blog WHERE published = '$pubTest' AND datePublished BETWEEN '$year-01-01 00:00:00' AND '$year-12-31 23:59:59' GROUP BY MONTH(datePublished) ORDER BY datePublished ASC;");
		while($row = mysqli_fetch_array($monthFilterSelection)){
			$datetime = strtotime($row['datePublished']);
			$month = date("F", $datetime);
			$monthNum = date("m", $datetime);
            
			if(isset($dateFilter) && isset($monthFilter) && $monthFilter == $monthNum && $yearFilter == $year){  $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year-$monthNum' selected>Published in $month $year</option>";   }
            else{                                                                                               $selectDate .= "<option value='".makeNewFilterURL('date')."&date=$year-$monthNum'         >$month</option>";   };
        };
		$selectDate .= "</optgroup>";
    }

    // author filter
    $authorFilterSelection = mysqli_query($con,"SELECT authors_creators.id,authors_creators.author,authors_creators.username FROM blog JOIN authors_creators ON blog.author_id=authors_creators.id WHERE published = '$pubTest' GROUP BY author ORDER BY id ASC;");
	if(mysqli_num_rows($authorFilterSelection)>1){
    	if(empty($authorFilter)){ $selectAuthor = "<option                                        >Filter by author</option><option disabled></option>"; }
    	else{                     $selectAuthor = "<option value='".makeNewFilterURL('author')."' >- Remove author filter</option><option disabled></option>"; };

        while($row = mysqli_fetch_array($authorFilterSelection)){
    		$shortauthor = $row['username'];
    		$author = $row['author'];
    		
    		if(isset($authorFilter) && $authorFilter == $shortauthor){  $selectAuthor .= "<option value='".makeNewFilterURL('author')."&author=$shortauthor' selected>Written by $author</option>";    }
            else{                                                       $selectAuthor .= "<option value='".makeNewFilterURL('author')."&author=$shortauthor'         >$author</option>";    };
        }
    }

    // tag filter
	if(empty($tagFilter)){    $selectTag = "<option                                     >Filter by tag</option><option disabled></option>"; }
	else{                     $selectTag = "<option value='".makeNewFilterURL('tag')."' >- Remove tag filter</option><option disabled></option>"; };

    $tagFilterSelection = mysqli_query($con,"SELECT blog_tags.tag,blog_tags.shorttag FROM blog JOIN blog_tags_relations ON blog.id=blog_tags_relations.blog_id JOIN blog_tags ON blog_tags_relations.tag_id=blog_tags.id WHERE published = '$pubTest' GROUP BY tag ORDER BY tag ASC;");
    while($row = mysqli_fetch_array($tagFilterSelection)){
		$shorttag = $row['shorttag'];
		$tag = $row['tag'];

		if(isset($tagFilter) && $tagFilter == $shorttag){   $selectTag .= "<option value='".makeNewFilterURL('tag')."&tag=$shorttag' selected>Tagged with $tag</option>";    }
		else{                                               $selectTag .= "<option value='".makeNewFilterURL('tag')."&tag=$shorttag'         >$tag</option>";    };
    }
?>

<!--
<form class="contentSearchForm" action="/search.php" method="get">
    <i class="fa fa-fw fa-search"></i>
    <input type="hidden" name="rest"   value="<?=makeNewFilterURL('search');?>">
    <input type="search" name="search" placeholder="Search for blog posts" title="Search for blog posts"
        <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>>
    <span class="line"></span>
</form>

<div class="wrappedBox">
    <div class="selectsBox">
        <span id="selectTag" class="filter <?if(isset($tagFilter)){ echo'filterOn';}?>">
            <i class="fa fa-fw fa-tags" aria-hidden="true"></i>
            <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectTag');" onblur="stopFilter('selectTag');" title="Filter by tag">
                <?=$selectTag?>
            </select>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <span class="line"></span>
        </span>
<?
    if(isset($selectAuthor)){
?>
        <span id="selectAuthor" class="filter <?if(isset($authorFilter)){ echo'filterOn';}?>">
            <i class="fa fa-fw fa-users" aria-hidden="true"></i>
            <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectAuthor');" onblur="stopFilter('selectAuthor');" title="Filter by author">
                <?if(isset($selectAuthor)){ echo $selectAuthor;}?>
            </select>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <span class="line"></span>
        </span>
<?
    }
?>
        <span id="selectDate" class="filter <?if(isset($dateFilter)){ echo'filterOn';}?>">
            <i class="fa fa-fw fa-calendar" aria-hidden="true"></i>
            <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectDate');" onblur="stopFilter('selectDate');" title="Filter by date">
                <?=$selectDate?>
            </select>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <span class="line"></span>
        </span>
    </div>
</div>
-->


<ul class="cellRowGroup">
    <li class="cellRow">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-search"></i></div>
            <span class="cellLabel">Search</span>
            <div class="cellValue">Something</div>
        </a>
    </li>
    <li class="cellRow">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-tag"></i></div>
            <span class="cellLabel">Tag</span>
            <div class="cellValue">Something</div>
        </a>
    </li>
    <li class="cellRow">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-user"></i></div>
            <span class="cellLabel">Author</span>
            <div class="cellValue">Something</div>
        </a>
    </li>
    <li class="cellRow">
        <a href="#">
            <div class="cellIcon"><i class="fa fa-calendar"></i></div>
            <span class="cellLabel">Date</span>
            <div class="cellValue">Something</div>
        </a>
    </li>
</ul>



<ul class="cellRowGroup">
<!--         <span class="cellGroupTitle">Download a pdf of my resume</span> -->
    <li class="cellRow">
        <a href="/archive">
            <div class="cellIcon"><i class="fa fa-archive"></i></div>
            <span class="cellLabel">Archive</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
    <li class="cellRow">
        <a href="/about">
            <div class="cellIcon"><i class="fa fa-pencil"></i></div>
            <span class="cellLabel">About this blog</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
</ul>