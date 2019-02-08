import { blogIndex } from './routes/blog-index';

// routes object to assign pathname to function for that route
const routes = {
    // For example  "/": () => home()
    "/blog/": () => blogIndex(),
};

export function router(path): void {

  let pathMatch = path.match(/\/(.*?)\//);
  if (pathMatch) { 
      pathMatch = pathMatch[0]; 
  }
  
  let parsedPath: string = (path === '/' ? '/' : pathMatch);
  if (routes[parsedPath] ) {
      routes[parsedPath]();
  }

}
