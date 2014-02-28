<?php
function fn($data) { return $data; }

add_action( 'comment_form_top', 'draya_comment_form_top' );
add_action( 'comment_form', 'draya_comment_form_bottom' );
#add_action( 'comment_form_comments_closed', 'draya_comments_closed' );
#add_action( 'comment_form_comments_closed', 'draya_comments_closed' );

add_filter( 'comment_text', 'wpautop',            30 );


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
	$fn = 'fn';

	$html = <<<HTML
		<div class="row">
			<div class="small-9 small-offset-3 columns">
				<button class="radius button" type="submit">{$fn(__( 'Post Comment' ))}</button>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<p class="allowed-tags">
					{$fn(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' ))}
					<code>{$fn(allowed_tags())}</code>
				</p>
			</div>
		</div>
	</fieldset>
HTML;
	echo $html;
}


add_filter( 'comment_form_defaults', 'draya_comment_form_defaults');
 
function draya_comment_form_defaults($args) {
	$fn = 'fn';
	$user = wp_get_current_user();

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true" ' : '' );

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
				value="{$fn(esc_attr(  $commenter['comment_author_email'] ))}" size="30" {$aria_req} />
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

function foundation_comment($comment, $args, $depth) {
	$fn = 'fn';
	$GLOBALS['comment'] = $comment;
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	$post = get_post();

	$avatar = ''; 
	$args['avatar_size'] = 96;
	if ($args['avatar_size'] != 0) 
		$avatar = get_avatar( $comment, $args['avatar_size'] );
	
	$reply_link = '';
	$reply_link = preg_replace( '/comment-reply-link/',
		'comment-reply-link small secondary radius button right',
		get_comment_reply_link( 
			array_merge( $args, array( 
				'add_below' => 'div-comment', 
				'depth' => $depth, 
				'max_depth' => $args['max_depth'] 
				) 
			) 
		), 1 );

	$moderation = '';
	if ($comment->comment_approved == '0')
		$moderation = __('&laquo; Your comment is awaiting moderation.');
	
	$comment_class = '';
	foreach (get_comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) as $class) {
		$comment_class .= $class.' ';
	}

	$comment_text = wpautop(get_comment_text());

	$html = "<$tag id=\"comment-{$fn(get_comment_ID())}\" class=\"{$comment_class}\">";
	$html .= <<<HTML
	<div class="panel" id="div-comment-{$fn(get_comment_ID())}">
		<div class="row">
			<div class="small-12 columns">
				{$avatar}
				<a href="{$fn(get_edit_comment_link())}" class="tiny secondary radius button right">{$fn(__( 'Edit' ))}</a>
				<p class="meta">
					<i class="fi-clock"></i>
					<a href="{$fn(esc_url(get_comment_link($comment->comment_ID)))}">
						<time datetime="{$fn(get_comment_time('c'))}">
							{$fn(get_comment_date())} at {$fn(get_comment_time())}
						</time>
					</a>
					<br>
					<i class="fi-torso"></i> 
					{$fn(get_comment_author_link())}
					{$moderation}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="small-10 columns">
				{$comment_text}
			</div>

			<div class="small-2 columns">
				{$reply_link}
			</div>
		</div>
	</div>
HTML;
	echo $html;
}
