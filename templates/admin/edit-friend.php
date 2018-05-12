<?php
/**
 * This template contains the friend editor.
 *
 * @package Friends
 */

?><form method="post">
	<?php wp_nonce_field( 'edit-friend-' . $friend->ID ); ?>
	<input type="hidden" name="friend" value="<?php echo esc_attr( $friend->ID ); ?>" />
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="url"><?php esc_html_e( 'URL', 'friends' ); ?></label></th>
				<td><a href="<?php echo esc_attr( $friend->user_url ); ?>"><?php echo esc_html( $friend->user_url ); ?></a></td>
			</tr>
			<tr>
				<th><label for="status"><?php esc_html_e( 'Status', 'friends' ); ?></label></th>
				<td>
					<?php if ( $friend->has_cap( 'friend_request' ) ) : ?>
						<?php esc_html_e( 'Friend Request', 'friends' ); ?>
						<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'wp_http_referer', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), self_admin_url( 'admin.php?page=edit-friend&user=' . $friend->ID ) ), 'accept-friend-request-' . $friend->ID, 'accept-friend-request' ) ); ?>"><?php esc_html_e( 'Accept Friend Request', 'friends' ); ?></a>
					<?php elseif ( $friend->has_cap( 'pending_friend_request' ) ) : ?>
						<?php esc_html_e( 'Pending Friend Request', 'friends' ); ?>
						<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'wp_http_referer', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), self_admin_url( 'admin.php?page=edit-friend&user=' . $friend->ID ) ), 'send-friend-request-' . $friend->ID, 'send-friend-request' ) ); ?>"><?php esc_html_e( 'Resend Friend Request', 'friends' ); ?></a>
					<?php elseif ( $friend->has_cap( 'subscription' ) ) : ?>
						<?php esc_html_e( 'Subscription', 'friends' ); ?>
						<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'wp_http_referer', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), self_admin_url( 'admin.php?page=edit-friend&user=' . $friend->ID ) ), 'send-friend-request-' . $friend->ID, 'send-friend-request' ) ); ?>"><?php esc_html_e( 'Send Friend Request', 'friends' ); ?></a>
					<?php elseif ( $friend->has_cap( 'friend' ) ) : ?>
						<?php esc_html_e( 'Friend', 'friends' ); ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th><label for="friends_display_name"><?php esc_html_e( 'Display Name', 'friends' ); ?></label></th>
				<td><input type="text" name="friends_display_name" id="friends_display_name" value="<?php echo esc_attr( get_user_option( 'friends_display_name_' . $friend->ID, $user ) ?: $friend->display_name ); ?>" class="regular-text" /> <span class="description"><?php esc_html_e( 'Careful, your friend can see this.', 'friends' ); ?></span></td>
			</tr>
			<tr>
				<th scope="row"><?php esc_html_e( 'New Post Notification', 'friends' ); ?></th>
				<td>
					<?php if ( get_user_option( 'friends_no_new_post_notification' ) ) : ?>
						<span class="description"><?php esc_html_e( 'You have disabled new post notifications for yourself.' ); ?> <a href="<?php echo esc_url( add_query_arg( 'wp_http_referer', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), self_admin_url( 'admin.php?page=friends-settings' ) ) ); ?>"><?php esc_html_e( 'Change setting', 'friends' ); ?></a></span>
					<?php else : ?>
					<fieldset>
						<label for="friends_new_post_notification">
							<input name="friends_new_post_notification" type="checkbox" id="friends_new_post_notification" value="1" <?php checked( '1', ! get_user_option( 'friends_no_new_post_notification_' . $friend->ID ) ); ?>>
							<?php esc_html_e( 'Send me an e-mail for posts of this friend', 'friends' ); ?>
						</label>
					</fieldset>
					<?php endif; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input type="submit" id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes' ); ?>">
	</p>
</form>