<?php
/* @var $this \ITTI\HTMLPage */
$this->setLanguage ( LNG_CURRENT );
$this->AddCSSFile ( CSS_URL . 'main.css' );
$this->AddJSFile ( JS_URL . 'lib.js' );

$this->AddJavaScriptDR(<<<EOD
	$(window).on('resize', function(){
		var content = $('main > .wrap-main');
		content.css('height', '');
		var diff = $(document).height() - $('body').height();
		if (diff > 0) {
			content.css('height', content.height()+diff+'px');
		}
	}).triggerHandler('resize');
EOD
, 'BodyFullHeight');

$this->AddJavaScriptDR(<<<EOD
	$('.home-row').each(function(){
		var highest = 0;
		$(this).find('.home-cell-image, .home-cell-text').each(function(){
			if( $(this).height() > highest )
			highest = $(this).height();
		});
		$(this).find('.home-cell-image, .home-cell-text').height(highest);
	});
EOD
);

$this->addBodyClass('cid-'.\ITTI\FW::$FE->ActiveNode['id']);

$_str = \ITTI\FW::$FE->getTranslator('MainSkin');

?>
<!--[if lt IE 9]>
<script>
	document.createElement('header');
	document.createElement('nav');
	document.createElement('section');
	document.createElement('article');
	document.createElement('aside');
	document.createElement('footer');
	document.createElement('main');
</script>
<![endif]-->
<div class="wrap-body">

	<header>
		<div class="wrap-header"><?php include(__DIR__.'/../Nav/TopNav.php'); ?></div>
	</header>

	<main>
		<div class="wrap-main"><?=$this->BodyHTML?></div>
	</main>

	<footer>
		<div class="wrap-footer">
			<?php include(__DIR__.'/../Nav/Footer.php'); ?>
		</div>
	</footer>

</div>
