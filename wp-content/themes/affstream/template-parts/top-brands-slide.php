<div class="swiper-slide">
    <div class="top-brand-card">
        <div class="icon-container">
            <img src="<?php echo $slide['brand_logo']; ?>" alt="<?= $slide['brands'] ?>">
        </div>
		<?php if ($slide['exclusive']) : ?>
            <svg class="exclusive" width="76" height="18" viewBox="0 0 76 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" width="74.6805" height="17.8722" rx="8.93611" fill="url(#paint0_linear_101_597)"/>
                <path d="M14.0712 11.5743V12.9363H8.86308V5.07503H14.0712V6.43154H10.5083V8.3274H13.8697V9.5913H10.5083V11.5743H14.0712ZM14.8394 12.9363L17.3345 8.99748V8.9539L14.8557 5.07503H16.7897L18.4567 7.90791H18.5003L20.1837 5.07503H22.0196L19.4483 8.98659V9.02472L21.987 12.9363H20.1129L18.3914 10.1851H18.3478L16.6154 12.9363H14.8394ZM25.9693 13.0725C23.6812 13.0725 22.2485 11.5416 22.2485 9.00293C22.2485 6.46968 23.6921 4.93883 25.9693 4.93883C27.8597 4.93883 29.298 6.13736 29.4233 7.89701H27.8216C27.6691 6.93274 26.9282 6.30079 25.9693 6.30079C24.7272 6.30079 23.9264 7.34133 23.9264 8.99748C23.9264 10.6754 24.7163 11.7105 25.9748 11.7105C26.95 11.7105 27.6527 11.1385 27.8271 10.2069H29.4287C29.2435 11.9611 27.8979 13.0725 25.9693 13.0725ZM35.5303 11.5743V12.9363H30.4475V5.07503H32.0927V11.5743H35.5303ZM37.9001 5.07503V9.99444C37.9001 11.0023 38.494 11.6615 39.5508 11.6615C40.6023 11.6615 41.1961 11.0023 41.1961 9.99444V5.07503H42.8413V10.1579C42.8413 11.8903 41.5611 13.0725 39.5508 13.0725C37.5351 13.0725 36.2549 11.8903 36.2549 10.1579V5.07503H37.9001ZM43.8601 10.6972H45.4454C45.5217 11.3455 46.1972 11.7704 47.0689 11.7704C47.946 11.7704 48.5452 11.351 48.5452 10.7735C48.5452 10.2614 48.1693 9.97809 47.2214 9.76563L46.1972 9.54227C44.7481 9.23174 44.0344 8.49628 44.0344 7.34678C44.0344 5.89765 45.2874 4.93883 47.0416 4.93883C48.8721 4.93883 50.0216 5.88131 50.0488 7.3032H48.5071C48.4526 6.63856 47.8697 6.23542 47.0471 6.23542C46.2354 6.23542 45.6906 6.62222 45.6906 7.20514C45.6906 7.69 46.0719 7.96239 46.9763 8.16941L47.9296 8.37098C49.5041 8.70875 50.1905 9.38428 50.1905 10.5828C50.1905 12.1082 48.9538 13.0725 47.0035 13.0725C45.1131 13.0725 43.9091 12.1736 43.8601 10.6972ZM52.849 12.9363H51.2038V5.07503H52.849V12.9363ZM58.2806 12.9363H56.2975L53.6553 5.07503H55.4967L57.2945 11.242H57.3326L59.1304 5.07503H60.9228L58.2806 12.9363ZM66.9372 11.5743V12.9363H61.729V5.07503H66.9372V6.43154H63.3743V8.3274H66.7356V9.5913H63.3743V11.5743H66.9372Z" fill="#EDEDFF"/>
                <defs>
                    <linearGradient id="paint0_linear_101_597" x1="0.5" y1="0" x2="65.4429" y2="35.624" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0C62FD"/>
                        <stop offset="1" stop-color="#1035B8"/>
                    </linearGradient>
                </defs>
            </svg>
		<?php endif; ?>
        <div class="brand-info">
            <div class="name-container">
                <h3><?= $slide['brands'] ?></h3>
				<?php if (isset($slide['flags']) && is_array($slide['flags']) && count($slide['flags']) > 0) : ?>
                    <ul class="flags-list">
						<?php foreach ($slide['flags'] as $flag) : ?>
							<?php if (isset($flag['flag']) && !empty($flag['flag'])) : ?>
                                <li><img src="<?= $flag['flag']; ?>" alt=""></li>
							<?php endif; ?>
						<?php endforeach; ?>
                        <?php
                        if (   $slide['number_of_countries']):?>
                        <li class="count-country">+ <?= $slide['number_of_countries']?></li>
                        <?php
                        endif;
                        ?>
                    </ul>
				<?php endif; ?>
            </div>
            <div class="flex-container">
				<?php
				$terms = $slide['terms'];
				if (is_array($terms) && count($terms) > 0) :
					foreach ($terms as $term) :
						?>
                        <span>
                            <?= $term['term'] ?>
                        </span>
					<?php
					endforeach;
				endif;
				?>
            </div>
        </div>
    </div>
</div>

