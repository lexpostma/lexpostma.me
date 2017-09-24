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

    $videoCheckbox = ' value="video" ';
    if(isset($typeFilter) && $typeFilter == 'video'){ 
        $videoCheckbox = ' checked ';
    };


?>

<form action="/filtering.php" method="get" id="filteringForm">
    <ul class="cellRowGroup">
<!--     <lh>Filter projects</lh> -->


<?
    $inputSearchForWhat = 'projects';
    include 'filterSearchRow.php';
    
    
    
    $cellIconClass = 'video';
    $cellIconFontAwesome = 'video-camera';
    $cellLabel = 'Videos only';
    $toggleName = 'type';
    $toggleMode = $videoCheckbox;
    
    include 'filterToggleRow.php';
    


    $cellIconClass = 'category';
    $cellIconFontAwesome = 'tag';
    $cellLabel = 'Category';
    $selectItems = $selectCategory;
    
    include 'filterSelectRow.php';



    $cellIconClass = 'year';
    $cellIconFontAwesome = 'calendar';
    $cellLabel = 'Year';
    $selectItems = $selectYear;
    
    include 'filterSelectRow.php';



    $cellIconClass = 'client';
    $cellIconFontAwesome = 'building';
    $cellLabel = 'Client';
    $selectItems = $selectClient;
    
    include 'filterSelectRow.php';   


?>




    </ul>
</form>

<? 
    include 'filterFinalButton.php';




    if ($currentEnvironment !== 'production') {
?>


<ul class="cellRowGroup">
    <lh>Project selections <i>(development-only)</i></lh>
    <li class="cellRow">
        <a class="cellRowContent" href="/all">
            <div class="cellIcon"><i class="fa fa-fw fa-th"></i></div>
            <span class="cellLabel">All projects</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>

    <li class="cellRow">
        <a class="cellRowContent" href="/archive">
            <div class="cellIcon archive"><i class="fa fa-fw fa-archive"></i></div>
            <span class="cellLabel">Archived projects</span>
            <div class="cellClosingIcon chevron"><? include 'navigationIcons/chevron.svg'  ?></div>
        </a>
    </li>

</ul>

<?
    }
?>
