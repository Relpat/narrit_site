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