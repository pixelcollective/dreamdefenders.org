=== Instagram Feed ===
Contributors: smashballoon, craig-at-smash-balloon
Tags: Instagram, Instagram feed, Instagram photos, Instagram widget, Instagram gallery
Requires at least: 3.0
Tested up to: 5.1
Stable tag: 1.11.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display beautifully clean, customizable, and responsive feeds from multiple Instagram accounts

== Description ==

Display Instagram posts from your Instagram accounts, either in the same single feed or in multiple different ones.

= Features =
* Super **simple to set up**
* Display photos from **multiple Instagram accounts** in the same feed or in separate feeds
* Completely **responsive** and mobile ready - layout looks great on any screen size and in any container width
* **Completely customizable** - Customize the width, height, number of photos, number of columns, image size, background color, image spacing and more!
* Display **multiple Instagram feeds** on the same page or on different pages throughout your site
* Use the built-in **shortcode options** to completely customize each of your Instagram feeds
* Display thumbnail, medium or **full-size photos** from your Instagram feed
* **Infinitely load more** of your Instagram photos with the 'Load More' button
* Includes a **Follow on Instagram button** at the bottom of your feed
* Display a **beautiful header** at the top of your feed
* Display your Instagram photos chronologically or in random order
* Add your own Custom CSS and JavaScript for even deeper customizations

= Benefits =
* **Increase Social Engagement** - Increase engagement between you and your Instagram followers. Increase your number of followers by displaying your Instagram content directly on your site.
* **Save Time** - Don't have time to update your photos on your site? Save time and increase efficiency by only posting your photos to Instagram and automatically displaying them on your website
* **Display Your Content Your Way** - Customize your Instagram feeds to look exactly the way you want, so that they blend seemlessly into your site or pop out at your visitors!
* **Keep Your Site Looking Fresh** - Automatically push your new Instagram content straight to your site to keep it looking fresh and keeping your audience engaged.
* **Super simple to set up** - Once installed, you can be displaying your Instagram photos within 30 seconds! No confusing steps or Instagram Developer account needed.

= Pro Version =
In order to maintain the free version of the plugin on an ongoing basis, and to provide quick and effective support for free, we offer a Pro version of the plugin. The Pro version allows you to:
* Display Hashtag feeds (fully compatible with the Instagram December 11, 2018, API changes)
* View photos and videos in a popup lightbox directly on your site
* View post comments for user feeds
* Display the number of like and comments for each post
* Create carousels from your posts
* Use "Masonry" or "Highlight" layouts for your feeds
* Display captions for photos and videos
* Filter posts based on hashtag/word
* Advanced moderation system for hiding/showing certain posts
* Block posts by specific users
* Create "shoppable" Instagram feeds, and more.

