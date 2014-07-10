<?
use ITTI\FW;

FW::$User->logout();
FW::$HTMLPage->SkinFile=null;

if($_POST['do_login'])
{
	$logged = FW::$User->login($_POST['user'], $_POST['password']);

	if($logged)
	{
		$_COOKIE['user']=$_POST['user'];
		header("Location: ./");
		exit;
	} else {
		$Error = 'Invalid user or password';
	}
}

FW::$HTMLPage->AddJavaScriptDR("document.getElementById('LoginInput').focus();");

?>





<form method=post name="loginForm">

<div style="position:absolute; top:50%; left:50%;">
<div style="position:relative; margin-top:-25%; left:-50%;">

<div class="ittiBox ittiEditContainer" style="min-width: 400px;">
<div class="ittiBox ittiBoxHeader">Login</div>

<div class="ittiBox ittiBoxBody">


<div class="Errors"><?=$Error?></div>
<table class="BEEditTable">
<tr>
<td><b>User:</b><span class="ui-icon ui-icon-person"></span></td>
<td><input type="text" name="user" size="15" id="LoginInput" value="<?=$_COOKIE['user']?>">
</td>
</tr>

<tr>
<td><b>Password:</b><span class="ui-icon ui-icon-key"></span></td>
<td><input type="password" name="password" size="15" id=PasswordInput>
</td>
</tr>

<tr>
	<td></td>
	<td align="left"><button type="submit" name="do_login" value="1"><span class="ui-icon ui-icon-key"></span>Login</button></td>
</tr>
</table>
</div>
</div>


</div>
</div>


</form>






