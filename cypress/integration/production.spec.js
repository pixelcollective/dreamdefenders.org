/**
 * Site definition
 */
const base = `https://dreamdefenders.org`
const tinypixel = {
  name: `Dream Defenders`,
  base,
  pages: {
    front: `${base}/`,
  },
}

/**
 * Front page
 */
describe(`Front page integration tests`, () => {
  it(`Front page is available`, () => {
    cy.on('uncaught:exception', () => {
      return false
    })

    cy.viewport(`iphone-6`)
      .visit(tinypixel.pages.front)
      .percySnapshot(`Front page test`)
  })
})
