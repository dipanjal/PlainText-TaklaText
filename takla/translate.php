<?php
if(isset($flag)==true)
{
	translate();
}
else
{
	die("fool modafucker !! ");
}



function translate()
{
	//echo $_POST['plaintext'];
	$pText=$_POST['plaintext'];
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
			$pText_array[$i]="a";
		}
		if($pText_array[$i]==="y")
		{
			$pText_array[$i]="i";
		}
		if($pText_array[$i]==="u")
		{
			$pText_array[$i]="o";
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

}

?>