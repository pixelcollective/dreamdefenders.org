import React, {useEffect} from 'react'
import PropTypes from 'prop-types'

import {__} from '@wordpress/i18n'
import {
  InnerBlocks,
  BlockControls,
  useBlockProps,
} from '@wordpress/block-editor'

import {
  Dropdown,
  MenuGroup,
  MenuItem,
  Tip,
  Toolbar,
  ToolbarButton,
} from '@wordpress/components'

import {
  more,
  arrowLeft,
  arrowRight,
  arrowUp,
  arrowDown,
} from '@wordpress/icons'

import {Overlay} from '../components/Overlay'
import {useHover} from '../hooks/useHover'
import {useHasSelectedInner} from '../hooks/useHasSelectedInner'
import {ALLOWED_BLOCKS} from './constants'

const HoverTip = () => {
  const [hoverRef, isHovered] = useHover()

  return (
    <div>
      <Tip>
        <p>
          {__(
            'This component is not normally visible. Feel free to move it anywhere',
          )}
        </p>
      </Tip>
    </div>
  )
}

/**
 * @prop {array} attribute.enabled
 */
export function Edit({
  attributes,
  className,
  isSelected,
  setAttributes,
  clientId,
}) {
  const {open, enabled} = attributes
  const blockProps = useBlockProps()

  const isChildSelected = useHasSelectedInner(clientId)

  const setEnabled = value => setAttributes({enabled: value})

  const wrapperClassNames = [
    'flex',
    'p-4',
    'sm:block',
    'max-w-full',
    'mx-auto',
    'w-lg',
    'p-8',
  ]

  return (
    <section
      {...blockProps}
      data-enabled={enabled}
      className={className}>
      <BlockControls>
        <Toolbar>
          <Dropdown
            className="my-container-class-name"
            contentClassName="my-popover-content-classname"
            position="bottom center"
            renderToggle={({isOpen, onToggle}) => (
              <ToolbarButton
                icon={more}
                aria-expanded={isOpen}
                onClick={onToggle}>
                Modal Controls
              </ToolbarButton>
            )}
            renderContent={() => (
              <MenuGroup>
                <MenuItem icon={arrowUp}>Up</MenuItem>
                <MenuItem icon={arrowDown}>Down</MenuItem>
                <MenuItem icon={arrowLeft}>Left</MenuItem>
                <MenuItem icon={arrowRight}>Right</MenuItem>
              </MenuGroup>
            )}
          />
        </Toolbar>
      </BlockControls>
      <div className="flex text-gray-700 my-8">
        <div
          className="inline-block
           bg-white rounded-lg
  p-4 text-left overflow-hidden shadow-xl
  transform transition-all mx-auto w-3/4">
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

Edit.propTypes = {
  attributes: PropTypes.shape({
    open: PropTypes.bool,
    enabled: PropTypes.bool,
  }),
  className: PropTypes.string,
  setAttributes: PropTypes.func,
}
