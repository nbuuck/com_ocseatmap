<?php
defined('_JEXEC') or die('Restricted Access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_ocseatmap'); ?>" method="post" name="adminForm">
    <table class="table table-striped">
        <thead><?php echo $this->loadTemplate('head'); ?></thead>
        <tfoot><?php echo $this->loadTemplate('foot'); ?></tfoot>
        <tbody><?php echo $this->loadTemplate('body'); ?></tbody>
    </table>
</form>