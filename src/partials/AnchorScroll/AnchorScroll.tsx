import React from "react";
import manualScroll from "../../core/helpers/manualScroll";

const AnchorScroll = (props: React.DetailedHTMLProps<React.AnchorHTMLAttributes<HTMLAnchorElement>, HTMLAnchorElement>) => {
    const { href = '', onClick, className = '', ...anchorProps } = props;

    const handleClick: React.MouseEventHandler<HTMLAnchorElement> = React.useCallback((e) => {
        manualScroll(href);
        onClick && onClick(e);
    }, [href, onClick]);

    return <a
        onClick={handleClick}
        className={`anchor-scroll ${className}`}
        href={href}
        {...anchorProps} />
};

export default AnchorScroll;