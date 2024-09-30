import React from "react";
import debounce from "../helpers/debounce";

const ratio = 0.6;

export default function <T extends Element>() {
  const ref = React.createRef<T>();
  const [isIntersecting, setIsIntersecting] = React.useState(false);

  const callback = React.useCallback((entries: IntersectionObserverEntry[]) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        setIsIntersecting(true);
      } else {
        setIsIntersecting(false);
      }
    });
  }, []);

  const observe = React.useCallback((element: Element) => {
    const y = Math.round(window.innerHeight * ratio);

    const observer = new IntersectionObserver(callback, {
      rootMargin: `-${window.innerHeight - y - 1}px 0px -${y}px 0px`,
    });

    observer.observe(element);
  }, []);

  let windowH = React.useMemo(() => window.innerHeight, []);

  React.useEffect(() => {
    if (!ref.current) return;

    observe(ref.current);
    window.addEventListener(
      "resize",
      debounce(() => {
        if (window.innerHeight !== windowH) {
          observe(ref.current!);
          windowH = window.innerHeight;
        }
      }, 500)
    );
  }, [ref]);

  return { isIntersecting, ref };
}
