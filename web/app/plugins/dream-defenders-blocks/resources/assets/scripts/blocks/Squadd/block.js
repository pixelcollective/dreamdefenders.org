/** @wordpress */
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";

/** components */
import { edit } from "./components/edit";

registerBlockType("tinypixel/squadd", {
  title: __("Squadd", "tiny-pixel"),
  category: "dream-defenders",
  icon: "hammer",
  attributes: {
    squaddName: {
      type: "string",
    },
    media: {
      type: "object",
    },
    city: {
      type: "string",
    },
    email: {
      type: "string",
    },
    join: {
      type: "url",
    },
    twitter: {
      type: "object",
    },
    facebook: {
      type: "object",
    },
    instagram: {
      type: "object",
    },
  },
  supports: {
    align: true,
  },
  edit,
  save: () => null,
});
