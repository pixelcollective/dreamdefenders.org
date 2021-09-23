/** @wordpress */
import React, {useState} from 'react'
import {
	BlockEditorKeyboardShortcuts,
	BlockEditorProvider,
	WritingFlow,
	ObserveTyping,
} from '@wordpress/block-editor'
import {
	Popover,
	SlotFillProvider,
	DropZoneProvider,
} from '@wordpress/components'
import '@wordpress/format-library'

/**
 * Editor Preview
 */
export default ({children}) => {
  const [blocks, updateBlocks] = useState([])

	return (
		<SlotFillProvider>
			<DropZoneProvider>
				<BlockEditorProvider
					value={blocks}
					onInput={updateBlocks}
					onChange={updateBlocks}>
					<div className="editor-styles-wrapper">
						<Popover.Slot name="block-toolbar" />
						<BlockEditorKeyboardShortcuts />
						<WritingFlow>
							<ObserveTyping>
								{children}
							</ObserveTyping>
						</WritingFlow>
					</div>
				</BlockEditorProvider>
			</DropZoneProvider>
		</SlotFillProvider>
	)
}
