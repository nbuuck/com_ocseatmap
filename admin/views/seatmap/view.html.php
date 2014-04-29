<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class OCSeatMapViewSeatMap extends JViewLegacy {

    function display($tpl = null) {
        // get the Data
        $form = $this->get('Form');
        $item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Assign the Data
        $this->form = $form;
        $this->item = $item;
        $this->addToolBar();
        $this->setDocument();

        // Display the template
        parent::display($tpl);
    }

    protected function addToolBar() {
        // @TODO Replace these calls with appropriate buttons for edit form.
        JToolBarHelper::title(JText::_('COM_OCSEATMAP_MANAGER_SEATMAPS'),
                'wrench');
        JToolBarHelper::addNew('seatmap.add');
        JToolBarHelper::editList('seatmap.edit');
        JToolBarHelper::deleteList('', 'seatmap.delete');
    }

    protected function setDocument() {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_OCSEATMAP_ADMINISTRATION'));
    }

}
