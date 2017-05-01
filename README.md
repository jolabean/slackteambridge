# slackteambridge
This is a super simple PHP program to bridge public channels between two Slack teams. Use Case: Two companies are partners, but don't want to bother with guest users/a third, shared Slack team. Use this and people from each side may simple drop into the channel to talk.

Setup:

1. In Slack, create a public channel. Name it something relevant. Example: Trollville-Partner-Chat.
2. Navigate to https://spredfast.slack.com/apps/manage/custom-integrations
3. Create an outgoing webhook with the following settings:
    * Channel: Set to the channel created in step 1.
    * Trigger Words: Leave this blank.
    * URL(s): Provide a web link to the slackbridge.php file.
    * Copy the token.
4. Create an incoming webhook with the following settings:
    * Post to Channel: Set to the channel created in step 1.
    * Copy the webhook URL.
5. Store the outgoing webhook token and the incoming webhook URL in an environment variable or config file.
6. Reference the token and incoming webhook URL in the "team1" variables in slackbridge.php.
7. Someone from the other Slack team will need to repeat steps 1 - 4 and provide the token and incoming webhook to you.
8. Repeat steps 5 and 6 for other teams information (reference these in the "team 2" variables).
9. Upload the slackbridge.php file to a webserver.
10. Post a message in the public channel on your side to test.

The file will select a random avatar for each new user; the avatar will persist for that user. This allows you to have a visual difference between multiple users from the other team.

Spredfast
