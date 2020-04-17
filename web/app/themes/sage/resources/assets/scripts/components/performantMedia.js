import 'intersection-observer'
import lozad from 'lozad'

export default () => (
  lozad(`.lazy-load`, {
    rootMargin: `300px 0px`,
    loaded: el => el.classList.add(`is-loaded`),
  }).observe()
)()
