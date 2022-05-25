<?php

include("settings.php");
include("functions_external.php");
include("connect.php");

function sqli($data)
{

    switch($_COOKIE["security_level"])
    {

        


        default :

            $data = sqli_check_1($data);
            break;

    }

    return $data;

}

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="js/html5.js"></script>

<title>The Movie</title>

</head>

<body>


<div id="main">

    <h1>The Movie </h1>

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]); ?>" method="POST">

        <p>

        <label for="title">Search for a movie:</label>
        <input type="text" id="title" name="title" size="25">

        <button type="submit" name="action" value="search">Search</button>

        </p>

    </form>

    <table id="table_yellow">

        <tr height="30" bgcolor="#ffb717" align="center">

            <td width="200"><b>Title</b></td>
            <td width="80"><b>Release</b></td>
            <td width="140"><b>Character</b></td>
            <td width="80"><b>Genre</b></td>
            <td width="80"><b>IMDb</b></td>

        </tr>
<?php

if(isset($_POST["title"]))
{

    $title = $_POST["title"];

    $sql = "SELECT * FROM movies WHERE title LIKE '%" . sqli($title) . "%'";

    $recordset = mysql_query($sql, $link);

    if(!$recordset)
    {


?>

        <tr height="50">

            <td colspan="5" width="580"><?php die("Error: " . mysql_error()); ?></td>
            <!--
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            -->

        </tr>
<?php        

    }

    if(mysql_num_rows($recordset) != 0)
    {

        while($row = mysql_fetch_array($recordset))
        {


?>

        <tr height="30">

             <td><?php echo $row["title"]; ?></td>
            <td align="center"><?php echo $row["release_year"]; ?></td>
            <td><?php echo $row["main_character"]; ?></td>
            <td align="center"><?php echo $row["genre"]; ?></td>
            <td align="center"><a href="http://www.imdb.com/title/<?php echo $row["imdb"]; ?>" target="_blank">Link</a></td>

        </tr>
		
<?php

        }

    }

    else
    {

?>

        <tr height="30">

            <td colspan="5" width="580">No movies were found!</td>
            <!--
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            -->

        </tr>
<?php

    }

    mysql_close($link);

}

else
{

?>

        <tr height="30">

            <td colspan="5" width="580"></td>
            <!--
            <td></td>
            <td></td>
            <td></td>
            <td></td> 
            -->

        </tr>
<?php

}

?>

    </table>

</div>

</body>

</html>