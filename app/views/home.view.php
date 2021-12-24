<div style="width:100%;background:#c5c5c5;text-align:center;">
    <h2>Página home</h2>
</div>
<div style="width:100%; margin:20px;">
    <button class="btn btn-primary">Novo</button>
</div>
<ul>
    <?php foreach ($users as $user): ?>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $user->name ?>
                <span class="badge bg-primary rounded-pill"><a href="/user/<?= $user->id ?>" style="color:white;">Datalhes</a></span>
            </li>
        </ul>
    
    <?php endforeach; ?>
</ul>