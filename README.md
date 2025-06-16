# WordPress to Slack

This plugin will send a notification to a Slack channel when various
actions occur on your WordPress site.

This plugin is ideal to expand to match your own needs.

## Set Up

The set up is pretty simple and done in 3 easy steps.

### Create a Slack App

First you need to set up an Incoming Webhook within your organisations
Slack Account. You can do this here: <https://api.slack.com/messaging/webhooks>

You will need the Webhook URL which will look something like
`https://hooks.slack.com/services/XXXXXXXXX/XXXXXXXXXXX/XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX`

You then need to add or select a channel which will be sent the notifications.

### Update your config

In your `wp-config.php` you need to set the following

```
define( 'SLACK_ENDPOINT', '' );
define( 'SLACK_CHANNEL', '' );
```

Note: You should not store the stack endpoint in any version control
system, ideally you should populate this using a secret during the
deployment process.

### Enable the plugin

As an admin

## Extrend the plugin

This is designed to be the starting point of your plugin.

You can extend this to include the default post type or custom post types
if you see fit.

I've also included the ability to tag the user who published the page if you
include a custom meta field in their profile.

## Gotchas

- If the user who created the webhook is deleted then the webhock may become inactive
