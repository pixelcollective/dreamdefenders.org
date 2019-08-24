// react
import React, { useEffect, useMemo, useRef } from 'react'

// styled-components
import styled from 'styled-components'

// utilities
import value from './../../animation/value'
import pointer from './../../events/pointer'
import { curriedCssVarSetter } from './../../utils'

// cursors
import SimpleCursor from './simple-cursor'
import SquashCursor from './squash-cursor'
import DoubleCursor from './double-cursor'

// state and const
import { useIndexContext }      from './../../state'
import { useCursorState }       from './../../state/cursor'
import { AppStates, ORIGIN_2D } from './../../const'

const Container = styled.div`
  position: absolute;
  pointer-events: none;
`

const Cursor = () => {
  const ref = useRef()
  const { currentState } = useIndexContext()
  const { state } = useCursorState()

  const sourceValue = useMemo(() => {
    return value(ORIGIN_2D).start()
  }, [])

  useEffect(() => {
    const p = pointer().start(sourceValue.update)
    return () => p.stop()
  }, [])

  return (
    <Container ref={ref}>
      {
        {
          [AppStates.SIMPLE]: (
            <SimpleCursor
              refKey={AppStates.SIMPLE}
              state={state}
              sourceValue={sourceValue}
              curriedSetter={curriedCssVarSetter(ref)}
            />
          ),
          [AppStates.STRETCH]: (
            <SquashCursor
              refKey={AppStates.STRETCH}
              state={state}
              sourceValue={sourceValue}
              curriedSetter={curriedCssVarSetter(ref)}
            />
          ),
          [AppStates.DOUBLE]: (
            <DoubleCursor
              refKey={AppStates.DOUBLE}
              state={state}
              sourceValue={sourceValue}
              curriedSetter={curriedCssVarSetter(ref)}
            />
          )
        }[currentState.key]
      }
    </Container>
  )
}

export default Cursor
