import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import './style.scss';

registerBlockType('cards-grid-block/cards-grid', {
    title: 'Cards Grid',
    icon: 'grid-view',
    category: 'layout',
    supports: {
        align: ['wide', 'full']
    },
    edit: () => {
        return (
            <div className="cards-grid-block-container">
                <InnerBlocks
                    allowedBlocks={['cards-grid-block/card']}
                    template={[['cards-grid-block/card']]}
                />
            </div>
        );
    },
    save: () => {
        return (
            <div className="cards-grid-block-container">
                <InnerBlocks.Content />
            </div>
        );
    }
});