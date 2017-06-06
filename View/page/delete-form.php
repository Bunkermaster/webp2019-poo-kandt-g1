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
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
        <div class="alert alert-danger" role="alert">
            <strong>Attention!</strong> Vous tentez de supprimer la page "<?=$data['slug']?>"
        </div>
        <input type="hidden" name="id" value="<?=$data['id']?>">
        <input type="submit" value="Supprimer" class="btn btn-danger">
        <button type="button" class="btn btn-success" onclick="history.back()">Ooops nonnnn!</button>
    </form>
</div>
</body>
</html>
