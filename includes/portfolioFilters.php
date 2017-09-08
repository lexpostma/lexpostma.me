<?
    // client filter
	if(empty($clientFilter)){   $selectClient = "<option                                        >Select</option><option disabled></option>"; }
	else{                       $selectClient = "" /* "<option value='".makeNewFilterURL('client')."' >- Remove client filter</option><option disabled></option>" */; };
    $clientsWithLogo = '';

    if(isset($clientFilter) && $clientFilter == 'tudelft-master'){
                                                        $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' selected >From TU Delft Master</option>
                                                        <option value='".makeNewFilterURL('client')."&client=tudelft-bachelor' >From TU Delft Bachelor</option>
                                                        <option disabled></option>";
    }
    elseif(isset($clientFilter) && $clientFilter == 'tudelft-bachelor'){
                                                        $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' selected >From TU Delft Bachelor</option>
                                                        <option value='".makeNewFilterURL('client')."&client=tudelft-master' >From TU Delft Master</option>
                                                        <option disabled></option>";            
    };


    $clientFilterSelection3 = mysqli_query($con,"SELECT shortclient,client,showLogo FROM portfolio JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id WHERE client_id != '1' AND onlineVisible = '1' GROUP BY client ORDER BY shortclient ASC;");
    while($row = mysqli_fetch_array($clientFilterSelection3)){
        $shortclient2 = $row['shortclient'];
        $client2 = $row['client'];
        if(strpos($shortclient2,'tudelft') !== false){ $shortclient2 = 'tudelft'; }; // remove the -bachelor/-master from tudelft

        if(isset($clientFilter) && $clientFilter == $shortclient2){   $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' selected >".$client2."</option>";    }
        else{                                                         $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."'          >".$client2."</option>";             };

        // all the clients with nice logos
        if($row['showLogo'] == 1){
            if(isset($clientFilter) && $clientFilter == $shortclient2){  $clientsWithLogo .= '<a href="'.makeNewFilterURL('client').'" title="Remove '.$client2.' filter" class="selected"><img src="/images/logos/'.$shortclient2.'.svg" /></a>';      }
            else{                                                        $clientsWithLogo .= '<a href="'.makeNewFilterURL('client').'&client='.$shortclient2.'" title="Filter by '.$client2.'" ><img src="/images/logos/'.$shortclient2.'.svg" /></a>'; };
        };
    };


    // category filter
	if(empty($categoryFilter)){ $selectCategory = "<option                                          >Select</option><option disabled></option>"; }
	else{                       $selectCategory = "" /* "<option value='".makeNewFilterURL('category')."' >- Remove category filter</option><option disabled></option>" */; };

    $categoryFilterSelection = mysqli_query($con,"SELECT category,shortcategory FROM portfolio JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id WHERE onlineVisible = '1' GROUP BY shortcategory ORDER BY category ASC;");
    while($row = mysqli_fetch_array($categoryFilterSelection)){
        if(isset($categoryFilter) && $categoryFilter == $row['shortcategory']){  $selectCategory .= "<option value='".makeNewFilterURL('category')."&category=".$row['shortcategory']."' selected>".$row['category']." projects</option>";  }
        else{                                                                    $selectCategory .= "<option value='".makeNewFilterURL('category')."&category=".$row['shortcategory']."'         >".$row['category']."</option>";           };
	};

    // year filter
	if(empty($yearFilter)){   $selectYear = "<option                                      >Select</option><option disabled></option>"; }
	else{                     $selectYear = "" /* "<option value='".makeNewFilterURL('year')."' >- Remove year filter</option><option disabled></option>" */; };

    $yearFilterSelection = mysqli_query($con,"SELECT year FROM portfolio WHERE onlineVisible = 1 GROUP BY year ORDER BY year ASC;");
    while($row = mysqli_fetch_array($yearFilterSelection)){
        if(isset($yearFilter) && $yearFilter == $row['year']){  $selectYear .= "<option value='".makeNewFilterURL('year')."&year=".$row['year']."' selected >".$row['year']."</option>";    }
        else{                                                   $selectYear .= "<option value='".makeNewFilterURL('year')."&year=".$row['year']."'          >".$row['year']."</option>";            };
    };
?>

<ul class="cellRowGroup">
    <li class="cellRow <?if(isset($searchFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterInputSearch');">
            <div class="cellIcon search"><i class="fa fa-fw fa-search"></i></div>
            <span class="cellLabel">Search</span>
            <div class="cellValue">
                <form action="/search.php" method="get">
                    <input type="hidden" name="rest"   value="<?=makeNewFilterURL('search');?>">
                    <input type="search" name="search" placeholder="Type" title="Search for projects" id="filterInputSearch"
                        <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>>
                </form>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('search')?>">&times;</a>
        </div>
    </li>
    <li class="cellRow <?if(isset($categoryFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterSelectCategory');">
            <div class="cellIcon tag"><i class="fa fa-fw fa-tag"></i></div>
            <span class="cellLabel">Category</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" title="Filter by category" id="filterSelectCategory">
                    <?=$selectCategory?>
                </select>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('category')?>">&times;</a>
        </div>
    </li>
    <li class="cellRow <?if(isset($yearFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterSelectYear');">
            <div class="cellIcon date"><i class="fa fa-fw fa-calendar"></i></div>
            <span class="cellLabel">Year</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" title="Filter by year" id="filterSelectYear">
                    <?=$selectYear?>
                </select>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('year')?>">&times;</a>
        </div>
    </li>
    <li class="cellRow <?if(isset($clientFilter)){ echo'filterOn';}?>">
        <div class="cellRowContent" onclick="focusOnInput('filterSelectClient');">
            <div class="cellIcon client"><i class="fa fa-fw fa-building"></i></div>
            <span class="cellLabel">Client</span>
            <div class="cellValue">
                <select onchange="window.open(this.value,'_self');" title="Filter by client" id="filterSelectClient">
                    <?=$selectClient?>
                </select>
            </div>
            <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('client')?>">&times;</a>
        </div>
    </li>
    <li class="cellRow">
        <div class="cellRowContent" onclick="focusOnInput('toggleVideosOnly');">
            <div class="cellIcon video"><i class="fa fa-fw fa-video-camera"></i></div>
            <span class="cellLabel">Videos only</span>
            <div class="cellValue">
            	<form action="">
            		<input type="checkbox" id="toggleVideosOnly" name="Videos only" value="<?=makeNewFilterURL('client')?>" > <!-- onchange="window.open(this.value,'_self');"  -->
            		<div class="toggle">
            			<label for="toggleVideosOnly"><i></i></label>
            		</div>
            	</form>
            </div>
        </div>
    </li>
    <li class="cellRow resetFilters">
        <a class="cellRowContent" href="/">
            <span class="cellLabel">Reset all filters</span>
        </a>
    </li>
</ul>


<ul class="cellRowGroup">
<!--         <span class="cellGroupTitle">Download a pdf of my resume</span> -->
    <li class="cellRow">
        <a class="cellRowContent" href="/archive">
            <div class="cellIcon archive"><i class="fa fa-fw fa-archive"></i></div>
            <span class="cellLabel">Oldies, but gooies</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
</ul>