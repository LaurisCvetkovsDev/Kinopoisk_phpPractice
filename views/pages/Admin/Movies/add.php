<?php $view->component('start'); ?>

<h1>Add movie page</h1>

<form action="/admin/movies/add" method="post">
    <div>
        <p>Name</p>
    </div>

    <div><input type="text" name="name"></div>

    <?php if ($session->has('name')): ?>
        <ul>
            <?php foreach ($session->getFlash('name') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div><button type="submit">Submit</button></div>
</form>

<?php $view->component('end'); ?>