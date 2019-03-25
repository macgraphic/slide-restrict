<?php
/**
 * Template Name: Home page
 * Description: The Home page layout for our site.
 *
 * @package WPBDNG
 */

get_header(); ?>

<?php get_template_part( 'content', 'pharma-notice' ); ?>


<div class="home-slide-row align-center">
	<div class="orbit" role="region" aria-label="CHANGE THIS" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
		<?php if ( have_rows( 'home_slider' ) ) : ?>
		<ul class="orbit-container">
			<?php
			while ( have_rows( 'home_slider' ) ) : the_row();
				// vars
				$image = get_sub_field( 'slider_image' );
				$alttext = get_sub_field( 'slide_name' );
				$linktarget = get_sub_field( 'open_in' );
				$linkurl = get_sub_field( 'slide_link' );
				$restricted = get_sub_field( array(
					'meta_query'	=> array(
						array(
							'key' 		=> 'restrict_to_pharma',
							'compare'	=> '=',
							'value'		=> '1',
						),
					),
				));
			?>	
				<li class="orbit-slide">
					<?php if ( $linkurl ) : ?>
						<a target="<?php echo esc_html( $linktarget ); ?>" title="<?php echo esc_html( $alttext ); ?>" href="<?php echo esc_url( $linkurl ); ?>" >
					<?php endif; ?>
						<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_html( $alttext ); ?>" />
					<?php if ( $linkurl ) : ?>
						</a>
					<?php endif; ?>	
				</li>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</ul>
		<?php endif; ?>
	</div>
</div>

<div class="contentrow">
	<div class="contentwrap">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php the_field( 'home_area_1' ); ?>

				<div class="row flex-container">
					<div class="small-12 medium-6 columns">
						<?php the_field( 'home_area_2' ); ?>
					</div>
					<div class="small-12 medium-6 columns">
						<?php the_field( 'home_area_3' ); ?>
					</div>
					<div class="small-12 medium-6 columns">
						<?php the_field( 'home_area_4' ); ?>
					</div>
					<div class="small-12 medium-6 columns">
						<?php the_field( 'home_area_5' ); ?>
					</div>
				</div>
				<div class="clearfix"></div>
					<ul class="accordion" data-accordion data-allow-all-closed="true">
						<li class="accordion-item" data-accordion-item>
							<a href="#" class="accordion-title">Committee</a>
							<div class="accordion-content" data-tab-content>
								<?php if ( have_rows( 'committee', 197 ) ) : ?>
									<table class="hover">
										<?php while ( have_rows( 'committee', 197 ) ) : the_row();
											$com_role = get_sub_field( 'committee_role' );
											$com_name = get_sub_field( 'committee_name' );
										?>
											<tr>
												<td>
													<?php echo esc_html( $com_role ); ?>
												</td>
												<td>
													<?php echo esc_html( $com_name ); ?>
												</td>
											</tr>
										<?php endwhile; ?>
									</table>
								<?php endif; ?>
							</div>
						</li>

						<li class="accordion-item" data-accordion-item>
							<a href="#" class="accordion-title">Sub Groubs</a>
							<div class="accordion-content" data-tab-content>
								<?php if ( have_rows( 'sub_groups', 197 ) ) : ?>
									<table class="hover">
										<?php while ( have_rows( 'sub_groups', 197 ) ) : the_row();
											$group_role = get_sub_field( 'sub_group_role' );
											$group_name = get_sub_field( 'sub_group_name' );
										?>
											<tr>
												<td>
													<?php echo esc_html( $group_role ); ?>
												</td>
												<td>
													<?php echo esc_html( $group_name ); ?>
												</td>
											</tr>
										<?php endwhile; ?>
									</table>
								<?php endif; ?>
							</div>
						</li>

						<li class="accordion-item" data-accordion-item>
							<a href="#" class="accordion-title">Regional Representatives</a>
							<div class="accordion-content" data-tab-content>
								<?php if ( have_rows( 'regional_representatives', 197 ) ) : ?>
									<table class="hover">
										<?php while ( have_rows( 'regional_representatives', 197 ) ) : the_row();
											$rep_role = get_sub_field( 'regional_rep_role' );
											$rep_name = get_sub_field( 'regional_rep_name' );
										?>
											<tr>
												<td>
													<?php echo esc_html( $rep_role ); ?>
												</td>
												<td>
													<?php echo esc_html( $rep_name ); ?>
												</td>
											</tr>
										<?php endwhile; ?>
									</table>
								<?php endif; ?>
							</div>	
						</li>

						<li class="accordion-item" data-accordion-item>
							<a href="#" class="accordion-title">Staff</a>
							<div class="accordion-content" data-tab-content>
								<?php if ( have_rows( 'staff', 197 ) ) : ?>
									<table class="hover">
										<?php while ( have_rows( 'staff', 197 ) ) : the_row();
											$staffrole = get_sub_field( 'staff_role' );
											$staffname = get_sub_field( 'staff_name' );
										?>
											<tr>
												<td>
													<?php echo esc_html( $staffrole ); ?>
												</td>
												<td>
													<?php echo esc_html( $staffname ); ?>
												</td>
											</tr>
										<?php endwhile; ?>
									</table>
								<?php endif; ?>
							</div>
						</li>	
					</ul>
				</div>
			<?php endwhile; ?>

		</div> <!-- #content -->
	</div> <!-- .wrap -->
</div> <!-- .contentrow -->

<div class="clearfix"></div>

<!-- Sponsors -->
<div class="row home-sponsors">
	
	<div class="home-sponsor-wrap">
	<h3>Our Corporate Sponsors</h3>
		<div class="row">
		<!-- Platinum Sponsors -->
				<?php
					$args = array(
						'post_type'              => array( 'sponsors' ),
						'posts_per_page'         => '-1',
						'order'                  => 'ASC',
						'orderby'                => 'name',
						'tax_query'              => array(
							array(
								'taxonomy'		=> 'sponsor_level',
								'terms'			=> array( 63 ),
							),
						),
					);

					// The Query
					$platspons = new WP_Query( $args );
					if ( $platspons->have_posts() ) {
						while ( $platspons->have_posts() ) {
							$platspons->the_post();
					?>
					<div class="sponsor">
						<?php
							$image = get_field( 'sponsor_logo' );
							$size = 'sponsor-thumb-small';
						if ( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
					</div>
				<?php
						}
					}
					wp_reset_postdata();
				?>
		</div>
		<div class="row">
			<!-- Gold Sponsors -->
				<?php
					$args = array(
						'post_type'              => array( 'sponsors' ),
						'posts_per_page'         => '-1',
						'order'                  => 'ASC',
						'orderby'                => 'name',
						'tax_query'              => array(
							array(
								'taxonomy'		=> 'sponsor_level',
								'terms'			=> array( 64 ),
							),
						),
					);

					// The Query
					$platspons = new WP_Query( $args );
					if ( $platspons->have_posts() ) {
						while ( $platspons->have_posts() ) {
							$platspons->the_post();
					?>
					<div class="sponsor">
						<?php
							$image = get_field( 'sponsor_logo' );
							$size = 'sponsor-thumb-small';
						if ( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
					</div>
				<?php
						}
					}
					wp_reset_postdata();
				?>
		</div>	
	</div>
</div>
<!-- END Sponsors -->

<?php get_footer(); ?>
