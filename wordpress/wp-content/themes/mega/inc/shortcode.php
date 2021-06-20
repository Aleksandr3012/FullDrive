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
			<div class="headerBlock section" id="headerBlock">
				<div class="headerBlock__ball-cont">
					<div class="headerBlock__ball">
						<!-- picture-->
						<picture class="headerBlock__car-img"> 
							<?php 
								$image = get_field('изображение');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
										echo wp_get_attachment_image( $image, $size );
								}
							?>
						</picture>
						<!-- /picture-->
						<div class="headerBlock__ball-txt"><?php echo the_field('слоган'); ?>
						</div>
						<div class="headerBlock__ball-circle headerBlock__ball-circle--1">
						</div>
						<div class="headerBlock__ball-circle headerBlock__ball-circle--2">
						</div>
						<div class="headerBlock__ball-circle headerBlock__ball-circle--3">
						</div>
					</div>
				</div>
				<div class="container">
					<div class="headerBlock__row row">
						<div class="col-lg-7">
							<div class="section-title">
								<?php echo the_field('текстовое_поле'); ?>
								<a class="section-title__btn link-modal-js" href="#modal-signUp">ЗАПИСАТЬСЯ В ШКОЛУ</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
    return ob_get_clean();
}

add_shortcode('sAbout', 'sAbout_func');
	function sAbout_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sAbout section" id="sAbout">
				<div class="container">
					<div class="sAbout__row row align-items-center">
						<div class="col-auto d-none d-xl-block">
							<!-- picture-->
							<picture class="sAbout__img"> 
								<?php 
								$image = get_field('о_школе_изображение');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
										echo wp_get_attachment_image( $image, $size );
								}
								?>
							</picture>
							<!-- /picture-->
						</div>
						<div class="sAbout__txt-col col">
							<div class="sAbout__back-txt d-none d-md-block"><span>FULL</span>
								<div class="sAbout__bt-drive">DRIVE
								</div>
							</div>
							<div class="section-title">
							<?php echo the_field('о_школе_заглавие'); ?>
							</div>
							<?php echo the_field('о_школе_текст'); ?>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sOffers', 'sOffers_func');
	function sOffers_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sOffers section" id="sOffers">
				<div class="container">
					<div class="section-title">
						<?php echo the_field('специальное_предложение_заглавие'); ?>
					</div>
					<div class="sOffers__row">
						<?php $rows = get_field('специальные_предложения' );  if($rows ):    while ( have_rows('специальные_предложения') ) : the_row();
								$index = array_rand( $rows );
								$image = get_sub_field('изображение_предложения');
								?>
							<div class="sOffers__col">
								<div class="sOffers__imgWrap">
									<img loading="lazy" src="<?php echo $image?>" alt=""/>
									
								</div>
								<div class="sOffers__title"><?php echo the_sub_field('предложение'); ?>
								</div>
								<div class="sOffers__subtitle"><?php echo the_sub_field('описание_предложения'); ?>
								
								</div>
							</div>
						<?php  endwhile;  else :  endif;    ?>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}


