<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Startup - Простой и динамичный шаблон для 1С-Битрикс Стартапа или Сервиса");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "slide_1",
        "AREA_FILE_RECURSIVE" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "sect",
        "EDIT_TEMPLATE" => "",
        "AREA_FILE_SUFFIX" => "slide_2",
        "AREA_FILE_RECURSIVE" => "Y"
    )
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "about-preson-slider",
    array(
        "COMPONENT_TEMPLATE" => "about-preson-slider",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_PERSONS",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            0 => "EMAIL",
            1 => "POSITION",
            2 => "RESUME_LINK",
            3 => "RESUME",
        ),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "NY",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "about",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SLIDER_ABOUT_TITLE" => "<span>О нас</span>",
        "BACKGROUND_IMAGE" => "/local/templates/startup/components/bitrix/news.list/about-preson-slider/img/bg-1.jpg",
        "PADDING_TOP" => "N"
    ),
    false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "portfolio-list",
    array(
        "COMPONENT_TEMPLATE" => "portfolio-list",
        "IBLOCK_TYPE" => "startup",
        "IBLOCK_ID" => "STARTUP_PORTFOLIO",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "ALTERNATIV_URL",
            2 => "TITILE2",
            3 => "FILTER",
            4 => "",
        ),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "SLIDER_ABOUT_TITLE" => "<span>Наше</span> портфолио",
        "PADDING_TOP" => "N",
        "BACKGROUND_IMAGE" => "/local/templates/startup/components/bitrix/news.list/about-preson-slider/img/bg-1.jpg",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "DETAIL_PICTURE",
            1 => "",
        ),
        "DETAIL_URL" => "",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "VIEW_JSFILTER" => "Y"
    ),
    false
);?>



    <!-- Start Why chose us Section -->
    <section id="why-chose">
        <div class="container">
            <h1 class="section-title wow fadeIn" data-wow-delay=".2s"><span>Why</span> Chose</h1>
            <div class="row">
                <div class="col-md-4 wow fadeInLeft" data-wow-offset="10" data-wow-delay="0.5s">
                    <div class="content-left">
                        <div class="box-left">
								<span class="icon">
									<i class="fa fa-laptop"></i>
								</span>
                            <div class="content">
                                <h4>Respansive Layout</h4>
                                <p>Lorem it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                        <br>
                        <div class="box-left">
								<span class="icon">
									<i class="fa fa-cog"></i>
								</span>
                            <div class="content">
                                <h4>Clean Code</h4>
                                <p>Lorem it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                        <br>
                        <div class="box-left">
								<span class="icon">
									<i class="fa fa-random"></i>
								</span>
                            <div class="content">
                                <h4>Cross Browser</h4>
                                <p>Lorem it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-offset="10"  data-wow-delay="0.3s">
                    <div class="showcase-box">
                        <img src="assets/img/why.png" alt="">
                    </div>
                </div>
                <div class="col-md-4 wow fadeInRight" data-wow-offset="10" data-wow-delay="0.5s">
                    <div class="content-right">
                        <div class="box-right">
								<span class="icon">
									<i class="fa fa-umbrella"></i>
								</span>
                            <div class="content">
                                <h4>Premium Features</h4>
                                <p>Lorem it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                        <br>
                        <div class="box-right">
								<span class="icon">
									<i class="fa fa-heart"></i>
								</span>
                            <div class="content">
                                <h4>Modern Design</h4>
                                <p>Lorem it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                        <br>
                        <div class="box-right">
								<span class="icon">
									<i class="fa fa-comments"></i>
								</span>
                            <div class="content">
                                <h4>24/7 Support</h4>
                                <p>Lorem it has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why chose us Section  -->

    <!-- pricing-table Section -->
    <section id="pricing">
        <div class="container">
            <h1 class="section-title wow fadeIn" data-wow-delay=".2s"><span>Pricing</span> Table</h1>
            <div class="row">
                <div class="col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay="0.2s">
                    <div class="table text-center">
                        <div class="pricing-header">
                            <p class="price-quality">Simple</p>
                        </div>
                        <div class="price">
                            <p class="price-value">$29</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>5GB Disk Space</li>
                                <li>500GB Monthly Bandwidth</li>
                                <li>10 Email Accounts</li>
                                <li>Unlimited Subdomains</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-common">Sing Up</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay="0.4s">
                    <div class="table text-center">
                        <div class="pricing-header">
                            <p class="price-quality">Standard</p>
                        </div>
                        <div class="price">
                            <p class="price-value">$49</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>5GB Disk Space</li>
                                <li>500GB Monthly Bandwidth</li>
                                <li>10 Email Accounts</li>
                                <li>Unlimited Subdomains</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-common">Sing Up</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay="0.6s">
                    <div class="table text-center">
                        <div class="pricing-header">
                            <p class="price-quality">Ultimate</p>
                        </div>
                        <div class="price">
                            <p class="price-value">$79</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>5GB Disk Space</li>
                                <li>500GB Monthly Bandwidth</li>
                                <li>10 Email Accounts</li>
                                <li>Unlimited Subdomains</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-common">Sing Up</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow bounceIn" data-wow-offset="10" data-wow-delay="0.8s">
                    <div class="table text-center">
                        <div class="pricing-header">
                            <p class="price-quality">Basic</p>
                        </div>
                        <div class="price">
                            <p class="price-value">$09</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>5GB Disk Space</li>
                                <li>500GB Monthly Bandwidth</li>
                                <li>10 Email Accounts</li>
                                <li>Unlimited Subdomains</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-common">Sing Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End pricing-table Section-->

    <!-- Start Blog Section -->
    <section id="blog">
        <div class="container">
            <h1 class="section-title wow fadeIn" data-wow-delay=".2s"><span>Our</span> Blog</h1>
            <div class="row">
                <div id="blog-slider" class="owl-carousel owl-theme">
                    <div class="item wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="blog-wrapper">
                            <div id="gallery" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="assets/img/blog/blog-01.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="assets/img/blog/slider1.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="assets/img/blog/slider2.jpg" alt="">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#gallery" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                <a class="right carousel-control" href="#gallery" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                            </div>
                            <div class="content">
                                <h3>Blog Post With Slide</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                <a href="#" class="redmore">Read More +</a>
                            </div>
                            <div class="blog-footer">
                                <p>published: 22 january 2014</p>
                                <span><i class="fa fa-comments"></i>30 Comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-wrapper">
                            <img src="assets/img/blog/blog-02.jpg" alt="">
                            <div class="content">
                                <h3>Featured Image Blog Post</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                <a href="#" class="redmore">Read More +</a>
                            </div>
                            <div class="blog-footer">
                                <p>published: 22 january 2014</p>
                                <span><i class="fa fa-comments"></i>30 Comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInRight" data-wow-delay="0.4s">
                        <div class="blog-wrapper">
                            <div class="video">
                                <iframe src="//player.vimeo.com/video/117934677?color=ea6a47title=0byline=0portrait=0badge=0" width="365" height="268" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                            <div class="content">
                                <h3>Video BLog Post</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                <a href="#" class="redmore">Read More +</a>
                            </div>
                            <div class="blog-footer">
                                <p>published: 22 january 2014</p>
                                <span><i class="fa fa-comments"></i>30 Comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeIn">
                        <div class="blog-wrapper">
                            <img src="assets/img/blog/blog-04.jpg" alt="">
                            <div class="content">
                                <h3>Blog Post With Slide</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                <a href="#" class="redmore">Read More +</a>
                            </div>
                            <div class="blog-footer">
                                <p>published: 22 january 2014</p>
                                <span><i class="fa fa-comments"></i>30 Comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-wrapper">
                            <img src="assets/img/blog/blog-05.jpg" alt="">
                            <div class="content">
                                <h3>Blog Post With Slide</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                <a href="#" class="redmore">Read More +</a>
                            </div>
                            <div class="blog-footer">
                                <p>published: 22 january 2014</p>
                                <span><i class="fa fa-comments"></i>30 Comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-wrapper">
                            <img src="assets/img/blog/blog-06.jpg" alt="">
                            <div class="content">
                                <h3>Blog Post With Slide</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                <a href="#" class="redmore">Read More +</a>
                            </div>
                            <div class="blog-footer">
                                <p>published: 22 january 2014</p>
                                <span><i class="fa fa-comments"></i>30 Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->

    <!-- Start Team Section -->
    <section id="team">
        <div class="container">
            <h1 class="section-title wow fadeIn" data-wow-delay=".2s"><span>Our</span> Team</h1>
            <div class="row">

                <div class="col-sm-6 col-md-3 wow flipInY" data-wow-offset="10" data-wow-delay="0.2s">
                    <div class="item-square">
                        <div class="face">
                            <img src="assets/img/team-member/team-02.jpg" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h3>Musharrof Chy</h3>
                                <p>Frontend Developer</p>
                            </div>
                            <div class="text">
                                <p>Sit amet. consectetur adipiscing elit. Aenean consectetur suscipit viverra Morbi non arcu blandit</p>
                            </div>
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 wow flipInY" data-wow-offset="10" data-wow-delay="0.4s">
                    <div class="item-square">
                        <div class="face">
                            <img src="assets/img/team-member/team-01.jpg" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h3>Imran Khan</h3>
                                <p>Wordpress Developer</p>
                            </div>
                            <div class="text">
                                <p>Sit amet. consectetur adipiscing elit. Aenean consectetur suscipit viverra Morbi non arcu blandit</p>
                            </div>
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 wow flipInY" data-wow-offset="10" data-wow-delay="0.6s">
                    <div class="item-square">
                        <div class="face">
                            <img src="assets/img/team-member/team-03.jpg" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="content active">
                            <div class="title">
                                <h3>Jessi Jain</h3>
                                <p>Creative Designer</p>
                            </div>
                            <div class="text">
                                <p>Sit amet. consectetur adipiscing elit. Aenean consectetur suscipit viverra Morbi non arcu blandit</p>
                            </div>
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 wow flipInY" data-wow-offset="10" data-wow-delay="0.8s">
                    <div class="item-square">
                        <div class="face">
                            <img src="assets/img/team-member/team-04.jpg" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h3>M. Arman</h3>
                                <p>Junior Developer</p>
                            </div>
                            <div class="text">
                                <p>Sit amet. consectetur adipiscing elit. Aenean consectetur suscipit viverra Morbi non arcu blandit</p>
                            </div>
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Team Section -->

    <!-- Start Testimonial Section -->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <h2 class="section-title wow fadeIn" data-wow-delay=".2s">Testimonials</h2>
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="item wow fadeInDown" data-wow-delay="0.3s">
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>
                                <p>I Hired Anirudh Babbar to do my new website, the design was done very fast i was kept up to date regularly and I have had the website re designed and its working perfectly, I would recommend him to anyone.? TOP BLOKE!!! </p>
                                <i class="fa fa-quote-right pull-right"></i>
                            </div>
                            <div class="testimonial-info">
                                <img src="assets/img/testimonial-carousel/img-1.jpg" alt="">
                                <p><span class="name">Sara Mandis | </span>
                                    <span class="company">CEO - Media Wiki</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInDown"  data-wow-delay="0.6s">
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>
                                <p>I Hired Anirudh Babbar to do my new website, the design was done very fast i was kept up to date regularly and I have had the website re designed and its working perfectly, I would recommend him to anyone.? TOP BLOKE!!! </p>
                                <i class="fa fa-quote-right pull-right"></i>
                            </div>
                            <div class="testimonial-info">
                                <img src="assets/img/testimonial-carousel/img-2.jpg" alt="">
                                <p><span class="name">Sara Mandis | </span>
                                    <span class="company">CEO - Media Wiki</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInDown" data-wow-delay="0.9s">
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>
                                <p>I Hired Anirudh Babbar to do my new website, the design was done very fast i was kept up to date regularly and I have had the website re designed and its working perfectly, I would recommend him to anyone.? TOP BLOKE!!! </p>
                                <i class="fa fa-quote-right pull-right"></i>
                            </div>
                            <div class="testimonial-info">
                                <img src="assets/img/testimonial-carousel/img-3.jpg" alt="">
                                <p><span class="name">Sara Mandis | </span>
                                    <span class="company">CEO - Media Wiki</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>
                                <p>I Hired Anirudh Babbar to do my new website, the design was done very fast i was kept up to date regularly and I have had the website re designed and its working perfectly, I would recommend him to anyone.? TOP BLOKE!!! </p>
                                <i class="fa fa-quote-right pull-right"></i>
                            </div>
                            <div class="testimonial-info">
                                <img src="assets/img/testimonial-carousel/img-4.jpg" alt="">
                                <p><span class="name">Sara Mandis | </span>
                                    <span class="company">CEO - Media Wiki</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>
                                <p>I Hired Anirudh Babbar to do my new website, the design was done very fast i was kept up to date regularly and I have had the website re designed and its working perfectly, I would recommend him to anyone.? TOP BLOKE!!! </p>
                                <i class="fa fa-quote-right pull-right"></i>
                            </div>
                            <div class="testimonial-info">
                                <img src="assets/img/testimonial-carousel/img-1.jpg" alt="">
                                <p><span class="name">Sara Mandis | </span>
                                    <span class="company">CEO - Media Wiki</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial">
                            <div class="testimonial-text">
                                <i class="fa fa-quote-left"></i>
                                <p>I Hired Anirudh Babbar to do my new website, the design was done very fast i was kept up to date regularly and I have had the website re designed and its working perfectly, I would recommend him to anyone.? TOP BLOKE!!! </p>
                                <i class="fa fa-quote-right pull-right"></i>
                            </div>
                            <div class="testimonial-info">
                                <img src="assets/img/testimonial-carousel/img-2.jpg" alt="">
                                <p><span class="name">Sara Mandis | </span>
                                    <span class="company">CEO - Media Wiki</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->

    <!-- Start Contact Section -->
    <section id="contact">
        <div class="overlay">
            <div class="container">
                <h1 class="section-title wow fadeIn" data-wow-delay=".2s"><span>Contact</span> Us</h1>
                <div class="row">
                    <div class="contact-form">
                        <form role="form" method="post">
                            <div class="col-sm-6 col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="controls">
                                    <input class="contact_input" type="text" name="name" placeholder="Name">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="controls">
                                    <input class="contact_input" type="text" name="Email" placeholder="Email">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="controls">
                                    <input class="contact_input" type="text" name="Phone" placeholder="Phone">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 wow fadeInRight" data-wow-delay="0.2s">
                                <textarea name="massage" rows="7" class="form-control" placeholder="Massage"></textarea>
                            </div>
                            <div class="col-sm-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                                <button type="submit" id="submit" class="btn btn-common">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Start Clients Section -->
    <section id="clients">
        <div class="container">
            <div class="row">
                <div id="logo-slider" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img1.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img2.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img3.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img4.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img5.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img6.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img7.png" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="assets/img/clients-logo/img8.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->

    <!-- Start Connected Section -->
    <section id="connected">
        <div class="container">
            <div class="row">
                <h2 class="section-title wow fadeInUp" data-wow-delay=".2s">Stay Connected</h2>
                <h3 class="discription wow fadeIn" data-wow-delay=".2s">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                <hr>
                <div class="connected-wrapper text-center">
                    <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-item">
                            <a href="#"><i class="fa fa-phone"></i></a>
                            <h5>Customer Care</h5>
                            <h4>0123 - 456 - 789</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-item">
                            <a href="#"><i class="fa fa-user"></i></a>
                            <h5>Support Team</h5>
                            <h4>support@name.com</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-item">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <h5>Twitter</h5>
                            <h4>@example.com</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-item">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <h5>Facebook</h5>
                            <h4>example.agency</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Connected Section -->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>