<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Onlinemaps View for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerViewOnlinemaps extends JView
{
    /**
     * Onlinemaps view display method
     * @return void
     **/
    public function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('PVCFManager Onlinemaps Manager'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        // bring in classes
        $model = $this->getModel('Classes');
        $classes = $model->getData();
        $this->assignRef('classes', $classes);

        $rows    = &$this->get('Data');
        $pagination = &$this->get('Pagination');

        $this->assignRef('rows', $rows);
        $this->assignRef('pagination', $pagination);

        parent::display($tpl);
    }
}
