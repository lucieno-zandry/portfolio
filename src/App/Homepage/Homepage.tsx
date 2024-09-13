import React from "react";
import Header from "./Header/Header";
import { home } from "../../core/config/links/pages";
import linkId from "../../core/helpers/linkId";
import Section from "../../partials/Section/Section";

const Homepage = React.memo(() => {
    return <Section
        className="homepage px-2 px-sm-5 d-flex flex-column gap-3"
        id={linkId(home)}
        selfProps={{className: 'homepage-container'}}>
        <Header />
    </Section>
});

export default Homepage;