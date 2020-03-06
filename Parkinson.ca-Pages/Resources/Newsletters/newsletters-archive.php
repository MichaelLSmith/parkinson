<?php
// from:
//https://stackoverflow.com/questions/47732757/wordpress-loop-in-bootstrap-grid
$countbang = 0 ;
    $count_posts = wp_count_posts( 'services' )->publish;
    $args = array( 'post_type' => 'services', 'posts_per_page' => 6 );

    $chunks = array_chunk($loop, 2); //it chunk $loop array into arrays with 2 elements.

        while($chunks as $row){
           echo "<div class='row'>"; //open row
           while($row as $post){
             $countbang++;
?>
             <a href="<?php the_permalink() ?>">
             <div id="post-grid-<?php the_ID(); ?>" class="training-block <?php echo $countbang; ?>-block-training col-xs-6 col-sm-4 col-padding-0" >
             <div id="color-overlay"></div>
             <?php if ( has_post_thumbnail() ) {
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
                echo '<img width="100%" class="fet-img" src="' . $image_src[0] . '">';
             }
             ?>
             <p class="overlay-text"><?php the_title(); ?></p>
             </div><!-- #post-grid -->
             </a>
           <?php
           }
           echo "</div>"; //close row
        }
