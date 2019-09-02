import React from 'react'
import { Box } from 'rebass'

const Container = props => (
  <Box
    sx={{
      maxWidth: 722,
      mx: 'auto',
      px: 1,
    }}>
    {props.children}
  </Box>
)

export default Container
