<?php
/**
*
* @package phpBB Extension - martin customlastpost
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Translated By : Basil Taha Alhitary - www.alhitary.net
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
	'ACP_CUSTOMLASTPOST_TITLE'												=> 'تخصيص آخر مُشاركة',
	'ACP_CUSTOMLASTPOST_SETTINGS'											=> 'الإعدادات',
	'ACP_CUSTOMLASTPOST_SETTING_SAVED'										=> 'تم حفظ الإعدادات بنجاح !',
	'ACP_CUSTOMLASTPOST_TYPE'												=> 'إظهار رابط آخر مُشاركة ',
	'ACP_CUSTOMLASTPOST_TYPE_EXPLAIN'										=> 'تحديد طريقة إظهار رابط آخر مُشاركة في الصفحة الرئيسية للمنتدى.',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_LAST_POST_SUBJECT			=> 'عنوان آخر مُشاركة',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_TOPIC_TITLE				=> 'عنوان الموضوع (الذي يحتوي على آخر مُشاركة)',
	'ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY	=> 'عنوان آخر مشاركة, وإذا كان فارغاً يُستبدل بعنوان الموضوع',
));
