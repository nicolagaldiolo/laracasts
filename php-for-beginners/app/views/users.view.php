<html>
<body>
<?php require '_partials/nav.view.php'; ?>
    <h1>Users</h1>
    <h2>Add a user</h2>
    <form method="post" action="users">
        <input name="name">
        <button type="submit">Submit</button>
    </form>
    <h3>List of users</h3>
    <ul>
        <?php foreach($users as $user) : ?>
            <li> <?= $user->name ?> </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>