[Find out more about the Pro version](https://smashballoon.com/instagram-feed/?utm_source=wordpress&utm_campaign=sbi "Instagram Feed Pro") or [try out the Pro demo](https://smashballoon.com/instagram-feed/demo/?utm_source=wordpress&utm_campaign=sbi "Instagram Feed Pro Demo").

= Featured Reviews =
"**Simple and concise** - Excellent plugin. Simple and non-bloated. I had a couple small issues with the plugin when I first started using it, but a quick comment on the support forums got a new version pushed out the next day with the fix. Awesome support!" - [Josh Jones](https://wordpress.org/support/topic/simple-and-concise-3 'Simple and concise Instagram plugin')

"**Great plugin, greater support!** - I've definitely noticed an increase in followers on Instagram since I added this plugin to my sidebar. Thanks for the help in making some adjustments...looks and works great!" - [BNOTP](https://wordpress.org/support/topic/thanks-for-a-great-plugin-6 'Great plugin, greater Support!')

= Feedback or Support =
We're dedicated to providing the most customizable, robust and well supported Instagram feed plugin in the world, so if you have an issue or have any feedback on how to improve the plugin then please open a ticket in the [Support forum](http://wordpress.org/support/plugin/instagram-feed 'Instagram Feed Support Forum').

For a pop-up photo **lightbox**, to display posts by **hashtag**, show photo **captions**, **video** support + more, check out the [Pro version](http://smashballoon.com/instagram-feed/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed Pro').

== Installation ==

1. Install the Instagram Feed plugin either via the WordPress plugin directory, or by uploading the files to your web server (in the `/wp-content/plugins/` directory).
2. Activate the Instagram Feed plugin through the 'Plugins' menu in WordPress.
3. Navigate to the 'Instagram Feed' settings page to obtain your Instagram Access Token and Instagram User ID and configure your settings.
4. Use the shortcode `[instagram-feed]` in your page, post or widget to display your Instagram photos.
5. You can display multiple Instagram feeds by using shortcode options, for example: `[instagram-feed num=6 cols=3]`

For simple step-by-step directions on how to set up the Instagram Feed plugin please refer to our [setup guide](http://smashballoon.com/instagram-feed/free/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed setup guide').

= Display your Feed =

**Single Instagram Feed**

Copy and paste the following shortcode directly into the page, post or widget where you'd like the Instagram feed to show up: `[instagram-feed]`

**Multiple Instagram Feeds**

If you'd like to display multiple Instagram feeds then you can set different settings directly in the shortcode like so: `[instagram-feed num=9 cols=3]`

You can display as many different Instagram feeds as you like, on either the same page or on different pages, by just using the shortcode options below. For example:
`[instagram-feed]`
`[instagram-feed id="ANOTHER_USER_ID"]`
`[instagram-feed id="ANOTHER_USER_ID, YET_ANOTHER_USER_ID" num=4 cols=4 showfollow=false]`

See the table below for a full list of available shortcode options:

= Shortcode Options =
* **General Options**
* **id** - An Instagram User ID - Example: `[instagram-feed id=AN_INSTAGRAM_USER_ID]`
* **width** - The width of your Instagram feed. Any number - Example: `[instagram-feed width=50]`
* **widthunit** - The unit of the width of your Instagram feed. 'px' or '%' - Example: `[instagram-feed widthunit=%]`
* **height** - The height of your Instagram feed. Any number - Example: `[instagram-feed height=250]`
* **heightunit** - The unit of the height of your Instagram feed. 'px' or '%' - Example: `[instagram-feed heightunit=px]`
* **background** - The background color of the Instagram feed. Any hex color code - Example: `[instagram-feed background=#ffff00]`
* **class** - Add a CSS class to the Instagram feed container - Example: `[instagram-feed class=feedOne]`
*
* **Photo Options**
* **sortby** - Sort the Instagram posts by Newest to Oldest (none) or Random (random) - Example: `[instagram-feed sortby=random]`
* **num** - The number of Instagram posts to display initially. Maximum is 33 - Example: `[instagram-feed num=10]`

* **cols** - The number of columns in your Instagram feed. 1 - 10 - Example: `[instagram-feed cols=5]`
* **imageres** - The resolution/size of the Instagram photos. 'auto', full', 'medium' or 'thumb' - Example: `[instagram-feed imageres=full]`
* **imagepadding** - The spacing around your Instagram photos - Example: `[instagram-feed imagepadding=10]`
* **imagepaddingunit** - The unit of the padding in your Instagram feed. 'px' or '%' - Example: `[instagram-feed imagepaddingunit=px]`
* **disablemobile** - Disable the mobile layout for your Instagram feed. 'true' or 'false' - Example: `[instagram-feed disablemobile=true]`
*
* **Header Options**
* **showheader** - Whether to show the Instagram feed Header. 'true' or 'false' - Example: `[instagram-feed showheader=false]`
* **headercolor** - The color of the Instagram feed Header text. Any hex color code - Example: `[instagram-feed headercolor=#333]`
*
* **'Load More' Button Options**
* **showbutton** - Whether to show the 'Load More' button. 'true' or 'false' - Example: `[instagram-feed showbutton='false']`
* **buttoncolor** - The background color of the button. Any hex color code - Example: `[instagram-feed buttoncolor=#000]`
* **buttontextcolor** - The text color of the button. Any hex color code - Example: `[instagram-feed buttontextcolor=#fff]`
* **buttontext** - The text used for the button - Example: `[instagram-feed buttontext="Load More Photos"]`
*
* **'Follow on Instagram' Button Options**
* **showfollow** - Whether to show the 'Follow on Instagram' button. 'true' or 'false' - Example: `[instagram-feed showfollow=true]`
* **followcolor** - The background color of the 'Follow on Instagram' button. Any hex color code - Example: `[instagram-feed followcolor=#ff0000]`
* **followtextcolor** - The text color of the 'Follow on Instagram' button. Any hex color code - Example: `[instagram-feed followtextcolor=#fff]`
* **followtext** - The text used for the 'Follow on Instagram' button - Example: `[instagram-feed followtext="Follow me"]`

For more shortcode options, check out the [Pro version](http://smashballoon.com/instagram-feed/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed Pro').

= Setting up the Free Instagram Feed WordPress Plugin =

1) Once you've installed the Instagram Feed plugin click on the Instagram Feed item in your WordPress menu

2) Click on the large blue Instagram button to log into your Instagram account and get your Instagram Access Token and Instagram User ID

3) Copy and paste the Instagram Access Token and Instagram User ID into the relevant Instagram Access Token and Instagram User ID fields. If you're having trouble retrieving your Instagram information from Instagram then try using the Instagram button on [this page](https://smashballoon.com/instagram-feed/token/?utm_source=wordpress&utm_campaign=sbi) instead.

You can also display photos from other Instagram accounts by using [this tool](http://www.otzberg.net/iguserid/) to find their Instagram User ID. 

4) Navigate to the Instagram Feed customize page to customize your Instagram feed. 

5) Once you've customized your Instagram feed, click on the Display Your Feed tab to grab the [instagram-feed] shortcode.

6) Copy the Instagram Feed shortcode and paste it into any page, post or widget where you want the Instagram feed to appear.

7) You can paste the Instagram Feed shortcode directly into your page editor. 

