import React from 'react'

export const Overlay = ({render: Render, isSelected}) => (
  <div className="relative w-full h-full flex p-8">
    <Render />
    <div
      className={`
        absolute inset-0 bg-white z-10 h-full w-100
        transition transition-duration-200 overflow-hidden
        ${
          isSelected
            ? `bg-opacity-0 ring-1 ring-offset-2 ring-indigo-500`
            : `bg-opacity-75`
        }
      `}
    />
  </div>
)
