<?php
/**
*
* @package phpBB Extension - martin customlastpost
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace martin\customlastpost\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\martin\customlastpost\acp\main_module',
			'title'		=> 'ACP_CUSTOMLASTPOST_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_CUSTOMLASTPOST_SETTINGS',
					'auth'	=> 'ext_martin/customlastpost && acl_a_board',
					'cat'	=> array('ACP_CUSTOMLASTPOST_TITLE'),
				),
			),
		);
	}
}
