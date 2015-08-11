<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>

<!-- Footer Section Start -->
<footer id="footer">
    <div class="container">
        <div class="copyright text-center">
			<?$APPLICATION->IncludeComponent( 
				"bitrix:main.include", 
				"", 
				Array( 
					"AREA_FILE_SHOW" => "file", 
					"PATH" => SITE_TEMPLATE_PATH."/include/copyright.php", 
					"EDIT_TEMPLATE" => "" 
				), 
				false,
				array('HIDE_ICONS' => 'Y')
			);?>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Scroll Top -->
<div class="scroll-top" data-spy="affix" data-offset-top="300">
    <a href="#header"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Scroll End -->

</body>
</html>