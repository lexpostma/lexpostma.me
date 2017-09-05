<?
    // client filter
	if(empty($clientFilter)){   $selectClient = "<option                                        >Filter by client</option><option disabled></option>"; }
	else{                       $selectClient = "<option value='".makeNewFilterURL('client')."' >- Remove client filter</option><option disabled></option>"; };
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

        if(isset($clientFilter) && $clientFilter == $shortclient2){   $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' selected >Made for ".$client2."</option>";    }
        else{                                                         $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."'          >".$client2."</option>";             };

        // all the clients with nice logos
        if($row['showLogo'] == 1){
            if(isset($clientFilter) && $clientFilter == $shortclient2){  $clientsWithLogo .= '<a href="'.makeNewFilterURL('client').'" title="Remove '.$client2.' filter" class="selected"><img src="/images/logos/'.$shortclient2.'.svg" /></a>';      }
            else{                                                        $clientsWithLogo .= '<a href="'.makeNewFilterURL('client').'&client='.$shortclient2.'" title="Filter by '.$client2.'" ><img src="/images/logos/'.$shortclient2.'.svg" /></a>'; };
        };
    };


    // category filter
	if(empty($categoryFilter)){ $selectCategory = "<option                                          >Filter by category</option><option disabled></option>"; }
	else{                       $selectCategory = "<option value='".makeNewFilterURL('category')."' >- Remove category filter</option><option disabled></option>"; };

    $categoryFilterSelection = mysqli_query($con,"SELECT category,shortcategory FROM portfolio JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id WHERE onlineVisible = '1' GROUP BY shortcategory ORDER BY category ASC;");
    while($row = mysqli_fetch_array($categoryFilterSelection)){
        if(isset($categoryFilter) && $categoryFilter == $row['shortcategory']){  $selectCategory .= "<option value='".makeNewFilterURL('category')."&category=".$row['shortcategory']."' selected>".$row['category']." projects</option>";  }
        else{                                                                    $selectCategory .= "<option value='".makeNewFilterURL('category')."&category=".$row['shortcategory']."'         >".$row['category']."</option>";           };
	};

    // year filter
	if(empty($yearFilter)){   $selectYear = "<option                                      >Filter by year</option><option disabled></option>"; }
	else{                     $selectYear = "<option value='".makeNewFilterURL('year')."' >- Remove year filter</option><option disabled></option>"; };

    $yearFilterSelection = mysqli_query($con,"SELECT year FROM portfolio WHERE onlineVisible = 1 GROUP BY year ORDER BY year ASC;");
    while($row = mysqli_fetch_array($yearFilterSelection)){
        if(isset($yearFilter) && $yearFilter == $row['year']){  $selectYear .= "<option value='".makeNewFilterURL('year')."&year=".$row['year']."' selected >Made in ".$row['year']."</option>";    }
        else{                                                   $selectYear .= "<option value='".makeNewFilterURL('year')."&year=".$row['year']."'          >".$row['year']."</option>";            };
    };
?>

<form class="contentSearchForm" action="/search.php" method="get">
    <i class="fa fa-fw fa-search"></i>
    <input type="hidden" name="rest"   value="<?=makeNewFilterURL('search');?>">
    <input type="search" name="search" placeholder="Search for projects" title="Search for projects"
        <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>>
    <span class="line"></span>
</form>

<div class="wrappedBox">
    <div class="selectsBox">
        <span id="selectCategory" class="filter <?if(isset($categoryFilter)){ echo'filterOn';}?>">
            <i class="fa fa-fw fa-tags" aria-hidden="true"></i>
            <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectCategory');" onblur="stopFilter('selectCategory');" title="Filter by category">
            <?=$selectCategory?>
            </select>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <span class="line"></span>
        </span>
        <span id="selectYear" class="filter <?if(isset($yearFilter)){ echo'filterOn';}?>">
            <i class="fa fa-fw fa-calendar" aria-hidden="true"></i>
            <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectYear');" onblur="stopFilter('selectYear');" title="Filter by year">
                <?=$selectYear?>
            </select>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <span class="line"></span>
        </span>
        <span id="selectClient" class="filter <?if(isset($clientFilter)){ echo'filterOn';}?>">
            <i class="fa fa-fw fa-building" aria-hidden="true"></i>
            <select onchange="window.open(this.value,'_self');" onfocus="focusFilter('selectClient');" onblur="stopFilter('selectClient');" title="Filter by client">
                <?=$selectClient?>
            </select>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <span class="line"></span>
        </span>
    </div>

</div>


<a>Videos only</a>

<div class="cellRowGroup">
<!--         <span class="cellGroupTitle">Download a pdf of my resume</span> -->
    <a class="cellRow" href="/archive">
        <div class="cellIcon"><i class="fa fa-archive"></i></div>
        <span class="cellLabel">Oldies, but goodies</span>
        <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
    </a>
</div>