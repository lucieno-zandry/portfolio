import React from 'react'
import AnchorScroll from '../AnchorScroll/AnchorScroll';

type Props = {
    name: string,
    experience: string,
    href: string,
}

const Stack = React.memo((props: Props) => {
    const { name, experience, href } = props;

    return <div className='stack col-12 col-md-3 my-3 my-sm-0'>
        <h3 className='text-dark'>{name}</h3>
        <AnchorScroll className='text-dark' href={href}>{experience}</AnchorScroll>
    </div>
});

export default Stack