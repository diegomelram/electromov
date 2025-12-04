<link rel="stylesheet" href="/css/index2.css">

<div class="cards-header">
    <h3>Users</h3>
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn-add']) ?>
</div>

<div class="cards-grid">
    <?php foreach ($users as $user): ?>
    <div class="card vehicle-card">

        <!-- TÍTULO DE LA TARJETA -->
        <div class="card-title">
            <?= h($user->name) ?>
        </div>

        <!-- CUERPO CON DOS COLUMNAS -->
        <div class="card-body two-columns">

            <div class="col">
                <p><strong>ID:</strong> <?= $user->id ?></p>
                <p><strong>Email:</strong> <?= h($user->email) ?></p>
                <p><strong>Role:</strong> <?= h($user->role) ?></p>
                <p><strong>Status:</strong> <?= $user->status ?? '—' ?></p>
            </div>

            <div class="col">
                <p><strong>Created:</strong> <?= h($user->created) ?></p>
                <p><strong>Modified:</strong> <?= h($user->modified) ?></p>
            </div>

        </div>

        <!-- ACCIONES -->
        <div class="card-actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn-view']) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn-edit']) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], [
                'method' => 'delete',
                'class' => 'btn-delete',
                'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
            ]) ?>
        </div>

    </div>
    <?php endforeach; ?>
</div>
