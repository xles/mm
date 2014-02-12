<footer>
<p>
	<i class="fi-folder"></i>
	<?php the_category( ', ' ); ?>
	
<?php
$num_comments = get_comments_number();
$comment = '&raquo; <i class="fi-comment"></i> '; 

if ( comments_open() ) {
	if ( $num_comments == 0 ) {
		$comments = __('0 comments');
	} elseif ( $num_comments > 1 ) {
		$comments = $num_comments . __(' comments');
	} else {
		$comments = __('1 comment');
	}
	$comment .= '<a href="' . get_comments_link() .'">'. $comments.'</a>';
} else {
	$comment .= __('Comments are off for this post.');
}
echo $comment;
?>
<br>
<?php
the_tags('<i class="fi-pricetag-multiple"></i> <span class="secondary radius label">',
	'</span> <span class="secondary radius label">',
	'</span>'); 
?>
</p>
</footer> 

