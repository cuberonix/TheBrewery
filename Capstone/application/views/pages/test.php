<html>

<?php 

$html=file_get_contents("https://9to5mac.com/2017/11/21/kgi-gigabit-lte-iphone/");

echo $html;
//$convert = preg_match('/^[\w]+$/', $html);
$page = explode(" ", $html); //create array separate by new line

for ($i=0;$i<count($page);$i++)  
{
    echo $page[$i].', '; //write value by index
}
?>

</html>