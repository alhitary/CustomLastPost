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
	'ACP_CUSTOMLASTPOST_SETTINGS'											=> 'Settings',
	'ACP_CUSTOMLASTPOST_SETTING_SAVED'										=> 'Settings have been saved successfully!',
	'ACP_CUSTOMLASTPOST_TYPE'												=> 'Last Post link displays',
	'ACP_CUSTOMLASTPOST_TYPE_EXPLAIN'										=> 'Customize which text the \'Last Post\' link on the board index displays.',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_LAST_POST_SUBJECT			=> 'subject of the last post',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_TOPIC_TITLE				=> 'title of the topic that contains the last post',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY	=> 'subject of the last post if it is not empty, topic title otherwise',
));
