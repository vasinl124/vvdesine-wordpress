<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"
  <meta name="viewport" content="width=device-width">
  <title><?php bloginfo('name') ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 header-container">
        <div class="sidebar-nav">
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="visible-xs navbar-brand small-navbar-brand">
                <?php show_easylogo(); ?>
              </span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
              <div class="navbar-header hidden-xs">
                <?php show_easylogo(); ?>
              </div>

              <?php $args = array(
                'theme_location' => 'primary',
                'items_wrap' => '<ul class="nav navbar-nav" id="%1$s" class="%2$s">%3$s</ul>'
              ); ?>
              <?php wp_nav_menu( $args ) ?>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
