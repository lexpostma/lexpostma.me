<?

# ======================= #
# ==== Client filter ==== #
# ======================= #

	if(empty($clientFilter)){
        $selectClient = "<option>Select</option><option disabled></option>"; 
	} else { 
    	$selectClient = "";
    };

    if(isset($clientFilter) && $clientFilter == 'tudelft-master'){
                                                        $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' selected >TU Delft Master</option>
                                                        <option value='".makeNewFilterURL('client')."&client=tudelft-bachelor' >From TU Delft Bachelor</option>
                                                        <option disabled></option>";
    } elseif(isset($clientFilter) && $clientFilter == 'tudelft-bachelor'){
                                                        $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' selected >TU Delft Bachelor</option>
                                                        <option value='".makeNewFilterURL('client')."&client=tudelft-master' >From TU Delft Master</option>
                                                        <option disabled></option>";            
    };

    $clientFilterSelectionQuery = "SELECT shortclient,client,showLogo 
                                   FROM portfolio 
                                   JOIN portfolio_client_relations ON portfolio.id=portfolio_client_relations.project_id 
                                   JOIN portfolio_clients ON portfolio_client_relations.client_id=portfolio_clients.id 
                                   WHERE client_id != '1' 
                                   AND onlineVisible = '1' 
                                   GROUP BY client 
                                   ORDER BY shortclient ASC;";
    
    $clientFilterSelection = mysqli_query($con,$clientFilterSelectionQuery);
    
    while($row = mysqli_fetch_array($clientFilterSelection)){
        $shortclient2 = $row['shortclient'];
        $client2 = $row['client'];
        if(strpos($shortclient2,'tudelft') !== false){ $shortclient2 = 'tudelft'; }; // remove the -bachelor/-master from tudelft

        $selectClient .= "<option value='".makeNewFilterURL('client')."&client=".$shortclient2."' ";
        if(isset($clientFilter) && $clientFilter == $shortclient2){   $selectClient .= "selected";    };
        $selectClient .= ">".$client2."</option>";

    };


# ========================= #
# ==== Category filter ==== #
# ========================= #

	if(empty($categoryFilter)){ $selectCategory = "<option>Select</option><option disabled></option>"; }
	else{                       $selectCategory = ""; };
    
    $categoryFilterSelectionQuery = "SELECT category,shortcategory 
                                     FROM portfolio 
                                     JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id 
                                     WHERE onlineVisible = '1' 
                                     GROUP BY shortcategory 
                                     ORDER BY category ASC;";

    $categoryFilterSelection = mysqli_query($con,$categoryFilterSelectionQuery);
    
    while($row = mysqli_fetch_array($categoryFilterSelection)){

        $selectCategory .= "<option value='".makeNewFilterURL('category')."&category=".$row['shortcategory']."' ";
        if(isset($categoryFilter) && $categoryFilter == $row['shortcategory']){  $selectCategory .= "selected";  };
        $selectCategory .= ">".$row['category']."</option>";

	};

# ===================== #
# ==== Year filter ==== #
# ===================== #

	if(empty($yearFilter)){   $selectYear = "<option>Select</option><option disabled></option>"; }
	else{                     $selectYear = ""; };

    $yearFilterSelectionQuery = "SELECT year 
                                 FROM portfolio 
                                 WHERE onlineVisible = 1 
                                 GROUP BY year 
                                 ORDER BY year ASC;";
    
    $yearFilterSelection = mysqli_query($con,$yearFilterSelectionQuery);
    
    while($row = mysqli_fetch_array($yearFilterSelection)){
        
        $selectYear .= "<option value='".makeNewFilterURL('year')."&year=".$row['year']."' ";
        if(isset($yearFilter) && $yearFilter == $row['year']){  $selectYear .= "selected"; };
        $selectYear .= ">".$row['year']."</option>";
        
    };
    
# ====================== #
# ==== Video filter ==== #
# ====================== #

    if(isset($typeFilter) && $typeFilter == 'video'){ 
        $videoCheckbox = ' checked value="'.makeNewFilterURL('type').'" ';
    } else {
        $videoCheckbox = 'value="'.makeNewFilterURL('type').'&type=video" ';
    };


