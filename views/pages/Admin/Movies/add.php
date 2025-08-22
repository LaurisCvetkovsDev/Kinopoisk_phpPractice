<?php $view->component('start'); ?>
<h1>Add movie page</h1>
<form action="/admin/movies/add" method="post">
    <div>
        <p>Name</p>
    </div>
    <div><input type="text" name="name"></div>
    <div><button>Submit</button></div>



</form>
<?php $view->component('end'); ?>