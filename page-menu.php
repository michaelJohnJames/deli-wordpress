<?php
  get_header();
 ?>

 <!-- Menu header -->

  <div class="row">
    <div class="col-sm-12">
      <h1 class="main-heading text-center">Our Menu</h1>
    </div>
  </div>

  <!-- Menu accordion-->

  <div class="container">
    <div id="accordion">
      <div class="card">
        
      <?php
        $categories = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'Menu Categories',
          'orderby' => 'title',
          'order' => 'ASC'
        ));



        while ($categories->have_posts()) {
          $categories->the_post();
          $relatedItems = get_field('related_menu_item');

          ?>


        <div class="card-header" id="menu<?php echo get_the_ID(); ?>" class="btn btn-link collapsed" data-toggle="collapse" data-target="#<?php echo get_the_ID(); ?>" aria-expanded="false" aria-controls="<?php echo get_the_ID(); ?>">
          <h5 class="mb-0">
        <a class="menu-link" >
          <h3 class="sub-heading"><?php the_title(); ?></h3>
        </a>
      </h5>
        </div>

        <div id="<?php echo get_the_ID(); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <?php
            if ($relatedItems) {
              foreach ($relatedItems as $item) {
              ?>
            <div class="row">
              <div class="col-sm-4">
                <img class="menu-pic img-thumbnail" src="<?php echo get_the_post_thumbnail_url($item->ID, 'menuItem');?>" alt="Menu Item">
              </div>
              <div class="col-sm-8">
                <h5 class="mt-0"><?php echo get_the_title($item);?></h5>
                <p><?php echo $item->post_content ?> <strong><?php echo get_field('item_price', $item->ID); ?></strong></p>
              </div>
            </div>
            <hr>

                <?php

              }
            } else {?>
              <p>There are no items listed in this category.</p>
            <?php } ?>
          </div>
        </div>


        <?php } ?>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>
