<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
<!-- section.about -->
	<section id="about">
		<div class="wrapper">


		<?php $aboutQuery = new WP_query(
			array(
					'post_type'=>'about'
				)
		); ?>

			<?php if ($aboutQuery->have_posts()): ?>
				<?php while($aboutQuery->have_posts()): $aboutQuery->the_post(); ?>
				<?php the_post_thumbnail('medium'); ?>
				<p><?php the_content(); ?></p>
				<?php endwhile ?>
			<?php wp_reset_postdata(); ?>
		<?php endif ?>

		</div>
	</section>
<!-- /section.about -->

<!-- section.recent -->
	<section id="work">
		<div class="wrapper">

		<h2>Recent Work</h2>

			<?php $workQuery = new WP_query(
				array(
						'post_type'=>'work',
						'cat'=>3
					)
			); ?>

				<?php if ($workQuery->have_posts()): ?>
					<?php while($workQuery->have_posts()): $workQuery->the_post(); ?>
				<div class="works">
					<h3><?php the_title( ) ?></h3>
					<?php the_post_thumbnail('large'); ?>
					<p><?php the_content( ); ?></p>
					<button class="liveDemo"><a target="_blank" href="http://<?php the_field('live_demo');?>
					">Live Demo</a>
					</button>
					<button class="source"><a href="<?php the_field('source'); ?> ">Source</a></button>
				</div>
				<?php endwhile ?>
			<?php wp_reset_postdata(); ?>
		<?php endif ?>

		</div>
	</section>
<!-- /section.recent -->

<!-- section.skills -->
	<section id="skills">
		<div class="wrapper">
			<?php $skillQuery = new WP_query(
				array(
						'posts_per_page'=>-1,
						'post_type'=>'skill'
					)
			); ?>

				<?php if ($skillQuery->have_posts()): ?>
					<?php while($skillQuery->have_posts()): $skillQuery->the_post(); ?>
					<div class="skillsImg">
					<?php echo the_post_thumbnail('thumbnail'); ?>
					</div>
					<?php endwhile ?>
				<?php wp_reset_postdata(); ?>
			<?php endif ?>

		</div>
	</section>
<!-- /section.skills -->

<!-- section.contact -->
	<section id="contact">
		<div class="wrapper">

			<h2>Contact</h2>
		
		</div>
	</section>
<!-- /section.contact -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
