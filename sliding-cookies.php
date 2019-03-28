<script>
		jQuery(document).ready(function ( $ ) {
		function Cookies()
		{
			this.creerCookies=creerCookies;
			this.modifierCookies=modifierCookies;
			this.supprimerCookies=supprimerCookies;
			this.afficherCookies=afficherCookies;
			function creerCookies(nom,contenu,nbJour)
			{
				var theDate = new Date();
				theDate.setTime(theDate.getTime()+(nbJour*24*3600*1000));
				document.cookie=nom+"="+contenu+";expires="+theDate.toUTCString();
			}
			function modifierCookies(nom,contenu,nbJour)
			{
				c.creerCookies(nom,contenu,nbJour);
			}
			function supprimerCookies(nom)
			{
				c.creerCookies(nom,"bbb",-10);
			}
			function afficherCookies(nom)
			{
				var allCookies = document.cookie;
				var etat="";
				var tabCookies = allCookies.split(";");
				for(var i in tabCookies)
				{
					var cooki = tabCookies[i].split(";");
					for(var j in cooki)
						var cookieValue= cooki[j].split("=")
					for(var k in cookieValue)
					{
						if(cookieValue[k]==nom)
						{
							etat= cookieValue[parseInt(k)+1];
						}
					}
				}
				return etat;
			}
		}
		var c = new Cookies();
			if(c.afficherCookies("choose")!="")
			{
				if(c.afficherCookies("choose")=="no");
				{
					$(".restricted").remove();
				}
				$("#home-pharma-callout").css("display","none");
			}
			var btnYes = $("#btnYes");
		var btnNo = $("#btnNo");
		btnNo.on("click",function () {
			var c = new Cookies();
			if(c.afficherCookies("choose")=="")
			{
				c.creerCookies("choose","no",7);
				$(".restricted").remove();
			}
		});
		btnYes.on("click",function () {
			var c = new Cookies();
			console.log(c.afficherCookies("chose"));
			if(c.afficherCookies("choose")=="")
			{
				c.creerCookies("choose","yes",7);
			}
		});
		});
</script>

<div id="home-pharma-callout" class="home-pharma callout" data-closable="slide-out-up">
	<h5>Quick Question...</h5>
	<p>In order to provide you with the best experience on our site, please answer the following question...</p>
	<h6><strong>Are you a healthcare professional?</strong></h6>
	<div class="large button-group align-center">
		<button type="submit" id="btnYes" class="button" aria-label="Close" type="button" data-close>Yes</button>
		<button type="submit" id="btnNo" class="button" aria-label="Close" type="button" data-close>No</button>
	</div>
</div>


<div class="home-slide-row align-center">
	<div class="orbit" role="region" aria-label="The British Dermatological Nursing Group" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
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

				<?php if ( get_sub_field( 'restrict_to_pharma' ) ) : ?>

					<li class="orbit-slide restricted">
						<?php if ( $linkurl ) : ?>
							<a target="<?php echo esc_html( $linktarget ); ?>" title="<?php echo esc_html( $alttext ); ?>" href="<?php echo esc_url( $linkurl ); ?>" >
						<?php endif; ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_html( $alttext ); ?>" />
						<?php if ( $linkurl ) : ?>
							</a>
						<?php endif; ?>	
					</li>
				<?php else : ?>
					<li class="orbit-slide">
						<?php if ( $linkurl ) : ?>
							<a target="<?php echo esc_html( $linktarget ); ?>" title="<?php echo esc_html( $alttext ); ?>" href="<?php echo esc_url( $linkurl ); ?>" >
						<?php endif; ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_html( $alttext ); ?>" />
						<?php if ( $linkurl ) : ?>
							</a>
						<?php endif; ?>	
					</li>
				<?php endif; ?>	
					
			<?php endwhile;
			wp_reset_postdata(); ?>
		</ul>
		<?php endif; ?>
	</div>
</div>

