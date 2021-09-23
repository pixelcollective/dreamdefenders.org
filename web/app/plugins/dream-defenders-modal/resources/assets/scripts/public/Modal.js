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
            className={`flex flex-align-center h-screen w-screen fixed top-0 left-0 right-0 bottom-0 z-50 bg-white bg-opacity-75`}
          />
        )}
      />

      <div
        className={`flex flex-align-center fixed top-0 left-0 right-0 bottom-0 z-50`}>
        <div className="fixed top-1/4 left-8 right-8 bg-white rounded-lg p-4 text-left overflow-hidden shadow-xl mx-auto max-w-lg">
          <div dangerouslySetInnerHTML={{__html: content}} />
          <div className="mt-5 sm:mt-6">
            <button
              type="button"
              onClick={() => setOpen(false)}
              className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
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
