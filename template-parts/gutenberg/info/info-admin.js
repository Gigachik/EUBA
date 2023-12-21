const { __ } = wp.i18n;
const { RangeControl } = wp.components;
const { InspectorControls } = wp.blockEditor;

wp.blocks.registerBlockType("acf/info", {
    title: __("Info"),
    icon: "align-full-width",
    category: "theme",
    attributes: {
        spacing: {
            type: "number",
            default: 0,
        },
    },

    edit: ({ attributes, setAttributes }) => {
        const { spacing } = attributes;

        return (
            <div>
                <InspectorControls>
                    <RangeControl
                        label={__("Spacing")}
                        value={spacing}
                        onChange={(value) => setAttributes({ spacing: value })}
                        min={0}
                        max={100}
                    />
                </InspectorControls>
                {/* Rest of your block editing interface */}
            </div>
        );
    },

    save: ({ attributes }) => {
        return <div>{/* Block content */}</div>;
    },
});
