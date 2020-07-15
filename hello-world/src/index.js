import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

const blockStyle = {
    backgroundColor: '#222',
    color: '#fff',
    padding: '20px',
};

registerBlockType( 'cb-blocks/hello-world', {
    title: __( 'Hello World', 'cb-blocks' ),
    icon: 'smiley',
    category: 'cb-blocks',
    example: {},
    edit() {
        return (
            <div style={ blockStyle }>
                Hello World Witnin the editor.
            </div>
        )
    },
    save() {
        return (
            <div style={ blockStyle }>
                Hello World on the front end.
            </div>
        )
    },
} );