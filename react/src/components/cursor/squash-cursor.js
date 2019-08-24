import React, { useEffect } from 'react'
import styled from 'styled-components'
import smooth from '../../animation/smooth'
import value from '../../animation/value'
import { CssEase } from '../../animation/ease'
import { CursorStates } from '../../const'
import pointer from '../../events/pointer'
import OpacityOnEnter from './opacity'

const Cursor1 = styled.div`
  --x:  ${p => `calc(var(--mouse-x-${p.refKey}, 0) * 1px)`};
  --y:  ${p => `calc(var(--mouse-y-${p.refKey}, 0) * 1px)`};
  --vx: ${p => `calc(1 + var(--mouse-v-${p.refKey}, 0))`};
  --vy: ${p => `calc(1 / 1 - var(--mouse-v-${p.refKey}, 0))`};
  --r:  ${p => `calc(var(--mouse-r-${p.refKey}, 0) * 1deg)`};
  z-index: 9999;
  position: relative;
  height: 25px;
  width: 25px;
  background-color: #fff;
  border-radius: 9999px;
  position: absolute;
  mix-blend-mode: difference;
  opacity: ${p => (p.state === CursorStates.HOVER ? 0 : 1)};
  transition: 0.1s opacity linear;
  transform:
    translate(-50%, -50%) translate(var(--x), var(--y))
    rotate(var(--r)) scale(var(--vx), var(--vy));
`

const Cursor2 = styled.div`
  --x: ${p => `calc(var(--mouse-x-${p.refKey}, 0) * 1px)`};
  --y: ${p => `calc(var(--mouse-y-${p.refKey}, 0) * 1px)`};
  position: absolute;
  opacity: 0.18;
  transform:
    translate(-50%, -50%) translate(var(--x), var(--y))
    scale(0.8);
`

const ArrowBase = styled.div`
  position: relative;
  height: 60px;
  width: 60px;
  background-color: white;
  border-radius: 9999px;
  transform-origin: 50% 50%;
`

const Arrow = styled.div`
  position: absolute;
  top: 50%;
  left: 50%;
  transition: 0.6s transform ${CssEase.inOutQuint};
  transform-origin: 50% 50%;
  transform:
    translate(-50%, -50%)
    ${p => {
      if (p.state === CursorStates.NEXT) {
        return `rotate(90deg) translateY(-21px)`;
      }

      if (p.state === CursorStates.PREV) {
        return `rotate(-90deg) translateY(-21px)`;
      }

      return `rotate(0) translateY(0px)`;
    }};
`

const ArrowInner = styled.div`
  position: relative;
  height: 30px;
  width: 30px;
  background-color: white;
  transform-origin: 50% 50%;
  transform: rotate(45deg);
`

const SquashCursor = ({ refKey, sourceValue, curriedSetter, state }) => {
  const refKey1 = `${refKey}-1`
  const refKey2 = `${refKey}-2`

  useEffect(() => {
    const v = value(sourceValue.getCurrent()).start(
      ({ current, velocity, rotation }) => {
          curriedSetter(refKey1)({
            ...current,
            v: Math.min(
              Math.sqrt(Math.pow(velocity.x, 2) + Math.pow(velocity.y, 2)),
              0.8
            ),
            vy: velocity.y * 0.5,
            r: rotation
          })
      }
    )

    const s1 = smooth(
      sourceValue.getCurrent(),
      { roundness: 0.4 },
    ).start(v.update)

    const s2 = smooth(
      sourceValue.getCurrent(),
      { roundness: 0.12 },
    ).start(curriedSetter(refKey2))

    const p = pointer(sourceValue.getCurrent()).start(v => {
      s1.update(v)
      s2.update(v)
    })

    return () => {
      p.stop()
      s1.stop()
      s2.stop()
    }
  }, [])

 return (
  <OpacityOnEnter>
   <Cursor2 refKey={refKey2}>
    <ArrowBase refKey={refKey1}>
     <Arrow state={state}>
      <ArrowInner />
     </Arrow>
    </ArrowBase>
   </Cursor2>
   <Cursor1 refKey={refKey1} state={state} />
  </OpacityOnEnter>
 )
}

export default SquashCursor
