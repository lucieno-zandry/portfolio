import React from "react";
import Icon from "../Icon/Icon";

type Props = {
    name: string,
    info: string,
    icon: string,
}

const ContactItem = React.memo((props: Props) => {
    const { name, info, icon } = props;
    return <div className="contact-item d-flex gap-2 gap-sm-5">
        <h5 className="text-primary col-3">
            <Icon
                variant={icon} /> <span className="d-none d-sm-inline">{name}</span> :</h5>
        <span className="d-block col-6">{info}</span>
    </div>
});

export default ContactItem;