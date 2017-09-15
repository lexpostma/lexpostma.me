<li class="cellRow">
    <div class="cellRowContent">
        <div class="cellIcon search"><i class="fa fa-fw fa-search"></i></div>
        <label for="inputSearch" class="cellLabel">Search</label>
        <input class="cellValue" title="Search for <?=$inputSearchForWhat?>" type="search" name="search" id="inputSearch" placeholder="Type" 
            <? if(isset($searchFilter)){ echo ' value="'.$searchFilter.'" ';}?>
            onkeyup="toggleFilterOnOff('inputSearch');">
        <span id="inputSearchWidth" class="widthForInputHidden"></span>
        <button type="button" class="cellClosingIcon deleteFilter" onclick="clearInput('inputSearch')">&times;</button>
    </div>
</li>