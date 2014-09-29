<?php
$extKey = 'crt_std_func';
\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('pages');
/*if (TYPO3_MODE == 'BE') {*/
	// Iconname darf nicht länger als 10 Zeichen sein!
	$icons = array('address', 'anchor', 'attach', 'brick', 'bricks', 'calendar', 'chartbar', 'cog', 'comment', 'email', 'feed', 'layers', 'map', 'newspaper', 'note', 'orga', 'plugin', 'report', 'scriptcode', 'scriptgear', 'server');
	foreach ($icons as $icon) {
		\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
			'pages',
			'contains-'.$icon,
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey).'Resources/Public/Icons/Backend/'.$icon.'.png'
		);
		$TCA['pages']['columns']['module']['config']['items'][] = array(
			'LLL:EXT:'.$extKey.'/Resources/Private/Language/locallang_db.xlf:tca.pages.module.items.'.$icon,
			$icon,
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey).'Resources/Public/Icons/Backend/'.$icon.'.png'
		);
	}
/*}*/
	
?>