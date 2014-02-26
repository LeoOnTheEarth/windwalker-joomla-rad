<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

use Windwalker\Bootstrap\Dropdown;

/**
 * Prepare data for this template.
 *
 * @var $data Windwalker\Data\Data
 * @var $grid Windwalker\View\Helper\GridHelper
 * @var $item Windwalker\Data\Data
 */
$grid = $data->grid;
$item = $grid->current;

// Duplicate
Dropdown::duplicate($grid->row, '{{controller.list.name.lower}}.batch');

Dropdown::divider();

// Published & Unpublished
if ($item->state)
{
	Dropdown::unpublish($grid->row, '{{controller.list.name.lower}}.state');
}
else
{
	Dropdown::publish($grid->row, '{{controller.list.name.lower}}.state');
}

// Trash & Delete
if (JDEBUG || $data->state->get('filter.{{controller.item.name.lower}}.state') == -2)
{
	Dropdown::addCustomItem(\JText::_('JTOOLBAR_TRASH'), 'trash', $grid->row, '{{controller.list.name.lower}}.state');
}
else
{
	Dropdown::trash($grid->row, '{{controller.list.name.lower}}.state');
}

// Render it
echo Dropdown::render();
