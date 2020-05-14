<html>
<body>
<?php require '_partials/nav.view.php'; ?>
<h1>Tasks</h1>
<ul>
    <?php foreach($tasks as $task) : ?>
    <li><?= $task->isComplete() ? '<strike>' . $task->getDescription() . '</strike>' : $task->getDescription(); ?>
        <?php endforeach; ?>
</ul>
</body>
</html>