add_shortcode('sPrice', 'sPrice_func');
	function sPrice_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
	<div class="sPrice section" id="sPrice">
				<div class="container">
					<div class="tabs tabs--js">
						<div class="tabs__caption">
							<div class="tabs__btn active">АВТОШКОЛА</div>
							<div class="tabs__btn">МОТОШКОЛА</div>
						</div>
						<div class="tabs__wrap">
							<div class="tabs__content active"> 
								<div class="sPrice__row row">
									<div class="col-lg-6">
										<div class="sPrice__item">
												<h3 class="text-primary">ЭКСПРЕСС</h3>
												<?php $rows = get_field('экспресс' );  if($rows ):    while ( have_rows('экспресс') ) : the_row();
												$index = array_rand( $rows );
												?>
													<div class="priceItem">
														<div class="priceItem__courseTime"><?php echo the_sub_field('экспресс_длительность'); ?>
														</div>
														<div class="priceItem__type"><?php echo the_sub_field('экспресс_тип'); ?>
														</div>
														<table> 
															<thead> 
																<tr> 
																	<td>Теория</td>
																	<td><?php echo the_sub_field('экспресс_теория'); ?></td>
																</tr>
															</thead>
															<tbody> 
																<tr> 
																	<td>В моб. приложении</td>
																	<td><?php echo the_sub_field('экспресс_моб_приложение'); ?></td>
																</tr>
																<tr> 
																	<td>
																		<div class="priceItem__price"><?php echo the_sub_field('экспресс_цена'); ?>
																		</div>
																	</td>
																	<td> <a class="priceItem__btn link-modal-js" href="#modal-signUp">ЗАПИСАТЬСЯ</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												<?php  endwhile;  else :  endif;    ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="sPrice__item">
											<h3 class="text-primary">СТАНДАРТ</h3>
											<?php $rows = get_field('стандарт' );  if($rows ):    while ( have_rows('стандарт') ) : the_row();
												$index = array_rand( $rows );
												?>
											<div class="priceItem">
												<div class="priceItem__courseTime"><?php echo the_sub_field('стандарт_длительность'); ?>
												</div>
												<div class="priceItem__type"><?php echo the_sub_field('стандарт_тип'); ?>
												</div>
												<table> 
													<thead> 
														<tr> 
															<td>Теория</td>
															<td><?php echo the_sub_field('стандарт_теория'); ?></td>
														</tr>
													</thead>
													<tbody> 
														<tr> 
															<td>В моб. приложении</td>
															<td><?php echo the_sub_field('стандарт_моб_приложение'); ?></td>
														</tr>
														<tr> 
															<td>
																<div class="priceItem__price"><?php echo the_sub_field('стандарт_цена'); ?>
																</div>
															</td>
															<td> <a class="priceItem__btn link-modal-js" href="#modal-signUp">ЗАПИСАТЬСЯ</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<?php  endwhile;  else :  endif;    ?>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs__content">
								<div class="sPrice__item sPrice__item--lg">
									<div class="row">
									<?php $rows = get_field('мотошкола' );  if($rows ):    while ( have_rows('мотошкола') ) : the_row();
										$index = array_rand( $rows );
										?>
										<div class="col-lg-6">
											<div class="priceItem moto">
												<div class="priceItem__courseTime"><?php echo the_sub_field('мотошкола_длительность'); ?>
												</div>
												<div class="priceItem__type"><?php echo the_sub_field('мотошкола_тип'); ?>
												</div>
												<table> 
													<thead> 
														<tr> 
															<td>Теория</td>
															<td><?php echo the_sub_field('мотошкола_теория'); ?></td>
														</tr>
													</thead>
													<tbody> 
														<tr> 
															<td>В моб. приложении</td>
															<td><?php echo the_sub_field('мотошкола_моб_приложение'); ?></td>
														</tr>
														<tr> 
															<td>
																<div class="priceItem__price"><?php echo the_sub_field('мотошкола_цена'); ?>
																</div>
															</td>
															<td> <a class="priceItem__btn link-modal-js" href="#modal-signUp">ЗАПИСАТЬСЯ</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<?php  endwhile;  else :  endif;    ?>
									</div>
								</div>
								<div class="sPrice__advantages">
									<div class="row"> 
									<?php $rows = get_field('преимущества' );  if($rows ):    while ( have_rows('преимущества') ) : the_row();
										$index = array_rand( $rows );
										?>
											<div class="sPrice__col col-md-4"> 
												<div class="sPrice__check"> 
													<!-- picture-->
													<picture> 
														<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check.webp"/>
														<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check.png" alt="" loading="lazy"/>
													</picture>
													<!-- /picture-->
												</div>
												<div class="sPrice__text"><?php echo the_sub_field('текст_преимущества'); ?>
												</div>
											</div>
											<?php  endwhile;  else :  endif;    ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php return ob_get_clean();
}


