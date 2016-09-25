<?php get_header(); ?>
<div id="sidebar"><?php get_sidebar(); ?></div>

<div id="content">
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
 	  <?php } ?>


<?php while (have_posts()) : the_post(); ?>
<div class="post">
<div class="blog">
<div class="post" id="post-<?php the_ID(); ?>">
<strong><a href="<?php trackback_url(); ?>"><?php the_title(); ?></a></strong>
<br /><?php the_time('M j, Y @ g:ia') ?> | <?php comments_number('No Comments','1 Comment','% Comments'); ?>
</div></div></div>

<div class="excerpt">
<?php the_excerpt(); ?>
</div>


<?php endwhile; ?>

			<div class="centerize"><?php next_posts_link('&laquo; Older Entries') ?> <?php previous_posts_link('Newer Entries &raquo;') ?></div>

<?php else : ?>
<h2 class="center">Not Found</h2>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<?php endif; ?>


<?php get_footer(); ?>
