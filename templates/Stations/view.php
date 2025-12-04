<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>

        <div class="stations view content">
            <h3> Vehículos disponibles en <?= h($station->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($station->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacity') ?></th>
                    <td><?= $station->capacity === null ? '' : $this->Number->format($station->capacity) ?></td>
                </tr>
            
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($station->address)); ?>
                </blockquote>
            </div>
        </div>
