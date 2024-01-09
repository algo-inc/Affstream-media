<?php
/*
Template Name: For advartiser
*/
?>
<?= get_template_part('template-parts/template-video-loader')?>
<?php
get_header();
?>
<section class="for-advertiser" id="for-advertiser">
	<?php $title = get_field( 'main_title' );
	$cardID = 1;
	if ( $title ) :

		?>
        <div class="intro">
            <svg class="triangle-1 rotate animation-left" width="647" height="651" viewBox="0 0 647 651" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_f_1384_2201)">
                    <path d="M494.938 221.708L494.941 221.696C497.61 210.496 497.276 198.821 493.983 187.852C490.689 176.883 484.551 167.008 476.194 159.222C467.838 151.437 457.553 146.013 446.379 143.503C435.208 140.994 423.542 141.486 412.562 144.937C412.559 144.938 412.555 144.939 412.551 144.94L289.689 183.994L289.66 184.004L289.631 184.013L117.492 237.196C117.488 237.197 117.485 237.197 117.482 237.198C106.485 240.621 96.5525 246.868 88.6809 255.316C80.807 263.767 75.2761 274.119 72.6392 285.334C70.0024 296.548 70.3524 308.227 73.6461 319.203C76.9389 330.176 83.0588 340.064 91.3909 347.882C91.3931 347.884 91.3952 347.886 91.3974 347.888L315.21 556.397C315.212 556.399 315.214 556.401 315.216 556.403C323.604 564.161 333.9 569.567 345.078 572.075C356.259 574.585 367.934 574.108 378.934 570.685C389.934 567.262 399.869 561.012 407.742 552.561C415.615 544.109 421.145 533.756 423.78 522.541L423.783 522.53L494.938 221.708Z"
                          stroke="url(#paint0_linear_1384_2201)" stroke-width="15"/>
                    <path d="M420.47 294.709L420.473 294.697C422.88 284.596 422.579 274.066 419.609 264.175C416.639 254.284 411.105 245.379 403.569 238.359C396.034 231.339 386.76 226.448 376.684 224.185C366.611 221.922 356.091 222.365 346.188 225.477C346.185 225.479 346.181 225.48 346.177 225.481L234.133 261.096L234.104 261.105L234.075 261.114L77.0914 309.615C77.0883 309.616 77.0851 309.617 77.0819 309.618C67.1636 312.705 58.2043 318.339 51.1041 325.96C44.0015 333.583 39.0127 342.921 36.6343 353.036C34.256 363.151 34.5719 373.684 37.5422 383.583C40.5117 393.478 46.0304 402.395 53.5436 409.444C53.5458 409.446 53.5479 409.448 53.5501 409.45L257.656 599.6C257.658 599.602 257.66 599.604 257.662 599.606C265.225 606.602 274.51 611.476 284.59 613.738C294.674 616.001 305.204 615.572 315.125 612.484C325.047 609.396 334.009 603.76 341.11 596.136C348.212 588.512 353.199 579.174 355.576 569.058L355.579 569.047L420.47 294.709Z"
                          stroke="url(#paint1_linear_1384_2201)" stroke-width="15"/>
                </g>
                <defs>
                    <filter id="filter0_f_1384_2201" x="24.5562" y="131.427" width="482.668" height="494.241"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="1.5" result="effect1_foregroundBlur_1384_2201"/>
                    </filter>
                    <linearGradient id="paint0_linear_1384_2201" x1="27.1494" y1="285.221" x2="359.506"
                                    y2="368.421" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0C62FD"/>
                        <stop offset="1" stop-color="#00E291"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_1384_2201" x1="129.095" y1="231.242" x2="430.077"
                                    y2="511.643" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0C62FD"/>
                        <stop offset="1" stop-color="#00E291"/>
                    </linearGradient>
                </defs>
            </svg>
            <div class="container">
                <h1>
					<?= $title ?>
                </h1>
				<?php if ( have_rows( 'numbers' ) ): ?>
                    <div class="counters">
						<?php while ( have_rows( 'numbers' ) ): the_row();
							$name  = get_sub_field( 'name' );
							$count = get_sub_field( 'count' );
							?>
                            <div class="card" id="count-card-<?= $cardID++ ?>">
                                <span class="counting-number">
                                  <?= $count ?>
                                </span>
                                <p>
									<?= $name ?>
                                </p>
                            </div>
						<?php endwhile; ?>
                        <svg class="mobile-triangle" width="350" height="350" viewBox="0 0 373 373" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_f_2194_6451)">
                                <path d="M118.035 58.9526L118.036 58.9489C120.244 51.0472 124.536 44.0834 130.463 38.7536C136.39 33.4246 143.744 29.9145 151.779 28.5691C159.815 27.2237 168.261 28.0884 176.265 31.085C184.27 34.0816 191.553 39.106 197.371 45.6624C197.371 45.6634 197.372 45.6645 197.373 45.6655L258.595 115.072L258.602 115.08L258.609 115.087L344.887 211.445C344.888 211.446 344.889 211.447 344.89 211.447C350.726 217.99 354.899 225.825 356.982 234.168C359.066 242.513 358.983 251.061 356.75 258.956C354.517 266.85 350.215 273.807 344.288 279.139C338.363 284.469 331.02 287.993 322.992 289.367C322.989 289.368 322.987 289.368 322.984 289.369L119.288 323.473C119.285 323.474 119.282 323.474 119.28 323.475C111.238 324.79 102.794 323.91 94.7914 320.912C86.7845 317.913 79.4937 312.897 73.6572 306.354C67.8201 299.811 63.6477 291.974 61.5653 283.63C59.4829 275.285 59.5664 266.736 61.8004 258.842L61.8013 258.839L118.035 58.9526Z" stroke="url(#paint0_linear_2194_6451)" stroke-width="5"/>
                                <path d="M138.617 125.985L138.618 125.981C140.643 118.94 144.569 112.716 149.993 107.934C155.416 103.152 162.145 99.9811 169.498 98.7377C176.852 97.4943 184.574 98.2217 191.884 100.85C199.195 103.478 205.837 107.915 211.133 113.718C211.133 113.718 211.134 113.718 211.134 113.719L267.232 175.531L267.239 175.539L267.246 175.547L346.306 261.356C351.621 267.145 355.414 274.09 357.301 281.496C359.188 288.902 359.102 296.504 357.054 303.539C355.007 310.573 351.071 316.792 345.648 321.576C340.226 326.358 333.506 329.541 326.161 330.81C326.158 330.811 326.155 330.811 326.152 330.812L139.132 362.436C139.129 362.437 139.126 362.437 139.123 362.438C131.764 363.655 124.045 362.913 116.735 360.284C109.423 357.653 102.775 353.224 97.4611 347.435C92.1467 341.644 88.3549 334.699 86.4689 327.293C84.5828 319.887 84.6701 312.285 86.7185 305.251L86.7195 305.247L138.617 125.985Z" stroke="url(#paint1_linear_2194_6451)" stroke-width="5"/>
                            </g>
                            <defs>
                                <filter id="filter0_f_2194_6451" x="56.8237" y="24.793" width="305.072" height="341.372" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                    <feGaussianBlur stdDeviation="0.349616" result="effect1_foregroundBlur_2194_6451"/>
                                </filter>
                                <linearGradient id="paint0_linear_2194_6451" x1="-32.413" y1="253.916" x2="181.555" y2="76.9633" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#00E291"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_2194_6451" x1="252.918" y1="150.826" x2="45.0072" y2="340.089" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#0C62FD"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
				<?php endif; ?>


            </div>
            <svg class="triangle-1 animation-right rotate" width="647" height="651" viewBox="0 0 647 651" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_f_1384_2201)">
                    <path d="M494.938 221.708L494.941 221.696C497.61 210.496 497.276 198.821 493.983 187.852C490.689 176.883 484.551 167.008 476.194 159.222C467.838 151.437 457.553 146.013 446.379 143.503C435.208 140.994 423.542 141.486 412.562 144.937C412.559 144.938 412.555 144.939 412.551 144.94L289.689 183.994L289.66 184.004L289.631 184.013L117.492 237.196C117.488 237.197 117.485 237.197 117.482 237.198C106.485 240.621 96.5525 246.868 88.6809 255.316C80.807 263.767 75.2761 274.119 72.6392 285.334C70.0024 296.548 70.3524 308.227 73.6461 319.203C76.9389 330.176 83.0588 340.064 91.3909 347.882C91.3931 347.884 91.3952 347.886 91.3974 347.888L315.21 556.397C315.212 556.399 315.214 556.401 315.216 556.403C323.604 564.161 333.9 569.567 345.078 572.075C356.259 574.585 367.934 574.108 378.934 570.685C389.934 567.262 399.869 561.012 407.742 552.561C415.615 544.109 421.145 533.756 423.78 522.541L423.783 522.53L494.938 221.708Z"
                          stroke="url(#paint0_linear_1384_2201)" stroke-width="15"/>
                    <path d="M420.47 294.709L420.473 294.697C422.88 284.596 422.579 274.066 419.609 264.175C416.639 254.284 411.105 245.379 403.569 238.359C396.034 231.339 386.76 226.448 376.684 224.185C366.611 221.922 356.091 222.365 346.188 225.477C346.185 225.479 346.181 225.48 346.177 225.481L234.133 261.096L234.104 261.105L234.075 261.114L77.0914 309.615C77.0883 309.616 77.0851 309.617 77.0819 309.618C67.1636 312.705 58.2043 318.339 51.1041 325.96C44.0015 333.583 39.0127 342.921 36.6343 353.036C34.256 363.151 34.5719 373.684 37.5422 383.583C40.5117 393.478 46.0304 402.395 53.5436 409.444C53.5458 409.446 53.5479 409.448 53.5501 409.45L257.656 599.6C257.658 599.602 257.66 599.604 257.662 599.606C265.225 606.602 274.51 611.476 284.59 613.738C294.674 616.001 305.204 615.572 315.125 612.484C325.047 609.396 334.009 603.76 341.11 596.136C348.212 588.512 353.199 579.174 355.576 569.058L355.579 569.047L420.47 294.709Z"
                          stroke="url(#paint1_linear_1384_2201)" stroke-width="15"/>
                </g>
                <defs>
                    <filter id="filter0_f_1384_2201" x="24.5562" y="131.427" width="482.668" height="494.241"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="1.5" result="effect1_foregroundBlur_1384_2201"/>
                    </filter>
                    <linearGradient id="paint0_linear_1384_2201" x1="27.1494" y1="285.221" x2="359.506"
                                    y2="368.421" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0C62FD"/>
                        <stop offset="1" stop-color="#00E291"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_1384_2201" x1="129.095" y1="231.242" x2="430.077"
                                    y2="511.643" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0C62FD"/>
                        <stop offset="1" stop-color="#00E291"/>
                    </linearGradient>
                </defs>
            </svg>

        </div>
	<?php endif; ?>
	<?php
	$why_choose_us = get_field( 'why_choose_us' );
	if ( $why_choose_us ): ?>
        <div class="why-choose-us">
            <div class="container">
                <div class="intro">
                    <h2>
						<?= $why_choose_us['title'] ?>
                    </h2>
                    <p>
						<?= $why_choose_us['description'] ?>
                    </p>
                </div>
            </div>
        </div>
	<?php endif; ?>
	<?php $advantages = get_field( 'advantages' );
	if ( $advantages ):
		?>
        <div class="advantages">
            <div class="advantages-container">
                <div class="block" id="advantages-block-1">
                    <div class="animation">
                        <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M199.393 348.979C198.139 349.466 196.859 349.912 195.554 350.317C185.806 353.341 175.864 353.665 166.535 351.715C159.453 350.234 151.651 354.225 150.516 361.371C149.722 366.365 152.5 371.315 157.382 372.637C171.619 376.494 187.085 376.487 202.216 371.794C205.472 370.784 208.619 369.586 211.647 368.216C216.829 365.871 218.596 359.619 216.096 354.509C213.164 348.515 205.615 346.568 199.393 348.979Z"
                                  fill="url(#paint0_linear_1414_2277)"/>
                            <ellipse cx="11.1671" cy="10.9524" rx="11.1671" ry="10.9524"
                                     transform="matrix(-0.900275 -0.435321 -0.435321 0.900275 221.969 353.179)"
                                     fill="#EDEDFF"/>
                            <path d="M165.706 46.7415C167.006 46.3952 168.328 46.0913 169.669 45.8317C179.689 43.8916 189.606 44.6556 198.666 47.6143C205.544 49.8605 213.736 46.7459 215.645 39.7668C216.98 34.8888 214.76 29.6656 210.052 27.8176C196.322 22.4278 180.948 20.7439 165.394 23.7552C162.047 24.4033 158.788 25.25 155.629 26.2808C150.221 28.045 147.781 34.0667 149.708 39.419C151.967 45.6975 159.258 48.4588 165.706 46.7415Z"
                                  fill="url(#paint1_linear_1414_2277)"/>
                            <ellipse cx="11.1671" cy="10.9524" rx="11.1671" ry="10.9524"
                                     transform="matrix(0.847298 0.531118 0.531118 -0.847298 143.725 40.0989)"
                                     fill="#EDEDFF"/>
                            <path d="M317 199.129C316.227 276.31 255.854 338.129 181.5 338.129C107.307 338.129 47.0417 276.079 46.0136 199.129M361 199.129C359.976 301.297 279.994 383.129 181.491 383.129C83.2013 383.129 3.36203 300.991 2 199.129"
                                  stroke="url(#paint2_linear_1414_2277)" stroke-width="3"/>
                            <path d="M317 199.129C317 121.257 256.335 58.1287 181.5 58.1287C106.665 58.1287 46 121.257 46 199.129M361 199.129C361 96.4037 280.635 13.1287 181.5 13.1287C82.3649 13.1287 2 96.4037 2 199.129"
                                  stroke="url(#paint3_linear_1414_2277)" stroke-width="3"/>
                            <defs>
                                <linearGradient id="paint0_linear_1414_2277" x1="203.145" y1="357.789" x2="154.859"
                                                y2="364.045" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_1414_2277" x1="162.939" y1="37.5743" x2="211.62"
                                                y2="36.6344" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_1414_2277" x1="361" y1="290.467" x2="1.982"
                                                y2="290.467"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#E0F01E"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_1414_2277" x1="1.99998" y1="130.533" x2="361"
                                                y2="130.533"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#0C62FD"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="type-a">
                        <span>01</span>
                        <p><?= $advantages['block_01'] ?></p>
                    </div>
                </div>
                <div class="block" id="advantages-block-2">
                    <div class="animation">
                        <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M163.607 348.979C164.861 349.466 166.141 349.912 167.446 350.317C177.194 353.341 187.136 353.665 196.465 351.715C203.547 350.234 211.349 354.225 212.484 361.371C213.278 366.366 210.5 371.315 205.618 372.637C191.381 376.494 175.915 376.487 160.784 371.794C157.528 370.784 154.381 369.586 151.353 368.216C146.171 365.871 144.404 359.619 146.904 354.509C149.836 348.516 157.385 346.568 163.607 348.979Z"
                                  fill="url(#paint0_linear_1486_2234)"/>
                            <ellipse cx="155.853" cy="358.178" rx="11.1671" ry="10.9524"
                                     transform="rotate(-25.8057 155.853 358.178)" fill="#EDEDFF"/>
                            <path d="M197.294 46.7414C195.994 46.3951 194.672 46.0913 193.331 45.8316C183.311 43.8916 173.394 44.6555 164.334 47.6142C157.456 49.8604 149.264 46.7458 147.355 39.7668C146.02 34.8888 148.24 29.6655 152.948 27.8176C166.678 22.4277 182.052 20.7439 197.606 23.7552C200.953 24.4033 204.212 25.25 207.371 26.2808C212.779 28.045 215.219 34.0667 213.292 39.4189C211.033 45.6974 203.742 48.4588 197.294 46.7414Z"
                                  fill="url(#paint1_linear_1486_2234)"/>
                            <ellipse cx="203.996" cy="36.75" rx="11.1671" ry="10.9524"
                                     transform="rotate(147.919 203.996 36.75)" fill="#EDEDFF"/>
                            <path d="M317 199.129C316.227 276.31 255.854 338.129 181.5 338.129C107.307 338.129 47.0417 276.079 46.0136 199.129M361 199.129C359.976 301.297 279.994 383.129 181.491 383.129C83.2013 383.129 3.36203 300.991 2 199.129"
                                  stroke="url(#paint2_linear_1486_2234)" stroke-width="3"/>
                            <path d="M317 199.129C317 121.257 256.335 58.1287 181.5 58.1287C106.665 58.1287 46 121.257 46 199.129M361 199.129C361 96.4037 280.635 13.1287 181.5 13.1287C82.3649 13.1287 2 96.4037 2 199.129"
                                  stroke="url(#paint3_linear_1486_2234)" stroke-width="3"/>
                            <defs>
                                <linearGradient id="paint0_linear_1486_2234" x1="159.855" y1="357.789" x2="208.141"
                                                y2="364.045" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_1486_2234" x1="200.061" y1="37.5743" x2="151.38"
                                                y2="36.6343" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_1486_2234" x1="361" y1="290.467" x2="1.982"
                                                y2="290.467"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.58125" stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#E0F01E"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_1486_2234" x1="1.99998" y1="130.533" x2="361"
                                                y2="130.533"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#00E291"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="type-b">
                        <span>02</span>
                        <p><?= $advantages['block_02'] ?></p></div>
                </div>
                <div class="block" id="advantages-block-3">
					<?php
					if ( ! wp_is_mobile() ) {
						?>
                        <div class="animation">
                            <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M163.607 348.979C164.861 349.466 166.141 349.912 167.446 350.317C177.194 353.341 187.136 353.665 196.465 351.715C203.547 350.234 211.349 354.225 212.484 361.371C213.278 366.366 210.5 371.315 205.618 372.637C191.381 376.494 175.915 376.487 160.784 371.794C157.528 370.784 154.381 369.586 151.353 368.216C146.171 365.871 144.404 359.619 146.904 354.509C149.836 348.516 157.385 346.568 163.607 348.979Z"
                                      fill="url(#paint0_linear_1486_2234)"/>
                                <ellipse cx="155.853" cy="358.178" rx="11.1671" ry="10.9524"
                                         transform="rotate(-25.8057 155.853 358.178)" fill="#EDEDFF"/>
                                <path d="M197.294 46.7414C195.994 46.3951 194.672 46.0913 193.331 45.8316C183.311 43.8916 173.394 44.6555 164.334 47.6142C157.456 49.8604 149.264 46.7458 147.355 39.7668C146.02 34.8888 148.24 29.6655 152.948 27.8176C166.678 22.4277 182.052 20.7439 197.606 23.7552C200.953 24.4033 204.212 25.25 207.371 26.2808C212.779 28.045 215.219 34.0667 213.292 39.4189C211.033 45.6974 203.742 48.4588 197.294 46.7414Z"
                                      fill="url(#paint1_linear_1486_2234)"/>
                                <ellipse cx="203.996" cy="36.75" rx="11.1671" ry="10.9524"
                                         transform="rotate(147.919 203.996 36.75)" fill="#EDEDFF"/>
                                <path d="M317 199.129C316.227 276.31 255.854 338.129 181.5 338.129C107.307 338.129 47.0417 276.079 46.0136 199.129M361 199.129C359.976 301.297 279.994 383.129 181.491 383.129C83.2013 383.129 3.36203 300.991 2 199.129"
                                      stroke="url(#paint2_linear_1486_2234)" stroke-width="3"/>
                                <path d="M317 199.129C317 121.257 256.335 58.1287 181.5 58.1287C106.665 58.1287 46 121.257 46 199.129M361 199.129C361 96.4037 280.635 13.1287 181.5 13.1287C82.3649 13.1287 2 96.4037 2 199.129"
                                      stroke="url(#paint3_linear_1486_2234)" stroke-width="3"/>
                                <defs>
                                    <linearGradient id="paint0_linear_1486_2234" x1="159.855" y1="357.789" x2="208.141"
                                                    y2="364.045" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#00E291"/>
                                        <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_1486_2234" x1="200.061" y1="37.5743" x2="151.38"
                                                    y2="36.6343" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#E0F01E"/>
                                        <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_1486_2234" x1="361" y1="290.467" x2="1.982"
                                                    y2="290.467" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.58125" stop-color="#00E291"/>
                                        <stop offset="1" stop-color="#E0F01E"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_1486_2234" x1="1.99998" y1="130.533" x2="361"
                                                    y2="130.533" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#E0F01E"/>
                                        <stop offset="1" stop-color="#00E291"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
						<?php
					} else {
						?>
                        <div class="animation">
                            <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M199.393 348.98C198.139 349.466 196.859 349.912 195.554 350.317C185.806 353.341 175.864 353.665 166.535 351.715C159.453 350.234 151.651 354.225 150.516 361.371C149.722 366.366 152.5 371.315 157.382 372.637C171.619 376.494 187.085 376.487 202.216 371.794C205.472 370.784 208.619 369.586 211.647 368.216C216.829 365.871 218.596 359.619 216.096 354.509C213.164 348.516 205.615 346.568 199.393 348.98Z"
                                      fill="url(#paint0_linear_1416_2310)"/>
                                <ellipse cx="11.1671" cy="10.9524" rx="11.1671" ry="10.9524"
                                         transform="matrix(-0.900275 -0.435321 -0.435321 0.900275 221.969 353.18)"
                                         fill="#EDEDFF"/>
                                <path d="M165.706 46.7415C167.006 46.3952 168.328 46.0913 169.669 45.8317C179.689 43.8916 189.606 44.6556 198.666 47.6143C205.544 49.8605 213.736 46.7459 215.645 39.7668C216.98 34.8888 214.76 29.6656 210.052 27.8176C196.322 22.4278 180.948 20.7439 165.394 23.7552C162.047 24.4033 158.788 25.25 155.629 26.2808C150.221 28.045 147.781 34.0667 149.708 39.419C151.967 45.6975 159.258 48.4588 165.706 46.7415Z"
                                      fill="url(#paint1_linear_1416_2310)"/>
                                <ellipse cx="11.1671" cy="10.9524" rx="11.1671" ry="10.9524"
                                         transform="matrix(0.847298 0.531118 0.531118 -0.847298 143.725 40.0989)"
                                         fill="#EDEDFF"/>
                                <path d="M46 199.129C46.7731 276.31 107.146 338.129 181.5 338.129C255.693 338.129 315.958 276.079 316.986 199.129M2 199.129C3.02416 301.297 83.006 383.129 181.509 383.129C279.799 383.129 359.638 300.991 361 199.129"
                                      stroke="url(#paint2_linear_1416_2310)" stroke-width="3"/>
                                <path d="M46 199.129C46 121.257 106.665 58.1287 181.5 58.1287C256.335 58.1287 317 121.257 317 199.129M2 199.129C2 96.4037 82.3649 13.1287 181.5 13.1287C280.635 13.1287 361 96.4037 361 199.129"
                                      stroke="url(#paint3_linear_1416_2310)" stroke-width="3"/>
                                <defs>
                                    <linearGradient id="paint0_linear_1416_2310" x1="203.145" y1="357.789" x2="154.859"
                                                    y2="364.045" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#00E291"/>
                                        <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_1416_2310" x1="162.939" y1="37.5743" x2="211.62"
                                                    y2="36.6344" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#E0F01E"/>
                                        <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_1416_2310" x1="2" y1="290.467" x2="361.018"
                                                    y2="290.467" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.58125" stop-color="#00E291"/>
                                        <stop offset="1" stop-color="#E0F01E"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_1416_2310" x1="361" y1="130.533" x2="2"
                                                    y2="130.533"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#E0F01E"/>
                                        <stop offset="1" stop-color="#00E291"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
						<?php
					}
					?>
                    <div class="type-c">
                        <span>03</span>
                        <p><?= $advantages['block_03'] ?></p>
                    </div>
                </div>
                <div class="block" id="advantages-block-4">
                    <div class="animation">
                        <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M163.607 348.979C164.861 349.466 166.141 349.912 167.446 350.317C177.194 353.341 187.136 353.665 196.465 351.715C203.547 350.234 211.349 354.225 212.484 361.371C213.278 366.366 210.5 371.315 205.618 372.637C191.381 376.494 175.915 376.487 160.784 371.794C157.528 370.784 154.381 369.586 151.353 368.216C146.171 365.871 144.404 359.619 146.904 354.509C149.836 348.516 157.385 346.568 163.607 348.979Z"
                                  fill="url(#paint0_linear_1486_2214)"/>
                            <ellipse cx="155.853" cy="358.178" rx="11.1671" ry="10.9524"
                                     transform="rotate(-25.8057 155.853 358.178)" fill="#EDEDFF"/>
                            <path d="M197.294 46.7414C195.994 46.3951 194.672 46.0913 193.331 45.8316C183.311 43.8916 173.394 44.6555 164.334 47.6142C157.456 49.8604 149.264 46.7458 147.355 39.7668C146.02 34.8888 148.24 29.6655 152.948 27.8176C166.678 22.4277 182.052 20.7439 197.606 23.7552C200.953 24.4033 204.212 25.25 207.371 26.2808C212.779 28.045 215.219 34.0667 213.292 39.4189C211.033 45.6974 203.742 48.4588 197.294 46.7414Z"
                                  fill="url(#paint1_linear_1486_2214)"/>
                            <ellipse cx="203.996" cy="36.75" rx="11.1671" ry="10.9524"
                                     transform="rotate(147.919 203.996 36.75)" fill="#EDEDFF"/>
                            <path d="M46 199.129C46.7731 276.31 107.146 338.129 181.5 338.129C255.693 338.129 315.958 276.079 316.986 199.129M2 199.129C3.02416 301.297 83.006 383.129 181.509 383.129C279.799 383.129 359.638 300.991 361 199.129"
                                  stroke="url(#paint2_linear_1486_2214)" stroke-width="3"/>
                            <path d="M46 199.129C46 121.257 106.665 58.1287 181.5 58.1287C256.335 58.1287 317 121.257 317 199.129M2 199.129C2 96.4037 82.3649 13.1287 181.5 13.1287C280.635 13.1287 361 96.4037 361 199.129"
                                  stroke="url(#paint3_linear_1486_2214)" stroke-width="3"/>
                            <defs>
                                <linearGradient id="paint0_linear_1486_2214" x1="159.855" y1="357.789" x2="208.141"
                                                y2="364.045" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_1486_2214" x1="200.061" y1="37.5743" x2="151.38"
                                                y2="36.6343" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_1486_2214" x1="2" y1="290.467" x2="361.018"
                                                y2="290.467"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#00E291"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_1486_2214" x1="361" y1="130.533" x2="2" y2="130.533"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#0C62FD"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="type-c">
                        <span>06</span>
                        <p><?= $advantages['block_06'] ?></p>
                    </div>
                </div>
                <div class="block" id="advantages-block-5">
                    <div class="animation ">
                        <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M199.393 348.98C198.139 349.466 196.859 349.912 195.554 350.317C185.806 353.341 175.864 353.665 166.535 351.715C159.453 350.234 151.651 354.225 150.516 361.371C149.722 366.366 152.5 371.315 157.382 372.637C171.619 376.494 187.085 376.487 202.216 371.794C205.472 370.784 208.619 369.586 211.647 368.216C216.829 365.871 218.596 359.619 216.096 354.509C213.164 348.516 205.615 346.568 199.393 348.98Z"
                                  fill="url(#paint0_linear_1416_2310)"/>
                            <ellipse cx="11.1671" cy="10.9524" rx="11.1671" ry="10.9524"
                                     transform="matrix(-0.900275 -0.435321 -0.435321 0.900275 221.969 353.18)"
                                     fill="#EDEDFF"/>
                            <path d="M165.706 46.7415C167.006 46.3952 168.328 46.0913 169.669 45.8317C179.689 43.8916 189.606 44.6556 198.666 47.6143C205.544 49.8605 213.736 46.7459 215.645 39.7668C216.98 34.8888 214.76 29.6656 210.052 27.8176C196.322 22.4278 180.948 20.7439 165.394 23.7552C162.047 24.4033 158.788 25.25 155.629 26.2808C150.221 28.045 147.781 34.0667 149.708 39.419C151.967 45.6975 159.258 48.4588 165.706 46.7415Z"
                                  fill="url(#paint1_linear_1416_2310)"/>
                            <ellipse cx="11.1671" cy="10.9524" rx="11.1671" ry="10.9524"
                                     transform="matrix(0.847298 0.531118 0.531118 -0.847298 143.725 40.0989)"
                                     fill="#EDEDFF"/>
                            <path d="M46 199.129C46.7731 276.31 107.146 338.129 181.5 338.129C255.693 338.129 315.958 276.079 316.986 199.129M2 199.129C3.02416 301.297 83.006 383.129 181.509 383.129C279.799 383.129 359.638 300.991 361 199.129"
                                  stroke="url(#paint2_linear_1416_2310)" stroke-width="3"/>
                            <path d="M46 199.129C46 121.257 106.665 58.1287 181.5 58.1287C256.335 58.1287 317 121.257 317 199.129M2 199.129C2 96.4037 82.3649 13.1287 181.5 13.1287C280.635 13.1287 361 96.4037 361 199.129"
                                  stroke="url(#paint3_linear_1416_2310)" stroke-width="3"/>
                            <defs>
                                <linearGradient id="paint0_linear_1416_2310" x1="203.145" y1="357.789" x2="154.859"
                                                y2="364.045" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_1416_2310" x1="162.939" y1="37.5743" x2="211.62"
                                                y2="36.6344" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_1416_2310" x1="2" y1="290.467" x2="361.018"
                                                y2="290.467"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.58125" stop-color="#00E291"/>
                                    <stop offset="1" stop-color="#E0F01E"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_1416_2310" x1="361" y1="130.533" x2="2" y2="130.533"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#00E291"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="type-a">
                        <span>05</span>
                        <p><?= $advantages['block_05'] ?></p>
                    </div>
                </div>
                <div class="block" id="advantages-block-6">
                    <div class="animation">
                        <svg width="363" height="396" viewBox="0 0 363 396" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M163.607 348.979C164.861 349.466 166.141 349.912 167.446 350.317C177.194 353.341 187.136 353.665 196.465 351.715C203.547 350.234 211.349 354.225 212.484 361.371C213.278 366.366 210.5 371.315 205.618 372.637C191.381 376.494 175.915 376.487 160.784 371.794C157.528 370.784 154.381 369.586 151.353 368.216C146.171 365.871 144.404 359.619 146.904 354.509C149.836 348.515 157.385 346.568 163.607 348.979Z"
                                  fill="url(#paint0_linear_1486_2224)"/>
                            <ellipse cx="155.853" cy="358.178" rx="11.1671" ry="10.9524"
                                     transform="rotate(-25.8057 155.853 358.178)" fill="#EDEDFF"/>
                            <path d="M197.294 46.7415C195.994 46.3952 194.672 46.0913 193.331 45.8317C183.311 43.8916 173.394 44.6556 164.334 47.6143C157.456 49.8605 149.264 46.7459 147.355 39.7668C146.02 34.8888 148.24 29.6656 152.948 27.8176C166.678 22.4278 182.052 20.7439 197.606 23.7552C200.953 24.4033 204.212 25.25 207.371 26.2808C212.779 28.045 215.219 34.0667 213.292 39.419C211.033 45.6975 203.742 48.4588 197.294 46.7415Z"
                                  fill="url(#paint1_linear_1486_2224)"/>
                            <ellipse cx="203.996" cy="36.75" rx="11.1671" ry="10.9524"
                                     transform="rotate(147.919 203.996 36.75)" fill="#EDEDFF"/>
                            <path d="M46 199.129C46.7731 276.31 107.146 338.129 181.5 338.129C255.693 338.129 315.958 276.079 316.986 199.129M2 199.129C3.02416 301.297 83.006 383.129 181.509 383.129C279.799 383.129 359.638 300.991 361 199.129"
                                  stroke="url(#paint2_linear_1486_2224)" stroke-width="3"/>
                            <path d="M46 199.129C46 121.257 106.665 58.1287 181.5 58.1287C256.335 58.1287 317 121.257 317 199.129M2 199.129C2 96.4037 82.3649 13.1287 181.5 13.1287C280.635 13.1287 361 96.4037 361 199.129"
                                  stroke="url(#paint3_linear_1486_2224)" stroke-width="3"/>
                            <defs>
                                <linearGradient id="paint0_linear_1486_2224" x1="159.855" y1="357.789" x2="208.141"
                                                y2="364.045" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_1486_2224" x1="200.061" y1="37.5743" x2="151.38"
                                                y2="36.6344" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#100F0F" stop-opacity="0"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_1486_2224" x1="2" y1="290.467" x2="361.018"
                                                y2="290.467"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0C62FD"/>
                                    <stop offset="1" stop-color="#E0F01E"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_1486_2224" x1="361" y1="130.533" x2="2" y2="130.533"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E0F01E"/>
                                    <stop offset="1" stop-color="#0C62FD"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="type-b">
                        <span>04</span>
                        <p><?= $advantages['block_04'] ?></p>
                    </div>
                </div>
            </div>
        </div>
	<?php
	endif;
	?>
    <style>
        .contact-us {
            background-image: url('<?= get_template_directory_uri() . '/img/contact-us-bg.png' ?>');
        }
        @media (max-width: 768px) {
            .contact-us {
                background-image: url('<?= get_template_directory_uri() . '/img/contacts-us-bg-mobile.png' ?>');
            }
    </style>
    <div class="contact-us">
        <div class="container">
            <div class="content-container">
				<?php $contacts = get_field( 'contacts_us' );
				if ( $contacts ):
					?>
                    <h2><?= $contacts['title'] ?></h2>
                    <div class="transform-content">
						<?= $contacts['description'] ?>
                    </div>
				<?php
				endif;
				?>
            </div>
            <div class="form-container">
                <felte-form id="advertiser-form-validator">
                <form id="advertiser-form">
                    <div class="input-field">
                        <label for="full_name"> <?= pll__('Full Name')?></label>
                        <input id="full_name" name="Name" type="text" placeholder="Enter your full name">
                    </div>
                    <div class="input-field">
                        <label for="email"> <?= pll__('Email')?></label>
                        <input id="email" name="Email" type="email"  required placeholder="Enter email">

                    </div>
                    <div class="input-field">
                        <label for="company_name"><?= pll__('Company Name')?></label>
                        <input id="company_name" name="CompanyName" type="text" placeholder="Enter company name">

                    </div>
                    <div class="input-field">
                        <label for="job_title"><?= pll__('Job title')?></label>
                        <input id="job_title" name="JobTitle" type="text"  placeholder="Enter your job title">

                    </div>
                    <div class="input-field">
                        <label for="advertiser-message"><?= pll__('write message')?></label>
                        <input id="advertiser-message" name="Message"  type="text" placeholder="What do you have on mind?">
                    </div>
                    <div class="checkbox-label">
                        <label>
                            <input name="AgreeToReceiveCommunication" type="checkbox" class="filled-in" id="terms" />
                            <span><?php the_field('form_text');?></span>
                        </label>
                    </div>
                    <button class="btn waves-effect waves-light form-button" type="submit" name="action">submit
                        <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.127 9.5173C15.1798 8.90945 15.1798 7.38981 14.127 6.78196L2.87482 0.285522C1.82198 -0.322332 0.50594 0.437485 0.50594 1.65319L0.50594 14.6461C0.50594 15.8618 1.82198 16.6216 2.87482 16.0137L14.127 9.5173Z"
                                  fill="#100F0F"/>
                        </svg>
                    </button>
                </form>
                </felte-form>
            </div>
        </div>
    </div>
</section>

<?php
get_footer()
?>

