import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const { imageUrl, imageAlt, title, text, buttonText, buttonUrl } = attributes;
    const blockProps = useBlockProps.save({
        className: 'image-card',
    });

    return (
        <div {...blockProps}>
            {imageUrl && (
                <div className="image-card__media">
                    <img src={imageUrl} alt={imageAlt} />
                </div>
            )}

            <RichText.Content tagName="h3" className="image-card__title" value={title} />
            <RichText.Content tagName="p" className="image-card__text" value={text} />

            {buttonText && (
                <a className="image-card__button" href={buttonUrl || '#'}>
                    {buttonText}
                </a>
            )}
        </div>
    );
}
