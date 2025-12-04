<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promotion> $promotions
 */
?>
    <h3><?= __('Promociones') ?></h3>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Código') ?></th>
                    <th><?= $this->Paginator->sort('Porcentaje de descuento') ?></th>
                    <th><?= $this->Paginator->sort('Activo') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promotions as $promotion): ?>
                <tr>
                    <td><?= h($promotion->code) ?></td>
                    <td><?= $this->Number->format($promotion->discount_percentage) ?></td>
                    <td><?= $promotion->status ? __('Sí') : __('No'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
