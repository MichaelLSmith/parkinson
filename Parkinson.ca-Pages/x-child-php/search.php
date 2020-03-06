<?php

/*

Archive Template to display all search results
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

      <?php if ( 'attachment' === get_post_type() ) : ?>
        <article class="hentry" id="post-<?php the_ID(); ?>">
          <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark" target="blank" rel="noopener">', esc_url(wp_get_attachment_url( get_post_thumbnail_id() ) ) ), '</a></h2>' ); ?>
          <?php the_excerpt() ?>
        </article>

      <?php elseif ( 'support-groups' === get_post_type() ) : ?>
        <article class="hentry" id="post-<?php the_ID(); ?>">
          <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark" target="blank" rel="noopener">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
          <h6 style="margin: .5em 0 0 0;">Parkinson Canada Local Support Group</h6>
          <p>Parkinson Canada hosts local support groups in your community to provide mutual support from other people living with Parkinson's Disease.</p>
        </article>      

        <?php else : ?>
          <article class="hentry" id="post-<?php the_ID(); ?>">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark" target="blank" rel="noopener">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <?php the_excerpt() ?>
            <a href="" target="blank" rel="noopener"></a>
          </article>
          
        <?php endif ?>

      <?php endwhile; ?>
      <?php pagenavi(); ?>
    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
