module.exports = (build) => {
  build.mix.copyDirectory(build.src`images`, build.out`images`)
            .copyDirectory(build.src`fonts`, build.out`fonts`)
}
