import React from "react";

interface SectionTitleProps extends React.DetailedHTMLProps<React.HTMLAttributes<HTMLHeadingElement>, HTMLHeadingElement> {
    variant?: 'primary' | 'secondary' | 'dark' | 'danger' | 'info' | 'light' | 'warning',
}

const SectionTitle = React.memo((props: SectionTitleProps) => {
    const { className = '', variant = 'primary', children = '', ...titleProps } = props;

    return <h2
        className={`section-title display-5 text-${variant} d-flex gap-3 col-12 align-items-center m-sm-0 ${className}`}
        {...titleProps}>
        <span className="before">{children}</span>
        <span className={`col after bg-${variant}`} />
    </h2>
});

export default SectionTitle;