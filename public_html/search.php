<?
    if($_GET['search'] == ''){  header ("Location: $_GET[rest]"); }
    else{                       header ("Location: $_GET[rest]&search=$_GET[search]"); }
?>