?>

<ul class="cellRowGroup">
    <form action="/search.php" method="get">
        <li class="cellRow <?if(isset($searchFilter)){ echo'filterOn';}?>">
            <div class="cellRowContent" onclick="focusOnInput('filterInputSearch');">
                <div class="cellIcon search"><i class="fa fa-fw fa-search"></i></div>
                <label for="inputSearch" class="cellLabel">Search</label>
                <div class="cellValue">
                    <input type="hidden" name="rest"   value="<?=makeNewFilterURL('search');?>">
                    <input type="search" name="search" placeholder="Type" title="Search for projects" id="inputSearch"
                        <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>>
                </div>
                <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('search')?>">&times;</a>
            </div>
        </li>
        <li class="cellRow <?if(isset($categoryFilter)){ echo'filterOn';}?>">
            <div class="cellRowContent" onclick="focusOnInput('filterSelectCategory');">
                <div class="cellIcon tag"><i class="fa fa-fw fa-tag"></i></div>
                <label for="inputCategory" class="cellLabel">Category</label>
                <div class="cellValue">
                    <select onchange="window.open(this.value,'_self');" title="Filter by category" id="inputCategory">
                        <?=$selectCategory?>
                    </select>
                </div>
                <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('category')?>">&times;</a>
            </div>
        </li>
        <li class="cellRow <?if(isset($yearFilter)){ echo'filterOn';}?>">
            <div class="cellRowContent" onclick="focusOnInput('filterSelectYear');">
                <div class="cellIcon date"><i class="fa fa-fw fa-calendar"></i></div>
                <label for="inputYear" class="cellLabel">Year</label>
                <div class="cellValue">
                    <select onchange="window.open(this.value,'_self');" title="Filter by year" id="inputYear">
                        <?=$selectYear?>
                    </select>
                </div>
                <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('year')?>">&times;</a>
            </div>
        </li>
        <li class="cellRow <?if(isset($clientFilter)){ echo'filterOn';}?>">
            <div class="cellRowContent" onclick="focusOnInput('filterSelectClient');">
                <div class="cellIcon client"><i class="fa fa-fw fa-building"></i></div>
                <label for="inputClient" class="cellLabel">Client</label>
                <div class="cellValue">
                    <select onchange="window.open(this.value,'_self');" title="Filter by client" id="inputClient">
                        <?=$selectClient?>
                    </select>
                </div>
                <a class="cellClosingIcon deleteFilter" href="<?=makeNewFilterURL('client')?>">&times;</a>
            </div>
        </li>
        <li class="cellRow <?if(isset($typeFilter) && $typeFilter == 'video'){ echo'filterOn';}?>">
            <div class="cellRowContent" onclick="focusOnInput('toggleVideosOnly');">
                <div class="cellIcon video"><i class="fa fa-fw fa-video-camera"></i></div>
                <label for="inputType" class="cellLabel">Videos only</label>
                <div class="cellValue">
            		<input type="checkbox" id="inputType" name="Videos only" <?=$videoCheckbox?>
            		        onchange="window.open(this.value,'_self');" >
                </div>
        		<div class="cellClosingIcon toggle">
        			<label for="inputType"><i></i></label>
        		</div>
            </div>
        </li>
        
        <li class="cellRow resetFilters">
            <a class="cellRowContent" href="/">
                <span class="cellLabel">Apply filters</span>
            </a>
        </li>
    
<?
//     if($basepageTwo == 'filtered') {
?>
        <li class="cellRow resetFilters">
            <a class="cellRowContent" href="/">
                <span class="cellLabel">Reset all filters</span>
            </a>
        </li>
<?
//     }
?>
    </form>
</ul>


<ul class="cellRowGroup">
    <li class="cellRow">
        <a class="cellRowContent" href="/archive">
            <div class="cellIcon archive"><i class="fa fa-fw fa-archive"></i></div>
            <span class="cellLabel">Oldies, but goodies</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>
</ul>


<script>

/*
$(document).ready(function() {
    $('#sel').change(function() {
	    $('#sel').width( $('#hidnSpan').html($('#sel').find(":selected").text()).width())
	});
});
*/

</script>
