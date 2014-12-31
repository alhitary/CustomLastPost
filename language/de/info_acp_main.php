<?php
/**
*
* @package phpBB Extension - martin customlastpost
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_CUSTOMLASTPOST_TITLE'												=> 'Custom Last Post',
	'ACP_CUSTOMLASTPOST_SETTINGS'											=> 'Einstellungen',
	'ACP_CUSTOMLASTPOST_SETTING_SAVED'										=> 'Die Einstellungen wurden erfolgreich gespeichert!',
	'ACP_CUSTOMLASTPOST_TYPE'												=> 'Link zum Letzten Beitrag zeigt',
	'ACP_CUSTOMLASTPOST_TYPE_EXPLAIN'										=> 'Welchen Text soll der Link zum \'Letzten Beitrag\' auf der Indexseite anzeigen?',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_LAST_POST_SUBJECT			=> 'Betreff des letzten Beitrags',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_TOPIC_TITLE				=> 'Betreff des Themas, das den letzten Beitrag enthält',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY	=> 'Betreff des letzten Beitrags, wenn dieser nicht leer ist; ansonsten Betreff des Themas',
));
