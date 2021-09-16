/** @wordpress */
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";

/** components */
import edit from "./components/edit";

registerBlockType(`tinypixel/gallery-cta`, {
  title: __(`Gallery Call-to-action`, `tiny-pixel`),
  category: `dream-defenders`,
  icon: `format-image`,
  attributes: {
    heading: {
      type: "string",
    },
    media: {
      type: "object",
    },
    cta: {
      type: "object",
    },
  },
  supports: { align: true },
  edit,
  save: () => <InnerBlocks.Content />,
});
