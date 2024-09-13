import React from "react";
import { Navbar } from "react-bootstrap";
import { Link } from "react-router-dom";
import { github, home } from "../../core/config/links/pages";
import Icon from "../Icon/Icon";
import AppNavLinks from "../AppNavLinks/AppNavLinks";
import { useNavbar } from "../../App/options/hooks";
import AnchorScroll from "../AnchorScroll/AnchorScroll";
import { themes } from "../../App/App";

export const navbarTogglerId = 'navbar-toggler';

const AppNavbar = React.memo(() => {
  const active = useNavbar().active as keyof typeof themes;

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

  return <Navbar
    expand="sm"
    className={`app-navbar ${navtype} px-md-5 px-3 w-100`}>
    <AnchorScroll href={home} className={`navbar-brand m-0 col-sm-4 col-lg-3 col-xxl-4 ${theme !== 'dark' ? 'text-dark' : 'text-light'}`}>Lucieno Zandry</AnchorScroll>
    <Navbar.Toggle
      aria-controls="app-navbar-collapse"
      id={navbarTogglerId}
      onBlur={handleToggle} />
    <Navbar.Collapse
      id="app-navbar-collapse"
      className={`justify-content-between ${theme === 'light' ? 'bg-secondary' : 'bg-dark'} rounded mt-4 mt-sm-0`}>
      <AppNavLinks />
      <Link
        to={github}>
        <Icon
          variant="github"
          type="brands"
          size={2}
          className="me-3 float-end mb-3 mb-sm-0"></Icon></Link>
    </Navbar.Collapse>
  </Navbar>
});

export default AppNavbar;