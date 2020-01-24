// @wordpress
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";

// components
import { edit } from "./components/edit";

registerBlockType(`tinypixel/twocolumn`, {
  title: __(`Two column`, `tiny-pixel`),
  category: `common`,
  icon: `hammer`,
  attributes: {
    heading: {
      type: `string`
    },
    media: {
      type: `object`,
    },
  },
  supports: {
    align: true,
  },
  edit,
  save: () => <InnerBlocks.Content />
})
