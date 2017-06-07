<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="./">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php foreach($data['nav'] as $unePage):?>
                <li<?=isActive($data['page']->slug, $unePage->slug)?>>
                    <a href="./?a=details&s=<?=$unePage->slug?>"><?=$unePage->{"nav-title"}?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1><?=$data['page']->h1?></h1>
        <p><?=$data['page']->description?></p>
    </div>
    <img class="img-thumbnail" alt="<?=$data['page']->alt?>" src="<?=$data['page']->img?>" data-holder-rendered="true">
</div>
</body>
</html>
