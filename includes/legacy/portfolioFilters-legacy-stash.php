
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
