<?php get_header(); ?>
<div id="sidebar"><?php get_sidebar(); ?></div>

<div id="content">
<div class="page">
<?php if (have_posts()) : ?>

<h2>Search Results</h2>
<p>Your search for <strong><?php the_search_query() ?></strong> discovered the following results:</p>

<?php while (have_posts()) : the_post();
// START INDIVIDUAL ENTRY ?>

<div class="post">
<div class="blog">
<div class="post" id="post-<?php the_ID(); ?>">
<div class="subject"><?php the_title(); ?></div>
<em><?php the_time('jS-M-Y g:ia') ?></em> under <?php the_category(',') ?>
</div></div>

<div class="entry">
<?php the_excerpt(); ?> 
</div>

<div class="comment">
<div class="commentlink">
<a href="<?php comments_link(); ?>"><?php comments_number('No Comments','1 Comment','% Comments'); ?></a> <img src="http://darth-cena.net/images/site/comment.png" alt="Comments"/>
</div>
</div>

<div class="centerize"><p>- - -</p></div>
</div>

<?php 
// END INDIVIDUAL ENTRY
endwhile; 
// START REST OF PAGE ?>

<div class="centerize"><?php posts_nav_link(' &oslash; ', __('&laquo; Previous'), __('Next &raquo;')); ?></div>

<?php
// END REST OF PAGE
 else : 
 // START IF NOTHING FOUND ?>

<h2>Search Results</h2>
<p>Nothing was found for your search: <strong><?php the_search_query() ?></strong></p>
<p>Try your search again?
<?php include (TEMPLATEPATH . '/searchform.php'); ?></p>

<?php 
// END IF NOTHING FOUND
endif; ?>
</div>

<?php get_footer(); ?>