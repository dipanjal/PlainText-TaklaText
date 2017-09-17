<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon" sizes="16x16">
	<title>TEST TITLE</title>
</head>
<body >
<style type="text/css">
	textarea
    {
		color: #0090ff;
		font-size: 15px;
        resize: none;
	}
</style>
<center>
<img src="pic_bulboff.gif" id="bulb" width="50" onclick="clipboard()">

<h3 id="h3"><b>Takla Converter</b></h3>
<form method="post">
	<textarea autofocus rows="10" cols="50" placeholder="Paste Your Text" name="plaintext" id="plaintext"></textarea><br>
	<input type="submit" id="btn" value="Convert" ><br>
	<textarea name="taklatext"  id="taklatext" rows="4" cols="50" onclick="clipboard()" hidden readonly></textarea><br>
    <h3 id="msg" hidden>tap the takta box to copy</h3>
    <!--<input type="button" name="btnCopy" id="btnCopy" value="Copy" onclick="clipboard()">-->
</form>
</center>



<script>
    var flag=false;
    startEffect();
    function startEffect()
    {
        if(document.all||document.getElementById)
        {
            flash=setInterval("op()",900);	
        }
    }
        function op()
        {
            if(!flag)
            {
                document.getElementById('bulb').src="img/pic_bulbon.gif";
                //document.getElementById('btn').src="on.png"
                flag=true;
            }
            else
            {
                document.getElementById('bulb').src="img/pic_bulboff.gif";
                //document.getElementById('btn').src="off.png"
                flag=false;
            }
        }
</script>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	echo "<pre>";
	//var_dump($_POST);
	if(isset($_POST['plaintext']))
	{
		if(!empty($_POST['plaintext']))
		{
			$flag=true;
			include "translate.php";
			//translate();
			//echo $_POST['plaintext'];
		}
	}
}

?>
<script>
function clipboard()
{
    document.getElementById('taklatext').select();
    document.execCommand('copy');
}
</script>
</b>
</body>
</html>