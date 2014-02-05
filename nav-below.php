<?php 
  global $wp_query; 
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $no_of_pages = 3;

  if ( $wp_query->max_num_pages > 1 ) { 
?>

<div class="pagination-centered">      
  <ul class="pagination">

    <?php if ($paged == 1) { ?>

      <li class="arrow unavailable">
        <a href="/page/<?php echo $paged; ?>/">&laquo;</a>
      </li>
      <li class="current"><a href="/page/1/">1</a></li>

    <?php } else { ?>

      <li class="arrow">
        <a href="/page/<?php echo $paged-1; ?>/">&laquo;</a>
      </li>
      <li><a href="/page/1/">1</a></li>

    <?php } ?>

<?php
//  $start_page = 2;
//  $end_page = $wp_query->max_num_pages-1;
  $start_page = $paged - floor($no_of_pages/2);
  $end_page =   $paged + floor($no_of_pages/2);

  if ($start_page > 1) {
    echo '<li class="unavailable"><a href="/page/'.$paged.'/">&hellip;</a></li>';
  }
  for ($i = $start_page; $i <= $end_page; $i++) {
    if ($i < 2 || $i > $wp_query->max_num_pages-1)
      continue;
    echo '<li';
    if ($i == $paged) {
      echo ' class="current"';    
    }
    echo '><a href="/page/'.$i.'/">'.$i.'</a></li>';
  }
  if ($end_page < $wp_query->max_num_pages) {
    echo '<li class="unavailable"><a href="/page/'.$paged.'/">&hellip;</a></li>';
  }
?>

    <?php if ($paged == $wp_query->max_num_pages) { ?>

      <li class="current"><a href="/page/<?php echo $wp_query->max_num_pages;?>/"><?php echo $wp_query->max_num_pages;?></a></li>
      <li class="arrow unavailable">
        <a href="/page/<?php echo $paged; ?>/">&raquo;</a>
      </li>

    <?php } else { ?>

      <li><a href="/page/<?php echo $wp_query->max_num_pages;?>/"><?php echo $wp_query->max_num_pages;?></a></li>
      <li class="arrow">
        <a href="/page/<?php echo $paged+1; ?>/">&raquo;</a>
      </li>

    <?php } ?>

  </ul>
</div>

<?php 
}
