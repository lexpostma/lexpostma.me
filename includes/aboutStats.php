        <h1>Some random stats</h1>
        <div class="stats">

<?
    $stats = mysqli_query($con,"SELECT * FROM about_stats WHERE published = 1 ORDER BY id ASC;");
    while($row = mysqli_fetch_array($stats)){
        $name  = $row['name'];
        $icon  = $row['icon'];
        $value = $row['value'];
        $label = $row['label'];

        if($name == 'age'){
            $datediff = time() - strtotime("1991-09-28");
            $value = number_format(floor($datediff/(60*60*24)), 0, ',', '.');
            
        } else if ($name == 'words') {
            $value = wordCount();
            
        }

        echo( "<p>$icon<span class='counter'>$value</span>$label</p>" );

    }
?>            

        </div>
        
        <script src="/scripts/waypoints.min.js"></script>
        <script src="/scripts/jquery.counterup.js"></script>