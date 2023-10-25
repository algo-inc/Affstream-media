<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package affstream
 */
get_header();
?>
	<main id="primary" class="site-main not-found-page" style=" background-image: url('<?= get_template_directory_uri() . '/img/404.png'?>') ">
        <div class="container">
            <div class="flex-container">
                <div class="item">
                    <h2><?= pll__('page not found'); ?></h2>
                    <p><?= pll__('Sorry we can’t find the page you are looking for') ?></p>
                    <a class="go-home" href="/"><?= pll__('back to home ')?></a>
                </div>
                <div class="item">
                    <svg width="668" height="259" viewBox="0 0 668 259" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_1592_4011)">
                            <path d="M131.134 226L137.802 194.289H31.8527L42.5217 139.907C69.787 102.269 99.275 66.2609 146.248 12.1749H235.898L207.299 146.279H232.786L222.562 194.289H197.074L190.406 226H131.134ZM94.9778 147.464L94.8296 148.65H149.36L169.216 55.2955H168.031C144.618 81.6717 114.982 118.865 94.9778 147.464ZM341.995 229.705C292.058 229.705 258.57 195.03 258.57 143.315C258.57 64.7791 304.802 8.47033 369.409 8.47033C419.939 8.47033 453.576 42.8483 453.576 94.2671C453.576 172.803 406.751 229.705 341.995 229.705ZM321.991 141.833C321.991 168.061 329.696 181.842 344.515 181.842C368.52 181.842 390.154 141.092 390.154 95.8971C390.154 69.8173 382.301 56.3328 367.038 56.3328C343.181 56.3328 321.991 96.638 321.991 141.833ZM557.302 226L563.971 194.289H458.021L468.69 139.907C495.956 102.269 525.444 66.2609 572.417 12.1749H662.066L633.467 146.279H658.955L648.73 194.289H623.243L616.575 226H557.302ZM521.146 147.464L520.998 148.65H575.529L595.385 55.2955H594.2C570.787 81.6717 541.151 118.865 521.146 147.464Z" fill="url(#paint0_linear_1592_4011)"/>
                        </g>
                        <defs>
                            <filter id="filter0_d_1592_4011" x="0.746391" y="0.88335" width="666.631" height="257.651" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dx="-12.8977" dy="10.6216"/>
                                <feGaussianBlur stdDeviation="9.10424"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1592_4011"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1592_4011" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear_1592_4011" x1="28" y1="12" x2="649.168" y2="266.264" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#00E291"/>
                                <stop offset="1" stop-color="#E0F01E"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
