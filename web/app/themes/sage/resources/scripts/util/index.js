/**
 * Utilities
 */

const disableScrollEvent = () => window.scrollTo(0, 0)
const disableScroll      = () => window.addEventListener(`scroll`, disableScrollEvent)
const enableScroll       = () => window.removeEventListener(`scroll`, disableScrollEvent)

export {
  disableScroll,
  enableScroll,
}
