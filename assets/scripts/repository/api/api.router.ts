import API_ROUTES from "./api.routes";

type RouteParams = {
    [key: string]: string | number;
}

type RouteOptions = {
    [key: string]: string | number | boolean;
}

type mainRouteKey = keyof typeof API_ROUTES;
type RouteKey = `${mainRouteKey}.${keyof typeof API_ROUTES[mainRouteKey]}`

const apiRouter = {
    generate: (route: RouteKey, params: RouteParams = {}, options: RouteOptions = {}) => {
        let url = API_ROUTES[route.split('.')[0]][route.split('.')[1]];
        Object.keys(params).forEach((key) => {
            url = url.replace(`{${key}}`, params[key].toString());
        });

        if (Object.keys(options).length > 0) {
            url += '?';
            Object.keys(options).forEach((key) => {
                url += `${key}=${options[key]}&`;
            });
            url = url.slice(0, -1);
        }

        return url
    }
}

export default apiRouter;
