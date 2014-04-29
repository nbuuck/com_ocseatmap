<?php

defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_(
        'index.php?option=com_ocseatmap&layout=edit&id=' .
        (int) $this->item->id); ?>"
    method="post" name="adminForm" id="adminForm">
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_(
                    'COM_OCSEATMAP_ADMIN_VIEW_SEATMAP_EDIT_TITLE'); ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php foreach ($this->form->getFieldset() as $field): ?>
                        <div class="control-group">
                            <div class="control-label"><?php echo $field->label; ?></div>
                            <div class="controls"><?php echo $field->input; ?></div>
                        </div>
                    <?php endforeach; ?>
                <div>
            <div>
        </fieldset>
    <div>
    <input type="hidden" name="task" value="seatmap.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>