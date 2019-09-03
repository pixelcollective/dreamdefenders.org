import React from 'react'
import { Box } from 'rebass'

const Grid = props => (
  <Box
    sx={{
      display: 'grid',
      gridGap: 0,
      gridTemplateColumns: 'repeat(auto-fit, minmax(500px, 1fr))',
    }}>
    {props.children}
  </Box>
)

export default Grid
