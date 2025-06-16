<?php
  /**
   *
   * Status Change
   *
   * This function looks for changes to the published state of pages.
   * This can be extended for posts/custom post types really easily
   *
   * It also includes an option if you extend users to have custom
   * fileds where they can add a slack username to their profile
   * this is called rw_wpts_slack_username
   * Rename that to your meta field.
   *
   * @author Rob Watson
   * @category Slack
   * @license GNU GENERAL PUBLIC LICENSE
   * @since v1.0.0
   *
   */
  add_action( 'transition_post_status', 'rw_wpts_slack_status_change', 10, 3 );

  function rw_wpts_slack_status_change( $new_status, $old_status, $post ) {

    $author_id = get_post_field( 'post_author', $post );

    if ( get_the_author_meta( 'rw_wpts_slack_username', $author_id ) ) {
      $author = '<@' . get_the_author_meta( 'rw_wpts_slack_username', $author_id ) . '>';
    } else {
      $author = get_the_author_meta( 'email', $author_id);
    }

    $page_title = get_the_title($post->ID);
    $tagline = "Reply in thread to acknowledge you are checking the website to make sure it is working as expected.";

    /**
     *
     * Page status changes
     *
     * This checks if the page status changes
     *
     */
    if( ( $post->post_type == 'page' ) && ( $new_status != $old_status ) ) {

      /** This checks if the new status is published */
      if( $new_status == 'publish' ) {
        $message =  "> :star: A new page (" . $page_title . ") has been added by " . $author . ' ' . $tagline;
        rw_wpts_post_to_slack($message);
      }

    }

  }
