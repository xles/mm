<?php
add_action( 'comment_form_top', 'draya_comment_form_top' );
add_action( 'comment_form', 'draya_comment_form_bottom' );
#add_action( 'comment_form_comments_closed', 'draya_comments_closed' );
#add_action( 'comment_form_comments_closed', 'draya_comments_closed' );

function draya_comment_form_top() {
	echo '<fieldset>
	<legend>
		';comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' );
		echo '
	</legend>';
}
function cancel_comment_reply_button($html, $link, $text) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<button id="cancel-comment-reply-link" class="tiny secondary button radius"' . $style . '>';
    return $button . $text . '</button>';
}
 
add_filter( 'cancel_comment_reply_link', '__return_false' );
add_action('cancel_comment_reply_link', 'cancel_comment_reply_button', 10, 3);
function draya_comment_form_bottom() {
	function f($data) { return $data; } $f = 'f';

	$html = <<<HTML
		<div class="row">
			<div class="small-9 small-offset-3 columns">
				<button class="radius button" type="submit">{$f(__( 'Post Comment' ))}</button>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<p>
					{$f(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' ))}
					<code>{$f(allowed_tags())}</code>
				</p>
			</div>
		</div>
	</fieldset>
HTML;
	echo $html;
}


add_filter( 'comment_form_defaults', 'draya_comment_form_defaults');
 
function draya_comment_form_defaults($args) {

	function fn($data) { return $data; } $fn = 'fn';
	$user = wp_get_current_user();

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$args['format']            = 'html5';
	$args['id_form']           = 'commentform';
	$args['id_submit']         = 'submit';
	$args['title_reply']       = null;
	$args['title_reply_to']    = __( 'Leave a Reply to %s' );
	$args['cancel_reply_link'] = __( 'Cancel Reply' );
	$args['label_submit']      = __( 'Post Comment' );

	$args['must_log_in'] = <<<HTML
		<p class="must-log-in">
			{$fn(__('You must be'))}
			<a href="{$fn(wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ))}">
				{$fn(__('logged in'))}
			</a> {$fn(__('to post a comment'))}
		</p>
HTML;

	$args['logged_in_as'] = <<<HTML
		<div class="row">
			<div class="small-9 small-offset-3 columns">
				<p style="height: 2.3125rem">
					{$fn(__( 'Logged in as'))}
					<a href="{$fn(admin_url( 'profile.php' ))}">{$user->display_name}</a>.
					<a href="{$fn(wp_logout_url( apply_filters( 'the_permalink', get_permalink(  ) ) ))}" 
						title="{$fn(__('Log out of this account'))}">
						{$fn(__('Log out?'))}
					</a>
				</p>
			</div>
		</div>
HTML;

	$args['comment_notes_before'] = <<<HTML
		<div class="row">
			<div class="small-9 small-offset-3 columns">
				<p style="height: 2.3125rem">
					{$fn(__( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ))}
				</p>
			</div>
		</div>
HTML;

	$args['comment_notes_after'] = null;
#	$args['comment_notes_after'] = '<p class="form-allowed-tags">' .
#		sprintf(
#			__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
#			' <code>' . allowed_tags() . '</code>'
#		) . '</p>';

	$args['comment_field'] = <<<HTML
		<div class="row">
			<div class="small-3 columns">
				<label for="comment" class="right inline">
					{$fn(_x( 'Comment', 'noun' ))}
				</label>
			</div>
			<div class="small-9 columns">
				<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
			</div>
		</div>
HTML;

	$fields = array();

	$fields['author'] = <<<HTML
		<div class="row">
			<div class="small-3 columns">
				<label for="author" class="right inline">
					{$fn( $req ? '<small>Required</small>' : '' )}
					{$fn(__( 'Name', 'domainreference' ))}
				</label>
			</div>
			<div class="small-9 columns">
				<input id="author" name="author" type="text" 
					value="{$fn(esc_attr( $commenter['comment_author'] ))}" size="30" {$aria_req} />
			</div>
		</div>
HTML;

	$fields['email'] = <<<HTML
		<div class="row">
			<div class="small-3 columns">
				<label for="email" class="right inline">
					{$fn( $req ? '<small>Required</small>' : '' )}
					{$fn(__( 'Email', 'domainreference' ))}
				</label>
			</div>
			<div class="small-9 columns">
				<input id="email" name="email" type="text" 
				value="{$fn(esc_attr(  $commenter['comment_author_email'] ))}" size="30" ($aria_req) />
			</div>
		</div>
HTML;

	$fields['url'] = <<<HTML
		<div class="row">
			<div class="small-3 columns">
				<label for="url" class="right inline">
					{$fn(__( 'Website', 'domainreference' ))}
				</label>
			</div>
			<div class="small-9 columns">
				<input id="url" name="url" type="text" 
					value="{$fn(esc_attr( $commenter['comment_author_url'] ))}" size="30" />
			</div>
		</div>
HTML;

	$args['fields'] = apply_filters( 'comment_form_default_fields', $fields);

	return $args;
}


function comment_callback( $comment, $depth, $args ) {
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard too-cool-for-school">
		<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( '0' == $comment->comment_approved ) : ?>
	<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
	<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
		?>
	</div>

	<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

	<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}