add_shortcode('sSteps', 'sSteps_func');
	function sSteps_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sSteps section" id="sSteps">
				<div class="container">
					<div class="section-title">
						
						<?php echo the_field('шаги_заглавие'); ?>
					</div>
					<div class="sSteps__row row">
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--1">
							<div class="sSteps__num sSteps__num sSteps__num--1">1
							</div>
							<div class="sSteps__imgWrap"><img class="res-i" src="<?php echo $get_template_directory_uri;?>/public/img/svg/step-1.svg" alt="" loading="lazy"/>
							</div>
							<div>
								<?php echo the_field('первый_шаг'); ?>
								
							</div>
						</div>
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--2">
							<div class="sSteps__num sSteps__num sSteps__num--2">2
							</div>
							<div class="sSteps__imgWrap"><img class="res-i" src="<?php echo $get_template_directory_uri;?>/public/img/svg/step-2.svg" alt="" loading="lazy"/>
							</div>
							<div>
							<?php echo the_field('второй_шаг'); ?>
							</div>
						</div>
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--3">
							<div class="sSteps__num sSteps__num sSteps__num--3">3
							</div>
							<div class="sSteps__imgWrap"><img class="res-i" src="<?php echo $get_template_directory_uri;?>/public/img/svg/step-3.svg" alt="" loading="lazy"/>
							</div>
							<div>
							<?php echo the_field('третий_шаг'); ?>
							</div>
						</div>
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--4">
							<div class="sSteps__num sSteps__num sSteps__num--4">4
							</div>
							<div class="sSteps__imgWrap"><img class="res-i" src="<?php echo $get_template_directory_uri;?>/public/img/svg/step-4.svg" alt="" loading="lazy"/>
							</div>
							<div>
								<?php echo the_field('четвертый_шаг'); ?>
							</div>
						</div>
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--5">
							<div class="sSteps__num sSteps__num sSteps__num--5">5
							</div>
							<div class="sSteps__imgWrap"><img class="res-i" src="<?php echo $get_template_directory_uri;?>/public/img/svg/step-5.svg" alt="" loading="lazy"/>
							</div>
							<div>
								<?php echo the_field('пятый_шаг'); ?>
							</div>
						</div>
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--6">
							<div class="sSteps__num sSteps__num sSteps__num--6">6
							</div>
							<div class="sSteps__imgWrap"><img class="res-i" src="<?php echo $get_template_directory_uri;?>/public/img/svg/step-6.svg" alt="" loading="lazy"/>
							</div>
							<div>
								<?php echo the_field('шестой_шаг'); ?>
							</div>
						</div>
						<div class="sSteps__col col-sm-6 sSteps__col sSteps__col--7">
							<div class="sSteps__num sSteps__num sSteps__num--7">7
							</div>
							<div class="sSteps__imgWrap sSteps__imgWrap--pulse">
								<!-- picture-->
								<picture> 
									<?php 
									$image = get_field('седьмой_шаг_изображение');
									$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
											echo wp_get_attachment_image( $image, $size );
									}
									?>
								</picture>
								<!-- /picture-->
							</div>
							<div>
								<?php echo the_field('седьмой_шаг'); ?>
							</div>
						</div>
						<div class="sSteps__background-text">7 ШАГОВ
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sRequirements', 'sRequirements_func');
	function sRequirements_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sRequirements section" id="sRequirements">
				<div class="container">
					<div class="sRequirements__row row">
						<div class="col-xl-9">
							<div class="sRequirements__block"> 
								<div class="sRequirements__blockInner">
									<div class="section-title">
									<?php echo the_field('для_зачисления_заглавие'); ?>
										
									</div>
									<div class="sRequirements__roww row"> 
										<div class="sRequirements__col col-6 col-md-3"> 
											<div class="sRequirements__imgWrap sRequirements__imgWrap sRequirements__imgWrap--1">
												<!-- picture-->
												<picture> 
												<?php 
												$image = get_field('требование_1_картинка');
												$size = 'large'; // (thumbnail, medium, large, full or custom size)
												if( $image ) {
														echo wp_get_attachment_image( $image, $size );
												}
												?>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sRequirements__txt"><?php echo the_field('требование_1'); ?>
											</div>
										</div>
										<div class="sRequirements__col col-6 col-md-3"> 
											<div class="sRequirements__imgWrap sRequirements__imgWrap sRequirements__imgWrap--2">
												<!-- picture-->
												<picture> 
												<?php 
												$image = get_field('требование_2_картинка');
												$size = 'full'; // (thumbnail, medium, large, full or custom size)
												if( $image ) {
														echo wp_get_attachment_image( $image, $size );
												}
												?>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sRequirements__txt"><?php echo the_field('требование_2'); ?></div>
										</div>
										<div class="sRequirements__col col-6 col-md-3"> 
											<div class="sRequirements__imgWrap sRequirements__imgWrap sRequirements__imgWrap--3">
												<!-- picture-->
												<picture> 
													<?php 
														$image = get_field('медсправка');
														$size = 'full'; // (thumbnail, medium, large, full or custom size)
														if( $image ) {
																echo wp_get_attachment_image( $image, $size );
														}
														?>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sRequirements__txt"><?php echo the_field('требование_3'); ?></div>
										</div>
										<div class="sRequirements__col col-6 col-md-3"> 
											<div class="sRequirements__imgWrap sRequirements__imgWrap sRequirements__imgWrap--4">
												<!-- picture-->
												<picture> 
												<?php 
												$image = get_field('требование_4_картинка');
												$size = 'full'; // (thumbnail, medium, large, full or custom size)
												if( $image ) {
														echo wp_get_attachment_image( $image, $size );
												}
												?>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sRequirements__txt"><?php echo the_field('требование_4'); ?></div>
										</div>
									</div>
								</div>
								<div class="sRequirements__whiteBlock"> 
									<div class="sRequirements__medicalCertificate">
										<!-- picture-->
										<picture> 
											<?php 
											$image = get_field('медсправка');
											$size = 'full'; // (thumbnail, medium, large, full or custom size)
											if( $image ) {
													echo wp_get_attachment_image( $image, $size );
											}
											?>
										</picture>
										<!-- /picture-->
									</div>
									<div class="sRequirements__whiteBlockInner">
										<?php echo the_field('нет_справки'); ?>
										<a class="sRequirements__btn link-modal-js" href="#modal-signUp">ЗАПИСАТЬСЯ В АВТОШКОЛУ</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl">
							<div class="row"> 
								<div class="col-md col-xl-12">
									<div class="sRequirements__checkItem"> 
										<div class="sRequirements__checkImg">
											<!-- picture-->
											<picture> 
												<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/>
												<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
											</picture>
											<!-- /picture-->
										</div>
										<div class="sRequirements__textWrap"> 
											<?php echo the_field('преимущество_1'); ?>
										</div>
									</div>
								</div>
								<div class="col-md col-xl-12">
									<div class="sRequirements__checkItem"> 
										<div class="sRequirements__checkImg">
											<!-- picture-->
											<picture> 
												<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
											</picture>
											<!-- /picture-->
										</div>
										<div class="sRequirements__textWrap"> 
											<?php echo the_field('преимущество_2'); ?>
										</div>
									</div>
								</div>
								<div class="col-md col-xl-12">
									<div class="sRequirements__checkItem"> 
										<div class="sRequirements__checkImg">
											<!-- picture-->
											<picture> 
												<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
											</picture>
											<!-- /picture-->
										</div>
										<div class="sRequirements__textWrap"> 
											<?php echo the_field('преимущество_3'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sInstructors', 'sInstructors_func');
	function sInstructors_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sInstructors section" id="sInstructors">
				<div class="container">
					<div class="sInstructors__titleRow row"> 
						<div class="col-lg-7">
							<div class="section-title">
								<h2>ПРОФЕССИОНАЛЬНЫЕ И ВЕЖЛИВЫЕ ИНСТРУКТОРЫ</h2>
							</div>
						</div>
						<div class="col"> 
							<div class="row"> 
										<div class="col-sm">
											<div class="row">
												<div class="col-auto col-xl-12">
													<div class="sInstructors__check"> 
														<!-- picture-->
														<picture> 
															<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
														</picture>
														<!-- /picture-->
													</div>
												</div>
												<div class="col"> 
													<h6>Приятные в&nbsp;общении доброжелательные люди</h6>
												</div>
											</div>
										</div>
										<div class="col-sm">
											<div class="row">
												<div class="col-auto col-xl-12">
													<div class="sInstructors__check"> 
														<!-- picture-->
														<picture> 
															<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
														</picture>
														<!-- /picture-->
													</div>
												</div>
												<div class="col"> 
													<h6>Мастера вождения с&nbsp;большим опытом</h6>
												</div>
											</div>
										</div>
										<div class="col-sm">
											<div class="row">
												<div class="col-auto col-xl-12">
													<div class="sInstructors__check"> 
														<!-- picture-->
														<picture> 
															<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
														</picture>
														<!-- /picture-->
													</div>
												</div>
												<div class="col"> 
													<h6>Индивидуальный подход к&nbsp;каждому ученику</h6>
												</div>
											</div>
										</div>
							</div>
						</div>
					</div>
					<div class="sInstructors__row row">
						<?php $rows = get_field('карточка_инструктора' );  if($rows ):    while ( have_rows('карточка_инструктора') ) : the_row();
								$index = array_rand( $rows );
								$image = get_sub_field('фото');
								?>
							<div class="sInstructors__col col-sm-6 col-lg-4">
								<div class="sInstructors__item"> 
									<div class="sInstructors__imgWrap"> 
										<!-- picture-->
										<picture>
											<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
										</picture>
										<!-- /picture-->
									</div>
									<div class="sInstructors__textWrap">
										<div class="sInstructors__name"><?php echo the_sub_field('заглавие'); ?></span>
										</div>
										<div class="sInstructors__line">Год рождения: <strong><?php echo the_sub_field('год'); ?></strong>
										</div>
										<div class="sInstructors__line">Стаж вождения: <strong><?php echo the_sub_field('стаж'); ?></strong>
										</div>
										<div class="sInstructors__line">Специализация: <strong><?php echo the_sub_field('специализация'); ?></strong>
										</div>
									</div>
								</div>
							</div>
						<?php  endwhile;  else :  endif;    ?>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sValuableSkills', 'sValuableSkills_func');
	function sValuableSkills_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sValuableSkills section" id="sValuableSkills">
				<div class="container">
					<div class="section-title">
						<?php echo the_field('для_зачисления_заглавие'); ?>
					</div>
					<div class="row">
						<?php $rows = get_field('блок_требований' );  if($rows ):    while ( have_rows('блок_требований') ) : the_row();
								$index = array_rand( $rows );
								?>
								<div class="sValuableSkills__col col-lg-4"> 
									<div class="sValuableSkills__item"> 
										<div class="sValuableSkills__iconWrap"> 
											<!-- picture-->
											<picture> 
												<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
											</picture>
											<!-- /picture-->
										</div>
										<div class="sValuableSkills__text"><?php echo the_sub_field('требование'); ?>
										</div>
									</div>
								</div>
							<?php  endwhile;  else :  endif;    ?>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sOnline', 'sOnline_func');
	function sOnline_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sOnline section" id="sOnline">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="section-title">
								<?php echo the_field('онлайн_заглавие'); ?>
							</div>
							<?php echo the_field('онлайн_текст'); ?>
							<a class="sOnline__btn link-modal-js" href="#modal-signUp">НАЧАТЬ ОБУЧЕНИЕ ПРЯМО СЕЙЧАС</a>
						</div>
						<div class="col-lg order-lg-first">
							<div class="sOnline__imgWrap"> 
								<img class="res-i lg" src="<?php echo $get_template_directory_uri;?>/public/img/svg/online.svg" alt="" loading="lazy"/>
								<img class="res-i sm" src="<?php echo $get_template_directory_uri;?>/public/img/svg/online-sm.svg" alt="" loading="lazy"/>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sCarPark', 'sCarPark_func');
	function sCarPark_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sCarPark section" id="sCarPark">
				<div class="sCarPark__bgText">АВТОПАРК
				</div>
				<div class="container">
					<div class="sCarPark__row row">
						<div class="col-lg-6">
							<div class="section-title">
							<?php echo the_field('автопарк_заглавие'); ?>
							</div>
						</div>
						<div class="col-lg">
							<div class="row"> 
										<div class="sCarPark__col col-md-6">
											<div class="sCarPark__iconWrap"> 
												<!-- picture-->
												<picture> 
													<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/>
													<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sCarPark__txt">
												<?php echo the_field('автопарк_преимущество_1'); ?>
											</div>
										</div>
										<div class="sCarPark__col col-md-6">
											<div class="sCarPark__iconWrap"> 
												<!-- picture-->
												<picture> 
													<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/>
													<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sCarPark__txt">
												<?php echo the_field('автопарк_преимущество_2'); ?>
											</div>
										</div>
										<div class="sCarPark__col col-md-6">
											<div class="sCarPark__iconWrap"> 
												<!-- picture-->
												<picture> 
													<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/>
													<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sCarPark__txt">
												<?php echo the_field('автопарк_преимущество_3'); ?>
												
											</div>
										</div>
										<div class="sCarPark__col col-md-6">
											<div class="sCarPark__iconWrap"> 
												<!-- picture-->
												<picture> 
													<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/>
													<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sCarPark__txt">
												<?php echo the_field('автопарк_преимущество_4'); ?>
											</div>
										</div>
							</div>
						</div>
					</div>
					<div class="sCarPark__slider sCarPark__slider--js">
						<div class="swiper-wrapper">
							<?php $rows = get_field('слайдер_автопарка' );  if($rows ):    while ( have_rows('слайдер_автопарка') ) : the_row();
								$index = array_rand( $rows );
								$image = get_sub_field('фото_автопарка');
								?>
								<div class="swiper-slide">
									<div class="sCarPark__imgWrap"> 
										<picture>
											<?php echo wp_get_attachment_image( $image, 'full' ); ?>
										</picture>
									</div>
								</div>
							<?php  endwhile;  else :  endif; ?>

						</div>
						<div class="swiper-button-hand swiper-button-hand-prev swiper-button-prev">
							<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
							</svg>
						</div>
						<div class="swiper-button-hand swiper-button-hand-next swiper-button-next">
							<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
							</svg>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sCertificate', 'sCertificate_func');
	function sCertificate_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sCertificate section" id="sCertificate">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="section-title">
								<h2><?php echo the_field('сертификат_заголовок'); ?></h2>
							</div>
							<?php echo the_field('сертификат_текст'); ?>
							<a class="sCertificate__btn link-modal-js" href="#modal-certificate">КУПИТЬ ПОДАРОЧНЫЙ СЕРТИФИКАТ</a>
							<p><?php echo the_field('сертификат_подтекст'); ?></p>
						</div>
						<div class="col"> 
							<div class="sCertificate__imgWrap"> 
								<!-- picture-->
								<picture> 
								<?php 
								$image = get_field('подарочный_сертификат');
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
										echo wp_get_attachment_image( $image, $size );
								}
								?>
								</picture>
								<!-- /picture-->
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sToHome', 'sToHome_func');
	function sToHome_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sToHome section" id="sToHome">
				<div class="container">
					<div class="sToHome__row row">
						<div class="col-md-6 order-md-last">
							<?php echo the_field('подача_авто_текст'); ?>
							<div class="sToHome__btnRow row align-items-center">
								<div class="col-auto"><a class="sToHome__btn link-modal-js" href="#modal-signUp">ОСТАВИТЬ ЗАЯВКУ</a>
								</div>
								<div class="col">
									<div class="sToHome__price">Стоимость: <strong class="text-primary"><?php echo the_field('подача_авто_стоимость'); ?></strong>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="sToHome__imgWrap"> <img class="start" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/start.png" alt="" loading="lazy"/><img class="road" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/road.png" alt="" loading="lazy"/><img class="finish" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/finish.png" alt="" loading="lazy"/><img class="car" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/car-sm.png" alt="" loading="lazy"/><img class="check" src="<?php echo $get_template_directory_uri;?>/public/img/svg/check.svg" alt="" loading="lazy"/>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sMotorcycles', 'sMotorcycles_func');
	function sMotorcycles_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sMotorcycles section" id="sMotorcycles">
				<div class="sMotorcycles__txtBg">МОТОЦИКЛЫ
				</div>
				<div class="container">
					<div class="sMotorcycles__row row">
						<div class="col-lg-6">
							<div class="section-title">
								<?php echo the_field('мотопарк_текст'); ?>
							</div>
						</div>
						<div class="col-lg">
							<div class="row"> 
								<?php $rows = get_field('преимущества_мотопарка' );  if($rows ):    while ( have_rows('преимущества_мотопарка') ) : the_row();
									$index = array_rand( $rows );
									?>
										<div class="sMotorcycles__col col-md-6">
											<div class="sMotorcycles__iconWrap"> 
												<!-- picture-->
												<picture> 
													<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/check-green.webp"/>
													<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/check-green.png" alt="" loading="lazy"/>
												</picture>
												<!-- /picture-->
											</div>
											<div class="sMotorcycles__txt"><?php echo the_sub_field('преимущества_мотопарка_текст'); ?>
											</div>
										</div>
										<?php  endwhile;  else :  endif; ?>
							</div>
						</div>
					</div>
					<div class="sMotorcycles__slider sMotorcycles__slider--js">
						<div class="swiper-wrapper">
						<?php $rows = get_field('мотопарк' );  if($rows ):    while ( have_rows('мотопарк') ) : the_row();
									$index = array_rand( $rows );
									$image = get_sub_field('мотопарк_фото');
									?>
								<div class="swiper-slide">
									<div class="sMotorcycles__item"> 
										<div class="sMotorcycles__imgWrap">
											<!-- picture-->
											<picture> 
												<?php echo wp_get_attachment_image( $image, 'large' ); ?>
											</picture>
											<!-- /picture-->
										</div>
										<div class="sMotorcycles__text"><?php echo the_sub_field('название_мотоцикла'); ?>
										</div>
									</div>
								</div>
							<?php  endwhile;  else :  endif; ?>

						</div>
						<div class="swiper-button-hand swiper-button-hand-prev swiper-button-prev">
							<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
							</svg>
						</div>
						<div class="swiper-button-hand swiper-button-hand-next swiper-button-next">
							<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
							</svg>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sMap', 'sMap_func');
	function sMap_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sMap section" id="sMap">
				<div class="container">
					<div class="sMap__bgTxt">ПЛОЩАДКИ
					</div>
					<div class="section-title">
						<?php echo the_field('площадки_заглавие'); ?>
					</div>
					<div class="row">
						<div class="sMap__col col order-xl-last">
							<div class="sMap__map"> 
								<!-- <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8c13deaaf31ac83dde61d920c8667d3330256fd0323b6815e81ae439c6313c3f&amp;width=100%;height=100%;lang=ru_RU&amp;scroll=true"></script>-->
								<iframe src="https://yandex.ru/map-widget/v1/-/CCU44VvrhA" width="100%" height="100%" frameborder="0" allowfullscreen="true" style="position:relative;border:none;"></iframe>
							</div>
						</div>
						<div class="col-xl-4 order-xl-first"> 
							<div class="row">
								<div class="col-sm-6 col-xl-12">
									<div class="sMap__row row"> 
										<div class="col-auto">
											<div class="sMap__dot bg-primary">
											</div>
										</div>
										<div class="col">
											<?php echo the_field('автодромы'); ?>
											
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-xl-12">
									<div class="sMap__row row"> 
										<div class="col-auto"> 
											<div class="sMap__dot bg-dark">
											</div>
										</div>
										<div class="col">
											<?php echo the_field('мотодромы'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sMobileApp', 'sMobileApp_func');
	function sMobileApp_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sMobileApp section" id="sMobileApp">
				<div class="container">
					<div class="section-title">
						<?php echo the_field('приложение_заглавие'); ?>
						
					</div>
					<div class="row">
						<div class="col">
							<h3><?php echo the_field('возможности'); ?></h3>
							<ul> 
								<?php $rows = get_field('возможности_приложения' );  if($rows ):    while ( have_rows('возможности_приложения') ) : the_row();
									$index = array_rand( $rows );
									?>
												<li> 
													<div>
														<div class="sMobileApp__listTitle"><?php echo the_sub_field('возможности_приложения_заголовок'); ?>
														</div>
														<p><?php echo the_sub_field('возможности_приложения_текст'); ?></p>
													</div>
												</li>
									<?php  endwhile;  else :  endif;    ?>
							</ul>
						</div>
						<div class="sMobileApp__col col-lg-5 order-lg-first">
							<div class="sMobileApp__imgWrap"> 
								<!-- picture-->
								<picture> 
									<source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/mobileApp.webp"/><img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/mobileApp.png" alt="" loading="lazy"/>
								</picture>
								<!-- /picture-->
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}


