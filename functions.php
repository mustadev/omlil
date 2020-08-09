<?php
/**
 * Adds a top bar to Storefront, before the header.
 */
function storefront_add_topbar() {
    ?>
    <div id="topbar">
        <div class="col-full">
            <div class="topbar-flex">
            <div class="site-branding"> 
                <?php storefront_site_title_or_logo(); ?>
            </div>
            <?php storefront_product_search(); ?>
            </div>
              
        </div>
    </div>
    <?php
}
add_action( 'storefront_before_header', 'storefront_add_topbar' );