8) You can use the default WordPress 'Text' widget to display your Instagram Feed in a sidebar or other widget area.

== Frequently Asked Questions ==

= Can I display multiple Instagram feeds on my site or on the same page? =

Yep. You can display multiple Instagram feeds by using our built-in shortcode options, for example: `[instagram-feed id="12986477" cols=3]`.

= Can I display photos from more than one Instagram account in one single feed? =

Yep. You can just separate the IDs by commas, either in the User ID(s) field on the plugin's Settings page, or directly in the shortcode like so: `[instagram-feed id="12986477,13460080"]`.

= How do I find my Instagram Access Token and Instagram User ID =

We've made it super easy. Simply click on the big blue button on the Instagram Feed Settings page and log into your Instagram account. The plugin will then retrieve and display both your Access Token and User ID from Instagram.

= My Instagram feed isn't displaying. Why not!? =

There are a few common reasons for this:

* **Your Access Token may not be valid.** Try clicking on the blue Instagram login button on the plugin's Settings page again and copy and paste the Instagram token it gives you into the plugin's Access Token field.
* **Your Instagram account may be set to private.** Your Instagram account may be set to private. Instagram doesn't allow photos from private Instagram accounts to be displayed publicly.
* **Your User ID may not be valid**. Be sure you're not using your Instagram username instead of your User ID. You can find your Instagram User ID by using [this tool](http://www.otzberg.net/iguserid/).
* **The plugin's JavaScript file isn't being included in your page.** This is most likely because your WordPress theme is missing the WordPress [wp_footer](http://codex.wordpress.org/Function_Reference/wp_footer) function which is required for plugins to be able to add their JavaScript files to your page. You can fix this by opening your theme's **footer.php** file and adding the following directly before the closing </body> tag: `<?php wp_footer(); ?>`
* **Your website may contain a JavaScript error which is preventing JavaScript from running.** The plugin uses JavaScript to load the Instagram photos into your page and so needs JavaScript to be running in order to work. You would need to remove any existing JavaScript errors on your website for the plugin to be able to load in your feed.

If you're still having an issue displaying your feed then please open a ticket in the [Support forum](http://wordpress.org/support/plugin/instagram-feed 'Instagram Feed Support Forum') with a link to the page where you're trying to display the Instagram feed and, if possible, a link to your Instagram account.

= Are there any security issues with using an Access Token on my site? =

Nope. The Access Token used in the plugin is a "read only" token, which means that it could never be used maliciously to manipulate your Instagram account.

= Can I view the full-size photos or play Instagram videos directly on my website?  =

This is a feature of the [Pro version](http://smashballoon.com/instagram-feed/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed Pro') of the plugin, which allows you to view the photos in a pop-up lightbox, support videos, display captions, display photos by hashtag + more!

= How do I embed my Instagram Feed directly into a WordPress page template? =

You can embed your Instagram feed directly into a template file by using the WordPress [do_shortcode](http://codex.wordpress.org/Function_Reference/do_shortcode) function: `<?php echo do_shortcode('[instagram-feed]'); ?>`.

= My Feed Stopped Working – All I see is a Loading Symbol =

If your Instagram photos aren't loading and all your see is a loading symbol then there are a few common reasons:

1) There's an issue with the Instagram Access Token that you are using

You can obtain a new Instagram Access Token on the Instagram Feed Settings page by clicking the blue Instagram login button and then copy and pasting it into the plugin's 'Access Token' field.

Occasionally the blue Instagram login button does not produce a working access token. You can try [this link](https://smashballoon.com/instagram-feed/token/?utm_source=wordpress&utm_campaign=sbi) as well.

2) Your Instagram User ID is incorrect or is from a private Instagram account

Please double check the Instagram User ID that you are using. Please note that your Instagram User ID is different from your Instagram username. To find your Instagram User ID simply enter your Instagram username into [this tool](http://www.otzberg.net/iguserid/).

If your Instagram User ID doesn't show any Instagram photos then it may be that your Instagram account is private and that the Instagram photos aren't able to be displayed.

3) The plugin's JavaScript file isn't being included in your page

This is most likely because your WordPress theme is missing the WordPress wp_footer function which is required for plugins to be able to add their JavaScript files to your page. You can fix this by opening your theme's footer.php file and adding the following directly before the closing </body> tag:

<?php wp_footer(); ?>

4) There's a JavaScript error on your site which is preventing the plugin's JavaScript file from running

You find find out whether this is the case by right clicking on your page, selecting 'Inspect Element', and then clicking on the 'Console' tab, or by selecting the 'JavaScript Console' option from your browser's Developer Tools.

If a JavaScript error is occurring on your site then you'll see it listed in red along with the JavaScript file which is causing it.

5) The feed you are trying to display has no Instagram posts

