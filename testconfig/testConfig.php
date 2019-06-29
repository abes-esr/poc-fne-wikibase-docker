<?php
use MediaWiki\MediaWikiServices;
$config = MediaWikiServices::getInstance()->getMainConfig();

$user = $config->get( 'SomeConfigKey' );
?>