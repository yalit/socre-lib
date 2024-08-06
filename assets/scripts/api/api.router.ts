import API_ROUTES from "./api.routes";

type RouteParams = {
    [key: string]: string | number;
}

type RouteOptions = {
    [key: string]: string | number | boolean;
}

type mainRouteKey = keyof typeof API_ROUTES;
type routeKey<T extends mainRouteKey> = keyof typeof API_ROUTES[T]

const apiRouter = {
    generate: (mainRoute: mainRouteKey, routeKey: routeKey<typeof mainRoute>, params: RouteParams = {}, options: RouteOptions = {}) => {
        let url: string  = API_ROUTES[mainRoute][routeKey];
        Object.keys(params).forEach((key: string ) => {
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
