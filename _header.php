<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php  wp_head()?>
</head>

<body <?php body_class(); ?>>
  <!-- <div class="box-template-3">
  <div class="box-template-2"> -->
  <div class="box-template">
      <?php theme_customize_header();?>
      <?php if ( !(is_home()) && !(is_front_page())  ) { ?>
        <div class="mx-breadcrumb">
           <div class="container">
             <div class="row">
                  <div class="col-lg-12 ">
                      <h6><?php wp_title( '', true, 'right' ); ?></h6>
                     <?php get_breadcrumb(); ?>
                 </div>
             </div>
           </div>
        </div>
      <?php } ?>
