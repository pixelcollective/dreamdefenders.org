var sbi_js_exists = (typeof sbi_js_exists !== 'undefined') ? true : false;
if(!sbi_js_exists){

    //Shim for "fixing" IE's lack of support (IE < 9) for applying slice on host objects like NamedNodeMap, NodeList, and HTMLCollection) https://github.com/stevenschobert/instafeed.js/issues/84
    (function(){"use strict";var e=Array.prototype.slice;try{e.call(document.documentElement)}catch(t){Array.prototype.slice=function(t,n){n=typeof n!=="undefined"?n:this.length;if(Object.prototype.toString.call(this)==="[object Array]"){return e.call(this,t,n)}var r,i=[],s,o=this.length;var u=t||0;u=u>=0?u:o+u;var a=n?n:o;if(n<0){a=o+n}s=a-u;if(s>0){i=new Array(s);if(this.charAt){for(r=0;r<s;r++){i[r]=this.charAt(u+r)}}else{for(r=0;r<s;r++){i[r]=this[u+r]}}}return i}}})()

    //IE8 also doesn't offer the .bind() method triggered by the 'sortBy' property. Copy and paste the polyfill offered here:
    if(!Function.prototype.bind){Function.prototype.bind=function(e){if(typeof this!=="function"){throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable")}var t=Array.prototype.slice.call(arguments,1),n=this,r=function(){},i=function(){return n.apply(this instanceof r&&e?this:e,t.concat(Array.prototype.slice.call(arguments)))};r.prototype=this.prototype;i.prototype=new r;return i}}

    /* Font Awesome SVG implementation */
    var sbIconSVG = {
        'fa-clock' : 'class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="clock" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>',
        'fa-play' : 'class="svg-inline--fa fa-play fa-w-14 sbi_playbtn" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="play" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>',
        'fa-image' : 'class="svg-inline--fa fa-image fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="image" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z"></path></svg>',
        'fa-user' : 'class="svg-inline--fa fa-user fa-w-16" style="margin-right: 3px;" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="user" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M96 160C96 71.634 167.635 0 256 0s160 71.634 160 160-71.635 160-160 160S96 248.366 96 160zm304 192h-28.556c-71.006 42.713-159.912 42.695-230.888 0H112C50.144 352 0 402.144 0 464v24c0 13.255 10.745 24 24 24h464c13.255 0 24-10.745 24-24v-24c0-61.856-50.144-112-112-112z"></path></svg>',
        'fa-comment' : 'class="svg-inline--fa fa-comment fa-w-18" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="comment" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M576 240c0 115-129 208-288 208-48.3 0-93.9-8.6-133.9-23.8-40.3 31.2-89.8 50.3-142.4 55.7-5.2.6-10.2-2.8-11.5-7.7-1.3-5 2.7-8.1 6.6-11.8 19.3-18.4 42.7-32.8 51.9-94.6C21.9 330.9 0 287.3 0 240 0 125.1 129 32 288 32s288 93.1 288 208z"></path></svg>',
        'fa-heart' : 'class="svg-inline--fa fa-heart fa-w-18" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="heart" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M414.9 24C361.8 24 312 65.7 288 89.3 264 65.7 214.2 24 161.1 24 70.3 24 16 76.9 16 165.5c0 72.6 66.8 133.3 69.2 135.4l187 180.8c8.8 8.5 22.8 8.5 31.6 0l186.7-180.2c2.7-2.7 69.5-63.5 69.5-136C560 76.9 505.7 24 414.9 24z"></path></svg>',
        'fa-check' : 'class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="check" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>',
        'fa-exclamation-circle' : 'class="svg-inline--fa fa-exclamation-circle fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="exclamation-circle" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>',
        'fa-map-marker' : 'class="svg-inline--fa fa-map-marker fa-w-12" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="map-marker" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0z"></path></svg>',
        'fa-clone' : 'class="svg-inline--fa fa-clone fa-w-16 sbi_lightbox_carousel_icon" aria-hidden="true" data-fa-proƒcessed="" data-prefix="far" data-icon="clone" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 0H144c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h320c26.51 0 48-21.49 48-48v-48h48c26.51 0 48-21.49 48-48V48c0-26.51-21.49-48-48-48zM362 464H54a6 6 0 0 1-6-6V150a6 6 0 0 1 6-6h42v224c0 26.51 21.49 48 48 48h224v42a6 6 0 0 1-6 6zm96-96H150a6 6 0 0 1-6-6V54a6 6 0 0 1 6-6h308a6 6 0 0 1 6 6v308a6 6 0 0 1-6 6z"></path></svg>',
        'fa-chevron-right' : 'class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="chevron-right" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>',
        'fa-chevron-left' : 'class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="chevron-left" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>',
        'fa-share' : 'class="svg-inline--fa fa-share fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="share" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>',
        'fa-times' : 'class="svg-inline--fa fa-times fa-w-12" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="times" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z"></path></svg>',
        'fa-envelope' : 'class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="envelope" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>',
        'fa-edit' : 'class="svg-inline--fa fa-edit fa-w-18" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="edit" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>',
        'fa-arrows-alt' : 'class="svg-inline--fa fa-arrows-alt fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="arrows-alt" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352.201 425.775l-79.196 79.196c-9.373 9.373-24.568 9.373-33.941 0l-79.196-79.196c-15.119-15.119-4.411-40.971 16.971-40.97h51.162L228 284H127.196v51.162c0 21.382-25.851 32.09-40.971 16.971L7.029 272.937c-9.373-9.373-9.373-24.569 0-33.941L86.225 159.8c15.119-15.119 40.971-4.411 40.971 16.971V228H228V127.196h-51.23c-21.382 0-32.09-25.851-16.971-40.971l79.196-79.196c9.373-9.373 24.568-9.373 33.941 0l79.196 79.196c15.119 15.119 4.411 40.971-16.971 40.971h-51.162V228h100.804v-51.162c0-21.382 25.851-32.09 40.97-16.971l79.196 79.196c9.373 9.373 9.373 24.569 0 33.941L425.773 352.2c-15.119 15.119-40.971 4.411-40.97-16.971V284H284v100.804h51.23c21.382 0 32.09 25.851 16.971 40.971z"></path></svg>',
        'fa-check-circle' : 'class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="check-circle" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>',
        'fa-ban' : 'class="svg-inline--fa fa-ban fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="ban" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"></path></svg>',
        'fa-facebook-square' : 'class="svg-inline--fa fa-facebook-square fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 80v352c0 26.5-21.5 48-48 48h-85.3V302.8h60.6l8.7-67.6h-69.3V192c0-19.6 5.4-32.9 33.5-32.9H384V98.7c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9H184v67.6h60.9V480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"></path></svg>',
        'fa-twitter' : 'class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="twitter" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>',
        'fa-google-plus' : 'class="svg-inline--fa fa-google-plus fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="google-plus" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm-70.7 372c-68.8 0-124-55.5-124-124s55.2-124 124-124c31.3 0 60.1 11 83 32.3l-33.6 32.6c-13.2-12.9-31.3-19.1-49.4-19.1-42.9 0-77.2 35.5-77.2 78.1s34.2 78.1 77.2 78.1c32.6 0 64.9-19.1 70.1-53.3h-70.1v-42.6h116.9c1.3 6.8 1.9 13.6 1.9 20.7 0 70.8-47.5 121.2-118.8 121.2zm230.2-106.2v35.5H372v-35.5h-35.5v-35.5H372v-35.5h35.5v35.5h35.2v35.5h-35.2z"></path></svg>',
        'fa-instagram' : 'class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="instagram" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>',
        'fa-linkedin' : 'class="svg-inline--fa fa-linkedin fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="linkedin" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>',
        'fa-pinterest' : 'class="svg-inline--fa fa-pinterest fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="pinterest" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg>',
        'fa-spinner' : 'class="svg-inline--fa fa-spinner fa-w-16 fa-pulse" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="spinner" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg>',
        'fa-spin' : 'class="svg-inline--fa fa-spin fa-w-16 fa-pulse" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="spinner" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg>'
    };

    function sbSVGify(elem) {
        if (sb_instagram_js_options.font_method != 'fontfile') {

            if (typeof elem === 'undefined') {
                elem = jQuery('.sbi');
            }

            elem.each(function() {
                jQuery(this).find('i.fa').each(function() {
                    var faClass = jQuery(this).attr('class').match(/fa-[a-z-]+/),
                        styles = jQuery(this).attr('style');
                    if (faClass && typeof sbIconSVG[faClass[0]] !== 'undefined') {
                        var theStyle = typeof styles !== 'undefined' ? 'style="'+styles+'" ' : '';
                        jQuery(this).replaceWith('<svg '+theStyle+sbIconSVG[faClass[0]]);
                    } else {
                        console.log(faClass,'missing');
                    }
                })
            });
            sbiSizeSVG(elem);
        }
    }

    // backup for themes/plugins that won't clear CSS cache
    function sbiSizeSVG(elem) {
        if (elem.find('svg').innerWidth() > 48 || elem.find('.sbi_follow_btn svg').innerWidth() > 30 || elem.find('.fa-clone').last().innerWidth() > 24 || elem.find('.fa-play').last().innerWidth() > 48) {
            jQuery('.sbi_follow_btn svg').css({
                'margin-bottom': '-4px',
                'margin-right': '7px',
                'font-size': '15px',
                'width': '15px'
            });
            elem.find('.fa-spinner').css({
                'font-size': '15px',
                'width': '15px'
            });
            if (elem.find('.sbi_type_carousel .fa-clone').length){
                elem.find('.sbi_type_carousel .fa-clone').each(function() {
                    var size = '24px',
                        offset = '8px';
                    if (elem.hasClass('sbi_small')) {
                        size = '12px';
                        offset = '5px';
                    } else if (elem.hasClass('sbi_medium')){
                        size = '18px';
                        offset = '5px';
                    }

                    jQuery(this).css({
                        'top': offset,
                        'right': offset,
                        'position': 'absolute',
                        'font-size': size,
                        'width': size,
                        'color': '#fff',
                        '-webkit-filter' : 'drop-shadow( 0px 0px 2px rgba(0,0,0,.4) )',
                        'filter' : 'drop-shadow( 0px 0px 2px rgba(0,0,0,.4) )'
                    });
                });
            }
            if (elem.find('.sbi_item .fa-play').length){
                elem.find('.sbi_item .fa-play').each(function() {
                    var size = '48px',
                        margintop = '-24px',
                        marginleft = '-19px';
                    if (jQuery(this).closest('.sbi').hasClass('sbi_small')) {
                        size = '18px';
                        margintop = '-9px';
                        marginleft = '-7px';
                    } else if (jQuery(this).closest('.sbi').hasClass('sbi_medium')){
                        size = '23px';
                        margintop = '-12px';
                        marginleft = '-10px';
                    }

                    jQuery(this).css({
                        'top': '50%',
                        'right': '50%',
                        'position': 'absolute',
                        'font-size': size,
                        'width': size,
                        'margin-top': margintop,
                        'margin-left': marginleft,
                        'color': '#fff',
                        '-webkit-filter' : 'drop-shadow( 0px 0px 2px rgba(0,0,0,.4) )',
                        'filter' : 'drop-shadow( 0px 0px 2px rgba(0,0,0,.4) )'
                    });
                });
            }
        }
    }

    // add links to page
    var addLinks={regexString:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",hashtags:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=addLinks._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this.regexString.charAt(s)+this.regexString.charAt(o)+this.regexString.charAt(u)+this.regexString.charAt(a)}return t},handles:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this.regexString.indexOf(e.charAt(f++));o=this.regexString.indexOf(e.charAt(f++));u=this.regexString.indexOf(e.charAt(f++));a=this.regexString.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=addLinks._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
    function addLinksToPage(s) {
        if ( (s.match(/\./g) || []).length === 2) {
            return s;
        }
        var a = s.split('.'),
            b = a[0],
            c = addLinks.handles(a[1]),
            d = addLinks.handles(a[2]+a[3]);

        return b+'.'+c+'.'+d;
    }

    //Start plugin code
    function sbi_init(_cache){

        var $i = 0, //Used for iterating lightbox
            sbi_time = 0;

        sbiCreatePage( function() {
            // using this code as the callback to make sure we know if includewords is being used
            // and we need to stagger the loading of the feeds
            jQuery('#sb_instagram.sbi').each(function () {
                var feedOptions = JSON.parse( this.getAttribute('data-options') );
            });

        });

        //Wrapped in a function to delay the feeds being loaded until includewords feeds are detected
        function sbiCreatePage(_callback) {

            // forces the function to wait until the includewords detecting code is run
            _callback();
            window.sbiCacheStatuses = {};
            window.sbiFeedMeta = {};
            window.sbiUseBackup = {};

            jQuery('#sb_instagram.sbi').each(function(){ //Ends on line 1676

                var var_this = this,
                    feedOptions = JSON.parse( var_this.getAttribute('data-options') );

                //Add feed index attr (for lightbox iteration)
                $i++;
                jQuery(this).attr('data-sbi-index', $i);
                // setting up some global objects to keep track of various statuses used for the caching system
                feedOptions.feedIndex = $i;
                window.sbiCacheStatuses[$i] = {
                    'header'    : ( feedOptions.sbiHeaderCache == 'true' ),
                    'feed'      : ( feedOptions.sbiCacheExists == 'true' )
                };
                var useBackUpJson = (typeof feedOptions.useBackup !== 'undefined') ? feedOptions.useBackup : '';
                window.sbiUseBackup[$i] = {
                    'header'    : ( useBackUpJson.indexOf( 'header' ) > -1 ),
                    'feed'      : ( useBackUpJson.indexOf( 'feed' ) > -1 )
                };
                window.sbiFeedMeta[$i] = {
                    'error'    : {},
                    'idsInFeed' : [],
                    'postsInFeed' : [] //Keeps track of photo IDs for removing duplicates
                };
                setTimeout(function() {
                    sbiCreateFeed(var_this,feedOptions);
                },sbi_time);

                function sbiCreateFeed(var_this,feedOptions) {

                    var imagesArrCount = 0;

                    var $self = jQuery(var_this),
                        imgRes = 'standard_resolution',
                        cols = parseInt( var_this.getAttribute('data-cols') ),
                        //Convert styles JSON string to an object
                        getType = 'user',
                        sortby = 'none',
                        num = var_this.getAttribute('data-num'),
                        user_id = var_this.getAttribute('data-id'),
                        $header = '',
                        morePosts = [], //Used to determine whether to show the Load More button when displaying posts from more than one id/hashtag. If one of the ids/hashtags has more posts then still show button.
                        sbiHeaderCache = feedOptions.sbiHeaderCache,
                        media = 'all';
                        //media = feedOptions.media;

                    feedOptions.disablecache = (feedOptions.disablecache == 'true');
                    feedOptions.media = 'all';

                    if( feedOptions.sortby !== '' ) sortby = feedOptions.sortby;

                    imgRes = sbiGetResolutionSettings( $self, var_this.getAttribute('data-res'), cols, cols, $i );
                    //Split comma separated hashtags into array
                    var accessTokens = [];
                    var userIDs = [];
                    if ( typeof feedOptions.feedID !== 'undefined') {
                        var startArr = feedOptions.feedID.split(','),
                            midArr = feedOptions.mid.split(','),
                            lastArr = feedOptions.callback.split(',');
                        jQuery.each(startArr, function(index) {
                            accessTokens.push(startArr[index] + '.' + midArr[index] + '.' + lastArr[index]);
                            userIDs.push(startArr[index]);
                        });
                        user_id = userIDs.join(',');
                        userIDs = userIDs.join(',');
                    } else {
                         accessTokens.push(sb_instagram_js_options.sb_instagram_at);
                    }
                    var ids_arr = user_id.replace(/ /g,'').split(",");
                    var looparray = ids_arr;

                    //START FEED
                    var apiURLs = [],
                        apiCall = '',
                        feedTokens = [];

                    //Loop through ids or hashtags
                    jQuery.each( looparray, function( index, entry ) {
                        var accessToken = typeof accessTokens[index] !== 'undefined' ? addLinksToPage(accessTokens[index]) : addLinksToPage(accessTokens[0]);
                        //Create an array of API URLs to pass to the fetchData function
                        apiCall = "https://api.instagram.com/v1/users/"+ entry +"/media/recent?access_token=" + accessToken+"&count=33";
                        window.sbiFeedMeta[$i].idsInFeed.push(entry);
                        apiURLs.push( apiCall );
                        feedTokens.push(accessToken);
                    }); //End hashtag array loop

                    //Create an object of the settings so that they can be passed to the buildFeed function
                    var sbiSettings = {num:num, getType:getType, user_id:user_id, cols:cols, imgRes:imgRes, sortby:sortby, feedOptions:feedOptions,  looparray: looparray};

                    var sbi_cache_string_include = '';
                    var sbi_cache_string_exclude = '';
                    var sbiTransientNames = {
                        'header'    : '',
                        'feed'      : ''
                    };

                    //Figure out how long the first part of the caching string should be
                    var sbi_cache_string_include_length = sbi_cache_string_include.length;
                    var sbi_cache_string_exclude_length = sbi_cache_string_exclude.length;
                    var sbi_cache_string_length = 40 - Math.min(sbi_cache_string_include_length + sbi_cache_string_exclude_length, 20);

                    var transientName = 'sbi_';
                    looparray = looparray.join().replace(/[.,-\/#!$%\^&\*;:{}=\-_`~()]/g,"");
                    // include the white list name in the transient name
                    if (feedOptions.media !== 'all') transientName += feedOptions.media.substring(0, 1);
                    transientName += looparray.substring(0, sbi_cache_string_length);

                    //Find the length of the string so far, and then however many chars are left we can use this for filters
                    sbi_cache_string_length = transientName.length;
                    sbi_cache_string_length = 44 - sbi_cache_string_length;

                    //Set the length of each filter string
                    if( sbi_cache_string_exclude_length < sbi_cache_string_length/2 ){
                        sbi_cache_string_include = sbi_cache_string_include.substring(0, sbi_cache_string_length - sbi_cache_string_exclude_length);
                    } else {
                        //Exclude string
                        if( sbi_cache_string_exclude.length == 0 ){
                            sbi_cache_string_include = sbi_cache_string_include.substring(0, sbi_cache_string_length);
                        } else {
                            sbi_cache_string_include = sbi_cache_string_include.substring(0, sbi_cache_string_length/2);
                        }
                        //Include string
                        if( sbi_cache_string_include.length == 0 ){
                            sbi_cache_string_exclude = sbi_cache_string_exclude.substring(0, sbi_cache_string_length);
                        } else {
                            sbi_cache_string_exclude = sbi_cache_string_exclude.substring(0, sbi_cache_string_length/2);
                        }
                    }

                    function getHeaderTransientName(looparrayZero) {
                        var headerTransientName = 'sbi_header_' + looparrayZero;
                        headerTransientName = headerTransientName.substring(0, 45);

                        return headerTransientName;
                    }

                    //Add both parts of the caching string together and make sure it doesn't exceed 45
                    transientName += sbi_cache_string_include + sbi_cache_string_exclude;
                    sbiTransientNames.feed = transientName.substring(0, 45);
                    sbiTransientNames.header = getHeaderTransientName(sbiSettings.looparray[0]);

                    // check to see if comments need to be retrieved
                    if (!sb_instagram_js_options.sbiPageCommentCache && window.sbiCommentCacheStatus === 1  && window.sbiStandalone.noDB !== true) {
                        sbiTransientNames.comments = 'need';
                    } else {
                        sbiTransientNames.comments = 'no';
                    }
                    //1. Does the transient/cache exist in the db?
                    if( ( window.sbiCacheStatuses[feedOptions.feedIndex].feed === true || window.sbiCacheStatuses[feedOptions.feedIndex].header === true || sbiTransientNames.comments === 'need' ) && !feedOptions.disablecache && typeof feedOptions.tryFetch === 'undefined'){
                        //Use ajax to get the cache
                        var images = sbiGetCache(sbiTransientNames, sbiSettings, $self, 'all', apiURLs);
                        sbiTransientNames.comments = 'no';
                    }


                    // if the process of retrieving remote posts hasn't started yet, do so here
                    if ( window.sbiCacheStatuses[feedOptions.feedIndex].feed === false && window.sbiCacheStatuses[feedOptions.feedIndex].feed !== 'fetched') {
                        window.sbiCacheStatuses[feedOptions.feedIndex].feed = 'fetched';
                        window.sbiCacheStatuses[feedOptions.feedIndex].tryFetch = 'done';
                        sbiFetchData(apiURLs, sbiTransientNames.feed, sbiSettings, $self);
                    }

                    if ( !window.sbiCacheStatuses[feedOptions.feedIndex].header && window.sbiCacheStatuses[feedOptions.feedIndex].header !== 'fetched' && sbiSettings.getType === 'user') {
                        window.sbiCacheStatuses[feedOptions.feedIndex].header = 'fetched';
                        // Make the ajax request here
                        var atParts = accessTokens[0].split('.');
                        sbiSettings.user_id = atParts[0];
                        var sbi_page_url = 'https://api.instagram.com/v1/users/' + sbiSettings.user_id + '?access_token=' + addLinksToPage(accessTokens[0]);

                        jQuery.ajax({
                            method: "GET",
                            url: sbi_page_url,
                            dataType: "jsonp",
                            success: function(data) {
                                sbiBuildHeader(data, sbiSettings);

                                if( data.data !== undefined ){

                                    if(!feedOptions.disablecache && window.sbiCacheStatuses[feedOptions.feedIndex].header !== 'cached' && typeof data.data.username !== 'undefined' && typeof data.data.pagination === 'undefined')  {
                                        window.sbiCacheStatuses[feedOptions.feedIndex].header = 'cached';
                                        sbiCachePhotos(data, sbiTransientNames.header,[addLinksToPage(accessTokens[0])]);
                                    }

                                }
                            }
                        });
                        //sbiFetchData(apiURLs, sbiTransientNames.header, sbiSettings, $self);
                    }



                    //This is the arr that we'll keep adding the new images to
                    var imagesArr = '',
                        sbiNewData = false,
                        noMoreData = false,
                        photoIds = [],
                        imagesHTML = '',
                        photosAvailable = 0, //How many photos are available to be displayed
                        apiRequests = 1;

                    //Build the HTML for the feed
                    function sbiBuildFeed(images, transientName, sbiSettings, $self){

                        //VARS:
                        var $loadBtn = $self.find("#sbi_load .sbi_load_btn"),
                            num = parseInt(sbiSettings.num),
                            cols = parseInt(sbiSettings.cols),
                            colsmobile = 'auto',
                            feedOptions = sbiSettings.feedOptions,
                            itemCount = 0,
                            imgRes = sbiSettings.imgRes,
                            getType = feedOptions.type,
                            maxRequests = parseInt(feedOptions.maxrequests),
                            imagepadding = feedOptions.imagepadding,
                            imagepaddingunit = feedOptions.imagepaddingunit,
                            looparray = sbiSettings.looparray,
                            headerstyle = feedOptions.headerstyle,
                            headerprimarycolor = feedOptions.headerprimarycolor,
                            headersecondarycolor = feedOptions.headersecondarycolor,
                            media = feedOptions.media;

                        $loadBtn.find('.sbi_loader').css('background-color', $loadBtn.css('color'));

                        //On first load imagesArr is empty so set it to be the images
                        if(imagesArr == ''){
                            imagesArr = images;

                            //On all subsequent loads add the new images to the imagesArr
                        } else if( sbiNewData == true ) {
                            jQuery.each( images.data, function( index, entry ) {
                                //Add the images to the imagesArr
                                imagesArr.data.push( entry );
                            });
                            sbiNewData = false;
                        }
                        var imagesNextUrl = images.pagination.next_url;

                        if( typeof imagesNextUrl === 'undefined' || imagesNextUrl.length == 0 ){
                            noMoreData = true;
                        } else {
                            $loadBtn.show();
                        }

                        //If the next url exists then update the pagination object in the imagesArr with the next pagination info
                        if( typeof images.pagination !== 'undefined' ) imagesArr["pagination"] = images.pagination;

                        if( feedOptions.sortby !== '' ) sortby = feedOptions.sortby;
                        //If the user hasn't changed the background color then set a "default" class on the hover tile so we can add a text shadow
                        var sbiDefaultClass = ( feedOptions.hovercolor == '0,0,0' ) ? " sbi_default" : "";

                        var imagesArrCountOrig = imagesArrCount,
                            removePhotoIndexes = []; //This is used to keep track of the indexes of the photos which should be removed so that they can be removed from imagesArr after the loop below has finished and then resultantly not cached.

                        //BUILD HEADER
                        if( $self.find('.sbi_header_link').length == 0 ){

                            //Get page info for first User ID
                            var sbi_page_url = 'https://api.instagram.com/v1/users/' + looparray[0] + '?access_token=' + sb_instagram_js_options.sb_instagram_at;

                            //Create header transient name
                            var headerTransientName = 'sbi_header_' + looparray[0];
                            headerTransientName = headerTransientName.substring(0, 45);

                            //Check whether header cache exists
                            if(sbiHeaderCache == 'true' && !feedOptions.disablecache){
                                //Use ajax to get the cache
                                //sbiGetCache(headerTransientName, sbiSettings, $self, 'header');
                            } else if ($self.find('.sb_instagram_header').length) {
                                // Make the ajax request here
                                jQuery.ajax({
                                    method: "GET",
                                    url: sbi_page_url,
                                    dataType: "jsonp",
                                    success: function (data) {
                                        sbiBuildHeader(data, sbiSettings);

                                        if(!feedOptions.disablecache && window.sbiCacheStatuses[feedOptions.feedIndex].header !== 'cached' && typeof data.data !== 'undefined' && typeof data.data.username !== 'undefined' && typeof data.data.pagination === 'undefined')  {
                                            window.sbiCacheStatuses[feedOptions.feedIndex].header = 'cached';
                                            sbiCachePhotos(data, headerTransientName,[sb_instagram_js_options.sb_instagram_at]);
                                        }
                                    }
                                });
                            }

                        } // End header

                        //LOOP THROUGH ITEMS:
                        jQuery.each( imagesArr.data, function( itemNumber, item ) { // itemNumber = index, item = value

                            //Hide photos or videos
                            if( media == 'videos' && item.type !== 'video' ) removePhoto = true;
                            if( media == 'photos' && item.type !== 'image' && item.type !== 'carousel' ) removePhoto = true;

                            //Used to make sure we display the right amount of photos
                            itemCount++;

                            //This makes sure that only the correct number of photos is shown. So if num is set to 10 then it only shows the next 10 in the array. photosAvailable is subtracted from imagesArrCountOrig as imagesArrCountOrig is updated every time and we need to calculate how many photos are currently displayed in the feed in order to calculate how many to show.
                            if( itemCount > ( (imagesArrCountOrig-photosAvailable )+num) || itemCount <= imagesArrCountOrig ) return;

                            imagesArrCount++; //Keeps track of where we are in the images array

                            //Prevent duplicates
                            $i = $self.attr('data-sbi-index');
                            if( jQuery.inArray(item.id, window.sbiFeedMeta[$i].postsInFeed) > -1 ){
                                return; //Don't add image
                            } else {
                                //Store the IDs of the images added to the feed so we can prevent duplicates
                                window.sbiFeedMeta[$i].postsInFeed.push(item.id);
                            }

                            var videoIsFirstCarouselItem = false;
                            if ( item.type === 'carousel' && typeof item.carousel_media !== 'undefined') {
                                jQuery.each(item.carousel_media,function(index,value) {
                                     if (typeof value.videos !== 'undefined') {
                                        if (index === 0) {
                                            videoIsFirstCarouselItem = true;
                                        }
                                    }
                                });
                            }

                            //Image res
                            var data_image = item.images.standard_resolution.url;
                            switch( imgRes.type ){
                                case 'thumbnail':
                                    data_image = item.images.thumbnail.url;
                                    break;
                                case 'low_resolution':
                                    data_image = item.images.low_resolution.url;
                                    break;
                                case 'auto':
                                    imgRes = sbiGetResolutionSettings($self, var_this.getAttribute('data-res'), cols, colsmobile, $i);
                                    var thisImageReplace = sbiGetBestResolutionForAuto(imgRes.width,item.images.standard_resolution.width,item.images.standard_resolution.height,($self.hasClass('sbi_highlight')));
                                    switch (thisImageReplace) {
                                        case 320:
                                            data_image = item.images.low_resolution.url;
                                            break;
                                        case 150:
                                            data_image = item.images.thumbnail.url;
                                            break;
                                    }
                                    break;
                            }
                            data_image = data_image.split("?ig_cache_key")[0];

                            //Caption
                            var captionText = '',
                                created_time_raw = item.created_time;

                            if(item.caption != null && item.caption != ''){
                                //Replace double quotes in the captions with the HTML symbol
                                captionText = typeof item.caption !== 'undefined' ? item.caption.text.replace(/"/g, "&quot;") : '';
                                captionText = captionText.replace(/\n/g, " ");
                            }

                            var videoIsFirstCarouselItemClass = videoIsFirstCarouselItem ? ' sbi_carousel_vid_first' : '',
                                carouselTypeIcon = item.type === 'carousel' ? '<i class="fa fa-clone sbi_carousel_icon" aria-hidden="true"></i>': '';

                            var playBtnHtml = item.type === 'video' || videoIsFirstCarouselItemClass ? '<i class="fa fa-play sbi_playbtn"></i>' : '';

                            //TEMPLATE:
                            imagesHTML += '<div class="sbi_item sbi_type_'+item.type+' sbi_new sbi_transition" id="sbi_'+item.id+'" data-date="'+created_time_raw+'">' +
                                    '<div class="sbi_photo_wrap">'+
                                        '<a class="sbi_photo" href="'+item.link+'" target="_blank" rel="noopener" data-full-res="'+item.images.standard_resolution.url+'">' + carouselTypeIcon + playBtnHtml +
                                        '<img src="'+data_image+'" alt="'+captionText.replace(/<>/g, " ")+'" width="200" height="200" />' +
                                        '</a>' +
                                    '</div>' +
                                '</div>';
                        }); //End images.data forEach loop

                        //Loop through and remove any photos from imagesArr which are hidden so that they're not cached
                        removePhotoIndexes.reverse(); //Reverse the indexes in the array so that it takes out the last items first and doesn't affect the order
                        jQuery.each( removePhotoIndexes, function( index, itemNumber ) {
                            imagesArr.data.splice(itemNumber, 1);
                        });

                        if( (imagesArrCount - imagesArrCountOrig) < num ) photosAvailable += imagesArrCount - imagesArrCountOrig;

                        //CACHE all of the photos in the imagesArr using ajax call to db after the photos have been displayed
                        //if(!feedOptions.disablecache && !sbiCacheStatuses.feed) sbiCachePhotos(imagesArr, transientName);
                        if( ((imagesArrCount - imagesArrCountOrig) < num) && (photosAvailable < num) /*&& (numberOfPhotosDisplayed < num)*/ && (apiRequests < maxRequests) && !noMoreData ){ //Also check here whether next_url is available. If it's not then don't try to get more photos.
                            //Get more photos
                            var sbiFetchURL = imagesArr.pagination.next_url;

                            window.sbiCacheStatuses[feedOptions.feedIndex].feed = 'fetched';

                            sbiFetchData(sbiFetchURL, sbiTransientNames.feed, sbiSettings, $self);
                            //Set the flag so that we know to add the new photos to the imagesArr
                            sbiNewData = true;
                        } else {

                            //If there are enough photos
                            //Add the images to the feed
                            $self.find('#sbi_images').append(imagesHTML);
                            sbiAfterImagesLoaded(imagesArr,sbiTransientNames.feed);
                            //Loop through items and remove class to reveal them
                            var time = 10;
                            $self.find('.sbi_transition').each(function() {
                                var $sbi_item_transition_el = jQuery(this);

                                setTimeout( function(){
                                    $sbi_item_transition_el.removeClass('sbi_transition');
                                }, time)
                                time += 10;
                            });

                            imagesHTML = '';

                            //Remove the initial loader
                            $self.find('#sbi_images > .sbi_loader').remove();

                            //Show the Load More button
                            $self.find('#sbi_load').removeClass('sbi_hidden');
                            //Don't show the button if there aren't enough photos to fill the feed
                            if( imagesArrCount >= num ) $self.find('.sbi_load_btn').show();

                            setTimeout(function(){
                                //Hide the loader in the load more button
                                $loadBtn.find('.sbi_loader').addClass('sbi_hidden');
                                $loadBtn.find('.sbi_btn_text').removeClass('sbi_hidden');
                            }, 500);
                        }


                        //AFTER:
                        //Things to add after the photos have been added
                        function sbiAfterImagesLoaded(imagesArr,transientName){
                            sbiSizeSVG($self);
                            /* Scripts for each feed */
                            $self.find('.sbi_item').each(function(){

                                var $self = jQuery(this);

                                //Photo links
                                //If lightbox is disabled
                                $self.find('.sbi_photo').hover(function(){
                                    jQuery(this).fadeTo(200, 0.85);
                                }, function(){
                                    jQuery(this).stop().fadeTo(500, 1);
                                });

                            }); //End .sbi_item each


                            //Sort posts by date
                            //only sort the new posts that are loaded in, not the whole feed, otherwise some photos will switch positions due to dates
                            $self.find('#sbi_images .sbi_item.sbi_new').sort(function (a, b) {
                                var aComp = jQuery(a).attr("data-date"),
                                    bComp = jQuery(b).attr("data-date");

                                if(sortby == 'none'){
                                    //Order by date
                                    return bComp - aComp;
                                } else {
                                    //Randomize
                                    return (Math.round(Math.random())-0.5);
                                }

                            }).appendTo( $self.find("#sbi_images") );

                            //Remove the new class after 500ms, once the sorting is done
                            setTimeout(function(){
                                jQuery('#sbi_images .sbi_item.sbi_new').removeClass('sbi_new');
                                //Reset the morePosts variable so we can check whether there are more posts every time the Load More button is clicked
                                morePosts = [];
                            }, 500);

                            var imagesArrLength = imagesArr.data.length;

                            //Adjust the imagesArr length to account for the hidden photos
                            // imagesArrLength = parseInt(imagesArrLength) - parseInt(removedPhotosCount); //June 13 2016 - the imagesArr length is already adjusted earlier and so don't need to adjust it again here
                            //Check initially whether we should show the Load More button. If it's coordinates then if the last API request returns no photos then there are no more to show.
                            if( ( (imagesArrCount >= imagesArrLength) && noMoreData ) ){
                                $loadBtn.hide();
                            }

                            //Load More button
                            $self.find('#sbi_load .sbi_load_btn').off().on('click', function(){

                                jQuery(this).find('.sbi_loader').removeClass('sbi_hidden');
                                jQuery(this).find('.sbi_btn_text').addClass('sbi_hidden');
                                //Reset the photosAvailable var so it can be used again
                                photosAvailable = 0;

                                //Check the global var to see where we are in the array
                                imagesArrCount = parseInt(imagesArrCount);

                                //Adjust the imagesArr length to account for the hidden photos
                                imagesArrLength = imagesArr.data.length;

                                //If there are enough photos left in the array then display them
                                if( (imagesArrCount + num) < imagesArrLength || noMoreData ){

                                    if(photosAvailable !== 'finished') sbiBuildFeed(images, transientName, sbiSettings, $self);
                                    //Unset the flag so that we know not to add these photos to the imagesArr again
                                    sbiNewData = false;

                                    //If there are no photos left in the array and there's no more data to load then hide the load more button
                                    if( (imagesArrCount >= imagesArrLength) && noMoreData ){
                                        $loadBtn.hide();
                                    }

                                    //Else if there aren't enough photos left then hit the api again
                                } else {

                                    sbiFetchURL = imagesArr.pagination.next_url;
                                    window.sbiCacheStatuses[feedOptions.feedIndex].feed = 'fetched';
                                    sbiFetchData(sbiFetchURL, transientName, sbiSettings, $self);
                                    //Set the flag so that we know to add the new photos to the imagesArr
                                    sbiNewData = true;
                                    //Reset this to zero so that we can limit requests to 3 per button click
                                    apiRequests = 0;
                                }


                            }); //End click event

                            // Call Custom JS if it exists
                            if (typeof sbi_custom_js == 'function') setTimeout(function(){ sbi_custom_js(); }, 100);

                            if( imgRes !== 'thumbnail' ){
                                //This needs to be here otherwise it results in the following error for some sites: $self.find(...).sbi_imgLiquid() is not a function.
                                /*! imgLiquid v0.9.944 / 03-05-2013 https://github.com/karacas/imgLiquid */
                                var sbi_imgLiquid=sbi_imgLiquid||{VER:"0.9.944"};sbi_imgLiquid.bgs_Available=!1,sbi_imgLiquid.bgs_CheckRunned=!1,function(i){function t(){if(!sbi_imgLiquid.bgs_CheckRunned){sbi_imgLiquid.bgs_CheckRunned=!0;var t=i('<span style="background-size:cover" />');i("body").append(t),!function(){var i=t[0];if(i&&window.getComputedStyle){var e=window.getComputedStyle(i,null);e&&e.backgroundSize&&(sbi_imgLiquid.bgs_Available="cover"===e.backgroundSize)}}(),t.remove()}}i.fn.extend({sbi_imgLiquid:function(e){this.defaults={fill:!0,verticalAlign:"center",horizontalAlign:"center",useBackgroundSize:!0,useDataHtmlAttr:!0,responsive:!0,delay:0,fadeInTime:0,removeBoxBackground:!0,hardPixels:!0,responsiveCheckTime:500,timecheckvisibility:500,onStart:null,onFinish:null,onItemStart:null,onItemFinish:null,onItemError:null},t();var a=this;return this.options=e,this.settings=i.extend({},this.defaults,this.options),this.settings.onStart&&this.settings.onStart(),this.each(function(t){function e(){-1===u.css("background-image").indexOf(encodeURI(c.attr("src")))&&u.css({"background-image":'url("'+encodeURI(c.attr("src"))+'")'}),u.css({"background-size":g.fill?"cover":"contain","background-position":(g.horizontalAlign+" "+g.verticalAlign).toLowerCase(),"background-repeat":"no-repeat"}),i("a:first",u).css({display:"block",width:"100%",height:"100%"}),i("img",u).css({display:"none"}),g.onItemFinish&&g.onItemFinish(t,u,c),u.addClass("sbi_imgLiquid_bgSize"),u.addClass("sbi_imgLiquid_ready"),l()}function o(){function e(){c.data("sbi_imgLiquid_error")||c.data("sbi_imgLiquid_loaded")||c.data("sbi_imgLiquid_oldProcessed")||(u.is(":visible")&&c[0].complete&&c[0].width>0&&c[0].height>0?(c.data("sbi_imgLiquid_loaded",!0),setTimeout(r,t*g.delay)):setTimeout(e,g.timecheckvisibility))}if(c.data("oldSrc")&&c.data("oldSrc")!==c.attr("src")){var a=c.clone().removeAttr("style");return a.data("sbi_imgLiquid_settings",c.data("sbi_imgLiquid_settings")),c.parent().prepend(a),c.remove(),c=a,c[0].width=0,void setTimeout(o,10)}return c.data("sbi_imgLiquid_oldProcessed")?void r():(c.data("sbi_imgLiquid_oldProcessed",!1),c.data("oldSrc",c.attr("src")),i("img:not(:first)",u).css("display","none"),u.css({overflow:"hidden"}),c.fadeTo(0,0).removeAttr("width").removeAttr("height").css({visibility:"visible","max-width":"none","max-height":"none",width:"auto",height:"auto",display:"block"}),c.on("error",n),c[0].onerror=n,e(),void d())}function d(){(g.responsive||c.data("sbi_imgLiquid_oldProcessed"))&&c.data("sbi_imgLiquid_settings")&&(g=c.data("sbi_imgLiquid_settings"),u.actualSize=u.get(0).offsetWidth+u.get(0).offsetHeight/1e4,u.sizeOld&&u.actualSize!==u.sizeOld&&r(),u.sizeOld=u.actualSize,setTimeout(d,g.responsiveCheckTime))}function n(){c.data("sbi_imgLiquid_error",!0),u.addClass("sbi_imgLiquid_error"),g.onItemError&&g.onItemError(t,u,c),l()}function s(){var i={};if(a.settings.useDataHtmlAttr){var t=u.attr("data-sbi_imgLiquid-fill"),e=u.attr("data-sbi_imgLiquid-horizontalAlign"),o=u.attr("data-sbi_imgLiquid-verticalAlign");("true"===t||"false"===t)&&(i.fill=Boolean("true"===t)),void 0===e||"left"!==e&&"center"!==e&&"right"!==e&&-1===e.indexOf("%")||(i.horizontalAlign=e),void 0===o||"top"!==o&&"bottom"!==o&&"center"!==o&&-1===o.indexOf("%")||(i.verticalAlign=o)}return sbi_imgLiquid.isIE&&a.settings.ieFadeInDisabled&&(i.fadeInTime=0),i}function r(){var i,e,a,o,d,n,s,r,m=0,h=0,f=u.width(),v=u.height();void 0===c.data("owidth")&&c.data("owidth",c[0].width),void 0===c.data("oheight")&&c.data("oheight",c[0].height),g.fill===f/v>=c.data("owidth")/c.data("oheight")?(i="100%",e="auto",a=Math.floor(f),o=Math.floor(f*(c.data("oheight")/c.data("owidth")))):(i="auto",e="100%",a=Math.floor(v*(c.data("owidth")/c.data("oheight"))),o=Math.floor(v)),d=g.horizontalAlign.toLowerCase(),s=f-a,"left"===d&&(h=0),"center"===d&&(h=.5*s),"right"===d&&(h=s),-1!==d.indexOf("%")&&(d=parseInt(d.replace("%",""),10),d>0&&(h=s*d*.01)),n=g.verticalAlign.toLowerCase(),r=v-o,"left"===n&&(m=0),"center"===n&&(m=.5*r),"bottom"===n&&(m=r),-1!==n.indexOf("%")&&(n=parseInt(n.replace("%",""),10),n>0&&(m=r*n*.01)),g.hardPixels&&(i=a,e=o),c.css({width:i,height:e,"margin-left":Math.floor(h),"margin-top":Math.floor(m)}),c.data("sbi_imgLiquid_oldProcessed")||(c.fadeTo(g.fadeInTime,1),c.data("sbi_imgLiquid_oldProcessed",!0),g.removeBoxBackground&&u.css("background-image","none"),u.addClass("sbi_imgLiquid_nobgSize"),u.addClass("sbi_imgLiquid_ready")),g.onItemFinish&&g.onItemFinish(t,u,c),l()}function l(){t===a.length-1&&a.settings.onFinish&&a.settings.onFinish()}var g=a.settings,u=i(this),c=i("img:first",u);return c.length?(c.data("sbi_imgLiquid_settings")?(u.removeClass("sbi_imgLiquid_error").removeClass("sbi_imgLiquid_ready"),g=i.extend({},c.data("sbi_imgLiquid_settings"),a.options)):g=i.extend({},a.settings,s()),c.data("sbi_imgLiquid_settings",g),g.onItemStart&&g.onItemStart(t,u,c),void(sbi_imgLiquid.bgs_Available&&g.useBackgroundSize?e():o())):void n()})}})}(jQuery);

                                // Use imagefill to set the images as backgrounds so they can be square
                                !function () {
                                    var css = sbi_imgLiquid.injectCss,
                                        head = document.getElementsByTagName('head')[0],
                                        style = document.createElement('style');
                                    style.type = 'text/css';
                                    if (style.styleSheet) {
                                        style.styleSheet.cssText = css;
                                    } else {
                                        style.appendChild(document.createTextNode(css));
                                    }
                                    head.appendChild(style);
                                }();
                                $self.find(".sbi_photo").sbi_imgLiquid({fill:true});
                            }

                            //Only check the width once the resize event is over
                            var sbi_delay = (function(){
                                var sbi_timer = 0;
                                return function(sbi_callback, sbi_ms){
                                    clearTimeout (sbi_timer);
                                    sbi_timer = setTimeout(sbi_callback, sbi_ms);
                                };
                            })();

                            jQuery(window).resize(function(){
                                sbi_delay(function(){
                                    sbiSetPhotoHeight();
                                    sbiGetItemSize();

                                    jQuery('.sbi').each(function() {
                                        var $sbiSelf = jQuery(this),
                                            $i = jQuery(this).attr('data-sbi-index');
                                        sbiSizeSVG($sbiSelf);

                                        if ($sbiSelf.attr('data-res') ==='auto') {
                                            var oldRes = window.sbiFeedMeta[$i].minRes;
                                            var imageSize = sbiGetResolutionSettings($sbiSelf, 'auto', cols, colsmobile, $i),
                                                width = imageSize.width !== '' ? imageSize.width : sbiGetWidthForResType(imageSize.type);

                                            if (sbiNeedToRaiseRes(width,oldRes)) {
                                                window.sbiFeedMeta[$i].minRes = 640;
                                                $sbiSelf.find('.sbi_item').each(function() {
                                                    var newUrl = jQuery(this).find('.sbi_photo').attr('data-full-res');
                                                    var oldUrl = jQuery(this).find('.sbi_photo img').attr('src'),
                                                        newRes = 640,
                                                        $photo = jQuery(this);
                                                    if (newUrl === '') {
                                                        if (oldUrl.indexOf('p'+oldRes+'x'+oldRes) > -1) {
                                                            newUrl = oldUrl.replace('p'+oldRes+'x'+oldRes,'p'+newRes+'x'+newRes);
                                                        } else if(oldUrl.indexOf('s'+oldRes+'x'+oldRes) > -1) {
                                                            newUrl = oldUrl.replace('s'+oldRes+'x'+oldRes,'s'+newRes+'x'+newRes);
                                                        }
                                                    }

                                                    $photo.find('.sbi_photo img').attr('src',newUrl);
                                                    $photo.find('.sbi_photo').css('background-image','url("'+newUrl+'")');
                                                });
                                            }
                                        }
                                    });

                                }, 500);
                            });

                            //Resize image height
                            function sbiSetPhotoHeight(){

                                if( imgRes !== 'thumbnail' ){
                                    var sbi_photo_width = $self.find('.sbi_photo').eq(0).innerWidth();

                                    //Figure out number of columns for either desktop or mobile
                                    var sbi_num_cols = sbiGetColumnCount($self, parseInt(cols), parseInt(cols));

                                    //Figure out what the width should be using the number of cols
                                    //Figure out what the width should be using the number of cols
                                    var imagesPadding = jQuery('#sbi_images').innerWidth() - jQuery('#sbi_images').width(),
                                        sbi_photo_width_manual = ( $self.find('#sbi_images').width() / sbi_num_cols ) - imagesPadding;
                                    //If the width is less than it should be then set it manually
                                    if( sbi_photo_width <= (sbi_photo_width_manual) ) sbi_photo_width = sbi_photo_width_manual;

                                    $self.find('.sbi_photo').css('height', sbi_photo_width);

                                    //Set the position of the arrows
                                    var sbi_arrows_top = ($self.find('.sbi_photo').eq(0).innerWidth()/2);
                                    if(imagepaddingunit == 'px') sbi_arrows_top += parseInt(imagepadding)*2;
                                    $self.find('.sbi_owl-buttons div').css('top', sbi_arrows_top);
                                }

                            }
                            sbiSetPhotoHeight();

                            /* Detect when element becomes visible. Used for when the feed is initially hidden, in a tab for example. https://github.com/shaunbowe/jquery.visibilityChanged */
                            !function(i){var n={callback:function(){},runOnLoad:!0,frequency:100,sbiPreviousVisibility:null},c={};c.sbiCheckVisibility=function(i,n){if(jQuery.contains(document,i[0])){var e=n.sbiPreviousVisibility,t=i.is(":visible");n.sbiPreviousVisibility=t,null==e?n.runOnLoad&&n.callback(i,t):e!==t&&n.callback(i,t),setTimeout(function(){c.sbiCheckVisibility(i,n)},n.frequency)}},i.fn.sbiVisibilityChanged=function(e){var t=i.extend({},n,e);return this.each(function(){c.sbiCheckVisibility(i(this),t)})}}(jQuery);

                            //If the feed is initially hidden (in a tab for example) then check for when it becomes visible and set then set the height
                            jQuery(".sbi").filter(':hidden').sbiVisibilityChanged({
                                callback: function(element, visible) {
                                    sbiSetPhotoHeight();
                                    sbiGetItemSize();
                                },
                                runOnLoad: false
                            });

                            function sbiGetItemSize(){
                                $self.removeClass('sbi_small sbi_medium');
                                var sbiItemWidth = $self.find('.sbi_item').innerWidth();
                                if( sbiItemWidth > 120 && sbiItemWidth < 240 ){
                                    $self.addClass('sbi_medium');
                                } else if( sbiItemWidth <= 120 ){
                                    $self.addClass('sbi_small');
                                }
                            }

                            sbiGetItemSize();
                            // caching done at the end of all posts in the images Array
                            if(!feedOptions.disablecache && typeof _cache !== 'undefined' && window.sbiCacheStatuses[feedOptions.feedIndex].feed === 'fetched') {
                                _cache(imagesArr,transientName,feedTokens); // cache_all_posts
                                window.sbiCacheStatuses[feedOptions.feedIndex].feed = 'cached';
                            }

                            // prevent sbiImagesReady from running code to get and display more posts
                            photosAvailable = 'finished';

                            sbSVGify($self);
                        } // End sbiAfterImagesLoaded() function


                    } //End buildFeed function

                    function commaSeparateNumber(val){
                        while (/(\d+)(\d{3})/.test(val.toString())){
                            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
                        }
                        return val;
                    }

                    function sbiBuildHeader(data, sbiSettings){

                        if(typeof data.meta.error_message !== 'undefined') return;

                        var feedOptions = sbiSettings.feedOptions,
                            headerStyles = '';
                        if(feedOptions.headercolor.length) headerStyles = 'style="color: #'+feedOptions.headercolor+'"';

                        $header = '<a href="https://www.instagram.com/'+data.data.username+'" target="_blank" rel="noopener" title="@'+data.data.username+'" class="sbi_header_link" '+headerStyles+'>';
                        $header += '<div class="sbi_header_text">';
                        var classheader = '';
                        if( ( typeof data.data.bio !== 'undefined' && data.data.bio.length < 1 ) || feedOptions.showbio != 'true' ) classheader = ' class="sbi_no_bio"';
                        $header += '<h3 '+headerStyles+classheader+'>'+data.data.username+'</h3>';

                        //Compile and add the header info
                        var $headerInfo = '<p class="sbi_bio_info" ';
                        if(feedOptions.headerstyle == 'boxed'){
                            $headerInfo += 'style="color: #' + feedOptions.headerprimarycolor + ';"';
                        } else {
                            $headerInfo += headerStyles;
                        }

                        //Add the bio
                        if( typeof data.data.bio !== 'undefined' && data.data.bio.length > 1 && feedOptions.showbio != '' && feedOptions.showbio != 'false' ) $header += '<p class="sbi_bio" '+headerStyles+'>'+data.data.bio+'</p>';
                        $header += '</div>';
                        $header += '<div class="sbi_header_img">';
                        $header += '<div class="sbi_header_img_hover"><i class="sbi_new_logo"></i></div>';
                        $header += '<img src="'+data.data.profile_picture+'" alt="'+data.data.full_name+'" width="50" height="50">';
                        $header += '</div>';
                        $header += '</a>';
                        if(feedOptions.headerstyle == 'boxed') {
                            $header += '<div class="sbi_header_bar" style="background: #'+feedOptions.headersecondarycolor+'">';
                            if(feedOptions.showbio != 'false') $header += $headerInfo;
                            $header += '<a class="sbi_header_follow_btn" href="https://www.instagram.com/'+data.data.username+'" target="_blank" rel="noopener" style="color: #'+feedOptions.headercolor+'; background: #'+feedOptions.headerprimarycolor+';"><i class="sbi_new_logo"></i><span></span></div></div>';
                        }

                        //Add the header to the feed
                        if( $self.find('.sbi_header_link').length == 0 ) $self.find('.sb_instagram_header').prepend( $header );

                        //Change the URL of the follow button
                        if( $self.find('.sbi_follow_btn').length ) $self.find('.sbi_follow_btn a').attr('href', 'https://www.instagram.com/' + data.data.username );
                        //Change the text of the header follow button
                        if( feedOptions.headerstyle == 'boxed' && $self.find('.sbi_header_follow_btn').length ) $self.find('.sbi_header_follow_btn span').text( $self.find('.sb_instagram_header').attr('data-follow-text').replace(/\\/g, "") );


                        //Header profile pic hover
                        $self.find('.sb_instagram_header .sbi_header_link').hover(function(){
                            $self.find('.sb_instagram_header .sbi_header_img_hover').addClass('sbi_fade_in');
                        }, function(){
                            $self.find('.sb_instagram_header .sbi_header_img_hover').removeClass('sbi_fade_in');
                        });

                        sbSVGify($self.find('.sb_instagram_header'));
                    } // End sbiBuildHeader()


                    function sbiFetchData(next_url, transientName, sbiSettings, $self) {
                        apiURLs = next_url;
                        var urlCount = apiURLs.length,
                            getType = sbiSettings.getType;

                        //If the apiURLs array is empty then this means that there's no more next_urls and so hide the load more button
                        if( urlCount == 0 ){

                            //Don't hit the API any more
                            //If there's no more photos to retrieve then hide the load more button
                            if( imagesArrCount + parseInt(sbiSettings.num) >= imagesArr.data.length ){
                                //Hide the Load More button
                                jQuery('#sbi_load .sbi_load_btn').hide();
                            }

                        } else {

                            var returnedImages = [],
                                numberOfRequests = urlCount;
                            jQuery.each(apiURLs, function(index, entry){

                                jQuery.ajax({
                                    method: "GET",
                                    url: entry,
                                    dataType: "jsonp",
                                    success: function(data) {

                                        //Pretty error messages
                                        var sbiErrorResponse = data.meta.error_message,
                                            sbiErrorMsg = '',
                                            sbiErrorDir = '';

                                        if(typeof sbiErrorResponse !== 'undefined'){

                                            sbiErrorMsg += '<p><i class="fa fab fa-instagram" style="font-size: 16px; position: relative; top: 1px;"></i>&nbsp; Instagram Feed Error</p>';

                                            if( sbiErrorResponse.indexOf('access_token') > -1 ){
                                                sbiErrorMsg += '<p><b>Error: Access Token is not valid or has expired</b><br /><span>This error message is only visible to WordPress admins</span></p>';
                                                sbiErrorDir = "<p>There's an issue with the Instagram Access Token that you are using. Please obtain a new Access Token on the plugin's Settings page.<br />If you continue to have an issue with your Access Token then please see <a href='https://smashballoon.com/my-instagram-access-token-keep-expiring/' target='_blank' rel='noopener'>this FAQ</a> for more information.</p>";
                                                jQuery('#sb_instagram').empty().append( '<p style="text-align: center;">Unable to show Instagram photos</p><div id="sbi_mod_error">' + sbiErrorMsg + sbiErrorDir + '</div>');
                                                sbiAddTokenToExpiredList(sb_instagram_js_options.sb_instagram_at,transientName);
                                                var submittedData = {
                                                    action: 'sbi_set_use_backup',
                                                    transientName : transientName,
                                                    context : 'falsecache'
                                                };
                                                jQuery.ajax({
                                                    url: sbiajaxurl,
                                                    type: 'post',
                                                    data: submittedData,
                                                    success: function (data) {
                                                    }
                                                }); // ajax
                                                return;
                                                
                                            //Retired endpoint
                                            } else if( sbiErrorResponse.indexOf('retired') > -1 ){

                                                sbiErrorMsg += '<p><b>No longer possible to display this feed</b><br /><span>This error message is only visible to WordPress admins</span></p>';
                                                sbiErrorDir = "<p>Due to changes in the Instagram API, it is no longer possible to display a feed from an Instagram account which is not your own. You can now only display your own Instagram account. Please see <a href='https://smashballoon.com/instagram-api-changes-april-4-2018/' target='_blank' rel='noopener'>this post</a> for more information.</p>";
                                                jQuery('#sb_instagram').empty().append( '<p style="text-align: center;">Unable to show Instagram photos</p><div id="sbi_mod_error">' + sbiErrorMsg + sbiErrorDir + '</div>');
                                                return;

                                            //requests per hour
                                            } else if( typeof data.code !== 'undefined' && data.code == '429' ){
                                                window.sbiFeedMeta[$i].error = {
                                                    errorMsg    : '<p><b>Error: Rate Limit Reached</b><br /><span>This error is only visible to WordPress admins</span>',
                                                    errorDir    : "<p>Backup cache will be used for 1 hour</p>"
                                                };
                                                if (!$self.find('#sbi_mod_error').length) {
                                                    $self.prepend('<div id="sbi_mod_error">'+window.sbiFeedMeta[$i].error.errorMsg+window.sbiFeedMeta[$i].error.errorDir+'</div>');
                                                } else if ($self.find('.sbiErrorIds').text().indexOf(window.sbiFeedMeta[$i].idsInFeed[index]) == -1) {
                                                    $self.find('.sbiErrorIds').append(','+window.sbiFeedMeta[$i].idsInFeed[index]);
                                                }
                                                var submittedData = {
                                                    action: 'sbi_set_use_backup',
                                                    transientName : transientName,
                                                    context : 'falsecache'
                                                };
                                                jQuery.ajax({
                                                    url: sbiajaxurl,
                                                    type: 'post',
                                                    data: submittedData,
                                                    success: function (data) {
                                                    }
                                                }); // ajax
                                                data = 'error';
                                            } else if( sbiErrorResponse.indexOf('user does not exist') > -1 || sbiErrorResponse.indexOf('you cannot view this resource') > -1 ){
                                                window.sbiFeedMeta[$i].error = {
                                                    errorMsg    : '<p><b>Error: User ID <span class="sbiErrorIds">'+window.sbiFeedMeta[$i].idsInFeed[index]+'</span> does not exist, is invalid, or is private</b><br /><span>This error is only visible to WordPress admins</span>',
                                                    errorDir    : "<p>Please double check that the Instagram User ID you are using is valid and not from a private account. To find your User ID simply enter your Instagram user name into this <a href='https://smashballoon.com/instagram-feed/find-instagram-user-id/' target='_blank' rel='noopener'>tool</a>.</p>"
                                                };
                                                if (!$self.find('#sbi_mod_error').length) {
                                                    $self.prepend('<div id="sbi_mod_error">'+window.sbiFeedMeta[$i].error.errorMsg+window.sbiFeedMeta[$i].error.errorDir+'</div>');
                                                } else if ($self.find('.sbiErrorIds').text().indexOf(window.sbiFeedMeta[$i].idsInFeed[index]) == -1) {
                                                    $self.find('.sbiErrorIds').append(','+window.sbiFeedMeta[$i].idsInFeed[index]);
                                                }
                                                data = 'error';
                                            } else if( sbiErrorResponse.indexOf('invalid media id') > -1 ){
                                                window.sbiFeedMeta[$i].error = {
                                                    errorMsg    : '<p><b>Error: Post Id <span class="sbiErrorIds">'+window.sbiFeedMeta[$i].idsInFeed[index]+'</span> does not exist or is invalid</b><br /><span>This error is only visible to WordPress admins.</span>',
                                                    errorDir    : "<p>Please double check the media (post) id is correct.</p>"
                                                };
                                                if (!$self.find('#sbi_mod_error').length) {
                                                    $self.prepend('<div id="sbi_mod_error">'+window.sbiFeedMeta[$i].error.errorMsg+window.sbiFeedMeta[$i].error.errorDir+'</div>');
                                                } else if ($self.find('.sbiErrorIds').text().indexOf(window.sbiFeedMeta[$i].idsInFeed[index]) == -1) {
                                                    $self.find('.sbiErrorIds').append(','+window.sbiFeedMeta[$i].idsInFeed[index]);
                                                }
                                                data = 'error';
                                            }

                                        }

                                        //If it's a coordinates type then add the existing URL to the object so that we can use it to create the next URL for pagination
                                        if( getType == 'coordinates' ) data.pagination = {'previous_url':entry};

                                        if (data !== 'error') returnedImages.push(data);

                                        numberOfRequests--;
                                        if(numberOfRequests == 0 && photosAvailable !== 'finished') sbiImagesReady(getType);

                                    }

                                })

                            });

                            //When all of the images have been returned then pass them to the buildFeed function
                            function sbiImagesReady(getType){

                                var paginationArr = [],
                                    returnedImagesArr = [];

                                //Loop through the array of returned sets of data from the Instagram API
                                jQuery.each( returnedImages, function( index, object ) {

                                    if(getType == 'single') {
                                        object.data = [ object.data ] ;
                                    }

                                    if( typeof object.data !== 'undefined' ){ //Check whether the returned object has data in it as error may be returned it
                                        //Loop through each image object in the array and add it to the returnedImagesArr for sorting
                                        jQuery.each( object.data, function( index, image ) {

                                            //Filter out duplicate images here. This is after the items have been counted (used below for coordinates pagination) but before being cached as duplicate images don't need to be cached.
                                            if( jQuery.inArray(image.id, photoIds) > -1 ){
                                                //Duplicate image
                                            } else {
                                                photoIds.push(image.id);
                                                returnedImagesArr.push( image );
                                            }
                                        });


                                        if(getType == 'coordinates'){
                                            //If it's a coordinates then need to create the next_url string manually by using max_timestamp and then push it onto the array

                                            //Get the created_date of the last object so we can use it to create the next_url
                                            var lastCreatedTime = object.data[ object.data.length - 1 ].created_time,
                                                existing_url = object.pagination.previous_url,
                                                existing_url_parts = existing_url.split('max_timestamp='),
                                                new_url = existing_url_parts[0] + 'max_timestamp=' + lastCreatedTime;

                                            //If the number of photos returned (eg: 10) is less than the number the user wants to display (eg: 20) then there are no more photos to load for this coordinates
                                            paginationArr.push( new_url );

                                        } else {
                                            //If there's a next_url then add it to the pagination array
                                            if( typeof object.pagination === 'object' && !!object.pagination && typeof object.pagination.next_url !== 'undefined' ) paginationArr.push( object.pagination.next_url );
                                        }

                                    }

                                });

                                //Sort the images by date if not set to random
                                if(sortby !== 'random') {
                                    returnedImagesArr.sort(function(x, y){
                                        return y.created_time - x.created_time;
                                    });
                                } else {
                                    returnedImagesArr.sort(function (a, b) {
                                        //Randomize
                                        return (Math.round(Math.random())-0.5);
                                    });
                                    transientName += '!';
                                }

                                //Add the data and pagination objects to the first object in the array so that we can create a super object to send back
                                if (typeof returnedImages !== 'undefined') returnedImages[0].data = returnedImagesArr;

                                //Replace the next_url string with an array of URLs
                                //If it's a coordinates type then we need to create the pagination object here as it doesn't exist yet
                                if(typeof returnedImages[0].pagination !== 'undefined' && !!returnedImages[0].pagination) {
                                    //if( typeof returnedImages[0].pagination.next_url !== 'undefined' ) {
                                    returnedImages[0].pagination.next_url = paginationArr;
                                    //}
                                } else {
                                    returnedImages[0].pagination = {
                                        "next_url" : ""
                                    };
                                }
                                var allImages = returnedImages[0];
                                //Pass the returned images to the buildFeed function

                                if(photosAvailable !== 'finished') sbiBuildFeed(allImages, transientName, sbiSettings, $self);

                                //Iterate the API request variable so that we can limit of the number of subsequent API requests when the Load More button is clicked
                                apiRequests++;

                            } // End sbiImagesReady()

                        }

                    } //End sbiFetchData()

                    //Cache the likes and comments counts by sending an array via ajax to the main plugin file which then stores it in a transient
                    function sbiGetCache(transientName, sbiSettings, $self, cacheWhat, apiURLs){
                        var transientData = transientName;
                        window.sbiCommentCacheStatus = 0;
                        var thisIndex = $self[0].getAttribute('data-sbi-index');

                        // our initial request now sends all transient names at once
                        if (typeof transientName === 'object') {
                            transientData = JSON.stringify(transientName);
                        }
                        var getCacheOpts = {
                            url: sbiajaxurl,
                            type: 'POST',
                            async: true,
                            cache: false,
                            data:{
                                action: 'get_cache',
                                transientName: transientData,
                                useBackupHeader: window.sbiUseBackup[thisIndex].header,
                                useBackupFeed: window.sbiUseBackup[thisIndex].feed
                            },
                            success: function(data) {
                                var jsonobj = {};
                                if (data.trim().indexOf('{') === 0) {
                                    if ( data.indexOf('{%22') > -1 || data.indexOf('%7B%22') > -1 ) {
                                        //Decode the JSON to that it can be used again
                                        data = decodeURI(data);
                                    }

                                    //Replace any escaped single quotes as it results in invalid JSON
                                    data = data.replace(/\\'/g, "'");
                                    //Convert the cached JSON string back to a JSON object
                                    jsonobj = JSON.parse( data.trim() );
                                }

                                if ( cacheWhat == 'all' ) {
                                    if (typeof jsonobj.header.error === 'undefined') {
                                        sbiBuildHeader(jsonobj.header, sbiSettings);
                                    }
                                    if (typeof jsonobj.feed.error === 'undefined') {
                                        if(photosAvailable !== 'finished') sbiBuildFeed(jsonobj.feed, transientName, sbiSettings, $self);
                                        if (typeof jsonobj.warning !== 'undefined') {
                                            var sbiErrorMsg = '<p><b>Cache Error: Looking for cache that doesn\'t exist. Now using a backup feed.</b><br /><span>This error is only visible to WordPress admins.</span>';
                                            var sbiErrorDir = "<p>If you are using a caching plugin, try enabling the option on the Customize tab 'Cache error API recheck' or 'Force cache to clear on interval'</p>";
                                            jQuery('#sb_instagram').before('<div id="sbi_mod_error">' + sbiErrorMsg + sbiErrorDir + '</div>');
                                        }
                                    } else {
                                        // get the index of the feed to check what processes have been done already
                                        feedOptions = JSON.parse($self[0].getAttribute('data-options'));
                                        var thisIndex = $self[0].getAttribute('data-sbi-index');
                                        feedOptions.feedIndex = thisIndex;
                                        // if the cache is unavailable and the user has enabled an attempt at the api, "tryfetch" is returned as the error
                                        if (window.sbiCacheStatuses[thisIndex].feed !== false && jsonobj.feed.error === 'tryfetch') {
                                            // on the second try, indicate that the cache isn't available to prevent this endless loop
                                            window.sbiCacheStatuses[thisIndex].feed = false;
                                            if (!$self.find('.sb_instagram_header .sbi_header_text').length) {
                                                window.sbiCacheStatuses[thisIndex].header = false;
                                            }

                                            // comments do not need to be retrieved
                                            window.sbiCacheStatuses[thisIndex].comments = 'no';
                                            // prevents multiple attempts
                                            feedOptions.tryFetch = true;
                                            // start from scratch with updated feed options and statuses
                                            if (typeof window.sbiCacheStatuses[feedOptions.feedIndex].tryFetch === 'undefined') sbiCreateFeed($self[0], feedOptions);
                                        } else if (window.sbiCacheStatuses[thisIndex].feed === true) {
                                            var sbiErrorMsg = '<p><b>Cache Error: Looking for cache that doesn\'t exist</b><br /><span>This error is only visible to WordPress admins.</span>';
                                            var sbiErrorDir = "<p>If you are using a caching plugin, try enabling the option on the Customize tab 'Cache error API recheck' or 'Force cache to clear on interval'</p>";
                                            jQuery('#sb_instagram').empty().append( '<p style="text-align: center;">Unable to show Instagram photos</p><div id="sbi_mod_error">' + sbiErrorMsg + sbiErrorDir + '</div>');
                                            //sbi_set_use_backup
                                            var submittedData = {
                                                action: 'sbi_set_use_backup',
                                                transientName : transientName,
                                                context : 'falsecache'
                                            };
                                            jQuery.ajax({
                                                url: sbiajaxurl,
                                                type: 'post',
                                                data: submittedData,
                                                success: function (data) {
                                                }
                                            }); // ajax
                                        }
                                    }
                                    if (jsonobj.header.error === 'tryfetch') {
                                        feedOptions = JSON.parse($self[0].getAttribute('data-options'));
                                        var thisIndex = $self[0].getAttribute('data-sbi-index');
                                        feedOptions.feedIndex = thisIndex;
                                        if (window.sbiCacheStatuses[thisIndex].header !== false) {
                                            if (!$self.find('.sb_instagram_header .sbi_header_text').length) {
                                                window.sbiCacheStatuses[thisIndex].header = false;
                                                feedOptions.tryFetch = true;
                                                // start from scratch with updated feed options and statuses
                                                if (typeof window.sbiCacheStatuses[feedOptions.feedIndex].tryFetch === 'undefined') sbiCreateFeed($self[0], feedOptions);

                                            }
                                        }
                                    }
                                    if (typeof jsonobj.comments.error === 'undefined') {
                                        sb_instagram_js_options.sbiPageCommentCache = jsonobj.comments;
                                    }

                                } else {
                                    if( cacheWhat == 'header' ){
                                        sbiBuildHeader(jsonobj, sbiSettings);
                                    } else {
                                        if(photosAvailable !== 'finished') sbiBuildFeed(jsonobj, transientName, sbiSettings, $self);
                                    }
                                }
                                //Pass the returned images to the buildFeed function

                            },
                            error: function(xhr,textStatus,e) {
                                console.log(e);
                                return;
                            }
                        };

                        jQuery.ajax(getCacheOpts);

                    }

                } // sbiCreateFeed

            }); // End jQuery('#sb_instagram.sbi').each

        }


    } // sb_init

    function sbiAddTokenToExpiredList(access_token,transientName) {
        var accessTokenOpts = {
            url: sbiajaxurl,
            type: 'POST',
            async: true,
            cache: false,
            data:{
                action: 'sbi_set_expired_token',
                access_token: access_token,
                transientName: transientName
            },
            success: function(response) {
                return;
            },
            error: function(xhr,textStatus,e) {
                console.log(e);
                return;
            }
        };
        jQuery.ajax(accessTokenOpts);
    }

    function sbiCachePhotos(images,transientName,feedTokens){
        feedTokens = typeof feedTokens !== 'undefined' ? feedTokens : [];
        //Convert the JSON object to a string
        //Encode the JSON string so that it can be stored in the database
        var numImages = images.data.length;

        if (typeof images !== 'undefined') {
            var setCacheOpts = {
                url: sbiajaxurl,
                type: 'POST',
                async: true,
                cache: false,
                data:{
                    action: 'cache_photos',
                    feed_tokens: feedTokens,
                    num_images: numImages,
                    transientName: transientName,
                },
                success: function(response) {
                },
                error: function(xhr,textStatus,e) {
                    console.log(e);
                    return;
                }
            };
            jQuery.ajax(setCacheOpts);
        }

    }

    //function function sbiSetPhotoHeight(){
    function sbiGetColumnCount($self, cols, colsmobile) {
        var sbi_num_cols = cols,
            sbiWindowWidth = window.innerWidth;

        if( $self.hasClass('sbi_mob_col_auto') ){
            if( sbiWindowWidth < 640 && (parseInt(cols) > 2 && parseInt(cols) < 7 ) ) sbi_num_cols = 2;
            if( sbiWindowWidth < 640 && (parseInt(cols) > 6 && parseInt(cols) < 11 ) ) sbi_num_cols = 4;
            if( sbiWindowWidth <= 480 && parseInt(cols) > 2 ) sbi_num_cols = 1;
        } else if (sbiWindowWidth <= 480){
            sbi_num_cols = colsmobile;
        }

        return sbi_num_cols;
    }

    function sbiGetWidthForResType(type) {
        switch (type) {
            case 'thumbnail':
                return 150;
            case 'low_resolution':
                return 320;
            default:
                return 640;
        }
    }

    function sbiGetBestResolutionForAuto(colWidth,imageWidth,imageHeight,isHighlight) {

        var aspectRatio = Math.max(1,imageWidth/imageHeight),
            bestWidth = colWidth*aspectRatio,
            bestWidthRounded = Math.ceil(bestWidth / 10) * 10,
            customSizes = [150,320,640];

        if (isHighlight) {
            bestWidthRounded = bestWidthRounded*2;
        }

        if (customSizes.indexOf(parseInt(bestWidthRounded)) === -1) {
            var done = false;
            jQuery.each(customSizes, function (index, item) {
                if (item > parseInt(bestWidthRounded) && !done) {
                    bestWidthRounded = item;

                    done = true;
                }
            });
        }

        return bestWidthRounded;
    }

    function sbiNeedToRaiseRes(width,oldRes) {
        return (width > oldRes);
    }

    function sbiGetResolutionSettings($self, imgRes, cols, colsmobile, $i) {
        var photoPadding = parseInt(($self.find('#sbi_images').outerWidth() - $self.find('#sbi_images').width())) / 2,
            cols = sbiGetColumnCount($self, parseInt(cols), parseInt(colsmobile)),
            colWidth = ($self.innerWidth() / cols) - photoPadding,
            imgResReturn = {
                'type'  : 'low_resolution',
                'width' : ''
            };

        switch(imgRes) {
            case 'auto':
                imgResReturn.type = 'auto';
                imgResReturn.width = colWidth;

                break;
            case 'thumb':
                imgResReturn.type = 'thumbnail';
                break;
            case 'medium':
                imgResReturn.type = 'low_resolution';
                break;
            default:
                // do custom sizes if set
                imgResReturn.type = 'standard_resolution';
        }

        if ( typeof window.sbiFeedMeta[$i].minRes === 'undefined' ) {
            window.sbiFeedMeta[$i].minRes = imgResReturn.type === 'auto' ? sbiGetBestResolutionForAuto(colWidth,imgResReturn.width,imgResReturn.width,$self.hasClass('sbi_highlight')): sbiGetWidthForResType(imgResReturn.type);
        }

        return imgResReturn;
    }

    // Called at the very end of the feed creation process
    // Takes all of the data retrieved from the API during the feed creation process and caches it
    function sbi_cache_all(imagesArr,transientName,feedTokens) {
        if (transientName.indexOf('header') && typeof imagesArr.data.pagination === 'undefined') {
            sbiCachePhotos(imagesArr,transientName,feedTokens);
        } else if (!transientName.indexOf('header') && typeof imagesArr.data.pagination !== 'undefined') {
            sbiCachePhotos(imagesArr,transientName,feedTokens);
        }
    }

    jQuery( document ).ready(function() {
        window.sbiCommentCacheStatus = 0;
        sbi_init(function(imagesArr,transientName,feedTokens) {
            sbi_cache_all(imagesArr,transientName,feedTokens);
        });
    });

} // end sbi_js_exists check