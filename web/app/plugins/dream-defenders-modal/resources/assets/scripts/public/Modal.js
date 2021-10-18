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
      <ScrollLock isActive={open} />

      <Overlay
        render={() => (
          <div
            className={`flex flex-align-center h-screen w-screen fixed top-0 left-0 right-0 bottom-0 z-50 bg-white bg-opacity-75 overflow-y-scroll h-full w-full`}
            onClick={() => setOpen(false)}
          />
        )}
      />

      <div
        className={`flex flex-align-center fixed top-32 md:top-1/4 md:left-8 left-0 right-0 z-50 overflow-y-scroll sm:max-w-lg h-full sm:h-3/5 lg:h-128 max-h-3/5 w-screen mx-auto bg-white rounded-lg shadow-xl  pointer-events-none`}>
        <div className="md:flex md:flex-col md:justify-between bg-white rounded-lg p-2 md:p-4 w-screen max-w-3xl text-left mx-auto z-50">
          <div
            dangerouslySetInnerHTML={{__html: content}}
            className="pointer-events-auto"
          />
          <div className="mt-5 sm:mt-6">
            <button
              type="button"
              onClick={() => setOpen(false)}
              className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm pointer-events-auto">
              Close
            </button>
          </div>
        </div>
      </div>
    </>
  ) : (
    []
  )
}
