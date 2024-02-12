<?php
// USE cannot be used, because of duplicated namings in cached files
//use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
//use TYPO3\CMS\Core\Core\Environment;

defined('TYPO3') or die();

(function () {
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );

    $iconRegistry->registerIcon(
        'hd_translator_icon',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:hd_translator/Resources/Public/Icons/typo3_icon_lang-switch.svg']
    );
    $iconRegistry->registerIcon(
        'hd_translator_icon_doc_header',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:hd_translator/Resources/Public/Icons/typo3_icon_lang-switch_docheader.svg']
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Backend\Template\Components\ButtonBar']['getButtonsHook'][] =
        \Hyperdigital\HdTranslator\Hooks\DocHeaderButtonsHook::class . '->addExportButton';

    $GLOBALS['TYPO3_CONF_VARS']['BE']['customPermOptions']['tx_hdtranslator'] = [
        'header' => 'HD Translator permissions',
        'items' => [
            'disableNew' => [
                'Disable creating a new translation',
            ],
            'readOnly' => [
                'Read only mode',
            ],
            'disableDbImport' => [
                'Disable import to the database',
            ],
        ],
    ];
})();
