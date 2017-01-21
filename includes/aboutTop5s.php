<h1>My Top 5s</h1>

<div class="favLists">
    
<?
//     $top5 = mysqli_query($con,"SELECT * FROM about_top5items JOIN about_top5lists ON about_top5items.list_id=about_top5lists.id WHERE published = 1 ORDER BY list_id ASC;");
    $top5 = mysqli_query($con,"SELECT * FROM about_top5lists WHERE listPublished = 1 ORDER BY id ASC;");
    while($row = mysqli_fetch_array($top5)){
        $listName = $row['listName'];
        
        echo "<ul><lh>$listName</lh>";
        
        $top5items = mysqli_query($con,"SELECT * FROM about_top5items JOIN about_top5lists ON about_top5items.list_id=about_top5lists.id WHERE listName = '$listName' AND published = 1 ORDER BY volgorde ASC LIMIT 5;");
        while($row = mysqli_fetch_array($top5items)){
            $itemName = $row['itemName'];
            $link0 = $row['mainLink'];
            $link1 = $row['extraLink1'];
            $link2 = $row['extraLink2'];
            
            $gaEvent = "ga('send', 'event', 'About', 'Top 5', ";
            
            echo '<li>';

            if($link0 !== NULL){                              $gaEvent .= "'$itemName');";               echo ' <a href="'.$link0.'" onclick="'.$gaEvent.'">'.$itemName.'</a>';   }
            else {                                            echo $itemName;                                  };

            if($listName == 'Apps'){
                if($link1 !== NULL){       $gaEvent .= "'$itemName - iOS');";         echo ' <a href="'.$link1.'" onclick="'.$gaEvent.'" title="Download '.$itemName.' for iOS" class="link2">iOS</a>';     }
                if($link2 !== NULL){       $gaEvent .= "'$itemName - Mac');";         echo ' <a href="'.$link2.'" onclick="'.$gaEvent.'" title="Download '.$itemName.' for Mac" class="link2">Mac</a>';     }
            }
            if($listName == 'Podcasts' && $link1 !== NULL){   $gaEvent .= "'$itemName - Overcast');";    echo ' <a href="'.$link1.'" onclick="'.$gaEvent.'" title="Listen to '.$itemName.' on Overcast" class="link2">Overcast</a>';  }
            if($listName == 'Musicians'){
                if($link1 !== NULL){  $gaEvent .= "'$itemName - Apple Music');"; echo ' <a href="'.$link1.'" onclick="'.$gaEvent.'" title="Listen to '.$itemName.' on Apple Music" class="link2">Music</a>';  }
                if($link2 !== NULL){  $gaEvent .= "'$itemName - Spotify');";     echo ' <a href="'.$link2.'" onclick="'.$gaEvent.'" title="Listen to '.$itemName.' on Spotify" class="link2">Spotify</a>';  }
            }
            echo '</li>';
        }
        
        echo '</ul>';
    }
?>

</div>