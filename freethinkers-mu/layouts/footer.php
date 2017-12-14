<?php
function comicpress_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
      SELECT
      YEAR(min(post_date_gmt)) AS firstdate,
      YEAR(max(post_date_gmt)) AS lastdate
      FROM
      $wpdb->posts
      WHERE
      post_status = 'publish'
    ");
  $output = '';
  if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
      $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
  }
  return $output;
}
?>

<footer class="page-footer">
         <!-- <div class="container">
           <div class="row">
             <div class="col l6 s12">
               <h5 class="white-text">Footer Content</h5>
               <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
             </div>
             <div class="col l4 offset-l2 s12">
               <h5 class="white-text">Links</h5>
               <ul>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
               </ul>
             </div>
           </div>
         </div> -->
         <div class="footer-copyright">
           <div class="container">
             <?php echo comicpress_copyright(); ?> <?php the_author(); ?>, All rights reserved.
           <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
           </div>
         </div>
       </footer>
