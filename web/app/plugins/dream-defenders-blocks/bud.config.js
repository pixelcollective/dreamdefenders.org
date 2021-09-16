const babel = require("@roots/bud-babel");
const react = require("@roots/bud-react");
const entrypoints = require("@roots/bud-entrypoints");
const externals = require("@roots/bud-wordpress-externals");
const manifests = require("@roots/bud-wordpress-manifests");

module.exports = (bud) => {
  bud
    .setPath("src", "resources/assets")
    .use([babel, entrypoints, externals, manifests, react])
    .entry({
      "scripts/extensions/editor": "scripts/extensions/editor.js",
      "scripts/blocks/banner/block": "scripts/blocks/Banner/block.js",
      "scripts/blocks/container/block": "scripts/blocks/Container/block.js",
      "scripts/blocks/freedom-paper/block":
        "scripts/blocks/FreedomPaper/block.js",
      "scripts/blocks/horizontal-card/block":
        "scripts/blocks/HorizontalCard/block.js",
      "scripts/blocks/two-column/block": "scripts/blocks/TwoColumn/block.js",
      "scripts/blocks/post-container/block":
        "scripts/blocks/PostContainer/block.js",
      "scripts/blocks/project-container/block":
        "scripts/blocks/ProjectContainer/block.js",
      "scripts/blocks/squadd/block": "scripts/blocks/Squadd/block.js",
      "scripts/blocks/gallery-cta/block": "scripts/blocks/GalleryCTA/block.js",
      "scripts/blocks/organize-cta/block":
        "scripts/blocks/OrganizeCTA/block.js",
      "scripts/blocks/form/block": "scripts/blocks/Form/block.js",
      "scripts/blocks/every-action/block":
        "scripts/blocks/EveryAction/block.js",
    })
    .persist();

  return bud;
};
