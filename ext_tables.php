<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
$tempColumns = array(
	'tx_crtstdfunc_linktitle' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:crt_std_func/Resources/Private/Language/locallang_db.xlf:pages.tx_crtstdfunc_linktitle.label',
		'config' => array(
			'type' => 'input',
			'eval' => 'required',
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	$_EXTKEY,
	'Configuration/TypoScript',
	'Cretection Standard Functions'
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

$TBE_STYLES['logo_login'] = '../typo3conf/ext/crt_std_func/Resources/Public/Images/t3skin/logo.png';
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
