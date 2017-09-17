<?php
if(isset($flag)==true)
{
	translate();
}
else
{
	die("badass modafucker");
}



function translate()
{
	//echo $_POST['plaintext'];
	$pText=trim($_POST['plaintext']);
	$pText_array=str_split($pText);
	for($i=0; $i<count($pText_array); $i++)
	{
		if($pText_array[$i]==="e")
		{
			$pText_array[$i]="a";
		}
		if($pText_array[$i]==="i")
		{
			$pText_array[$i]="e";
		}
		if($pText_array[$i]==="h")
		{
			$pText_array[$i]="";
		}
		if($pText_array[$i]==="j")
		{
			$pText_array[$i]="g";
		}
		if($pText_array[$i]==="o")
		{
			//$pText_array[$i]="a";
		}
		if($pText_array[$i]==="y")
		{
			$pText_array[$i]="i";
		}
		if($pText_array[$i]==="u")
		{
			$pText_array[$i]="o";
		}
		if($pText_array[$i]==="v")
		{
			$pText_array[$i]="b";
		}
		if($pText_array[$i]==="c" && $pText_array[$i+1]===$pText_array[$i])
		{
			$pText_array[$i]="s";
			$pText_array[$i+1]="s";
		}
		//echo $value;
	}
	$takla_text=implode("",$pText_array);
	echo 
	"
	<script>
		document.getElementById('taklatext').hidden=false;
		document.getElementById('msg').hidden=false;
		document.getElementById('taklatext').value='$takla_text';
		document.getElementById('plaintext').value='$pText';
	</script>
	";
insertIntoDB($takla_text,$pText);
}

function insertIntoDB($t_words,$p_words)
{
	$p_words=explode(" ",$p_words);
	$t_words=explode(" ",$t_words);
	include "db/config.php";
	$i=0;
	foreach ($p_words as $pword) 
	{

		$query="SELECT * FROM wordbank WHERE org_format='".strtolower($pword)."'";
		$result=mysqli_query($con,$query);
		$row_count=mysqli_num_rows($result);
		if($row_count<=0)
		{
			$query="INSERT INTO wordbank(org_format,takla_format) 
					VALUES('".strtolower($pword)."','".strtolower($t_words[$i])."')";
			$result=mysqli_query($con,$query);
			if($result)
			{
				//echo $pword."=".$t_words[$i]."<p><font color='lime'> INSERTED </font></p> <br>";
				$i++;
			}
			else
			{
				//echo "<p><font color='red'> FAILURE </font></p>";
				die();
			}
		}
		else
		{
			//echo "<p><font color='red'> Existed Data Found $pword </font></p>"; 
		}

		
		//echo $pword."=".$t_words[$i]."<br>";
		
	}
	//echo $p_words." = ".$t_words;

}

?>