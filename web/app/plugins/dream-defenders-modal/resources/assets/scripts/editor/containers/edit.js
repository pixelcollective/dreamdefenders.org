import React from 'react'

import {__} from '@wordpress/i18n'
import {
  InnerBlocks,
  useBlockProps,
} from '@wordpress/block-editor'

import {ALLOWED_BLOCKS} from './constants'

export function Edit({attributes, className}) {
  const {enabled} = attributes
  const blockProps = useBlockProps()

  return (
    <section
      {...blockProps}
      data-enabled={enabled}
      className={className}>
      <div className="flex text-gray-700 my-8">
        <div className="inline-block bg-white rounded-lg p-4 text-left overflow-hidden shadow-xl transform transition-all mx-auto w-3/4">
          <div>
            <InnerBlocks
              allowedBlocks={ALLOWED_BLOCKS}
              template={[
                ['core/image', {}],
                [
                  'core/heading',
                  {level: 3, placeholder: 'Modal title'},
                ],
                ['core/paragraph', {placeholder: 'Modal body'}],
              ]}
            />
          </div>
          <div className="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button
              type="button"
              className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
              Close
            </button>
          </div>
        </div>
      </div>
    </section>
  )
}
