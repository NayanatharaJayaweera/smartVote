

<?php

include("db.php");

/*avoid from warning*/
error_reporting(E_ERROR | E_PARSE);

function backup_tables($host,$user,$pass,$name,$tables = '*')
{

    $link = mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$name);
    mysqli_query($link,"SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link,'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    $return='';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link,'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);

        $return.= 'DROP TABLE '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";

        for ($i = 0; $i < $num_fields; $i++)
        {
            while($row = mysqli_fetch_row($result))
            {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++)
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
	}
	   

	

    //save file
    $handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
}


backup_tables($dbhost,$dbuser,$dbpassword,$dbname);
/*print("<script type='text/javascript'>window.alert('You have not provided a backup to restore.')</script>");*/
/*echo "<div style='height:100% , width:100%,  background:black;'>";*/
echo "<div style='width:100%; height:100%; background:rgb(41, 50, 66); margin:0px;'>";
echo "<a href ='index.php'><div style='height:30px ;width:30px ;  border-radius:50%; background:red; text-decoration:none; margin-left:98%;'>";
echo "<p style='color:white; margin-left:7px;margin-top:3px; '>X</p>";
echo "</div></a>";
echo "<center><i><b><p style='font-family:Oswald script=all rev=1, Adobe Blank; font-size:40px; margin-top:140px; color:white;'>Backup Successful...</p></b></i></center>";

echo "</div>";
?>


 <!--script>

	function backup(result)
    {
	var display =document.getElementById(result);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			display.innerHTML = xmlhttp.responseText;
			var str = xmlhttp.responseText;
			display.innerHTML = xmlhttp.responseText;
			
		}
	};
	xmlhttp.open("GET", "searchhospital.php", true);
	xmlhttp.send();
    
	}
 </script-->


