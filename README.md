# Tiny Pixel WordPress Template

<p>
  <img src="https://img.shields.io/badge/version-0.0.1-blue.svg?cacheSeconds=2592000" />
  <a href="https://github.com/pixelcollective/a-project-url">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" target="_blank" />
  </a>
  <a href="https://opensource.org/licenses/MIT">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" target="_blank" />
  </a>
  <a href="https://twitter.com/tinydevteam">
    <img alt="Twitter: tinydevteam" src="https://img.shields.io/twitter/follow/tinydevteam.svg?style=social" target="_blank" />
  </a>
</p>

> A Tiny Pixel project for a Tiny Pixel client or friend.

### 🏠 [Homepage](https://tinypixel.dev)

## Notes for friends

- This template uses lerna to manage JS dependencies and share a single tailwind configuration file between all plugins and themes that tap into it. To build stuff you run `yarn` and `yarn build` from `/bedrock`, not the theme/plugin dirs. If you need to add a dependency to either the theme or a plugin you add the dependency where it is being utilized, as normal. Afterward, run `yarn` in `bedrock` again to sync the dependency with the `yarn workspace`.

- This starter uses Tiny Pixel Co's `tiny-packagist` satispress. In order to use this project outside of Tiny Pixel you will need to remove those dependencies from `bedrock/composer.json` (in both `"repositories"` and `"require"`.) You will also need to modify the `build-after.yml` to not pull from `tiny-packagist`, as you will not have authentication and this will cause deploys to fail.

- Currently, `Acorn` packages are installed to the theme directory. The `acorn-roles`, `acorn-admin-menu` and `acorn-models` packages are intended to be consumed by the theme. I will update this template when those changes are made.

## Contributors

👤 **Kelly Mears**

* Twitter: [@twinfleeks](https://twitter.com/twinfleeks)
* Github: [@kellymears](https://github.com/kellymears)

## Contribution Guidelines

This project is open-soure and we are grateful for contributions. If you have a suggestion or improvement, please follow our [code of conduct]({github_url}/tree/master/CODE-OF-CONDUCT.md).

## License

Copyright © 2019 [Tiny Pixel Collective](https://github.com/pixelcollective).<br />
This project is [MIT](https://opensource.org/licenses/MIT) licensed.