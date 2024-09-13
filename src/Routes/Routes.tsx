import React from "react";
import { Route, Routes, useLocation } from "react-router-dom";
import App from "../App/App";
import { AnimatePresence } from "framer-motion";

const AppRoutes = React.memo(() => {
    const location = useLocation();

    return <AnimatePresence>
        <Routes location={location} key={location.key}>
            <Route element={<App />} path='/' />
        </Routes>
    </AnimatePresence>
});

export default AppRoutes;