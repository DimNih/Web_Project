document.addEventListener('DOMContentLoaded', function () {
    const sections = [
        { element: document.querySelector('.content'), visibleClass: 'content-visible', hiddenClass: 'content-hidden' },
        { element: document.querySelector('.about'), visibleClass: 'about-visible', hiddenClass: 'about-hidden' },
        { element: document.querySelector('.seorang'), visibleClass: 'seorang-visible', hiddenClass: 'seorang-hidden' },
        { element: document.querySelector('.imgone'), visibleClass: 'fade-left-visible', hiddenClass: 'fade-left-hidden' }, // Tambahkan elemen lines
        { element: document.querySelector('.zoom-in-up'), visibleClass: 'zoom-in-up-visible', hiddenClass: 'zoom-in-up-hidden' } // Elemen dengan animasi zoom-in-up
    ];

    const observerOptions = {
        root: null, 
        rootMargin: '0px',
        threshold: 0.1 
    };

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add(entry.target.dataset.visibleClass);
                entry.target.classList.remove(entry.target.dataset.hiddenClass);
            } else {
                entry.target.classList.add(entry.target.dataset.hiddenClass);
                entry.target.classList.remove(entry.target.dataset.visibleClass);
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);
    sections.forEach(section => {
        section.element.dataset.visibleClass = section.visibleClass;
        section.element.dataset.hiddenClass = section.hiddenClass;
        section.element.style.animationDelay = section.delay;
        observer.observe(section.element);
    });
});
