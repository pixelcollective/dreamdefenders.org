/** @wordpress */
import { __ } from "@wordpress/i18n";
import domReady from "@wordpress/dom-ready";
import { unregisterBlockType, getBlockTypes } from '@wordpress/blocks'
import { select } from '@wordpress/data'
import { indexOf } from 'lodash'

/** util */
import { registerBlockStyles, unregisterBlockStyles } from "./register-styles";
import { setupInserterCategories } from "./inserter-categories";

/**
 * Fuck on off outta here nyah.
 */
domReady(() => getBlockTypes()
  .forEach(blockType => {
    if (
      blockType.name.includes('core-embed') &&
      blockType.name !== 'core-embed/youtube' &&
      blockType.name !== 'core-embed/twitter' &&
      blockType.name !== 'core-embed/facebook' &&
      blockType.name !== 'core-embed/instagram'
    ) {
      unregisterBlockType(blockType.name)
    }
  })
)

/**
 * Editor extensions
 */
domReady(() => {
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
})
