<?php $view->component('start'); ?>
<h1>Gnome page</h1>
<form action="/register" method="post">
    <p>email</p>
    <input type="text" name="email">
    <?php if ($session->has('email')): ?>
        <ul>
            <?php foreach ($session->getFlash('email') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <p>password</p>
    <input type="password" name="password">
    <?php if ($session->has('password')): ?>
        <ul>
            <?php foreach ($session->getFlash('password') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <button>Register</button>

</form>
<?php $view->component('end'); ?>