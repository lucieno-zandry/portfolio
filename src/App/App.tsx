import React from "react";
import AppNavbar from "../partials/AppNavbar/AppNavbar";
import Homepage from "./Homepage/Homepage";
import About from "./About/About";
import AppContextProvider, { ComponentsContextProvider } from "./options/providers";
import Works from "./Works/Works";
import Technologies from "./Technologies/Technologies";
import Contact from "./Contact/Contact";
import linkId from "../core/helpers/linkId";
import { about, contact, home, scrollContainer, technologies, technologies2, technologies3, work } from "../core/config/links/pages";
import { useLocation } from "react-router-dom";
import manualScroll from "../core/helpers/manualScroll";

export type SectionProps = {
    theme?: string[],
}

const delay = 500;
let timeout: number | null;

export const themes = {
    [linkId(home)]: 'dark',
    [linkId(about)]: 'primary',
    [linkId(work)]: 'dark',
    [linkId(technologies)]: 'warning',
    [linkId(technologies2)]: 'light',
    [linkId(technologies3)]: 'secondary',
    [linkId(contact)]: 'dark'
}

const App = React.memo(() => {
    const { hash } = useLocation();

    React.useEffect(() => {
        if (hash && hash !== home && !timeout) {
            console.log('hehe boay');
            timeout = setTimeout(() => {
                manualScroll(hash);
                timeout = null;
            }, delay);
        }
    }, []);

    return <AppContextProvider>
        <ComponentsContextProvider>
            <div className="app">
                <AppNavbar />
                <div id={linkId(scrollContainer)}>
                    <Homepage />
                    <About />
                    <Works />
                    <Technologies />
                    <Contact />
                </div>
            </div>
        </ComponentsContextProvider>
    </AppContextProvider>
})

export default App;