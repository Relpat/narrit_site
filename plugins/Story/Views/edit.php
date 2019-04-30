<h1>Editor</h1>

<?php

foreach ($story as $storyPartials) {
    ?><p>
    <?php
    echo $storyPartials['content'];
    ?>
    </p>
    <?php
}

?>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="<?php if (isset($story["title"])) echo $story["title"];?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="<?php if (isset($story["description"])) echo $story["description"];?>">
    </div>
    <button type="submit" class="btn btn-primary fixed-top">Speichern</button>
</form>