<h1>Editor</h1>
<?
$this->_DEBUG->debug($story,"story");
?>
<form method='post' action='/story/save/' id="eddit-formular">
    <input type="hidden" name="story_id" value="<?php echo intval($story[0]['story_id']); ?>">
    <input type="hidden" name="pages_id" value="<?php echo intval($story[0]['pages_id']); ?>">
    <?php
    foreach ($story as $index => $storyPartials) {
        ?>
        <div class="form-group">
            <input type="hidden" name="partials[<? echo $storyPartials['id'] ?>][id]" value="<? echo $storyPartials['id'] ?>">
            <textarea class="form-control cchiff"
                      id="cchiff-textarea-<? echo $storyPartials['id'] ?>"
                      placeholder="Enter a title"
                      name="partials[<? echo $storyPartials['id'] ?>][content]"
                      cols="30"
            ><?php echo $storyPartials['content']; ?></textarea>
            <div data-target="cchiff-textarea-<? echo $storyPartials['id'] ?>"
                 class="cchiff-editable"
            ><?php echo $storyPartials['content']; ?></div>
        </div>
        <?php
    }
    ?>

    <div class="container-fluid text-center fixed-bottom pb-2">
        <button type="submit" id="send" class="btn btn-primary">Speichern</button>
    </div>
</form>

<script>
    $(document).ready(function () {

        $("textarea").each(function (index,data) {
            auto_grow(data);
        })
        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

        $("#eddit-formular").submit(function (event) {
            event.preventDefault();
            $.ajax({
                method: "POST",
                url: $("#eddit-formular").attr('action'),
                data: $("#eddit-formular").serializeArray()
            })
            .done(function( msg ) {

                console.log(msg);
//                if(msg){
//                    location.reload();
//                }
            });
        })
    })
</script>

<script src="/assets/js/caesarchiffre/Buggy.js"></script>
<script src="/assets/js/caesarchiffre/cchiffre.js"></script>
<script src="/assets/js/narrit.js"></script>