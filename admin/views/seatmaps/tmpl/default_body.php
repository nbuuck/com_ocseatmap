<?php
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach ($this->items as $i => $item): ?>
    <tr class="row<?php echo $i % 2; ?>">
        <td>
            <?php echo JHtml::_('grid.id', $i, $item->ID); ?>
        </td>
        <td>
            <?php echo $item->ID; ?>
        </td>
        <td>
            <?php echo $item->Name; ?>
        </td>
    </tr>
<?php endforeach;