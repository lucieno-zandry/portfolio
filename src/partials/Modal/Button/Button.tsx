import React from "react";
import { Position } from "../Modal";
import Button, { ButtonProps } from "../../Button/Button";

export type ModalButtonProps = {
    show: boolean,
} & ButtonProps

export default function ModalButton(props: ModalButtonProps & { setPosition: (position: Position) => void }) {
    const {
        onClick,
        setPosition,
        show = false,
        ...buttonProps } = props;

    const handleClick: React.MouseEventHandler<HTMLButtonElement> = React.useCallback((e) => {
        const { clientX, clientY } = e;

        setPosition({
            x: clientX,
            y: clientY
        });

        onClick && onClick(e);
    }, [onClick]);

    const transition = React.useMemo(() => show ? undefined : "opacity .1s ease-in-out .5s", [show]);

    return <Button
        onClick={handleClick}
        {...buttonProps}
        style={{ opacity: show ? 0 : 1, transition: transition }} />
}