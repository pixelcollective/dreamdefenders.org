const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');

/**
 * @wordpress webpack helper
 */
module.exports = {
  /**
   * Dependency injection webpack plugin
   * @see @wordpress/dependency-extraction-webpack-plugin
   */
  DependencyExtractionWebpackPlugin,

  /**
   * Window aliases
   */
  aliases: function () {
    return this.packages.map(package => ({
      [`@wordpress/${package}`]: `wp.${this.camelCash(package)}`
    }));
  },

  /**
   * Utility to format package imports.
   * eg. @wordpress/block-library => wp.blockLibrary
   */
  camelCash: string => (
    string.replace(/-([a-z])/g, (match, letter) => letter.toUpperCase())
  ),

  /**
   * @wordpress npm package name reference
   */
  packages: [
    "a11y",
    "annotation",
    "api-fetch",
    "autop",
    "blob",
    "block-directory",
    "block-editor",
    "block-library",
    "blocks",
    "components",
    "compose",
    "core-data",
    "data-controls",
    "deprecated",
    "dom-ready",
    "edit-post",
    "edit-site",
    "edit-widgets",
    "editor",
    "element",
    "escape-html",
    "format-library",
    "hooks",
    "html-entities",
    "i18n",
    "i18n",
    "icons",
    "is-shallow-equal",
    "keyboard-shortcuts",
    "keycodes",
    "list-reusable-blocks",
    "media-utils",
    "notices",
    "nux",
    "plugins",
    "polyfill",
    "primitives",
    "priority-queue",
    "redux-routine",
    "rich-text",
    "server-side-render",
    "shortcode",
    "token-list",
    "url",
    "viewport",
    "warning",
    "wordcount"
  ],
}