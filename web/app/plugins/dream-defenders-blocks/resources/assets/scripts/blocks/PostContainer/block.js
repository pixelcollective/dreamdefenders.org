/** @wordpress */
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";

/** components */
import edit from "./components/edit";

registerBlockType("tinypixel/post-container", {
  title: __("Post container", "tiny-pixel"),
  category: "dream-defenders",
  attributes: {
    title: { type: "string" },
    date: { type: "string" },
    media: { type: "object" },
  },
  supports: { align: true },
  edit,
  save: () => <InnerBlocks.Content />,
});
