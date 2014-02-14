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
<i class="fi-pricetag-multiple"></i>
<?php

$posttags = get_the_tags();
if ($posttags) {
	foreach ($posttags as $tag) {
		echo '<a href="' . home_url('/tag/' . $tag->slug)
		.'" title="'.$tag->description
		.'" class="secondary radius label" rel="tag">' 
		. $tag->name . "</a>\n";
	}
}
?>
</p>
</footer> 

