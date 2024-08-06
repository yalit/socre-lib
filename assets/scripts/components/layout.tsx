import React from "react";
import Content from "./content";
import Sidebar from "./sidebar/sidebar";

export default function Layout({children}) {
    return (
        <div className="w-full min-h-screen flex flex-col md:flex-row gap-0">
            <Sidebar />
            <Content>{children}</Content>
        </div>
    );
}
