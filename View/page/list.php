<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
    <div role="main" class="container">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
    <?php if (is_array($data) && count($data)) :?>
        <?php foreach($data as $page):?>
            <tr>
                <td><?=$page->id?></td>
                <td><?=$page->slug?></td>
                <td>+</td>
            </tr>
        <?php endforeach;?>
    <?php else :?>
            <tr>
                <td colspan="3">Pas de données</td>
            </tr>
    <?php endif;?>
        </table>
    </div>
</body>
</html>