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
        <?=$data['error-block']?>
        <p><a href="./?a=admin/add"><input type="button" value="Add" class="btn btn-success btn-sm"></a> <?=$data['count-widget']?></p>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
    <?php if (is_array($data['pages']) && count($data['pages'])) :?>
        <?php foreach($data['pages'] as $page):?>
            <tr>
                <td><?=$page->id?></td>
                <td><?=$page->slug?></td>
                <td>
                    <a href="./?a=admin/details&id=<?=$page->id?>"><input type="button" value="Details" class="btn btn-primary btn-sm"></a>
                    <a href="./?a=admin/edit&id=<?=$page->id?>"><button type="button" value="Edit" class="btn btn-warning btn-sm">
                        Edit</button></a>
                    <?php if($page->default_page != 1):?>
                        <a href="./?a=admin/defaultize&id=<?=$page->id?>"><input type="button" value="Default" class="btn btn-success btn-sm"></a>
                    <a href="./?a=admin/delete&id=<?=$page->id?>"><input type="button" value="Delete" class="btn btn-danger btn-sm"></a>
                    <?php else:?>
                    <input type="button" value="Default" class="btn btn-secondary btn-sm">
                    <input type="button" value="Delete" class="btn btn-secondary btn-sm">
                    <?php endif;?>
                    <a href="./?a=admin/up&id=<?=$page->id?>"><button type="button" class="btn btn-info btn-sm">&#8679;</button></a>
                    <a href="./?a=admin/down&id=<?=$page->id?>"><button type="button" class="btn btn-info btn-sm">&#8681;</button></a>
                    <select name="" id="gmal" onselect="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
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