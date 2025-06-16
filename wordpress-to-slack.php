<?php
  /**
   *
   * Plugin Name: WordPress to Slack
   * Description: A plugin which is used to communicate between the CMS and Slack
   * Version: 1.0.0
   * Author: Rob Watson
   * Author URI: https://robwatson.net/
   *
   * @author Rob Watson
   * @category Slack
   * @license GNU GENERAL PUBLIC LICENSE
   * @since v1.0.0
   *
   */
  defined( 'ABSPATH' ) || exit;
  define( 'WP_SLACK_DIR', plugin_dir_path( __FILE__ ) );

  require_once( WP_SLACK_DIR . '/inc/extend-user.php' );
  require_once( WP_SLACK_DIR . '/inc/post-to-slack.php' );
  require_once( WP_SLACK_DIR . '/inc/slack-fuctions.php' );
