<?php
/**
*
* @package phpBB Extension - martin customlastpost
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace martin\customlastpost\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['martin_customlastpost_version']) && version_compare($this->config['martin_customlastpost_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('martin_customlastpost_version', '1.0.0')),
			array('config.add', array('martin_customlastpost_type', 0)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_CUSTOMLASTPOST_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_CUSTOMLASTPOST_TITLE',
				array(
					'module_basename'	=> '\martin\customlastpost\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
