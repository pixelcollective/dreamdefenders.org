/** @wordpress */
import { __ } from "@wordpress/i18n";
import domReady from "@wordpress/dom-ready";
import { unregisterBlockType, getBlockTypes } from '@wordpress/blocks'
import { indexOf } from 'lodash'

/** util */
import { registerBlockStyles, unregisterBlockStyles } from "./register-styles";
import { setupInserterCategories } from "./inserter-categories";

/**
 * Editor extensions
 */
setupInserterCategories({
  category: "dream-defenders"
});

/**
 * Unregister existing block styles.
 */
unregisterBlockStyles([
  {
    block: "core/button",
    styles: ["outline", "fill"]
  },
  {
    block: "core/image",
    styles: ["default", "circle-mask"]
  },
  {
    block: "core/pullquote",
    styles: ["default", "solid-color"]
  },
  {
    block: "core/table",
    styles: ["regular", "stripes"]
  },
  {
    block: "core/quote",
    styles: ["default", "large"]
  }
]);

/**
 * Register new block styles.
 */
registerBlockStyles([
  {
    block: "core/button",
    styles: [
      {
        name: "solid",
        label: __("Solid", "sage")
      },
      {
        name: "outline",
        label: __("Outline", "sage")
      }
    ]
  },
  {
    block: "core/pullquote",
    styles: [
      {
        name: "chonk",
        label: __("Chonk", "sage")
      }
    ]
  },
  {
    block: "core/heading",
    styles: [
      {
        name: "epic",
        label: __("Epic", "sage")
      },
    ],
  }
]);

domReady(() => {
  const whitelist = [
    `tinypixel/banner`,
    `tinypixel/container`,
    `tinypixel/freedom-paper`,
    `tinypixel/horizontal-card`,
    `tinypixel/post-container`,
    `tinypixel/project-container`,
    `tinypixel/squadd`,
    `tinypixel/two-column`,
    `tinypixel/gallery-cta`,
    `tinypixel/dream-defenders`,
    `tinypixel/form`,
    `tinypixel/organize-cta`,
    `pdf-viewer-block/standard`,
    `core/button`,
    `core/cover`,
    `core/file`,
    `core/gallery`,
    `core/group`,
    `core/heading`,
    `core/html`,
    `core/image`,
    `core/list`,
    `core/paragraph`,
    `core/pullquote`,
    `core/reusable`,
    `core/shortcode`,
    `core/quote`,
    `core/table`,
    `core/video`,
  ];

  getBlockTypes().forEach(({ name }) => {
    indexOf(whitelist, name) === -1
      && unregisterBlockType(name)
  });
})
