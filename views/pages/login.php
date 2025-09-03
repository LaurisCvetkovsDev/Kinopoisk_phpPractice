<?php $view->component('start'); ?>
<h1>Login</h1>
<form action="/login" method="post">
    <p>email</p>
    <input type="text" name="email">

    <p>password</p>
    <input type="password" name="password">

    <button>Login</button>
    <?php if ($session->has('error')): ?>
        <p style="color:red">
            <?php echo $session->getFlash('error') ?>
        </p>
    <?php endif; ?>

</form>
<?php $view->component('end'); ?>