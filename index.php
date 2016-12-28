<?
    require_once ("config.php");
    require_once ("God.php");
    require_once ("SafeMySQL.php");


    $god = new God($_GET["url"]);
?>