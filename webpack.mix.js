const stringify = require('code-stringify')

const onComplete = () => console.log(build.dump())

const build = require('./build/mix')()

build.then(() => require('fs').writeFile(`./mix.dump.js`, `
  const mixConfig = ${stringify(build.dump(), null, 2)}
`, onComplete))
