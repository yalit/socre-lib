import {QueryClient, QueryClientProvider} from "react-query";
import Application from "./application";

const queryClient = new QueryClient();

export default function AppProvider({children}) {
    return (
        <QueryClientProvider client={queryClient}>
            <Application>
                {children}
            </Application>
        </QueryClientProvider>
    );
}
