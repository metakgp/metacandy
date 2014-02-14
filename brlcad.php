<?php
/**
 * BrlCad Skin skin
 * 
 *@file
 *@ingroup Skins
 *@author Inderpreet Singh (http://ishwerdas.com)
 *@license http://www.gnu.org/copyleft/gpl.html GNU General Public License 3.0 or Later
 */

if( !defined ( 'MEDIAWIKI' ) ) die( "This is an extension to the Mediawiki package and cannot run standalone." );

$wgExtensionCredits['skin'][] = array (
	'path' => _FILE_,
	'name' => 'BrlCad Skin',
	'url' => "[http://ishwerdas.com/brlcad-skin]",
	'author' => '[http://ishwerdas.com]',
	'descriptionmsg' => 'This is a custom mediawiki skin made for the BRL-CAD\'s wiki website',
);


$wgValidSkinNames['brlcad'] = 'BrlCad';
$wgAutoloadClasses['SkinBrlCad'] = dirname(__File__).'/BrlCad.skin.php';
$wgExtensionMessagesFiles[' BrlCad'] = dirname(__FILE__).'/BrlCad.i18n.php';

$wgResourceModules['skins.brlcad'] = array(
	'styles' => array(
		'brlcad/stylesheets/global.css' => array( 'media' => 'screen' ),
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);
