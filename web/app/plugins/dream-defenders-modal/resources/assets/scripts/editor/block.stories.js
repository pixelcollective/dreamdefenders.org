/** @storybook */
import React from 'react'
import {withKnobs, text} from '@storybook/addon-knobs'

/** Components */
import {edit as Statistics} from './containers/edit'
import EditorPreview from '../../../../.storybook/stories/playground'

/** Styles */
import './../../styles/tailwind.css'

/**
 * Story
 */
export default {
  title: 'Statistics Block',
  decorators: [withKnobs],
}

/**
 * Block Preview
 */
export const Editor = () => (
  <EditorPreview>
    <Statistics
      className="wp-block-tiny-pixel-statistics"
      setAttributes={() => null}
      attributes={{
        stats: [
          {
            label: text('Label', 'Figure #1', 'Item #1'),
            figure: text('Figure', '8k', 'Item #1'),
          },
          {
            label: text('Label', 'Figure #2', 'Item #2'),
            figure: text('Figure', '8k', 'Item #2'),
          },
          {
            label: text('Label', 'Figure #3', 'Item #3'),
            figure: text('Figure', '8k', 'Item #3'),
          },
          {
            label: text('Label', 'Figure #1', 'Item #4'),
            figure: text('Figure', '8k', 'Item #4'),
          },
        ],
      }}
    />
  </EditorPreview>
)

/**
 * Theme Preview
 */
export const Theme = () => (
  <Statistics
    className="wp-block-tiny-pixel-statistics"
    setAttributes={() => null}
    attributes={{
      stats: [
        {
          label: text('Label', 'Figure #1', 'Item #1'),
          figure: text('Figure', '8k', 'Item #1'),
        },
        {
          label: text('Label', 'Figure #2', 'Item #2'),
          figure: text('Figure', '8k', 'Item #2'),
        },
        {
          label: text('Label', 'Figure #3', 'Item #3'),
          figure: text('Figure', '8k', 'Item #3'),
        },
        {
          label: text('Label', 'Figure #1', 'Item #4'),
          figure: text('Figure', '8k', 'Item #4'),
        },
      ],
    }}
  />
)
