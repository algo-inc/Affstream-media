const iframe = document.getElementById( 'ytiframe' );
const modal = document.getElementById( 'video-modal' );

function showModal( id ) {
	modal.style.display = 'block';
	iframe.src = 'https://www.youtube.com/embed/' + id;
}

function closeModal() {
	modal.style.display = 'none';
	iframe.src = '';
}

new Swiper( '.video-slider', {
	loop: true,
	slidesPerView: 1,
	navigation: {
		nextEl: '#<?= $mediaSliderNext ?>',
		prevEl: '#<?= $mediaSliderPrev ?>',
	},
	pagination: {
		el: '#<?= $mediaSliderPagination ?>',
		type: 'bullets',
	},
} );
