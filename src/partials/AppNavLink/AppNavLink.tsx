import React from "react";
import { Nav, NavLinkProps } from "react-bootstrap";
import Icon from "../Icon/Icon";
import { useNavbar } from "../../App/options/hooks";
import linkId from "../../core/helpers/linkId";
import AnchorScroll from "../AnchorScroll/AnchorScroll";
import alpha from "../../core/helpers/alpha";

type Props = {
    href: string,
    title: string,
    icon: string,
} & NavLinkProps

const AppNavlink = React.memo((props: Props) => {
    const { href, title, icon, className = '', ...navlinkProps } = props;
    const { active } = useNavbar();

    const isActive = React.useMemo(() => alpha(linkId(href)) === alpha(active), [active, href]);

    return <Nav.Link
        href={href}
        active={isActive}
        className={`app-nav-link ${className} mx-3`}
        as={AnchorScroll}
        {...navlinkProps}>
        <Icon
            variant={icon}
            type={isActive ? 'solid' : 'thin'}/> <span
            className="d-sm-none d-lg-inline">
            {title}
        </span>
    </Nav.Link>
});

export default AppNavlink;