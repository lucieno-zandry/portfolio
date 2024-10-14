import React from "react";
import Section from "../../partials/Section/Section";
import linkId from "../../core/helpers/linkId";
import { contact } from "../../core/config/links/pages";
import SectionTitle from "../../partials/SectionTitle/SectionTitle";
import Contacts from "../../partials/Contacts/Contacts";
import { Translate } from "react-i18nify";

const Contact = React.memo(() => {
    return <Section id={linkId(contact)} className="col-12" selfProps={{className: 'contact'}}>
        <SectionTitle><Translate value="contact"/></SectionTitle>
        <Contacts />
    </Section>
});

export default Contact;