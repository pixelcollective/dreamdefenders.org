import * as jQuery from 'jquery';

export function blogIndex() {
  let max;
 
  // default options for the loadMorePosts function
   const loadMoreOptions = {
       loadCount: 1,
       fetchCount: 8
   };
   
  // start spinner until server responds with posts
  function startSpin(): void {
    jQuery('body').addClass('no-scroll');
    jQuery('#spinner').removeClass('hidden');
  }
 
  function stopSpin(): void {
    jQuery('body').removeClass('no-scroll');
    jQuery('#spinner').addClass('hidden');
  }
 
  // AJAX for infinite scroll pagination
  function loadMorePosts(pageNumber, postsPerPage): void {
       var query = 'action=infinite_scroll&page_no=' + pageNumber + 
           '&loop_file=loop&posts_per_page=' + postsPerPage;
 
      jQuery.ajax({
           url: '/wp-admin/admin-ajax.php',
           type: 'post',
           data: query,
           success: function(response){
             console.log(response);
               if ( response === 'max' ) {
                 max = true; // reached max pagination
                 jQuery('#max-blog-posts').removeClass('hidden');
                 stopSpin();
               } else {
                jQuery('#blog-index').append(response);
                 stopSpin();
               }
           }
       });
   }
 
   // on init load posts
   function onInit() {
       startSpin();
       loadMorePosts(loadMoreOptions.loadCount, loadMoreOptions.fetchCount);
       loadMoreOptions.loadCount+=1;
   }
    
   jQuery(window).on('scroll', function(){ 
     let scrollHeight = jQuery(window).scrollTop();
     let windowHeight = jQuery(window).height();
     let docHeight = jQuery(document).height();
 
     if ( !max && (scrollHeight + windowHeight) === docHeight ) {
       startSpin();
       loadMorePosts(loadMoreOptions.loadCount, loadMoreOptions.fetchCount);
       loadMoreOptions.loadCount+=1;
     }
   });
 
   onInit();
 
 }
