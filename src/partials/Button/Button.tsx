import React from "react";

export type ButtonProps = {
    variant?: 'primary' | 'secondary' | 'danger' | 'warning' | 'info' | 'light' | 'dark' | 'success' |
    'outline-primary' | 'outline-secondary' | 'outline-danger' | 'outline-warning' | 'outline-info' | 'outline-light' | 'outline-dark' | 'outline-success',
    size?: 'sm' | 'lg',
    isLoading?: boolean,
} & React.DetailedHTMLProps<React.ButtonHTMLAttributes<HTMLButtonElement>, HTMLButtonElement>

export default (props: ButtonProps) => {
    const { variant, size, className = '', type = 'button', isLoading = false, children, ...buttonProps } = props;

    const variantClassName = React.useMemo(() => variant ? `btn-${variant}` : '', [variant]);
    const sizeClassName = React.useMemo(() => size ? `btn-${size}` : '', [size]);

    return <button
        className={`btn ${variantClassName} ${sizeClassName} ${className}`}
        type={type}
        disabled={isLoading}
        {...buttonProps}>
        {isLoading ? <span className="spinner-border spinner-border-sm" /> : children}
    </button>
}