<?
    echo mysqli_fetch_array(mysqli_query($con, "SELECT body FROM about WHERE name = 'title';"))[0];
    echo mysqli_fetch_array(mysqli_query($con, "SELECT body FROM about WHERE name = 'intro';"))[0];
?>

<div id="aboutColumns">
    <article class="contentBlock"><?          echo mysqli_fetch_array(mysqli_query($con, "SELECT body FROM about WHERE name = 'me';"))[0]; ?></article>
<!-- //     <div class="contentBlock columnBreak"><?  include '../includes/aboutContact.php'; ?></div> -->
    <article class="contentBlock"><?          include '../includes/aboutDetails.php'; ?></article>
    <article class="contentBlock"><?          echo mysqli_fetch_array(mysqli_query($con, "SELECT body FROM about WHERE name = 'internetthing';"))[0]; ?></article>

    <script>
    	function show(id) { document.getElementById(id).style.display = "block"; }
    	function hide(id) { document.getElementById(id).style.display = "none"; }
    </script>
</div>