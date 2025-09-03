<body>
    <header>
        <?php if ($auth->check()): ?>
            <h3>User: <?php echo $auth->user()->email(); ?></h3>
            <form action="/logout" method="POST"><button type='submit'>Logout</button></form>
        <?php else: ?>
            <h3>You need to login first</h3>
        <?php endif; ?>
        <hr>
    </header>
</body>