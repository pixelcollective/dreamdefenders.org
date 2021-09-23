/** @wordpress */
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";

/** @tinypixelco components */
import edit from "./components/edit";

/**
 * @tinypixel/banner
 */
registerBlockType("tinypixel/banner", {
  title: __("Banner", "tiny-pixel"),
  category: "dream-defenders",
  attributes: {
    title: {
      type: "string",
    },
    align: {
      type: "string",
      value: "full",
      default: "full",
    },
    background: {
      type: "object",
      default: {
        media: null,
        attachment: "default",
        position: {
          x: 0.5,
          y: 0.5,
        },
        size: "cover",
        scale: 100,
      },
    },
    containerSize: {
      type: "object",
      default: {
        height: "500px",
      },
    },
    classes: {
      type: "string",
      default: "wp-block-tinypixel-banner",
    },
    overlay: {
      type: "object",
      default: {
        raw: "#000000",
        opacity: 8,
        rendered: "rgba(0, 0, 0, 0.8)",
      },
    },
  },
  supports: {
    align: true,
  },
  edit,
  save: () => <InnerBlocks.Content />,
});
