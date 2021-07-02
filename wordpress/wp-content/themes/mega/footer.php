<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mega
 */
global $get_template_directory_uri, $delay;
		 ob_start();
		 $tel = get_field('phone', 'option');
		$tel_str = str_replace(" ","", $tel);  
?>
			<footer class="footer">
				<div class="container">
					<div class="row"> 
						<div class="col-md-auto"> <a class="footer__logo" href="/"><img src="<?php echo $get_template_directory_uri;?>/public/img/svg/logo.svg" alt="Логотип" loading="lazy"/></a>
						</div>
						<div class="col-md-auto"> <a class="footer__version" href="?special_version=Y"><img src="<?php echo $get_template_directory_uri;?>/public/img/svg/eye.svg" alt="Версия для слабовидящих" title="Версия для слабовидящих"/></a>
						</div>
						<div class="col-md"> 
							<div class="text-center">
								<div class="footer__txt">Создание сайта
								</div><a class="footer__txt link-modal-js" href="#modal-polite">Политика конфиденциальности</a>
							</div>
						</div>
						<div class="col-md"> 
							<div class="footer__rBlock"> 
								<div class="footer__txt">Лицензия на образовательную деятельность<br> №275-р от 25.02.2011
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!--  start modals-->
		<div class="modal-win" id="modal-call" style="display: none">
		<?php echo do_shortcode( '[contact-form-7 id="242" title="Форма"]' ); ?>

		</div>
		<!-- #modal-call-->
		<div class="modal-win" id="modal-certificate" style="display: none">
			<div class="form-wrap">
				<?php echo do_shortcode( '[contact-form-7 id="243" title="Заказать подарочный сертификат"]' ); ?>
			</div>
		</div>
		<!-- #modal-call-->
		<div class="modal-win" id="modal-signUp" style="display: none">
			<?php echo do_shortcode( '[contact-form-7 id="244" title="Записаться в школу"]' ); ?>

		</div>
		<!-- #modal-signUp-->
		<div class="modal-win" id="modal-polite" style="display: none">
			<?php echo the_field('политика_в_отношении_обработки_персональных_данных'); ?>
		</div>

<?php wp_footer(); ?>
 
</body>
</html>
