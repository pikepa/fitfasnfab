<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
    echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";
?>
</body>
</html>