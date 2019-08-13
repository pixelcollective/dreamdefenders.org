import { router } from 'js-dom-router';

const home = async () => import(/* webpackChunkName: "scripts/routes/home" */ './routes/home');

router
  .on('about-us', about)
  .on('home', async (event) => (await home()).default(event))
  .ready();
