<?php
    if (function_exists('tainacan_get_the_attachments')) {
        $attachments = tainacan_get_the_attachments();
    } else {
        // compatibility with pre 0.11 tainacan plugin
        $attachments = array_values(
            get_children(
                array(
                    'post_parent' => $post->ID,
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'order' => 'ASC',
                    'numberposts'  => -1,
                )
            )
        );
    }
?>

<?php if ( !empty( $attachments ) ) : ?>

    <section class="tainacan-content single-item--attachments">
        <?php foreach ( $attachments as $attachment ) { ?>
            <?php
            if ( function_exists('tainacan_get_attachment_html_url') ) {
                $href = tainacan_get_attachment_html_url($attachment->ID);
            } else {
                $href = wp_get_attachment_url($attachment->ID, 'large');
            }
            ?>
            <div class="single-item--attachments-file">
                <a 
                    class="<?php if (!wp_get_attachment_image( $attachment->ID, 'tainacan-item-attachments')) echo'attachment-without-image'; ?>"
                    href="<?php echo $href; ?>"
                    data-toggle="lightbox"
                    data-gallery="example-gallery">
                    <?php
                        echo wp_get_attachment_image( $attachment->ID, 'tainacan-item-attachments', true );
                        echo '<br>';
                    ?>
                    <span class="single-item-file-name"><?php echo get_the_title( $attachment->ID ); ?></span>
                </a>
            </div>
        <?php }
        ?>
    </section>

<?php endif; ?>