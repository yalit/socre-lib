import Routing from '../libraries/router';

export default function useRouterGenerate() {
    const generate = (route: string, params: any = {}) => {
        return Routing.generate(route, params);
    }

    return generate
}
