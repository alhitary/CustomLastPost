<?php
/**
*
* @package phpBB Extension - martin customlastpost
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace martin\customlastpost\acp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$this->tpl_name = 'customlastpost_body';
		$this->page_title = $user->lang('ACP_CUSTOMLASTPOST_TITLE');
		add_form_key('martin/customlastpost');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('martin/customlastpost'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('martin_customlastpost_type', $request->variable('martin_customlastpost_type', 0));

			trigger_error($user->lang('ACP_CUSTOMLASTPOST_SETTING_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'						=> $this->u_action,
		));
		$template->assign_block_vars('martin_customlastpost_options', array(
			'L_TITLE'	=> $user->lang('ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_LAST_POST_SUBJECT),
			'OPTION'	=> CUSTOMLASTPOST_LAST_POST_SUBJECT,
			'SELECTED'	=> $config['martin_customlastpost_type'] == CUSTOMLASTPOST_LAST_POST_SUBJECT,
		));
		$template->assign_block_vars('martin_customlastpost_options', array(
			'L_TITLE'	=> $user->lang('ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_TOPIC_TITLE),
			'OPTION'	=> CUSTOMLASTPOST_TOPIC_TITLE,
			'SELECTED'	=> $config['martin_customlastpost_type'] == CUSTOMLASTPOST_TOPIC_TITLE,
		));
		$template->assign_block_vars('martin_customlastpost_options', array(
			'L_TITLE'	=> $user->lang('ACP_CUSTOMLASTPOST_OPTION_' . CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY),
			'OPTION'	=> CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY,
			'SELECTED'	=> $config['martin_customlastpost_type'] == CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY,
		));
	}
}
