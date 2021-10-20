import React, {useEffect, useRef, useState} from 'react'
import {Overlay} from '../editor/components/Overlay'
import ScrollLock from 'react-scrolllock'

export const Modal = () => {
  const tinymodal = useRef(window.tinymodal)

  const [open, setOpen] = useState(true)
  const [content, setContent] = useState('')

  useEffect(() => {
    setContent(tinymodal.current.content)
  }, [tinymodal])

  return content && open ? (
    <>
      <Overlay
        render={() => (
          <div
            className={`flex flex-align-center fixed h-screen w-screen fixed top-0 left-0 right-0 bottom-0 z-50 bg-white bg-opacity-75 overflow-hidden`}
            onClick={() => setOpen(false)}
          />
        )}
      />

      <div
        className={`overflow-y-scroll fixed top-0 bottom-0 md:mb-48 md:mt-32 mb-0 mt-24 mx-auto p-2 left-0 right-0 z-50 mx-auto max-w-screen md:max-w-3xl w-3xl max-h-screen md:max-h-8/12 md:h-8/12 bg-white rounded-lg shadow-xl`}>
        <div dangerouslySetInnerHTML={{__html: content}} />
        <div className="mt-3 sm:mt-4">
          <button
            type="button"
            onClick={() => setOpen(false)}
            className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm pointer-events-auto">
            Close
          </button>
        </div>
      </div>
    </>
  ) : (
    []
  )
}
