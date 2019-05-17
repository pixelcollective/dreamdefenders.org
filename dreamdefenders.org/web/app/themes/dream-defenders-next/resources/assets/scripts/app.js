/**
 * Local Dependencies
 */
import Router from './util/Router';
import common from './routes/common';
import aboutUs from './routes/about';
import { ready } from './utils';

/**
 * Populate the Router instance with DOM routes.
 *
 * common – Fired on all pages.
 * aboutUs – Fired on the About Us page, note the change from about-us to aboutUs (camelCase).
 */
const routes = new Router({
  common,
  aboutUs,
});

/**
 * Load Events
 */
ready(() => routes.loadEvents());
