<?

# ======================= #
# ==== Client filter ==== #
# ======================= #

    $selectClient = "<option value=''>Select</option><option disabled></option>"; 

    if(isset($clientFilter) && $clientFilter == 'tudelft-master'){
                                                        $selectClient .= "<option value='".$shortclient2."' selected >TU Delft Master</option>
                                                        <option value='tudelft-bachelor' >TU Delft Bachelor</option>
                                                        <option disabled></option>";
    } elseif(isset($clientFilter) && $clientFilter == 'tudelft-bachelor'){
                                                        $selectClient .= "<option value='".$shortclient2."' selected >TU Delft Bachelor</option>
                                                        <option value='tudelft-master' >TU Delft Master</option>
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

        $selectClient .= "<option value='".$shortclient2."' ";
        if(isset($clientFilter) && $clientFilter == $shortclient2){   $selectClient .= "selected";    };
        $selectClient .= ">".$client2."</option>";

    };


# ========================= #
# ==== Category filter ==== #
# ========================= #

    $selectCategory = "<option value=''>Select</option><option disabled></option>";
    
    $categoryFilterSelectionQuery = "SELECT category,shortcategory 
                                     FROM portfolio 
                                     JOIN portfolio_categories on portfolio.category_id=portfolio_categories.id 
                                     WHERE onlineVisible = '1' 
                                     GROUP BY shortcategory 
                                     ORDER BY category ASC;";

    $categoryFilterSelection = mysqli_query($con,$categoryFilterSelectionQuery);
    
    while($row = mysqli_fetch_array($categoryFilterSelection)){

        $selectCategory .= "<option value='".$row['shortcategory']."' ";
        if(isset($categoryFilter) && $categoryFilter == $row['shortcategory']){  $selectCategory .= "selected";  };
        $selectCategory .= ">".$row['category']."</option>";

	};

# ===================== #
# ==== Year filter ==== #
# ===================== #

    $selectYear = "<option value=''>Select</option><option disabled></option>";

    $yearFilterSelectionQuery = "SELECT year 
                                 FROM portfolio 
                                 WHERE onlineVisible = 1 
                                 GROUP BY year 
                                 ORDER BY year ASC;";
    
    $yearFilterSelection = mysqli_query($con,$yearFilterSelectionQuery);
    
    while($row = mysqli_fetch_array($yearFilterSelection)){
        
        $selectYear .= "<option value='".$row['year']."' ";
        if(isset($yearFilter) && $yearFilter == $row['year']){  $selectYear .= "selected"; };
        $selectYear .= ">".$row['year']."</option>";
        
    };
    
# ====================== #
# ==== Video filter ==== #
# ====================== #

    if(isset($typeFilter) && $typeFilter == 'video'){ 
        $videoCheckbox = ' checked value="video" ';
    } else {
        $videoCheckbox = 'value="video" ';
    };


?>


<ul class="cellRowGroup">
    <form action="/filtering.php" method="get">
        <li class="cellRow">
            <div class="cellRowContent">
                <div class="cellIcon search"><i class="fa fa-fw fa-search"></i></div>
                <label for="inputSearch" class="cellLabel">Search</label>
                <input class="cellValue" title="Search for projects" type="search" name="search" id="inputSearch" placeholder="Type" 
                    <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>
                    onkeyup="toggleFilterOnOff('inputSearch');">
                <span id="inputSearchWidth" class="widthForInputHidden"></span>
                <button type="button" class="cellClosingIcon deleteFilter" onclick="clearInput('inputSearch')">&times;</button>
            </div>
        </li>


        
        <li class="cellRow">
            <div class="cellRowContent">
                <div class="cellIcon tag"><i class="fa fa-fw fa-tag"></i></div>
                <label for="inputCategory" class="cellLabel">Category</label>
                <select class="cellValue" title="Filter by category" name= "category" id="inputCategory"><?=$selectCategory?></select>
                <span id="inputCategoryWidth" class="widthForInputHidden"></span>
                <button type="button" class="cellClosingIcon deleteFilter" onclick="clearInput('inputCategory')">&times;</button>
            </div>
        </li>



        <li class="cellRow">
            <div class="cellRowContent">
                <div class="cellIcon date"><i class="fa fa-fw fa-calendar"></i></div>
                <label for="inputYear" class="cellLabel">Year</label>
                <select class="cellValue" title="Filter by year" name= "year" id="inputYear"><?=$selectYear?></select>
                <span id="inputYearWidth" class="widthForInputHidden"></span>
                <button type="button" class="cellClosingIcon deleteFilter" onclick="clearInput('inputYear')">&times;</button>
            </div>
        </li>
        


        <li class="cellRow">
            <div class="cellRowContent">
                <div class="cellIcon client"><i class="fa fa-fw fa-building"></i></div>
                <label for="inputClient" class="cellLabel">Client</label>
                <select class="cellValue" title="Filter by client" name= "client" id="inputClient"><?=$selectClient?></select>
                <span id="inputClientWidth" class="widthForInputHidden"></span>
                <button type="button" class="cellClosingIcon deleteFilter" onclick="clearInput('inputClient')">&times;</button>
            </div>
        </li>
        


        <li class="cellRow <?if(isset($typeFilter) && $typeFilter == 'video'){ echo'filterOn';}?>">        
            <div class="cellRowContent">
                <div class="cellIcon video"><i class="fa fa-fw fa-video-camera"></i></div>
                <label for="inputType" class="cellLabel">Videos only</label>
                <input class="cellValue" title="Videos only" type="checkbox" id="inputType" name="type" <?=$videoCheckbox?>>
        		<div class="cellClosingIcon toggle">
        			<label for="inputType"><i></i></label>
        		</div>
            </div>
        </li>
        
        <br>
        
        <input type="submit" value="Apply filters">
        <input type="reset" value="Cancel">
        <a href="/">Reset filters</a>
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


</script>
