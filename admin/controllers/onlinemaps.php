<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Onlinemaps Controller for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerOnlinemaps extends PvcfmanagerController
{
    /**
     * Display the Onlinemaps View
     * @return void
     */
    public function display()
    {
        JRequest::setVar('view', 'onlinemaps');

        parent::display();
    }

    /**
     * Redirect Edit task to Onlinemap Controller
     * @return void
     */
    public function edit()
    {
        $mainframe = JFactory::getApplication();
        $cid       = JRequest::getVar('cid');
        $mainframe->redirect('index.php?option=com_pvcfmanager&controller=item&task=edit&cid=' . $cid[0]);
    }

    public function publish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Onlinemaps');
        $model->publish();
        $this->display();
    }

    public function unpublish()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('Onlinemaps');
        $model->unpublish();
        $this->display();
    }
}