If you are trying to display an Instagram feed that has no posts made to it, a loading symbol may be all that shows for the Instagram feed or nothing at all. Once you add an Instagram post the Instagram feed should display normally

6) The shortcode you are using is incorrect

You may have an error in the Instagram Feed shortcode you are using or are missing a necessary argument.

= What are the available shortcode options that I can use to customize my Instagram feed? =

The below options are available on the Instagram Feed Settings page but can also be used directly in the `[instagram-feed]` shortcode to customize individual Instagram feeds on a feed-by-feed basis.

* **General Options**
* **id** - An Instagram User ID - Example: `[instagram-feed id=AN_INSTAGRAM_USER_ID]`
* **width** - The width of your Instagram feed. Any number - Example: `[instagram-feed width=50]`
* **widthunit** - The unit of the width of your Instagram feed. 'px' or '%' - Example: `[instagram-feed widthunit=%]`
* **height** - The height of your Instagram feed. Any number - Example: `[instagram-feed height=250]`
* **heightunit** - The unit of the height of your Instagram feed. 'px' or '%' - Example: `[instagram-feed heightunit=px]`
* **background** - The background color of the Instagram feed. Any hex color code - Example: `[instagram-feed background=#ffff00]`
* **class** - Add a CSS class to the Instagram feed container - Example: `[instagram-feed class=feedOne]`
*
* **Photo Options**
* **sortby** - Sort the Instagram posts by Newest to Oldest (none) or Random (random) - Example: `[instagram-feed sortby=random]`
* **num** - The number of Instagram posts to display initially. Maximum is 33 - Example: `[instagram-feed num=10]`

* **cols** - The number of columns in your Instagram feed. 1 - 10 - Example: `[instagram-feed cols=5]`
* **imageres** - The resolution/size of the Instagram photos. 'auto', full', 'medium' or 'thumb' - Example: `[instagram-feed imageres=full]`
* **imagepadding** - The spacing around your Instagram photos - Example: `[instagram-feed imagepadding=10]`
* **imagepaddingunit** - The unit of the padding in your Instagram feed. 'px' or '%' - Example: `[instagram-feed imagepaddingunit=px]`
* **disablemobile** - Disable the mobile layout for your Instagram feed. 'true' or 'false' - Example: `[instagram-feed disablemobile=true]`
*
* **Header Options**
* **showheader** - Whether to show the Instagram feed Header. 'true' or 'false' - Example: `[instagram-feed showheader=false]`
* **headercolor** - The color of the Instagram feed Header text. Any hex color code - Example: `[instagram-feed headercolor=#333]`
*
* **'Load More' Button Options**
* **showbutton** - Whether to show the 'Load More' button. 'true' or 'false' - Example: `[instagram-feed showbutton='false']`
* **buttoncolor** - The background color of the button. Any hex color code - Example: `[instagram-feed buttoncolor=#000]`
* **buttontextcolor** - The text color of the button. Any hex color code - Example: `[instagram-feed buttontextcolor=#fff]`
* **buttontext** - The text used for the button - Example: `[instagram-feed buttontext="Load More Photos"]`
*
* **'Follow on Instagram' Button Options**
* **showfollow** - Whether to show the 'Follow on Instagram' button. 'true' or 'false' - Example: `[instagram-feed showfollow=true]`
* **followcolor** - The background color of the 'Follow on Instagram' button. Any hex color code - Example: `[instagram-feed followcolor=#ff0000]`
* **followtextcolor** - The text color of the 'Follow on Instagram' button. Any hex color code - Example: `[instagram-feed followtextcolor=#fff]`
* **followtext** - The text used for the 'Follow on Instagram' button - Example: `[instagram-feed followtext="Follow me"]`

