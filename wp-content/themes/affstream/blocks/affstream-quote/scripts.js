const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;

registerBlockType( 'my-custom-block', {
	title: 'My Custom Block',
	icon: 'smiley',
	category: 'common',

	edit() {
		return createElement( 'p', null, 'Editing My Custom Block...' );
	},

	save() {
		return createElement( 'p', null, 'Saved My Custom Block!' );
	},
} );
