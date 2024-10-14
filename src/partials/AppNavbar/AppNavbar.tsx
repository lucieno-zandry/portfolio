import React from "react";
import { Navbar } from "react-bootstrap";
import { home } from "../../core/config/links/pages";
import Icon from "../Icon/Icon";
import AppNavLinks from "../AppNavLinks/AppNavLinks";
import { useNavbar } from "../../App/options/hooks";
import AnchorScroll from "../AnchorScroll/AnchorScroll";
import { themes } from "../../App/App";
import { useModal } from "../Modal/Modal";
import useLanguage, { LANGUAGES } from "../../core/hooks/useLanguage";
import Select from "../Select/Select";
import Button from "../Button/Button";

export const navbarTogglerId = 'navbar-toggler';

const AppNavbar = React.memo(() => {
  const active = useNavbar().active as keyof typeof themes;
  const [show, setShow] = React.useState(false);

  const theme = themes[active];

  const navtype = React.useMemo(() => {
    const byDefault = 'navbar-dark bg-dark';

    switch (theme) {
      case 'light':
        return 'navbar-light bg-light';

      case 'dark':
        return byDefault;

      case undefined:
        return byDefault;

      default:
        return `navbar-dark bg-${theme}`;
    }
  }, [active]);

  const handleToggle: React.FocusEventHandler<HTMLElement> = React.useCallback((e) => {
    const { currentTarget } = e;
    currentTarget.click();
  }, []);

  const Modal = useModal();
  const { language, setLanguage } = useLanguage();

  const handleInputChange: React.FocusEventHandler<HTMLSelectElement> = React.useCallback((e) => {
    const value = e.target.value as keyof typeof LANGUAGES;
    if (!LANGUAGES[value] || language === value) return;
    setLanguage(value);
  }, [language]);

  return <>
    <Navbar
      expand="sm"
      className={`app-navbar ${navtype} px-md-5 px-3 w-100`}>
      <AnchorScroll href={home} className={`navbar-brand m-0 col-sm-4 col-lg-3 col-xxl-4 ${theme !== 'dark' ? 'text-dark' : 'text-light'}`}>Lucieno Zandry</AnchorScroll>
      <Navbar.Toggle
        aria-controls="app-navbar-collapse"
        id={navbarTogglerId}
        onBlur={handleToggle} />
      <Navbar.Collapse
        id="app-navbar-collapse"
        className={`justify-content-between ${theme === 'light' ? 'bg-secondary' : 'bg-dark'} rounded mt-4 mt-sm-0 pe-3 py-3 py-sm-0`}>
        <AppNavLinks />
        <Modal.Toggle
          show={show}
          onClick={() => setShow(true)}
          variant="outline-secondary"
          size="sm"
          className="ms-3 me-sm-0">
          {LANGUAGES[language]} <Icon variant="chevron-down" />
        </Modal.Toggle>
      </Navbar.Collapse>
    </Navbar>
    <Modal.Container
      show={show}
      onClose={() => setShow(false)}
      size="sm">
      <Modal.Header>
        Choose your language
      </Modal.Header>
      <Modal.Body className="d-flex justify-content-center py-3">
        <Select
          options={Object.keys(LANGUAGES)}
          predicate={(language: keyof typeof LANGUAGES) => ({ title: LANGUAGES[language], value: language })}
          onBlur={handleInputChange}
          onChange={handleInputChange}
          value={language}
          className="col-12 col-sm-6"
          name="language"/>
      </Modal.Body>
      <Modal.Footer>
        <Button
          variant="primary"
          size="sm"
          onClick={() => setShow(false)}>
          done <Icon variant="check" />
        </Button>
      </Modal.Footer>
    </Modal.Container>
  </>
});

export default AppNavbar;