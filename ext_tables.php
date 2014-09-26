<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
$tempColumns = array(
	'tx_crtstdfunc_linktitle' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:'.$_EXTKEY.'/Resources/Private/Language/locallang_db.xlf:pages.tx_crtstdfunc_linktitle.label',
		'config' => array(
			'type' => 'input',
		),
	),
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY,
	'Configuration/TypoScript/Constants',
	'Constants'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY,
	'Configuration/TypoScript/Configs',
	'Configs'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'pages',
	$tempColumns,
	1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'pages_language_overlay',
	$tempColumns,
	1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'pages',
	'title',
	'tx_crtstdfunc_linktitle',
	'after:nav_title'
);

// Add page TSConfig
$pageTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Configuration/TSConfig/Page/pageTSConfig.ts'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);

/*
 * Include custom TCA
 * @todo adjust compatibility TYPO3 6.1
 */
 
$recordTypes = array('Pages','SysNews','BeUsers');
$configurationPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'/Configuration/TCA';
foreach ($recordTypes as $recordType) {
    $configurationFile = $configurationPath.'/'.$recordType.'.php';
    if (file_exists($configurationFile)) {
        include_once ($configurationFile);
    }
}

// Change Backend Login Layout
$TBE_STYLES['logo_login'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY).'/Resources/Public/Images/Backend/logo.png';
$TBE_STYLES['inDocStyles_TBEstyle'] .='
body#typo3-index-php {
	background: none!importent;
	background: #95A5A6;
}
body#typo3-index-php .t3-login-logo {
	margin: 15px 0;
}
body#typo3-index-php .t3-headline {
	background: #334455;
}
body#typo3-index-php input.t3-login-submit {
	border-top: 1px solid #D55300;
	border-left: 1px solid #D55300;
	background: #D55300!important;
}
body#typo3-index-php div#t3-copyright-notice {
	color: #334455;
}
body#typo3-index-php div#t3-copyright-notice a {text-decoration: none;}
body#typo3-index-php div#t3-copyright-notice a:link {}
body#typo3-index-php div#t3-copyright-notice a:visited {}
body#typo3-index-php div#t3-copyright-notice a:hover, a:focus {}
body#typo3-index-php div#t3-copyright-notice a:active {}
';
