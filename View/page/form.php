<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
    <input type="hidden" name="id" value="<?=$data->id ?? ''?>">
    <p>
        <label for="h1">h1</label><br>
        <input type="text" name="h1" id="h1" value="<?=$data->h1 ?? ''?>">
    </p>
    <p>
        <label for="description">Description</label><br>
        <input type="text" name="description" id="description" value="<?=$data->description ?? ''?>">
    </p>
    <p>
        <label for="img">Image</label><br>
        <input type="text" name="img" id="img" value="<?=$data->img ?? ''?>">
    </p>
    <p>
        <label for="alt">Text alt</label><br>
        <input type="text" name="alt" id="alt" value="<?=$data->alt ?? ''?>">
    </p>
    <p>
        <label for="slug">slug</label><br>
        <input type="text" name="slug" id="slug" value="<?=$data->slug ?? ''?>">
    </p>
    <p>
        <label for="nav-title">nav-title</label><br>
        <input type="text" name="nav-title" id="nav-title" value="<?=$data->{'nav-title'} ?? ''?>">
    </p>
    <p>
        <input type="Submit" value="<?=isset($data->id)?'Modifier':'Ajouter';?>">
    </p>
    
</form>