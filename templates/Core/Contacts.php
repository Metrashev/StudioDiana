<?php
use ITTI\SpamProtection;
use ITTI\MailSender;

$_str = \ITTI\FW::$FE->getTranslator('Contacts');

$node = \ITTI\FW::$FE->ActiveNode;
$page = getPageByCid($node['id']);

if ($node['params']['to_email']=='') {
	throw new Exception('Recipient email missing');
}

$msg10x = $_str('Contact Thanks Text', true);

if (isset($_GET['10x'])) {
	echo <<<EOD
	<div>{$msg10x}</div>
EOD;
	return;
}

$echo = function($q){return $q;};

$TPL = <<<EOD
<div class="field"><label for="name" /><input type="text" name="name" itti:required="" title="{$_str('Име и Фамилия')}:" /></div>
<div class="field"><label for="phone" /><input type="text" name="phone" title="{$_str('Телефон')}:" /></div>
<div class="field"><label for="email" /><input type="text" name="email" itti:required="" title="E-mail:" itti:type="email" /></div>
<div class="field"><label for="message" />
<textarea name="message" cols="35" rows="8" itti:required="" title="{$_str('Съобщение')}:"></textarea></div>
<button class="button" type="submit" name="submitBtn" itti:noprint="">{$_str('Изпрати')}</button>
{#ERRORS#}
EOD;

\ITTI\Validate::$ErrorMessages['required'] = $_str('{#title#} е задължително поле');
\ITTI\Validate::$ErrorMessages['email'] = $_str('Полето {#title#} съдържа невалиден имейл!');

$fp = new \ITTI\FP\FormProcessor();
$fp->CSSRequiredClassName = 'red';
$fp->AutoMarkRequiredFields = true;

$fp->LoadTemplate($TPL);

$SpamProtect = new \ITTI\SpamProtection();

$errors = array();

if (isset($_POST['submitBtn'])) {

	$errors = $fp->validate();
	if ($SpamProtect->isSpam()) {
		//$errors[] = 'Spam check fail';
	}
	if (empty($errors)) {
		$fp->Translation['{#ERRORS#}'] = '';
		$data = $fp->getData();

		echo $message = <<<EOD
<dl>

	<dt>{$_str('Име и Фамилия')}:</dt>
	<dd>{$data['name']}</dd>

	<dt>{$_str('Телефон')}:</dt>
	<dd>{$data['phone']}</dd>

	<dt>E-mail:</dt>
	<dd>{$data['email']}</dd>

	<dt>{$_str('Съобщение')}:</dt>
	<dd>{$data['message']}</dd>

</dl>
EOD;

		MailSender::factory()
			->from($data['email'], $data['name'])
			->to($node['params']['to_email'])
			->subject('Question from website')
			->bodyHTML($message)
			->send();

		header("location: ".getURL($_REQUEST['cid'], '10x=1'));
		exit();

	}
}


$fp->Translation['{#ERRORS#}'] = $fp->Errors2HTML($errors);

?>
<article class="contacts">
	<h1><?=$node['content_title']?></h1>
	<div class="content"><?=$page['body']?></div>
	<form method="post">
		<?=$fp->getHTML()?>
		<?=$SpamProtect->getProtectionCode();?>
	</form>
	<?php
	if ($node['params']['gps_latitude']!='' and $node['params']['gps_longitude']!='') {
		$node['params']['gps_latitude'] = (float)$node['params']['gps_latitude'];
		$node['params']['gps_longitude'] = (float)$node['params']['gps_longitude'];
		\ITTI\FW::$HTMLPage->AddJSFile('https://maps.googleapis.com/maps/api/js?sensor=false');
		\ITTI\FW::$HTMLPage->AddJavaScriptDR(<<<EOD
if (!google) {
	return;
}

var gmap_options = {
	zoom : 14,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	panControl: false,
	streetViewControl: false,
	mapTypeControl: false
};

var gmap = new google.maps.Map($('#contacts_map')[0], gmap_options);

var lat = parseFloat("{$node['params']['gps_latitude']}");
var lon = parseFloat("{$node['params']['gps_longitude']}");
var position = new google.maps.LatLng(lat, lon);
gmap.setCenter(position);
var marker = new google.maps.Marker({
	position : position,
	map : gmap,
	draggable : false
});
EOD
			, 'contacts_map');
		?>
		<div id="contacts_map"></div>
		<?php
	}
	?>
</article>