For more shortcode options, check out the [Pro version](http://smashballoon.com/instagram-feed/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed Pro').

For more FAQs related to the Instagram Feed plugin please visit the [FAQ section](https://smashballoon.com/instagram-feed/support/faq/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed plugin FAQs') on our website.

== Screenshots ==

1. Default plugin styling
2. Your Instagram Feed is completely customizable
3. Display multiple Instagram feeds from any non-private Instagram account
4. Your Instagram feeds are completely responsive and look great on any device
5. Display your Instagram photos in multiple columns, with or without a scrollbar
6. Just copy and paste the shortcode into any page, post or widget on your site
7. The Instagram Feed plugin Settings pages

== Other Notes ==

Add beautifully clean, customizable, and responsive Instagram feeds to your website. Super simple to set up and tons of customization options to seamlessly match the look and feel of your site.

= Why do I need this? =

**Increase Social Engagement**
Increase engagement between you and your Instagram followers. Increase your number of Instagram followers by displaying your Instagram content directly on your site.

**Save Time**
Don't have time to update your photos on your site? Save time and increase efficiency by only posting your photos to Instagram and automatically displaying them on your website.

**Display Your Content Your Way**
Customize your Instagram feeds to look exactly the way you want, so that they blend seemlessly into your site or pop out at your visitors!

**Keep Your Site Looking Fresh**
Automatically push your new Instagram content straight to your site to keep it looking fresh and keeping your audience engaged.

**No Coding Required**
Choose from tons of built-in Instagram Feed customization options to create a truly unique feed of your Instagram content.

**Super simple to set up**
Once installed, you can be displaying your Instagram photos within 30 seconds! No confusing steps or Instagram Developer account needed.

**Mind-blowing Customer Support**
We understand that sometimes you need help, have issues or just have questions. We love our users and strive to provide the best support experience in the business. We're experts in the Instagram API and can provide unparalleled service and expertise. If you need support then just let us know and we'll get back to you right away.

= What can it do? =

* Display Instagram photos from any Instagram account you own.
* Completely responsive and mobile ready –your Instagram feed layout looks great on any screen size and in any container width
* Display multiple Instagram feeds on the same page or on different pages throughout your site by using our powerful Instagram Feed shortcode options
* Display posts from multiple Instagram User IDs
* Use the built-in shortcode options to completely customize each of your Instagram feeds
* Infinitely load more of your Instagram photos with the 'Load More' button
* Plus more features added all the time!

= Completely Customizable =

* By default the Instagram feed will adopt the style of your website, but can be completely customized to look however you like!
* Set the number of Instagram photos you want to display
* Choose how many columns to display your Instagram photos in and the size of the Instagram photos
* Choose to show or hide certain parts of the Instagram feed, such as the header, 'Load More', and 'Follow' buttons
* Control the width, height and background color of your Instagram feed
* Set the spacing/padding between the Instagram photos
* Display Instagram photos in chronological or random order
* Use your own custom text and colors for the 'Load More' and 'Follow' buttons
* Enter your own custom CSS or JavaScript for even deeper customization
* Use the shortcode options to style multiple Instagram feeds in completely different ways
* Plus more customization options added all the time!

== Changelog ==
= 1.11.2 =
* Fix: Unable to connect new accounts due to changes with Instagram's API. Remote requests to connect accounts are now made server-side.

= 1.11.1 =
* Fix: Feed would not load from a cache created with an older version of the plugin
* Fix: Fixed PHP warning trying to count string length of an array

= 1.11 =
* New: Added capability "manage_instagram_feed_options" to support customizations that will allow users/roles other than the administrator to access Instagram Feed settings pages.
* Fix: rel="noopener" added to all links that contain target="blank"
* Fix: HTTPS used in xlmns attribute for svgs
* Fix: Fixed issues with strings in the admin area being translatable
* Fix: Fixed a potential security vulnerability. Thanks to [Martin Verreault](https://egyde.ca/) for reporting the issue.

= 1.10.2 =
* Confirmed compatibility with the upcoming WordPress 5.0 "Gutenberg" update
* Fix: Fixed an issue caused by some themes which affected the formatting of the 'Load More' and 'Follow' buttons
* Fix: Fixed an occasional formatting issue with error messages due to no line-height being set
* Fix: Minor admin UI fixes
* Tweak: Removed mention of some Pro features which will be deprecated due to upcoming Instagram API changes

= 1.10.1 =
* Tweak: Automatic image resolution detection setting now works better with wide images. Resizing the browser will now automatically raise the image resolution if needed.
* Fix: Fixed an issue where the Load More button would disappear if all posts for a feed were cached.

= 1.10 =
* New: We've made improvements to the way photos are loaded into the feed, adding a smooth transition to display photos subtly rather than suddenly.
* New: More header sizes; you can now choose from three sizes: small, medium, and large. Change this on the "Customize" tab.
* Fix: Using a percent for the image padding was causing the height of images to be too tall
* Fix: Removed a PHP notice when the Instagram API was blocked by the web host

= 1.9.1 =
* Fix: Captions missing as "alt" text for Instagram images.
* Fix: System information was not formatting connected Instagram accounts and user ids correctly
* Fix: "Unauthorized redirect URL" error occurring while trying to connect a new Instagram account due to recent changes from Instagram
* Fix: Using a percent for the image padding was causing the height of Instagram images to be to tall

= 1.9 =
* New: Retrieving Access Tokens and connecting multiple Instagram accounts is now easier using our improved interface for managing account information. While on the Configure tab, click on the big blue button to connect an account, or use the "Manually Connect an Account" option to connect one using an existing Access Token. Once an account is connected, you can use the associated buttons to either add it to your primary Instagram User feed or to a different Instagram feed on your site using the `user` shortcode option, eg: `user=smashballoon`.
* Tweak: Disabled auto load in the database for backup caches
* Fix: Fixed an occasional issue with the Instagram login flow which would result in an "Unauthorized redirect URL" error

= 1.8.3 =
* Fix: SVG icons caused some display problems in IE 11
* Fix: Removed support for using usernames in the Instagram User ID setting due to recent API changes. Will now default to the Instagram User ID attached to the Access Token.
* Fix: Backup feed not always being used when Access Tokens expire
* Fix: Instagram Access Tokens may have been incorrectly saved as invalid under certain circumstances

= 1.8.2 =
* Tweak: Setting "Cache Error API Recheck" enabled by default for new Instagram Feed installs
* Fix: Page caches created with the WP Rocket plugin will be cleared when the Instagram Feed settings are updated or the cache is forced to clear
* Fix: Fixed a rare issue where feeds were displaying "Looking for cache that doesn't exist" when page caching was not being used

= 1.8.1 =
* Fix: Fixed issue where Instagram feeds were displaying "Looking for cache that doesn't exist" when page caching was not being used
* Fix: Font method setting not working when "Are you using an ajax theme?" setting is enabled

= 1.8 =
* Important: Due to [recent changes](https://smashballoon.com/instagram-api-changes-april-4-2018/?utm_source=wordpress&utm_campaign=sbi) in the Instagram API it is no longer possible to display photos from other Instagram accounts which are not your own. You can only display the user feed of the account which is associated with your Access Token.
* New: Added an Access Token shortcode option and support for multiple Instagram Access Tokens. If you own multiple Instagram accounts then you can now use multiple Access Tokens in order to display user feeds from each Instagram account, either in separate feeds, or in the same feed. Just use the `accesstoken` shortcode option. See [this FAQ](https://smashballoon.com/display-multiple-instagram-feeds/#multiple-user-feeds) for more information on displaying multiple User feeds.

= 1.7 =
* New: Added feed caching to limit the number of Instagram API requests. Use the setting on the "Configure" tab "Check for new posts every" to set how long feed data will be cached before refreshing.
* New: Added backup caching for all feeds. If the Instagram feed is unable to display then a backup feed will be shown to visitors if one is available. The backup cache can be disabled or cleared by using the following setting: `Customize > Misc > Enable Backup Caching`.
* New: Icons are now generated as SVGs for a sharper look and more semantic markup
* New: Instagram carousel posts include an icon to indicate that they are carousel posts
* Tweak: Using the "sort posts by random" feature will include the most recent 33 posts instead of just the posts shown in the Instagram feed
* Fix: links back to instagram.com will use the "www" prefix

= 1.6.2 =
* Fix: Fixed a rare issue where the Load More button wouldn't be displayed after the last update if the Instagram account didn't have many posts

= 1.6.1 =
* Fix: Fixed Font Awesome 5.0 causing Instagram icon to appear as a question mark with a circle
* Fix: Fixed inline padding style for sbi_images element causing validation error when set to "0" or blank space
* Fix: Added a workaround for an Instagram API bug which caused some feeds to show fewer posts than expected

= 1.6 =
* New: Loading icon appears when waiting for new posts after clicking the "Load More..." button
* New: Added translation files for Dutch (nl_NL)
* Fix: Fixed a potential security vulnerability. Thanks to [Magnus Stubman](http://dumpco.re/) for reporting the issue.

= 1.5.1 =
* New: The plugin is now compatible with the [WPML plugin](https://wpml.org/) allowing you to use multiple translations for your feeds on your multi-language sites
* New: Added translation files for Danish (da_DK), Finnish (fi_FL), Japanese (ja_JP), Norwegian (nn_NO), Portuguese (pt_PT), and Swedish (sv_SE) to translate the "Load More" and "Follow on Instagram" text

= 1.5 =
* New: Improved tool for retrieving Instagram Access Tokens
* New: Added an option to show/hide Instagram bio text in feed header
* New: Feeds that include IDs from "private" Instagram accounts will now ignore the private data and display a message to logged-in site admins which indicates that one of the Instagram accounts is private
* New: Feeds without any Instagram posts yet will display a message informing logged-in admins to make a post on Instagram in order to view the feed
* New: Added translation files for French (fr_FR), German (de_DE), English (en_EN), Spanish (es_ES), Italian (it_IT), and Russian (ru_RU) to translate "Load More..." and "Follow on Instagram"
* Tweak: Optimized several images used in the Instagram feed including loader.png
* Tweak: Font Awesome stylesheet handle has been renamed so it will only be loaded once if our Custom Facebook Feed plugin is also active
* Fix: Updated the Font Awesome icon font to the latest version: 4.7.0
* Fix: Padding removed from "Load More" button if no buttons are being used in the Instagram feed
* Fix: All links in the feed are now https
* Fix: Fixed JavaScript errors which were being caused if the Instagram Access Token had expired or the user ID was incorrect, private, or had no Instagram posts

= 1.4.9 =
* Compatible with WordPress 4.8

= 1.4.8 =
* Tweak: Updated plugin links for new WordPress.org repo
* Fix: Minor bug fixes

= 1.4.7 =
* Fix: Fixed a security vulnerabiliy
* Tested with upcoming WordPress 4.6 update

= 1.4.6.2 =
* Fix: Removed a comment from the plugin's JavaScript file which was causing an issue with some optimization plugins, such as Autoptimize.

= 1.4.6.1 =
* Fix: Fixed an issue with the Instagram image URLs which was resulting in inconsistent url references in some feeds

= 1.4.6 =
* **IMPORTANT: Due to the recent Instagram API changes, in order for the Instagram Feed plugin to continue working after June 1st you must obtain a new Access Token by using the Instagram button on the plugin's Settings page.** This is true even if you recently already obtained a new token. Apologies for any inconvenience.

= 1.4.5 =
* New: When you click on the name of a setting on the plugin’s Settings pages it now displays the shortcode option for that setting, making it easier to find the option that you need
* New: Added a setting to disable the Font Awesome icon font if needed. This can be found under the Misc tab at the bottom of the Customize page.
* Tweak: Updated the Instagram icon to match their new branding
* Tweak: Added a help link next to the Instagram login button in case there's an issue using it
* Fix: Updated the Font Awesome icon font to the latest version: 4.6.3

= 1.4.4 =
* Fix: Fixed an issue caused by a specific type of emoji which would cause the feed to break when used in a post
* Tweak: Added links to our other **free** plugins to the bottom of the admin pages: [The Custom Facebook Feed](https://wordpress.org/plugins/custom-facebook-feed/) and [Custom Twitter Feeds](https://wordpress.org/plugins/custom-twitter-feeds/)

= 1.4.3 =
* Fix: Important notice added in the last update is now only visible to admins

= 1.4.2 =
* New: Compatible with Instagram's new API changes effective June 1st
* New: Added video icons to Instagram posts in the feed which contain videos
* New: Added a setting to allow you to use a fixed pixel width for the feed on desktop but switch to a 100% width responsive layout on mobile
* Tweak: Added a width and height attribute to the images to help improve Google PageSpeed score
* Tweak: A few minor UI tweaks on the settings pages
* Fix: Minified CSS and JS files

= 1.3.11 =
* Fix: Fixed a bug which was causing the height of the Instagram photos to be shorter than they should have been in some themes
* Fix: Fixed an issue where when an Instagram feed was initially hidden (in a tab, for example) then the Instagram photo resolution was defaulting to 'thumbnail'

= 1.3.10 =
* Fix: Fixed an issue which was setting the visibility of some Instagram photos to be hidden in certain browsers
* Fix: The new square photo cropping is no longer being applied to Instagram feeds displaying images at less than 150px wide as the images from Instagram at this size are already square cropped
* Fix: Fixed a JavaScript error in Internet Explorer 8 caused by the 'addEventListener' function not being supported

= 1.3.9 =
* Fix: Fixed an issue where Instagram photos wouldn't appear in the Instagram feed if it was initially being hidden inside of a tab or some other element
* Fix: Fixed an issue where the new Instagram image cropping fuction was failing to run on some sites and causing the Instagram images to appear as blank

= 1.3.8 =
* Fix: If you have uploaded an Instagram photo in portrait or landscape then the plugin will now display the square cropped version of the photo in your Instagram feed

= 1.3.7 =
* Fix: Fixed an issue with double quotes in photo captions (used in the Instagram photo alt tags) which caused a formatting issue

= 1.3.6 =
* Fix: Fixed an issue introduced in version 1.3.4 which was causing theme settings to not be applied in some themes

= 1.3.5 =
* Fix: Reverted the 'prop' function introduced in the last update back to 'attr' as prop isn't supported in older versions of jQuery
* Fix: Removed the image load function as it was causing Instagram images not to be displayed for some users

= 1.3.4 =
* Fix: Used the Instagram photo caption to add a more descriptive alt tag to the Instagram photos
* Fix: Instagram photos are now only displayed once they're fully loaded
* Fix: Added a stricter CSS implementation for some elements to prevent styles being overridden by themes
* Fix: Added CSS opacity property to Instagram images to prevent issues with lazy loading in some themes
* Fix: Removed a line of code which was disabling WordPress Debug/Error Reporting. If needed, this can be disabled again by using the setting at the bottom of the plugin's 'Customize' settings page.
* Fix: Made some JavaScript improvements to the core Instagram Feed plugin code

= 1.3.3 =
* Fix: Fixed an issue with the 'Load more' button not always showing when displaying Instagram photos from multiple Instagram User IDs
* Fix: Moved the initiating sbi_init function outside of the jQuery ready function so that it can be called externally if needed by Ajax powered themes/plugins

= 1.3.2 =
* New: Added an option to disable the Instagram Feed mobile layout
* New: Added an setting which allows you to use the Instagram Feed plugin with an Ajax powered theme
* New: Added a 'class' shortcode option which allows you to add a CSS to class to each individual Instagram feed: `[instagram-feed class=feedOne]`
* New: Added a Support tab which contains System Info to help with troubleshooting
* New: Added friendly error messages which display only to WordPress admins
* New: Added validation to the Instagram User ID field to prevent usernames being entered instead of IDs
* Tweak: Made the Instagram Access Token field slightly wider to prevent tokens being copy and pasted incorrectly
* Fix: Fixed a JavaScript bug which caused the feed not to load photos correctly in IE8

= 1.3.1 =
* Fix: Fixed an issue with the Instagram icon not appearing in the 'Follow on Instagram' button or in the Instagram Feed header
* Fix: Addressed a few CSS issues which were causing some minor formatting issues in the Instagram Feed on certain themes

= 1.3 =
* New: You can now display Instagram photos from multiple Instagram User IDs. Simply separate your Instagram IDs by commas.
* New: Added an optional header to the Instagram feed which contains your Instagram profile picture, Instagram username and Instagram bio. You can activate this on the Instagram Feed Customize page.
* New: The Instagram Feed plugin now includes an 'Auto-detect' option for the Instagram Image Resolution setting which will automatically set the correct Instagram image resolution based on the size of your Instagram feed.
* New: Added an optional 'Follow on Instagram' button which can be displayed at the bottom of your Instagram feed. You can activate this on the Instagram Feed Customize page.
* New: Added the ability to use your own custom text for the 'Load More' button
* New: Added a loader icon to indicate that the Instagram photos are loading
* New: Added a unique ID to each Instagram photo so that they can be targeted individually via CSS
* Tweak: Added a subtle fade effect to the Instagram photos when hovering over them
* Tweak: Improved the responsive layout behavior of the Instagram feed
* Tweak: Improved the documentation within the Instagram Feed plugin settings pages
* Tweak: Included a link to [step-by-step setup directions](http//:smashballoon.com/instagram-feed/free/?utm_source=wordpress&utm_campaign=sbi 'Instagram feed setup directions') for the plugin
* Fix: Fixed an issue with the feed not clearing other widgets correctly

= 1.2.3 =
* Fix: Replaced the 'on' function with the 'click' function to increase compatibility with themes using older versions of jQuery

= 1.2.2 =
* Tweak: Added an initialize function to the Instagram Feed plugin
* Fix: Fixed an occasional issue with the 'Sort Photos By' option being undefined

= 1.2.1 =
* Fix: Fixed a minor issue with the Custom JavaScript being run before the Instagram photos are loaded
* Fix: Removed stray PHP notices
* Fix: Changed the double quotes to single quotes on the 'data-options' attribute

= 1.2 =
* New: Added Custom CSS and Custom JavaScript sections which allow you to add your own custom CSS and JavaScript to the Instagram Feed plugin
* New: Added an option to display your Instagram photos in random order
* New: A new tabbed layout has been implemented on the Instagram Feed plugin's settings pages
* New: Added an option to preserve your Instagram Feed settings when uninstalling the plugin
* New: Added a [Pro version](http://smashballoon.com/instagram-feed/?utm_source=wordpress&utm_campaign=sbi 'Instagram Feed Pro') of the Instagram Feed plugin which allows you to display Instagram photos by hashtag, display Instagram captions, view Instagram photos in a pop-up lightbox, show the number of Instagram likes & comments and more
* Tweak: The 'Load More' button now automatically hides if there are no more Instagram photos to load
* Tweak: Added a small gap to the top of the 'Load More' button
* Tweak: Added a icon to the Instagram Feed menu item

= 1.1.6 =
* Fix: A maximum width is now only applied to the Instagram feed when the Instagram photos are displayed in one column

= 1.1.5 =
* Fix: Added a line of code which enables shortcodes to be used in widgets for themes which don't have it enabled

= 1.1.4 =
* Fix: Fixed an issue with the Instagram Access Token and Instagram User ID retrieval functionality in certain web browsers

= 1.1.3 =
* Fix: Fixed an issue with the maximum Instagram image width
* Fix: Corrected a typo in the Instagram Feed Shortcode Options table

= 1.1.1 =
* Pre-tested for the upcoming WordPress 4.0 update
* Fix: Fixed an uncommon issue related to the output of the Instagram content

= 1.1 =
* New: Added an option to set the number of Instagram photos to be initially displayed
* New: Added an option to show or hide the 'Load More' button
* New: Added 'Step 3' to the Instagram Feed Settings page explaining how to display your feed using the [instagram-feed] shortcode
* New: Added a full list of all available Instagram Feed shortcode options to help you if customizing multiple Instagram feeds

= 1.0.2 =
* Fix: Fixed an issue with the Instagram login URL on the plugin's Instagram Feed Settings page

= 1.0.1 =
* Fix: Fixed an issue with the Instagram Feed 'Load More' button opening an empty browser window in Firefox

= 1.0 =
* Launched the Instagram Feed plugin!