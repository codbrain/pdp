import { registerBlockType } from '@wordpress/blocks';
import { 
    useBlockProps, 
    MediaUpload, 
    MediaUploadCheck,
    InspectorControls
} from '@wordpress/block-editor';
import { 
    PanelBody, 
    TextControl,
    TextareaControl,
    RangeControl
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import './style.scss';

registerBlockType('cards-grid-block/card', {
    title: 'Card',
    icon: 'format-image',
    category: 'layout',
    parent: ['cards-grid-block/cards-grid'],
    attributes: {
        backgroundImage: {
            type: 'string',
            default: ''
        },
        title: {
            type: 'string',
            default: ''
        },
        text: {
            type: 'string',
            default: ''
        },
        paddingTop: {
            type: 'number',
            default: 0
        }
    },
    edit: ({ attributes, setAttributes }) => {
        const { backgroundImage, title, text, paddingTop } = attributes;
        const blockProps = useBlockProps({
            className: 'card-item',
            style: {
                backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                paddingTop: `${paddingTop}px`
            }
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Card Settings')}>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) => setAttributes({ 
                                    backgroundImage: media.url 
                                })}
                                allowedTypes={['image']}
                                value={backgroundImage}
                                render={({ open }) => (
                                    <button onClick={open}>
                                        {backgroundImage ? 'Change Image' : 'Select Image'}
                                    </button>
                                )}
                            />
                        </MediaUploadCheck>
                        <TextControl
                            label={__('Title')}
                            value={title}
                            onChange={(value) => setAttributes({ title: value })}
                        />
                        <TextareaControl
                            label={__('Text')}
                            value={text}
                            onChange={(value) => setAttributes({ text: value })}
                        />
                        <RangeControl
                            label={__('Top Spacing (px)')}
                            value={paddingTop}
                            onChange={(value) => setAttributes({ paddingTop: value || 0 })}
                            min={0}
                            max={200}
                            step={5}
                        />
                    </PanelBody>
                </InspectorControls>
                <div {...blockProps}>
                    <div className="card-content">
                        <h3 className="card-title">{title || 'Card Title'}</h3>
                        <p className="card-text">{text || 'Card text goes here...'}</p>
                    </div>
                </div>
            </>
        );
    },
    save: ({ attributes }) => {
        const { backgroundImage, title, text, paddingTop } = attributes;
        const blockProps = useBlockProps.save({
            className: 'card-item',
            style: {
                backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                paddingTop: `${paddingTop}px`
            }
        });

        return (
            <div {...blockProps}>
                <div className="card-content">
                    {title && <h3 className="card-title">{title}</h3>}
                    {text && <p className="card-text">{text}</p>}
                </div>
            </div>
        );
    }
});