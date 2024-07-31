import {createRoot} from "react-dom/client";
import React from "react";
import Application from "./scripts/components/application";
import Index from "./scripts/components/Index";
import AppProvider from "./scripts/components/appProvider";

const IndexPage = () => {
    return (
        <AppProvider>
            <Index />
        </AppProvider>
    )
}

const container = document.getElementById('index');
const root = createRoot(container!);
root.render(<IndexPage/>);