add_shortcode('sReviews', 'sReviews_func');
	function sReviews_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sReviews section" id="sReviews">
				<div class="container">
					<div class="section-title">
						<?php echo the_field('ученики_о_школе'); ?>
					</div>
					<div class="tabs tabs--js">
						<div class="tabs__caption">
							<div class="tabs__btn active">ТЕКСТОВЫЕ ОТЗЫВЫ</div>
							<div class="tabs__btn">ВИДЕО ОТЗЫВЫ</div>
						</div>
						<div class="tabs__wrap">
							<div class="tabs__content active"> 
								<div class="sReviews__slider sReviews__slider--js swiper-container">
									<div class="swiper-wrapper">
										<?php $rows = get_field('текстовые_отзывы' );  if($rows ):    while ( have_rows('текстовые_отзывы') ) : the_row();
												$index = array_rand( $rows );
												?>
												<div class="swiper-slide">
													<div class="txtBlock"> 
														<div class="txtBlock__name text-center"><?php echo the_sub_field('имя'); ?>
														</div>
														<p><?php echo the_sub_field('отзыв'); ?></p>
														<div class="txtBlock__date"><?php echo the_sub_field('дата'); ?>
														</div>
													</div>
												</div>
										<?php  endwhile;  else :  endif;    ?>
									</div>
									
								</div>
								<div class="swiper-button-hand swiper-button-hand-prev swiper-button-prev">
									<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
									</svg>
								</div>
								<div class="swiper-button-hand swiper-button-hand-next swiper-button-next">
									<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
									</svg>
								</div>
							</div>
							<div class="tabs__content tabs__content--video">
								<div class="sReviews__sliderVideo sReviews__sliderVideo--js swiper-container">
									<div class="swiper-wrapper">
									<?php $rows = get_field('видео_отзывы' );  if($rows ):    while ( have_rows('видео_отзывы') ) : the_row();
										$index = array_rand( $rows );
										?>
										<div class="swiper-slide">
											<a class="sReviews__video" href="https://www.youtube.com/embed/<?php echo the_sub_field('id_видео'); ?>" data-fancybox="video"> 
												<img class="res-i" src="https://img.youtube.com/vi/<?php echo the_sub_field('id_видео'); ?>/hqdefault.jpg" alt="" loading="lazy"/>
										</a>
										</div>
									<?php  endwhile;  else :  endif;    ?>
									</div>
								</div>
								<div class="swiper-button-hand swiper-button-hand-prev swiper-button-prev">
									<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
									</svg>
								</div>
								<div class="swiper-button-hand swiper-button-hand-next swiper-button-next">
									<svg style="display: block" viewBox="0 0 11.3 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="1" points="0.5,0.5 10.5,10.5 0.5,20.5"></polyline>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sTimer', 'sTimer_func');
	function sTimer_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sTimer section" id="sTimer">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="sTimer__block"> 
								<?php echo the_field('таймер_текст'); ?>
								
								<div class="time__block">
									<div class="idvd_timer autostart" data-redirect_url="" data-duration_hours="<?php echo the_field('таймер_значение'); ?>"></div>
								</div><a class="sTimer__btn link-modal-js" href="#modal-signUp">ЗАПИСАТЬСЯ В ШКОЛУ ПРЯМО СЕЙЧАС</a>
							</div>
						</div>
						<div class="sTimer__col col d-none d-lg-flex"> 
							<div class="sTimer__imgWrap"> 
								<!-- picture-->
								<picture> 
								<?php 
									$image = get_field('таймер_изображение');
									$size = 'large'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
											echo wp_get_attachment_image( $image, $size );
									}
									?>
									<!-- <source type="image/webp" srcset="<?php echo $get_template_directory_uri;?>/public/img/@2x/webp/keys.webp"/>
									<img src="<?php echo $get_template_directory_uri;?>/public/img/@2x/keys.png" alt="" loading="lazy"/> -->
								</picture>
								<!-- /picture-->
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php return ob_get_clean();
}


