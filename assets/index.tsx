import {createRoot} from "react-dom/client";
import React from "react";
import Application from "./scripts/components/application";
import Index from "./scripts/components/Index";

const IndexPage = () => {
    return (
        <Application>
            <Index />
        </Application>
    )
}

const container = document.getElementById('index');
const root = createRoot(container!);
root.render(<IndexPage/>);
