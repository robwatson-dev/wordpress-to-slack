<?php
  /**
   *
   * Post to Slack
   *
   * This function is what posts to slack itself, it's
   * pretty simple in what it does, it sends a JSON payload
   *
   * The global vars are populated in wp-config.php
   *
   * Call it like so rw_wpts_post_to_slack($message)
   *
   * @author Rob Watson
   * @category Slack
   * @license GNU GENERAL PUBLIC LICENSE
   * @since v1.0.0
   *
   */
  function rw_wpts_post_to_slack($message) {
    $endpoint = SLACK_ENDPOINT;
    $channel = '#' . SLACK_CHANNEL;
    $headers = array(
      "Content-type" => "application/json"
    );
    $body = [
      "channel" => $channel,
      "text" => $message,
    ];
    $body = json_encode($body);
    $options = [
      "method" => "POST",
      "body" => $body,
      "headers" => $headers,
      "timeout" => 30,
      "redirection" => 5,
      "blocking" => true,
      "httpversion" => "1.0",
    ];
    wp_remote_post( $endpoint, $options );
  }
