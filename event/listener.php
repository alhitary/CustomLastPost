<?php
/**
*
* @package phpBB Extension - martin customlastpost
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace martin\customlastpost\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'							=> 'define_constants',
			'core.display_forums_modify_sql'			=> 'query_topic_title',
			'core.display_forums_modify_forum_rows'		=> 'modify_forum_rows',
			'core.display_forums_modify_template_vars'	=> 'set_custom_last_post',
		);
	}

	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\user */
	protected $user; 

	/* @var \phpbb\auth */
	protected $auth; 

	/**
	* Constructor
	*
	* @param \phpbb\config\config		$config
	* @param \phpbb\user				$user 
	* @param \phpbb\auth\auth			$auth 
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\user $user, \phpbb\auth\auth $auth)
	{
		$this->config = $config;
		$this->user = $user;
		$this->auth = $auth;
	}

	/**
	* Define some constants that are needed for this extension. This function is called
	* early on every page by using the event 'core.user_setup'.
	*
	* @param	object		$event	The event object
	* @return	null
	* @access	public
	*/
	public function define_constants($event)
	{
		define('CUSTOMLASTPOST_LAST_POST_SUBJECT', 0);
		define('CUSTOMLASTPOST_TOPIC_TITLE', 1);
		define('CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY', 2);
	}

	/**
	* Function to join the topics table to the forum query and fetches the topic title
	* of the topic that contains the last post in this forum.
	*
	* @param	object		$event	The event object
	* @return	null
	* @access	public
	*/
	public function query_topic_title($event)
	{
		$sql_ary = $event['sql_ary'];

		$sql_ary['LEFT_JOIN'][] = array(
			'FROM'	=> array(TOPICS_TABLE => 't'),
			'ON'	=> "f.forum_last_post_id = t.topic_last_post_id AND t.topic_moved_id = 0"
		);
		$sql_ary['SELECT'] .= ', t.topic_title';

		$event['sql_ary'] = $sql_ary;
	}

	/**
	* Function to check if the last post information of this forum has been
	* copied to the parent forum, and copies the topic title if necessary.
	*
	* @param	object		$event	The event object
	* @return	null
	* @access	public
	*/
	public function modify_forum_rows($event)
	{
		$forum_rows = $event['forum_rows'];
		$parent_id = $event['parent_id'];
		$row = $event['row'];

		if ($forum_rows[$parent_id]['forum_id_last_post'] == $row['forum_id'])
		{
			$forum_rows[$parent_id]['topic_title'] = $row['topic_title'];
		}

		$event['forum_rows'] = $forum_rows;
	}

	/**
	* Function to replace the link text of the Last Post link.
	*
	* @param	object		$event	The event object
	* @return	null
	* @access	public
	*/
	public function set_custom_last_post($event)
	{
		$forum_row = $event['forum_row'];
		$row = $event['row'];

		switch ($this->config['martin_customlastpost_type'])
		{
			// always display topic title
			case CUSTOMLASTPOST_TOPIC_TITLE:
				$last_post_subject = $row['topic_title'];
			break;

			// display topic title if last post subject is empty
			case CUSTOMLASTPOST_POST_SUBJECT_IF_NOT_EMPTY:
				$last_post_subject = (!$row['forum_last_post_subject'] || $row['forum_last_post_subject'] == '') ? $row['topic_title'] : $row['forum_last_post_subject'];
			break;

			// always display last post subject
			case CUSTOMLASTPOST_LAST_POST_SUBJECT:
			default:
				$last_post_subject = $row['forum_last_post_subject'];
			break;
		}

		$last_post_subject_truncated = truncate_string(censor_text($last_post_subject), 30, 255, false, $this->user->lang['ELLIPSIS']);

		$forum_row['S_DISPLAY_SUBJECT'] = ($last_post_subject && $this->config['display_last_subject'] && !$row['forum_password'] && $this->auth->acl_get('f_read', $row['forum_id'])) ? true : false;
		$forum_row['LAST_POST_SUBJECT'] = (!$row['forum_password'] && $this->auth->acl_get('f_read', $row['forum_id'])) ? censor_text($last_post_subject) : "";
		$forum_row['LAST_POST_SUBJECT_TRUNCATED'] = (!$row['forum_password'] && $this->auth->acl_get('f_read', $row['forum_id'])) ? $last_post_subject_truncated : "";

		$event['forum_row'] = $forum_row;
	}
}
