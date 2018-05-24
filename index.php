<?php
get_header();
?>

<!-- Picture carousel -->
  <div class="container-fluid">
    <div class="carousel slide" id="deli-slider" data-ride="carousel">
      <div class="carousel-inner">

        <?php
          $slideshow = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'slideshow',
            'orderby' => 'ASC'
          ));

          $postCount = 0;

          while ($slideshow->have_posts()) {
            $slideshow->the_post();
            ?>
            <div <?php if ($postCount == 0) {?> class="carousel-item active" <?php } else { ?> class="carousel-item" <?php } ?>>
              <img class="img-fluid" src="<?php echo the_post_thumbnail_url('superSlider') ?>" alt="sandwich">
            </div>
          <?php
          $postCount++;
            }
            wp_reset_postdata();
          ?>



<!-- Carousel control arrows -->

      <a class="carousel-control-prev" href="#deli-slider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
      <a class="carousel-control-next" href="#deli-slider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
    </div>
  </div>
</div>


<!-- Welcome title and hours -->

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="welcome">Welcome to <?php echo bloginfo('title'); ?>!</h1>
        <p class="text-center tagline"><?php echo bloginfo('description'); ?></p>
        <h6 class="text-center"><strong>Hours</strong>:</h6>
      </div>
    </div>


    <div class="row">

      <?php
        $hours = new WP_Query(array(
          'posts_per_page' => 1,
          'post_type' => 'hours',
          'orderby' => 'post_date',
          'order' => 'ASC'
        ));


        if($hours->have_posts()) {
          $hours->the_post();
          ?>
          <div class="col-sm-4">
            <p class="text-center"><strong>Monday-Friday:</strong> <?php echo get_field('weekday_hours'); ?></p>
          </div>
          <div class="col-sm-4">
            <p class="text-center"><strong>Saturday:</strong> <?php echo get_field('saturday_hours'); ?></p>
          </div>
          <div class="col-sm-4">
            <p class="text-center"><strong>Sunday:</strong> <?php echo get_field('sunday_hours'); ?></p>
          </div>


        <?php  }
        wp_reset_postdata();
       ?>


    </div>
  </div>


  <!-- Menu pictures with links to menu page accordion-->

  <hr id="menu">

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <a class="menu-link" href="<?php echo esc_url(site_url('/menu')); ?>"><h1 class="text-center main-heading">Our Menu</h1></a>
      </div>
    </div>
<div class="row pics">
    <?php
      $categories = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'Menu Categories',
        'orderby' => 'title',
        'order' => 'ASC'
      ));

      while ($categories->have_posts()) {
        $categories->the_post();
        ?>
        <div class="col-sm-6 text-center">
          <a class="menu-link" href="<?php echo esc_url(site_url('/menu/#' . $id)); ?>"><span class="text-center sub-heading"><h2><?php echo get_the_title(); ?></h2></span></a>
          <a href="<?php echo esc_url(site_url('/menu/#' . $id)); ?>"><img class="img-thumbnail category-pic" src="<?php the_post_thumbnail_url('homeCategory');?>" alt="<?php the_title(); ?>"></a>
        </div>


      <?php  }
      wp_reset_postdata();
     ?>
</div>
</div>





<!-- Locations with links to Google Map Directions -->

  <hr id="locations">

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="text-center main-heading">Our Locations</h1>
      </div>
    </div>

      <div class="row">

    <?php
    $locations = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'location',
      'orderby' => 'title',
      'order' => 'ASC'
    ));

    while ($locations->have_posts()) {
      $locations->the_post();
      $address = get_field('location_address');
      ?>
      <div class="col-sm-4">
        <div class="card bg-light">
          <img class="card-img-top" src="<?php the_post_thumbnail_url('homeLocation'); ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text"><address><?php echo $address ?></address></p>
            <a href="<?php echo esc_url("https://google.com/maps/dir// $address") ?>" target="_blank" class="btn btn-brown">Get directions</a>
          </div>
        </div>
      </div>


    <?php }
    wp_reset_postdata();
    ?>

  </div>


  <!-- Contact options -->

  <hr id="contact">

  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-center main-heading">Contact Us</h1>
    </div>
  </div>

  <!-- Social media icon links -->
    <div class="row">
  <?php
  $social = new WP_Query(array(
    'post_type' => 'social_links',
    'posts_per_page' => 1,
    'orderby' => 'post_date',
    'order' => 'ASC'
  ));

  while ($social->have_posts()) {
    $social->the_post();

?>

        <div class="col-sm-6 text-center">
          <h3 class="sub-heading">Online</h3>
          <?php if (get_field('facebook') != '') { ?>
          <a href="<?php echo esc_url(get_field('facebook')) ?>" class="fa fa-facebook fa-2x"></a>
        <?php } ?>
        <?php if (get_field('twitter') != '') { ?>
          <a href="<?php echo esc_url(get_field('twitter')) ?>" class="fa fa-twitter fa-2x"></a>
          <?php } ?>
          <?php if (get_field('instagram') != '') { ?>
          <a href="<?php echo esc_url(get_field('instagram')) ?>" class="fa fa-instagram fa-2x"></a>
          <?php } ?>
          <?php if (get_field('snapchat') != '') { ?>
          <a href="<?php echo esc_url(get_field('snapchat')) ?>" class="fa fa-snapchat-ghost fa-2x"></a>
          <?php } ?>
        </div>

    <?php  }
    wp_reset_postdata();
    ?>





    <!-- Phone numbers and address -->

    <?php  $contact = new WP_Query(array(
      'post_type' => 'contact',
      'posts_per_page' => 1,
      'orderby' => 'post_date',
      'order' => 'ASC'
    ));

    while($contact->have_posts()) {
      $contact->the_post();


      $field_name = "phone_number";
      $field = get_field_object($field_name);

      $fax = "fax_number";
      $field_fax = get_field_object($fax);



        ?>



      <div class="col-sm-6">
        <h3 class="text-center sub-heading">Main office</h3>
        <p class="text-center"><strong> <?php  echo $field['label'] . ':' ?> </strong> <?php echo $field['value'];  ?></p>
        <?php  if ($field_fax['value'] != '') { ?>
          <p class="text-center"><strong><?php  echo $field_fax['label'] . ':' ?> </strong> <?php echo $field_fax['value'];  ?></p>
        <?php } ?>
        <?php  if (get_field('address') != '') { ?>
        <p class="text-center"><?php  echo get_field('address');  ?></p>
      <?php } ?>
      </div>
    <?php } ?>


  </div>
</div>

<?php get_footer(); ?>
