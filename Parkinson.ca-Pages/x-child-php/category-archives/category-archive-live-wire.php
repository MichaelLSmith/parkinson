<?php

/*

Archive Template to display all profile CPTs
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

      <?php if(ICL_LANGUAGE_CODE=='fr'): ?>
          <p>Disponible seulement en Anglais</p>
      <?php endif; ?>
      <?php $counter = 1; //start counter
      $grids =4; //grids per row
      ?>

      <div class="container-fluid">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php echo $counter ?>
        <?php if ($counter > 4): ?>
          <div class="row">
            counter > 4
        <?php endif; // div.row ?>
        <?php while ($counter < 4 ) :?>
          counter >=4
          <div class="col-md-3 col-sm-6">
            <a href="http://www.parkinson.ca/wp-content/uploads/LIVEWIRE-2017-SUMMER.pdf" target="blank">
              <figure class="archive-body">
                <img class="aligncenter size-full wp-image-4880" src="http://www.parkinson.ca/wp-content/uploads/LIVEWIRE-2017-SUMMER.jpg" alt="Summer 2017" width="90" height="120" />
                <figcaption><small>Summer 2017</small></figcaption>
              </figure>
            </a>
          </div>
          <?php $counter++;?>
          <?php echo $counter ?>
        <?php endwhile; //counter >=4 ?>





        <?php $counter = 4 ?>
        <?php if ($counter >= 4): ?>
          end row div
          </div>
        <? endif; // counter < 4 ?>
      <?php endwhile; ?>
      </div><!-- </container-fluid> -->

    </div><!-- <.x-main left> -->
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
