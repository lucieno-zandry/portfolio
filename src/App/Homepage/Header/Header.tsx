import React from "react";
import photo from "./photo.png";
import { ButtonGroup } from "react-bootstrap";
import Icon from "../../../partials/Icon/Icon";
import { contact } from "../../../core/config/links/pages";
import AnchorScroll from "../../../partials/AnchorScroll/AnchorScroll";
import cv_en from './cv_lucieno_zandry_en.pdf';
import cv_fr from './cv_lucieno_zandry_fr.pdf';
import useLanguage from "../../../core/hooks/useLanguage";
import { Translate } from "react-i18nify";

const CVS = {
    en: cv_en,
    fr: cv_fr
}

const Header = React.memo(() => {
    const { language } = useLanguage();

    return <header className="d-flex justify-content-between align-items-center header flex-wrap flex-wrap-reverse">
        <div className="col-12 col-sm-5 d-flex flex-column gap-3 mt-3 mt-sm-0 mb-5">
            <p className="m-0"><Translate value="hello"/></p>
            <h1 className="display-1 text-primary">
                Full stack <br />
                Web Developer
            </h1>
            <ButtonGroup className="col-xs-12 col-lg-8 mb-5">
                <AnchorScroll className="btn btn-outline-primary col-6" href={contact}><Translate value="contact_me"/></AnchorScroll>
                <a className="btn btn-primary col-1 download-cv-button" href={CVS[language]}>
                    <Icon type="solid" variant="download" /> CV</a>
            </ButtonGroup>
        </div>
        <div className="col-12 col-sm-5 d-flex justify-content-center">
            <img
                src={photo}
                className="img-responsive rounded" />
        </div>
    </header>
});

export default Header;