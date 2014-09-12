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

\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('pages');

// New icons for the BE
if (TYPO3_MODE == 'BE') {
    $icons = array('anchor', 'attach', 'bookAddresses', 'brick', 'bricks', 'calendar', 'chartBar', 'chartOrganisation', 'cog', 'comment', 'email', 'feed',	'layers', 'map', 'newspaper', 'note', 'plugin',	'report', 'scriptCode', 'scriptGear', 'server');
    foreach ($icons as $icon) {
        \TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
            'pages',
            'contains-' . $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Backend/Icons/' . $icon . '.png');
        $TCA['pages']['columns']['module']['config']['items'][] = array(
            ucfirst($icon),
            $icon,
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Backend/Icons/' . $icon . '.png'
        );
    }
}

// Change Backend Login Layout
$TBE_STYLES['logo_login'] = '../typo3conf/ext/crt_std_func/Resources/Public/Backend/Images/logo.png';
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
