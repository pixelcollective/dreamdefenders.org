import React, { Component } from 'react'
import { Scrollbars } from 'react-custom-scrollbars'
import { lighten, transparentize } from 'polished'

export default class AppScrollbar extends Component {
  constructor(props, ...rest) {
    super(props, ...rest)
    this.renderThumb = this.renderThumb.bind(this)
    this.renderTrack = this.renderTrack.bind(this)
  }

  renderThumb({ style, ...props }) {
    return <div style={{
      ...style,
      backgroundColor: transparentize(0.1, lighten(0.05, this.props.thumbColor)),
      width: `10px`,
      right: `0px`,
      borderRadius: `5px`,
      margin: `0vh 0.4vw 1vh 0vw`,
    }} {...props} />
  }

  renderTrack({ style, ...props }) {
    return <div {...props}
      style={{
        ...style,
        backgroundColor: transparentize(0.8, lighten(0.1, this.props.trackColor)),
        width: `10px`,
        height: `80vh`,
        right: 0,
        borderRadius: `5px`,
        margin: `10vh 0.5vw 1vh 0vw`,
        zIndex: `9999`
      }} />
  }

  render() {
    return (
      <Scrollbars
        renderThumbHorizontal={this.renderThumb}
        renderThumbVertical={this.renderThumb}
        renderTrackVertical={this.renderTrack}
        onUpdate={this.handleUpdate}
        style={{
          width: `100vw`,
          height: `100vh`,
          position: `relative`
        }}
        {...this.props}>
        {this.props.children}
      </Scrollbars>
    )
  }
}
