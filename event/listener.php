<?php
namespace micogian\header\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $template;
	protected $user;

	public function __construct(\phpbb\template\template $template,\phpbb\user $user)
	{
		$this->template = $template; 
		$this->user = $user;
	}

	static public function getSubscribedEvents()	
	{		
		return array('core.user_setup' => 'setup1',);	
	}
	
	public function setup1($event)	
	{
	if ($this->user->data['group_id'] == 5 || $this->user->data['user_id'] == 2 )
        {
		$this->template->assign_vars(array(
			'STAFF'	=> "staff" )
			);
		}
	}
}