add_shortcode('sQuestions', 'sQuestions_func');
	function sQuestions_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sQuestions section" id="sQuestions">
				<div class="container">
					<div class="section-title">
						<?php echo the_field('вопросы_заглавие'); ?>
					</div>
						<?php $rows = get_field('блок_вопросов' );  if($rows ):    while ( have_rows('блок_вопросов') ) : the_row();
							$index = array_rand( $rows );
							?>
						<div class="accardion accardion--js"> 
							<div class="accardion__head accardion__head--js"><?php echo the_sub_field('вопрос'); ?>
								<div class="accardion__iconWrap">
									<svg class="icon" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g stroke="none" stroke-width="1px" fill="none" fill-rule="evenodd" stroke-linecap="square">
											<g transform="translate(1.000000, 1.000000)" stroke="#ffffff">
												<path d="M0,11 L22,11"></path>
												<path d="M11,0 L11,22"></path>
											</g>
										</g>
									</svg>
								</div>
							</div>
							<div class="accardion__content accardion__content--js"><?php echo the_sub_field('ответ'); ?></div>
						</div>
						<?php  endwhile;  else :  endif;    ?>
				</div>
			</section>
		<?php return ob_get_clean();
}

add_shortcode('sContact', 'sContact_func');
	function sContact_func()
	{
		 global $get_template_directory_uri, $delay;
		 ob_start();
	 
		 ?>
			<section class="sContact section" id="sContact">
				<div class="container">
					<div class="section-title">
						<h2>КОНТАКТЫ</h2>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg"> 
							<div class="sContact__title">Телефон
							</div><a class="sContact__subtitle" href="tel:8(812)9856005">8 (812) 985-60-05</a>
							<div><a class="sContact__link link-modal-js" href="#modal-call">Обратный звонок</a>
							</div>
						</div>
						<div class="col-md-6 col-lg"> 
							<div class="sContact__title">Режим работы
							</div>
							<div class="sContact__subtitle">пн-вс 09.00-20.00
							</div>
						</div>
						<div class="col-md-6 col-lg"> 
							<div class="sContact__title">Электронная почта
							</div><a class="sContact__subtitle" href="mailto:fulldrives@yandex.ru">fulldrives@yandex.ru</a>
						</div>
					</div>
				</div>
			</section> 
		<?php return ob_get_clean();
}