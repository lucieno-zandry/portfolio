import React from "react";

const defaultRatio = 0.6;

const getDefaultOptions = (
  ratio: number = defaultRatio
): IntersectionObserverInit => {
  const y = window.innerHeight * ratio;
  const zoneHeight = 1;

  return {
    rootMargin: `-${window.innerHeight - y - zoneHeight}px 0px -${y}px 0px`,
  };
};

export default function <T extends Element>(
  options?: IntersectionObserverInit
) {
  options = options || getDefaultOptions();
  const ref = React.createRef<T>();
  const [isIntersecting, setIsIntersecting] = React.useState(false);

  const callback = React.useCallback(
    (entries: IntersectionObserverEntry[]) => {
      entries.forEach((entry) => {
        if (isIntersecting === entry.isIntersecting) return;
        setIsIntersecting(entry.isIntersecting);
      });
    },
    [isIntersecting]
  );

  const observe = React.useCallback(
    (element: Element) => {
      const observer = new IntersectionObserver(callback, options);
      observer.observe(element);
    },
    [callback]
  );

  React.useEffect(() => {
    if (!ref.current) return;
    observe(ref.current);
  }, [ref]);

  return { isIntersecting, ref };
}
