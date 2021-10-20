!function(){"use strict";var e={n:function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(r,{a:r}),r},d:function(t,r){for(var n in r)e.o(r,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:r[n]})}};e.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),e.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var t;e.g.importScripts&&(t=e.g.location+"");var r=e.g.document;if(!t&&r&&(r.currentScript&&(t=r.currentScript.src),!t)){var n=r.getElementsByTagName("script");n.length&&(t=n[n.length-1].src)}if(!t)throw new Error("Automatic publicPath is not supported in this browser");t=t.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),e.p=t}(),function(e,t,r){var n=window.wp.i18n,o=window.wp.blocks,a=window.React,i=r.n(a),l=window.wp.blockEditor;const c=["core/paragraph","core/image","core/heading","core/list","core/button","core/quote","core/pullquote","core/spacer"];function s(){return s=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},s.apply(this,arguments)}var u=JSON.parse('{"Y":{"enabled":{"type":"boolean","default":true},"open":{"type":"boolean","default":false}}}');(0,o.registerBlockType)("tiny-pixel/modal",{title:(0,n.__)("Modal","tiny-pixel"),description:(0,n.__)("Display content in a modal window","tiny-pixel"),category:"common",supports:{align:!1,customClassName:!1,html:!1,inserter:!0,multiple:!1,reusable:!0},attributes:u.Y,edit:function({attributes:e,className:t}){const{enabled:r}=e,n=(0,l.useBlockProps)();return i().createElement("section",s({},n,{"data-enabled":r,className:t}),i().createElement("div",{className:"flex text-gray-700 my-8"},i().createElement("div",{className:"inline-block bg-white rounded-lg p-4 text-left overflow-hidden shadow-xl transform transition-all mx-auto w-3/4"},i().createElement("div",null,i().createElement(l.InnerBlocks,{allowedBlocks:c,template:[["core/image",{}],["core/heading",{level:3,placeholder:"Modal title"}],["core/paragraph",{placeholder:"Modal body"}]]})),i().createElement("div",{className:"mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense"},i().createElement("button",{type:"button",className:"w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm"},"Close")))))},save:()=>i().createElement(l.InnerBlocks.Content,null)})}(0,0,e),function(e,t,r){r.p}(0,0,e)}();
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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dHJhcCIsIndlYnBhY2s6Ly9AZHJlYW1kZWZlbmRlcnMvbW9kYWwvd2VicGFjay9ydW50aW1lL2NvbXBhdCBnZXQgZGVmYXVsdCBleHBvcnQiLCJ3ZWJwYWNrOi8vQGRyZWFtZGVmZW5kZXJzL21vZGFsL3dlYnBhY2svcnVudGltZS9kZWZpbmUgcHJvcGVydHkgZ2V0dGVycyIsIndlYnBhY2s6Ly9AZHJlYW1kZWZlbmRlcnMvbW9kYWwvd2VicGFjay9ydW50aW1lL2dsb2JhbCIsIndlYnBhY2s6Ly9AZHJlYW1kZWZlbmRlcnMvbW9kYWwvd2VicGFjay9ydW50aW1lL2hhc093blByb3BlcnR5IHNob3J0aGFuZCIsIndlYnBhY2s6Ly9AZHJlYW1kZWZlbmRlcnMvbW9kYWwvd2VicGFjay9ydW50aW1lL3B1YmxpY1BhdGgiLCJ3ZWJwYWNrOi8vQGRyZWFtZGVmZW5kZXJzL21vZGFsL2V4dGVybmFsIHdpbmRvdyBbXCJ3cFwiLFwiaTE4blwiXSIsIndlYnBhY2s6Ly9AZHJlYW1kZWZlbmRlcnMvbW9kYWwvZXh0ZXJuYWwgd2luZG93IFtcIndwXCIsXCJibG9ja3NcIl0iLCJ3ZWJwYWNrOi8vQGRyZWFtZGVmZW5kZXJzL21vZGFsL2V4dGVybmFsIHdpbmRvdyBcIlJlYWN0XCIiLCJ3ZWJwYWNrOi8vQGRyZWFtZGVmZW5kZXJzL21vZGFsL2V4dGVybmFsIHdpbmRvdyBbXCJ3cFwiLFwiYmxvY2tFZGl0b3JcIl0iLCJ3ZWJwYWNrOi8vQGRyZWFtZGVmZW5kZXJzL21vZGFsLy4vcmVzb3VyY2VzL2Fzc2V0cy9zY3JpcHRzL2VkaXRvci9jb250YWluZXJzL2NvbnN0YW50cy5qcyIsIndlYnBhY2s6Ly9AZHJlYW1kZWZlbmRlcnMvbW9kYWwvLi9yZXNvdXJjZXMvYXNzZXRzL3NjcmlwdHMvZWRpdG9yL2Jsb2NrLmpzIiwid2VicGFjazovL0BkcmVhbWRlZmVuZGVycy9tb2RhbC8uL3Jlc291cmNlcy9hc3NldHMvc2NyaXB0cy9lZGl0b3IvY29udGFpbmVycy9lZGl0LmpzIiwid2VicGFjazovL0BkcmVhbWRlZmVuZGVycy9tb2RhbC8uL3Jlc291cmNlcy9hc3NldHMvc2NyaXB0cy9lZGl0b3IvY29udGFpbmVycy9zYXZlLmpzIiwid2VicGFjazovL0BkcmVhbWRlZmVuZGVycy9tb2RhbC93ZWJwYWNrL3N0YXJ0dXAiLCJ3ZWJwYWNrOi8vQGRyZWFtZGVmZW5kZXJzL21vZGFsLy4vcmVzb3VyY2VzL2Fzc2V0cy9zdHlsZXMvZWRpdG9yLmNzcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBUaGUgcmVxdWlyZSBzY29wZVxudmFyIF9fd2VicGFja19yZXF1aXJlX18gPSB7fTtcblxuIiwiLy8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbl9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuXHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cblx0XHRmdW5jdGlvbigpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcblx0XHRmdW5jdGlvbigpIHsgcmV0dXJuIG1vZHVsZTsgfTtcblx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgeyBhOiBnZXR0ZXIgfSk7XG5cdHJldHVybiBnZXR0ZXI7XG59OyIsIi8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb25zIGZvciBoYXJtb255IGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIGRlZmluaXRpb24pIHtcblx0Zm9yKHZhciBrZXkgaW4gZGVmaW5pdGlvbikge1xuXHRcdGlmKF9fd2VicGFja19yZXF1aXJlX18ubyhkZWZpbml0aW9uLCBrZXkpICYmICFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywga2V5KSkge1xuXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIGtleSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGRlZmluaXRpb25ba2V5XSB9KTtcblx0XHR9XG5cdH1cbn07IiwiX193ZWJwYWNrX3JlcXVpcmVfXy5nID0gKGZ1bmN0aW9uKCkge1xuXHRpZiAodHlwZW9mIGdsb2JhbFRoaXMgPT09ICdvYmplY3QnKSByZXR1cm4gZ2xvYmFsVGhpcztcblx0dHJ5IHtcblx0XHRyZXR1cm4gdGhpcyB8fCBuZXcgRnVuY3Rpb24oJ3JldHVybiB0aGlzJykoKTtcblx0fSBjYXRjaCAoZSkge1xuXHRcdGlmICh0eXBlb2Ygd2luZG93ID09PSAnb2JqZWN0JykgcmV0dXJuIHdpbmRvdztcblx0fVxufSkoKTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmosIHByb3ApIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmosIHByb3ApOyB9IiwidmFyIHNjcmlwdFVybDtcbmlmIChfX3dlYnBhY2tfcmVxdWlyZV9fLmcuaW1wb3J0U2NyaXB0cykgc2NyaXB0VXJsID0gX193ZWJwYWNrX3JlcXVpcmVfXy5nLmxvY2F0aW9uICsgXCJcIjtcbnZhciBkb2N1bWVudCA9IF9fd2VicGFja19yZXF1aXJlX18uZy5kb2N1bWVudDtcbmlmICghc2NyaXB0VXJsICYmIGRvY3VtZW50KSB7XG5cdGlmIChkb2N1bWVudC5jdXJyZW50U2NyaXB0KVxuXHRcdHNjcmlwdFVybCA9IGRvY3VtZW50LmN1cnJlbnRTY3JpcHQuc3JjXG5cdGlmICghc2NyaXB0VXJsKSB7XG5cdFx0dmFyIHNjcmlwdHMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5VGFnTmFtZShcInNjcmlwdFwiKTtcblx0XHRpZihzY3JpcHRzLmxlbmd0aCkgc2NyaXB0VXJsID0gc2NyaXB0c1tzY3JpcHRzLmxlbmd0aCAtIDFdLnNyY1xuXHR9XG59XG4vLyBXaGVuIHN1cHBvcnRpbmcgYnJvd3NlcnMgd2hlcmUgYW4gYXV0b21hdGljIHB1YmxpY1BhdGggaXMgbm90IHN1cHBvcnRlZCB5b3UgbXVzdCBzcGVjaWZ5IGFuIG91dHB1dC5wdWJsaWNQYXRoIG1hbnVhbGx5IHZpYSBjb25maWd1cmF0aW9uXG4vLyBvciBwYXNzIGFuIGVtcHR5IHN0cmluZyAoXCJcIikgYW5kIHNldCB0aGUgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gdmFyaWFibGUgZnJvbSB5b3VyIGNvZGUgdG8gdXNlIHlvdXIgb3duIGxvZ2ljLlxuaWYgKCFzY3JpcHRVcmwpIHRocm93IG5ldyBFcnJvcihcIkF1dG9tYXRpYyBwdWJsaWNQYXRoIGlzIG5vdCBzdXBwb3J0ZWQgaW4gdGhpcyBicm93c2VyXCIpO1xuc2NyaXB0VXJsID0gc2NyaXB0VXJsLnJlcGxhY2UoLyMuKiQvLCBcIlwiKS5yZXBsYWNlKC9cXD8uKiQvLCBcIlwiKS5yZXBsYWNlKC9cXC9bXlxcL10rJC8sIFwiL1wiKTtcbl9fd2VicGFja19yZXF1aXJlX18ucCA9IHNjcmlwdFVybDsiLCJ2YXIgX19XRUJQQUNLX05BTUVTUEFDRV9PQkpFQ1RfXyA9IHdpbmRvd1tcIndwXCJdW1wiaTE4blwiXTsiLCJ2YXIgX19XRUJQQUNLX05BTUVTUEFDRV9PQkpFQ1RfXyA9IHdpbmRvd1tcIndwXCJdW1wiYmxvY2tzXCJdOyIsInZhciBfX1dFQlBBQ0tfTkFNRVNQQUNFX09CSkVDVF9fID0gd2luZG93W1wiUmVhY3RcIl07IiwidmFyIF9fV0VCUEFDS19OQU1FU1BBQ0VfT0JKRUNUX18gPSB3aW5kb3dbXCJ3cFwiXVtcImJsb2NrRWRpdG9yXCJdOyIsImV4cG9ydCBjb25zdCBBTExPV0VEX0JMT0NLUyA9IFtcbiAgJ2NvcmUvcGFyYWdyYXBoJyxcbiAgJ2NvcmUvaW1hZ2UnLFxuICAnY29yZS9oZWFkaW5nJyxcbiAgJ2NvcmUvbGlzdCcsXG4gICdjb3JlL2J1dHRvbicsXG4gICdjb3JlL3F1b3RlJyxcbiAgJ2NvcmUvcHVsbHF1b3RlJyxcbiAgJ2NvcmUvc3BhY2VyJyxcbl1cbiIsIi8qKiBAd29yZHByZXNzICovXG5pbXBvcnQge19ffSBmcm9tICdAd29yZHByZXNzL2kxOG4nXG5pbXBvcnQge3JlZ2lzdGVyQmxvY2tUeXBlfSBmcm9tICdAd29yZHByZXNzL2Jsb2NrcydcblxuaW1wb3J0IHtFZGl0IGFzIGVkaXR9IGZyb20gJy4vY29udGFpbmVycy9lZGl0J1xuaW1wb3J0IHtzYXZlfSBmcm9tICcuL2NvbnRhaW5lcnMvc2F2ZSdcbmltcG9ydCB7YXR0cmlidXRlc30gZnJvbSAnLi9hdHRyaWJ1dGVzLmpzb24nXG5cbnJlZ2lzdGVyQmxvY2tUeXBlKCd0aW55LXBpeGVsL21vZGFsJywge1xuICB0aXRsZTogX18oJ01vZGFsJywgJ3RpbnktcGl4ZWwnKSxcbiAgZGVzY3JpcHRpb246IF9fKFxuICAgICdEaXNwbGF5IGNvbnRlbnQgaW4gYSBtb2RhbCB3aW5kb3cnLFxuICAgICd0aW55LXBpeGVsJyxcbiAgKSxcbiAgY2F0ZWdvcnk6ICdjb21tb24nLFxuICBzdXBwb3J0czoge1xuICAgIGFsaWduOiBmYWxzZSxcbiAgICBjdXN0b21DbGFzc05hbWU6IGZhbHNlLFxuICAgIGh0bWw6IGZhbHNlLFxuICAgIGluc2VydGVyOiB0cnVlLFxuICAgIG11bHRpcGxlOiBmYWxzZSxcbiAgICByZXVzYWJsZTogdHJ1ZSxcbiAgfSxcbiAgYXR0cmlidXRlcyxcbiAgZWRpdCxcbiAgc2F2ZSxcbn0pXG4iLCJpbXBvcnQgUmVhY3QgZnJvbSAncmVhY3QnXG5cbmltcG9ydCB7X199IGZyb20gJ0B3b3JkcHJlc3MvaTE4bidcbmltcG9ydCB7XG4gIElubmVyQmxvY2tzLFxuICB1c2VCbG9ja1Byb3BzLFxufSBmcm9tICdAd29yZHByZXNzL2Jsb2NrLWVkaXRvcidcblxuaW1wb3J0IHtBTExPV0VEX0JMT0NLU30gZnJvbSAnLi9jb25zdGFudHMnXG5cbmV4cG9ydCBmdW5jdGlvbiBFZGl0KHthdHRyaWJ1dGVzLCBjbGFzc05hbWV9KSB7XG4gIGNvbnN0IHtlbmFibGVkfSA9IGF0dHJpYnV0ZXNcbiAgY29uc3QgYmxvY2tQcm9wcyA9IHVzZUJsb2NrUHJvcHMoKVxuXG4gIHJldHVybiAoXG4gICAgPHNlY3Rpb25cbiAgICAgIHsuLi5ibG9ja1Byb3BzfVxuICAgICAgZGF0YS1lbmFibGVkPXtlbmFibGVkfVxuICAgICAgY2xhc3NOYW1lPXtjbGFzc05hbWV9PlxuICAgICAgPGRpdiBjbGFzc05hbWU9XCJmbGV4IHRleHQtZ3JheS03MDAgbXktOFwiPlxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImlubGluZS1ibG9jayBiZy13aGl0ZSByb3VuZGVkLWxnIHAtNCB0ZXh0LWxlZnQgb3ZlcmZsb3ctaGlkZGVuIHNoYWRvdy14bCB0cmFuc2Zvcm0gdHJhbnNpdGlvbi1hbGwgbXgtYXV0byB3LTMvNFwiPlxuICAgICAgICAgIDxkaXY+XG4gICAgICAgICAgICA8SW5uZXJCbG9ja3NcbiAgICAgICAgICAgICAgYWxsb3dlZEJsb2Nrcz17QUxMT1dFRF9CTE9DS1N9XG4gICAgICAgICAgICAgIHRlbXBsYXRlPXtbXG4gICAgICAgICAgICAgICAgWydjb3JlL2ltYWdlJywge31dLFxuICAgICAgICAgICAgICAgIFtcbiAgICAgICAgICAgICAgICAgICdjb3JlL2hlYWRpbmcnLFxuICAgICAgICAgICAgICAgICAge2xldmVsOiAzLCBwbGFjZWhvbGRlcjogJ01vZGFsIHRpdGxlJ30sXG4gICAgICAgICAgICAgICAgXSxcbiAgICAgICAgICAgICAgICBbJ2NvcmUvcGFyYWdyYXBoJywge3BsYWNlaG9sZGVyOiAnTW9kYWwgYm9keSd9XSxcbiAgICAgICAgICAgICAgXX1cbiAgICAgICAgICAgIC8+XG4gICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJtdC01IHNtOm10LTYgc206Z3JpZCBzbTpncmlkLWNvbHMtMiBzbTpnYXAtMyBzbTpncmlkLWZsb3ctcm93LWRlbnNlXCI+XG4gICAgICAgICAgICA8YnV0dG9uXG4gICAgICAgICAgICAgIHR5cGU9XCJidXR0b25cIlxuICAgICAgICAgICAgICBjbGFzc05hbWU9XCJ3LWZ1bGwgaW5saW5lLWZsZXgganVzdGlmeS1jZW50ZXIgcm91bmRlZC1tZCBib3JkZXIgYm9yZGVyLXRyYW5zcGFyZW50IHNoYWRvdy1zbSBweC00IHB5LTIgYmctaW5kaWdvLTYwMCB0ZXh0LWJhc2UgZm9udC1tZWRpdW0gdGV4dC13aGl0ZSBob3ZlcjpiZy1pbmRpZ28tNzAwIGZvY3VzOm91dGxpbmUtbm9uZSBmb2N1czpyaW5nLTIgZm9jdXM6cmluZy1vZmZzZXQtMiBmb2N1czpyaW5nLWluZGlnby01MDAgc206Y29sLXN0YXJ0LTIgc206dGV4dC1zbVwiPlxuICAgICAgICAgICAgICBDbG9zZVxuICAgICAgICAgICAgPC9idXR0b24+XG4gICAgICAgICAgPC9kaXY+XG4gICAgICAgIDwvZGl2PlxuICAgICAgPC9kaXY+XG4gICAgPC9zZWN0aW9uPlxuICApXG59XG4iLCJpbXBvcnQgUmVhY3QgZnJvbSAncmVhY3QnXG5pbXBvcnQge0lubmVyQmxvY2tzfSBmcm9tICdAd29yZHByZXNzL2Jsb2NrLWVkaXRvcidcblxuZXhwb3J0IGNvbnN0IHNhdmUgPSAoKSA9PiB7XG4gIHJldHVybiA8SW5uZXJCbG9ja3MuQ29udGVudCAvPlxufVxuIiwiLy8gc3RhcnR1cFxuLy8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4vLyBUaGlzIGVudHJ5IG1vZHVsZSBkb2Vzbid0IHRlbGwgYWJvdXQgaXQncyB0b3AtbGV2ZWwgZGVjbGFyYXRpb25zIHNvIGl0IGNhbid0IGJlIGlubGluZWRcbl9fd2VicGFja19tb2R1bGVzX19bMTU3XSgwLCB7fSwgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG52YXIgX193ZWJwYWNrX2V4cG9ydHNfXyA9IHt9O1xuX193ZWJwYWNrX21vZHVsZXNfX1s4MjldKDAsIF9fd2VicGFja19leHBvcnRzX18sIF9fd2VicGFja19yZXF1aXJlX18pO1xuIiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImVkaXRvci5jc3NcIjsiXSwibmFtZXMiOlsiX193ZWJwYWNrX3JlcXVpcmVfXyIsIm1vZHVsZSIsImdldHRlciIsIl9fZXNNb2R1bGUiLCJkIiwiYSIsImV4cG9ydHMiLCJkZWZpbml0aW9uIiwia2V5IiwibyIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiZW51bWVyYWJsZSIsImdldCIsImciLCJnbG9iYWxUaGlzIiwidGhpcyIsIkZ1bmN0aW9uIiwiZSIsIndpbmRvdyIsIm9iaiIsInByb3AiLCJwcm90b3R5cGUiLCJoYXNPd25Qcm9wZXJ0eSIsImNhbGwiLCJzY3JpcHRVcmwiLCJpbXBvcnRTY3JpcHRzIiwibG9jYXRpb24iLCJkb2N1bWVudCIsImN1cnJlbnRTY3JpcHQiLCJzcmMiLCJzY3JpcHRzIiwiZ2V0RWxlbWVudHNCeVRhZ05hbWUiLCJsZW5ndGgiLCJFcnJvciIsInJlcGxhY2UiLCJwIiwiQUxMT1dFRF9CTE9DS1MiLCJyZWdpc3RlckJsb2NrVHlwZSIsInRpdGxlIiwiX18iLCJkZXNjcmlwdGlvbiIsImNhdGVnb3J5Iiwic3VwcG9ydHMiLCJhbGlnbiIsImN1c3RvbUNsYXNzTmFtZSIsImh0bWwiLCJpbnNlcnRlciIsIm11bHRpcGxlIiwicmV1c2FibGUiLCJhdHRyaWJ1dGVzIiwiZWRpdCIsImNsYXNzTmFtZSIsImVuYWJsZWQiLCJibG9ja1Byb3BzIiwidXNlQmxvY2tQcm9wcyIsIklubmVyQmxvY2tzIiwiYWxsb3dlZEJsb2NrcyIsInRlbXBsYXRlIiwibGV2ZWwiLCJwbGFjZWhvbGRlciIsInR5cGUiLCJzYXZlIiwiX193ZWJwYWNrX21vZHVsZXNfXyJdLCJzb3VyY2VSb290IjoiIn0=