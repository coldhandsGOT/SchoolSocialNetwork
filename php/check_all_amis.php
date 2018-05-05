<?php

switch ($row['status']) {
    case 0:
        if ($row['action_user_id'] === $current_user_id) {
            // Show, "Friend requests sents" button. Show options to cancel the friend request.
        } elseif ($row['action_user_id'] === $profile_user_id) {
            // Show, "Accept Friend request" button. Show options to block and reject friend request.
        }
    break;
    case 1:

        // Check and show options to unfriend the user.




    break;

    case 3:


        // Check and show options to unblock. If the other user's visit's this profile show "profile does'nt exists"
    break;
}

?>