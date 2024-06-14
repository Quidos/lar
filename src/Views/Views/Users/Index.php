<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Users:
    <?php foreach($users as $user): ?>
        <div>
            <?= $user['name'] ?>
        </div>
    <?php endforeach; ?>
</body>
</html>