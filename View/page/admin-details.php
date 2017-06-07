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
    <ul class="list-group">
        <li class="list-group-item">
            <span class="label label-info">Slug</span><br>
            <span><?=$data['data']->slug?></span>
        </li>
        <li class="list-group-item">
            <span class="label label-info">H1</span><br>
            <span><?=$data['data']->h1?></span>
        </li>
        <li class="list-group-item">
            <span class="label label-info">Description</span><br>
            <span><?=nl2br(htmlentities($data['data']->description))?></span>
        </li>
        <li class="list-group-item">
            <span class="label label-info">alt</span><br>
            <span><?=$data['data']->alt?></span>
        </li>
        <li class="list-group-item">
            <span class="label label-info">Image</span><br>
            <span><?=$data['data']->img?></span>
        </li>
        <li class="list-group-item">
            <span class="label label-info">Image</span><br>
            <span><?=$data['data']->{'nav-title'}?></span>
        </li>
    </ul>
</div>
</body>
</html>
