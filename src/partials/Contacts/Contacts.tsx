import React from "react";
import ContactItem from "../ContactItem/ContactItem";


const contacts = [
    {
        name: 'phone',
        info: '+261 34 85 277 52',
        icon: 'phone-volume',
    },
    {
        name: 'email',
        info: 'josulandrie0@gmail.com',
        icon: 'envelope',
    },
    {
        name: 'linkedin',
        info: 'Lucieno Zandry',
        icon: 'linkedin'
    },
    {
        name: 'github',
        info: 'Masterofnan2',
        icon: 'github'
    },
]

const Contacts = React.memo(() => {
    return <div className="contacts mx-2 mx-sm-5 mt-5">
        {contacts.map((contact, key) => <ContactItem key={key} {...contact} />)}
    </div>
});

export default Contacts;