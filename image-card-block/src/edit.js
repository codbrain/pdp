import { __ } from '@wordpress/i18n';
import {
    InspectorControls,
    MediaUpload,
    MediaUploadCheck,
    RichText,
    useBlockProps,
} from '@wordpress/block-editor';
import { Button, PanelBody, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { imageUrl, imageAlt, title, text, buttonText, buttonUrl } = attributes;
    const blockProps = useBlockProps({ className: 'image-card' });

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Card settings', 'image-card-block')} initialOpen>
                    <TextControl
                        label={__('Button text', 'image-card-block')}
                        value={buttonText}
                        onChange={(value) => setAttributes({ buttonText: value })}
                    />
                    <TextControl
                        label={__('Button URL', 'image-card-block')}
                        value={buttonUrl}
                        onChange={(value) => setAttributes({ buttonUrl: value })}
                    />
                    <TextControl
                        label={__('Image alt text', 'image-card-block')}
                        value={imageAlt}
                        onChange={(value) => setAttributes({ imageAlt: value })}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <div className="image-card__media">
                    <MediaUploadCheck>
                        <MediaUpload
                            onSelect={(media) =>
                                setAttributes({
                                    imageUrl: media?.url || '',
                                    imageAlt: media?.alt || imageAlt || '',
                                })
                            }
                            allowedTypes={['image']}
                            value={imageUrl}
                            render={({ open }) => (
                                <Button variant="secondary" onClick={open}>
                                    {imageUrl
                                        ? __('Change image', 'image-card-block')
                                        : __('Select image', 'image-card-block')}
                                </Button>
                            )}
                        />
                    </MediaUploadCheck>

                    {imageUrl && <img src={imageUrl} alt={imageAlt} />}
                </div>

                <RichText
                    tagName="h3"
                    className="image-card__title"
                    value={title}
                    onChange={(value) => setAttributes({ title: value })}
                    placeholder={__('Card title…', 'image-card-block')}
                />

                <RichText
                    tagName="p"
                    className="image-card__text"
                    value={text}
                    onChange={(value) => setAttributes({ text: value })}
                    placeholder={__('Card text…', 'image-card-block')}
                />

                {buttonText && <span className="image-card__button">{buttonText}</span>}
            </div>
        </>
    );
}
