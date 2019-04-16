<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Report Controller for PVCFManager Component
 *
 * @package    Philadelphia.Votes
 * @subpackage Components
 * @license    GNU/GPL
 */
class PvcfmanagerControllerReport extends PvcfmanagerController
{
    /**
     * Bind tasks to methods
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // Register Extra tasks
        $this->registerTask('add', 'edit');
        $this->registerTask('save_only', 'save');
        $this->registerTask('save_and_previous', 'save');
        $this->registerTask('save_and_next', 'save');
        $this->registerTask('save_and_new', 'save');
        $this->registerTask('save_and_close', 'save');

    }

    /**
     * Display the edit form
     * @return void
     */
    public function edit()
    {
        JRequest::setVar('view', 'report');

        parent::display();
    }

    /**
     * Save a record (and redirect to main page)
     *
     * @return void
     */
    public function save()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('report');
        $post  = JRequest::get('post');

        if ($model->store($post)) {
            $msg = JText::_('Saved!');
        } else {
            // let's grab all those errors and make them available to the view
            JRequest::setVar('msg', $model->getErrors());

            return $this->edit();
        }

        // Let's go back to the default view
        $link = 'index.php?option=com_pvcfmanager';

        $this->setRedirect($link, $msg);
    }

    /**
     * Remove record(s)
     * @return void
     */
    public function remove()
    {
        JRequest::checkToken() or jexit('Invalid Token');

        $model = $this->getModel('report');
        if (!$model->delete()) {
            $msg = JText::_('Error: One or More Items Could not be Deleted');
        } else {
            $msg = JText::_('Items(s) Deleted');
        }

        $this->setRedirect('index.php?option=com_pvcfmanager', $msg);
    }

    /**
     * Cancel editing a record
     * @return void
     */
    public function cancel()
    {
        $msg = JText::_('Operation Cancelled');

        $this->setRedirect('index.php?option=com_pvcfmanager', $msg);
    }
}
