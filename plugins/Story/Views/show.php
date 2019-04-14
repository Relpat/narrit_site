<h1>Show task</h1>
<?php
var_dump($story);

?>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value="<?php if (isset($story["title"])) {
            echo $story["title"];
        } ?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value="<?php if (isset($story["description"])) {
            echo $story["description"];
        } ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>