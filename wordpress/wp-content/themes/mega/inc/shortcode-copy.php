<?php 


	/*
	* *****************************************************
	*/
	add_shortcode('headerBlock', 'headerBlock_func');
	function headerBlock_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<div class="HeaderBlock section bg-wrap"><img src="	<?php echo the_field('backgorund'); ?>" alt="" class="img-bg">
				<div class="container">
					<div class="gerb"><img src="	<?php echo the_field('logo'); ?>" alt="" class="gerb__img">
						<div class="gerb__text"> 	<?php echo the_field('logo_text'); ?></div>
					</div>
					<h1><?php echo get_the_title(); ?></h1>
					<a href="<?php echo the_field('sign_up', 'option'); ?>" class="HeaderBlock__btn">Get started</a>
					<?php echo the_field('list'); ?>
				</div>
			</div>
			<?php
    return ob_get_clean();

}
	/*
	* *****************************************************
	*/
	add_shortcode('Register', 'Register_func');
	function Register_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<div class="sRegister section <?php if( get_field('title_02') ) : else: echo  ' SRegisterPage '?>   <?php endif; ?>">
			<div class="container">
				<?php if( get_field('title_02') ): ?>
				<div class="section-title">
						<h2>	<?php echo the_field('title_02'); ?></h2>
					</div>
					<?php endif; ?>
				<div class="row">

						<?php $rows = get_field('card_02' );  if($rows ):    while ( have_rows('card_02') ) : the_row();
						  $index = array_rand( $rows );
						  ?>
					<div class="col-lg-6" >
						<div class="SRegister-item">
							<div class="SRegister-item__counter">Step <?php echo get_row_index(); ?></div>
							<div class="SRegister-item__title" ><?php echo the_sub_field('title'); ?></div>
							<div class="SRegister-item__text"  ><?php echo the_sub_field('text'); ?></div>
								<?php if( get_sub_field('btn_name') ): ?> 
									<a href="	<?php 
														if( get_sub_field('btn_link') ) : 
															echo the_sub_field('btn_link');
														else: 
															echo the_field('sign_up', 'option');
														endif;  ?>" class="SRegister-item__btn"><?php echo the_sub_field('btn_name'); ?></a>
								<?php endif; ?>
							<img src= "<?php echo the_sub_field('image'); ?>" loading="lazy" alt="">
						</div>
					</div>
					<?php  endwhile;  else :  endif;    ?>

				</div>
			</div>
		</div>
   <?php return ob_get_clean();

}
	/*
	* *****************************************************
	*/
	add_shortcode('About', 'About_func');
	function About_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<div class="sAbout section">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="section-title">
						
					  <?php echo the_field('content_03'); ?>  
					</div>

				</div>
				<div class="col">
					<a href="<?php echo the_field('video_03'); ?>" class="video-block  " data-fancybox>
					 <img src="<?php echo the_field('video_bg'); ?>" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
   <?php return ob_get_clean();

}

	/*
	* *****************************************************
	*/
	add_shortcode('WhatWillLearn', 'WhatWillLearn_func');
	function WhatWillLearn_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
		<div class="sWhatWillLearn section">
		<div class="container">
			<div class="section-title">
				<h2><?php echo the_field('title_04'); ?></h2>
			</div>
			<div class="row">
				<?php $rows = get_field('card_04' );  if($rows ):    while ( have_rows('card_04') ) : the_row();
						  $index = array_rand( $rows );
						  ?>
				<div class="col-lg col-sm-4 col-6" >
					<div class="sWhatWillLearn__item"> 
						<img src= "<?php echo the_sub_field('image'); ?>" loading="lazy" alt=""> 
						<p   ><?php echo the_sub_field('title'); ?></p>
					</div>
				</div>
				<?php  endwhile;  else :  endif;    ?>

			</div>
			<?php echo the_field('content_04'); ?>
		</div>
	</div>
   <?php return ob_get_clean();

}

	/*
	* *****************************************************
	*/
	add_shortcode('Promocode', 'Promocode_func');
	function Promocode_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
		<div class="sPromocode section">
		<div class="container">
			<div class="sPromocode__inner">
				<img src= "<?php echo $get_template_directory_uri; ?>/img/wallet_monochromatic.svg" loading="lazy" alt="">
				<div class="sPromocode__price-block">
					<?php echo the_field('price'); ?>
				</div>
				<div class="sPromocode__links">
					<a href="#" class="sPromocode__btn"><?php echo the_field('promocode'); ?></a>
					<br>
					<input type="text"class="promo-text d-none " value="<?php echo the_field('promocode_text'); ?>">
					<a href="#" data-promocode="" class="sPromocode__link tooltip-wrap">Copy promocode
						<span class="tooltiptext">Copy to clipboard</span>
					</a>
				</div>
			</div>
				<?php echo the_field('content_05'); ?>
		</div>
	</div>
   <?php return ob_get_clean();

}

	/*
	* *****************************************************
	*/
	add_shortcode('Modules', 'Modules_func');
	function Modules_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
		<div class="sModules section">
		<div class="container">
			<div class="section-title">
				<h2>	<?php echo the_field('title_06'); ?></h2>
			</div>
				<?php echo the_field('list_06'); ?>
		</div>
	</div>
   <?php return ob_get_clean();

}


	/*
	* *****************************************************
	*/
	add_shortcode('Ready', 'Ready_func');
	function Ready_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
	<div class="SReady section  <?php if( get_field('title_02') ) : else: echo  ' SReadyPartnership '?>   <?php endif; ?>"">
		<div class="container">
			<div class="SReady__inner">
					<?php echo the_field('content_05'); ?>
					<?php 
						if( get_field('btn_link-partner') ) :  ?> 
							<a href="<?php echo the_field('btn_link-partner'); ?>" class="SReady__btn" data-fancybox>	<?php echo the_field('button_name07'); ?></a>
							<div id="modal-call"   style="display: none;width:100%;max-width:660px;">
													<?php echo do_shortcode( '[contact-form-7 id="216" title="Форма в модальном окне"]' ); ?>
							</div>
						<?php else:  ?> 
							<a href="<?php echo the_field('sign_up', 'option'); ?>" class="SReady__btn">	<?php echo the_field('button_name07'); ?></a>
						<?php endif;  ?>
				<img src= "	<?php echo the_field('image_07'); ?>" loading="lazy" alt="">
			</div>
		</div>
	</div>
   <?php return ob_get_clean();

}


	/*
	* *****************************************************
	*/
	add_shortcode('PageHead', 'PageHead_func');
	function PageHead_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
	<div class="container landing-body">
      <div class="row">
        <div class="col-xl-8"> 
          <?php echo the_field('content_08'); ?>
        </div>
      </div>
    </div>
   <?php return ob_get_clean();

}


	/*
	* *****************************************************
	*/
	add_shortcode('Content', 'Content_func');
	function Content_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
	<div class="sContent section">
      <div class="container">
        <?php echo the_field('content_09'); ?>
      </div>
    </div>
   <?php return ob_get_clean();

}


	/*
	* *****************************************************
	*/
	add_shortcode('Accordion', 'Accordion_func');
	function Accordion_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
	<div class="SAccordion section">
		<?php $rows = get_field('accordion' );  if($rows ):    while ( have_rows('accordion') ) : the_row();
						  $index = array_rand( $rows );
						  ?>
			<div class="SAccordion-item">
				<div class="SAccordion-item__toggle  toggle-el" >
					<span  ><?php echo the_sub_field('title'); ?></span>
					<div class="SAccordion-item__label"></div>
				</div> 
				<div class="SAccordion-item__block" ><?php echo the_sub_field('text'); ?></div> 
			</div>
			<?php  endwhile;  else :  endif;    ?>
	</div>
   <?php return ob_get_clean();

}


	/*
	* *****************************************************
	*/
	add_shortcode('СontentBlock', 'СontentBlock_func');
	function СontentBlock_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
		<div class="container">
			
		</div>
   <?php return ob_get_clean();

}

