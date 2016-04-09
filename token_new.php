<!DOCTYPE html> 
<html> 
    <head> 
    <meta charset="utf-8"> 
    <title>token</title> 
    <link rel="stylesheet" type="text/css" href="css/base.css"> 
    </head> 
<body> 
    <div id="wrap"> 
        <h2 id="tok">Разбивание текста на подстроки</h2> 
    <form method="get"> 
        <label>Bведите текст<br> 
        <textarea class="area" name = 'string' required></textarea></label> 
        <br> 
        <input class="go" type="submit" value="Go!"> 
    </form><br><br> 
        
    <?php 

    if ( isset($_GET['string'])) { 
        $string = (string)$_GET['string']; 
        $string = preg_replace("|[^\d\w*\"\'\-]+|u", " ", $string); 
        $string = preg_replace("/-{2,}|-+\s|\s+-|_|\s+'|'+\s/", " ", $string); 
        
    if (preg_match("/\".+\"/", $string)) { 
        $pattern = "/\".+\"/"; 
        $pr = preg_match($pattern, $string, $match); 
        $quote = preg_replace("/\"/", "", $match[0]); 
        $string1 = preg_replace("/ /", ", ",$string); 
        $string2 = preg_replace($pattern, $quote, $string1); 
        echo $string2; 
    } 
    else { 
        $tok = strtok($string," \t"); 
    while ($tok !== false) { 
    echo "$tok, "; 
        $tok = strtok(" \t"); 
    } 
    } 
    } 
        ?> 
</body> 
</html>