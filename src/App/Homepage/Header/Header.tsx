import React from "react";
import photo from "./photo.png";
import Icon from "../../../partials/Icon/Icon";
import { contact } from "../../../core/config/links/pages";
import AnchorScroll from "../../../partials/AnchorScroll/AnchorScroll";
import cv_en from './cv_lucieno_zandry_en.pdf';
import cv_fr from './cv_lucieno_zandry_fr.pdf';
import useLanguage from "../../../core/hooks/useLanguage";
import { Translate } from "react-i18nify";
import ProgressiveText from "../../../partials/ProgressiveText/ProgressiveText";

const CVS = {
    en: cv_en,
    fr: cv_fr
}

const Header = React.memo(() => {
    const { language } = useLanguage();

    return <header className="d-flex justify-content-between align-items-center header flex-wrap flex-wrap-reverse">
        <div className="col-12 col-sm-5 d-flex flex-column gap-3 mt-3 mt-sm-0 mb-5">
            <p className="m-0"><Translate value="hello" /></p>
            <h1 className="display-1 text-primary">
                <ProgressiveText globalDelay={1} gap={.05}>Full stack</ProgressiveText> <br />
                <ProgressiveText globalDelay={1.5} gap={.05}>Web Developer</ProgressiveText>
            </h1>
            <div className="d-flex flex-wrap gap-3 pb-5 align-items-center">
                <AnchorScroll className="btn btn-outline-primary col-6" href={contact}><Icon variant="phone" /> <Translate value="contact_me" /></AnchorScroll>
                <a className="btn btn-primary col" href={CVS[language]}>
                    <Icon variant="paperclip" /> <Translate value="my_resume" /></a>
            </div>
        </div>
        <div className="col-12 col-sm-5 d-flex justify-content-center">
            <img
                src={photo}
                className="img-responsive rounded" />
        </div>
    </header>
});

export default Header;