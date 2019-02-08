// Entry point for TS /JS.
// add any global js functionality to the onload function

import { router } from "./router";
import { navigation } from './shared/navigation';

window.onload = (event) => { 
    const path = location.pathname;
    router(path);
    navigation();
}
