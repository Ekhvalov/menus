<?php namespace Pingpong\Menus\Presenters\Bootstrap;

use Pingpong\Menus\Presenters\Presenter;

class NavbarPresenter extends Presenter
{
	public function getOpenTagWrapper()
	{
		return  PHP_EOL . '<ul class="nav navbar-nav">' . PHP_EOL;
	}

	public function getCloseTagWrapper()
	{
		return  PHP_EOL . '</ul>' . PHP_EOL;
	}

	public function getMenuWithoutDropdownWrapper($item)
	{
		return '<li'.$this->getActiveState($item).'><a href="'. $item->getUrl() .'">'.$item->getIcon().' '.$item->title.'</a></li>';
	}

	public function getActiveState($item)
	{
		return \Request::is($item->getRequest()) ? ' class="active"' : null;
	}

	public function getDividerWrapper()
	{
		return '<li class="divider"></li>';
	}

	public function getMenuWithDropDownWrapper($item)
	{
		return '<li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					'.$item->getIcon().' '.$item->title.'
			      	<b class="caret"></b>
			      </a>
			      <ul class="dropdown-menu">
			      	'.$this->getChildMenuItems($item).'
			      </ul>
		      	</li>'
		      	. PHP_EOL;
		;
	}
}
