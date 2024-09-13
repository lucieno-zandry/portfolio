import React from "react";
import photo from "./photo.png";
import { ButtonGroup } from "react-bootstrap";
import Icon from "../../../partials/Icon/Icon";
import { contact } from "../../../core/config/links/pages";
import AnchorScroll from "../../../partials/AnchorScroll/AnchorScroll";
import cv from './CV_Lucieno_Zandry.pdf';

const Header = React.memo(() => {
    return <header className="d-flex justify-content-between align-items-center header flex-wrap flex-wrap-reverse">
        <div className="col-12 col-sm-5 d-flex flex-column gap-3 mt-3 mt-sm-0 mb-5">
            <p className="m-0">Hello, I am Lucieno,</p>
            <h1 className="display-1 text-primary">
                Full stack <br />
                Web Developer
            </h1>
            <ButtonGroup className="col-xs-12 col-lg-8 mb-5">
                <AnchorScroll className="btn btn-outline-primary col-6" href={contact}>Contact me</AnchorScroll>
                <a className="btn btn-primary col-1 download-cv-button" href={cv}><Icon type="solid" variant="download"/> cv</a>
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