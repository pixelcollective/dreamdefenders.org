const shuffle = array => {
  let counter = array.length

  // While there are elements in the array
  while(counter > 0) {
    // Pick a random index
    let index = Math.floor(Math.random() * counter)

    // Decrease counter by 1
    counter--

    // And swap the last element with it
    let temp = array[counter]
    array[counter] = array[index]
    array[index] = temp
  }
  return array
}

const curriedCssVarSetter = ref => (postfix = '') => v => {
  const tag = ref.current
  if (!tag) return

  Object.keys(v).forEach(key => {
    tag.style.setProperty(
      `--mouse-${key}${postfix ? `-${postfix}` : ''}`,
      v[key]
    )
  })
}

const noop = () => { }

export {
  noop,
  curriedCssVarSetter,
  shuffle,
}
