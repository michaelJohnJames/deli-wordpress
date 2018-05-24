<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <?php wp_head(); ?>
  <title><?php bloginfo('title'); ?></title>

</head>

<!-- Main Navbar -->

<body <?php body_class(); ?> data-spy="scroll" data-target="#nav" data-offset="50">
  <nav class="navbar navbar-dark navbar-expand-sm sticky-top" id="nav">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo esc_url(site_url()); ?>"><?php bloginfo('title'); ?></a>
      </div>
      <button class="navbar-toggler" data-toggle="collapse" data-target=".navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
      <div class="collapse navbar-collapse navbarContent">
        <ul class="nav navbar-nav navbar-right">
          <?php if (is_home()) { ?>
            <li class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>
        <div class="dropdown-menu" id="dropdown-list" aria-labelledby="navbarDropdown">

            <?php   $categories = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'Menu Categories',
                'orderby' => 'title',
                'order' => 'ASC'
              ));

              $itemNumber = 0;

              while ($categories->have_posts()) {
                $categories->the_post();
                $id = get_the_ID();
                ?>

                <a class="dropdown-item" href="<?php echo esc_url(site_url('/menu/#' . $id)); ?>"><?php the_title(); ?></a>
            <?php $itemNumber++;
              } ?>
            </div>
            </li>
          <?php  } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo esc_url(site_url('/')); ?>">Home</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo esc_url(site_url('/#locations')); ?>">Locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo esc_url(site_url('/#contact')); ?>">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
