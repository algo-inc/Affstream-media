<?php //= get_template_part('template-parts/template-video-loader')?>
<?php
get_header();
?>
<div class="default-template">
    <svg class="default-template-bg-left "  width="358" height="1252" viewBox="0 0 358 1252" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.00152588 3.44098C81.0439 -2.41954 243.224 50.318 250.024 150.663C260.112 299.501 21.8462 298.475 24.7593 447.095C27.7239 598.345 369.468 547.179 354.557 741.081C344.451 872.505 138.061 841 69.0312 916.5C0.00152588 992 89.0312 1156.5 203.531 1249" stroke="url(#paint0_linear_397_1260)" stroke-width="5" stroke-linecap="round"/>
        <defs>
            <linearGradient id="paint0_linear_397_1260" x1="115.966" y1="2.9768" x2="115.966" y2="1228" gradientUnits="userSpaceOnUse">
                <stop stop-color="#0C62FD"/>
                <stop offset="1" stop-color="#00E291" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
    <h1><?php the_title()?></h1>

		<?php the_content();  ?>
    <svg class="default-template-bg-right " width="358" height="1252" viewBox="0 0 358 1252" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M358.03 3.44098C276.987 -2.41954 114.808 50.318 108.007 150.663C97.9196 299.501 336.185 298.475 333.272 447.095C330.307 598.345 -11.4363 547.179 3.47406 741.081C13.5801 872.505 170.762 863.303 251.5 912C390.922 996.093 269 1156.5 154.5 1249" stroke="url(#paint0_linear_397_1259)" stroke-width="5" stroke-linecap="round"/>
        <defs>
            <linearGradient id="paint0_linear_397_1259" x1="242.065" y1="2.9768" x2="242.065" y2="1228" gradientUnits="userSpaceOnUse">
                <stop stop-color="#0C62FD"/>
                <stop offset="1" stop-color="#00E291" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>

</div>

<?php
get_footer();
?>
