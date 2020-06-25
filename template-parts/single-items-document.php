<?php if ( tainacan_has_document() ) : ?>
                                    
    <section class="tainacan-content single-item--document">
        <?php 
            tainacan_the_document();
        ?>
    </section>

<?php endif; ?>