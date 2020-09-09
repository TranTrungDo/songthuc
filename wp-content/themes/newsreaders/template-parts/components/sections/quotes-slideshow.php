<?php

if (!function_exists('quotes_slideshow')):

    function quotes_slideshow()
    {
        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
        $quote_songthuc_file = $DOCUMENT_ROOT . '/wp-content/themes/newsreaders/assets/quote_songthuc';
        $quote_songthuc_fp = fopen($quote_songthuc_file, 'r');
        if ($quote_songthuc_fp) {
            $content_quote_songthuc = explode("\n", fread($quote_songthuc_fp, filesize($quote_songthuc_file)));
        }
        fclose($quote_songthuc_fp);
        $image_slideshow = [
            "http://songthuc.vn/wp-content/uploads/2020/08/thumb_697_news_standard.jpeg",
            "http://songthuc.vn/wp-content/uploads/2020/08/banner_2.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/key.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/3_1560262312.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/hinh-nen-4k-dep-9_124944.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/cropped-hope-seedling-2-scaled-1.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/boris-smokrovic-220975-1200x450-1.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/borobudur_sunrise-e1368799522312.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/agrii.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/fonds-was-sie-ueber-anlagefonds-wissen-muessen.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/shutterstock_1087622744-1200x450-1.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/fullscreen-01-aron-visuals-bxoxnq26b7o-unsplash.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/juliana-vs-usa-1200x450-131788107198076190.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/green_living-lightbulb.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/bamboo.jpg"
        ];
        ?>

        <div class="nr-quote-section nr-section-border">
            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="column-quote column-12 column-lg-8">
                        <div class="nr-carousel-post-section">
                            <div class="nr-single-post nr-single-slider nr-slick-arrow"
                                 data-slick='{"autoplay": true, "dots": true, "arrows": true, "rtl": false}'>
                                <?php
                                $image_slideshow_idx = 0;
                                for ($i = 0; $i < count($content_quote_songthuc) - 1; $i += 3) { ?>
                                    <div class="nr-post nr-with-bg">
                                        <div class="nr-image-section nr-image-with-content nr-image-450 nr-overlay nr-image-hover-effect">
                                            <div class="nr-image bg-image"
                                                 style="background-image:url('<?php echo $image_slideshow[$image_slideshow_idx] ?>')"></div>
                                            <div class="nr-desc">
                                                <h3 class="nr-post-title quote-content">
                                                    <?php echo $content_quote_songthuc[$i] ?>
                                                </h3>
                                                <h4 class="quote-author">
                                                    <?php echo $content_quote_songthuc[$i + 1] ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $image_slideshow_idx += 1;
                                    if ($image_slideshow_idx == count($image_slideshow)) {
                                        $image_slideshow_idx = 0;
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

endif;