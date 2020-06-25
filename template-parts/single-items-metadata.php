<section class="tainacan-content single-item--metadata">

    <?php
        $args = array(
            'before_title' => '<div class="tainacan-metadata"><h3>',
            'after_title' => '</h3>',
            'before_value' => '<p>',
            'after_value' => '</p></div>',
        );
        tainacan_the_metadata( $args );
    ?>

</section>