import React, {
  createContext,
  useContext,
  useState,
  useCallback,
} from 'react'
import { AppStates as State } from '../const'
import Content from '../content'

const NumSlides = Object.keys(State).length

const wrapIndex = v => ((v % NumSlides) + NumSlides) % NumSlides

const IndexContext = createContext()

export const IndexProvider = ({ children }) => {
  const [disabled, setDisabled] = useState(false)
  const [index, setIndexUnchecked] = useState(0)

  const setIndex = useCallback(
    fn => {
      !disabled && setIndexUnchecked(v =>
        wrapIndex(fn(v))
      )
    },
    [disabled]
  )

  const incrementIndex = useCallback(() =>
    setIndex(v => v + 1),
    [setIndex],
  )

  const decrementIndex = useCallback(() =>
    setIndex(v => v - 1),
    [setIndex],
  )

  const disableStateUpdates = useCallback(() =>
    setDisabled(true),
    [],
  )

  const enableStateUpdates = useCallback(() =>
    setDisabled(false),
    [],
  )

  return (
    <IndexContext.Provider
      value={{
        currentState: Content[
          Object.values(State)[index]
        ],
        setIndex,
        incrementIndex,
        decrementIndex,
        disabled,
        disableStateUpdates,
        enableStateUpdates
      }}>
      {children}
    </IndexContext.Provider>
  )
}

export const useIndexContext = () => useContext(IndexContext)
