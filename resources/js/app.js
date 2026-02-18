import './bootstrap';


window.toggleDarkMode = function () {
    document.body.classList.toggle('dark-mode');

    const icon = document.getElementById('mode-icon');
    if (!icon) return;

    if (document.body.classList.contains('dark-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
};





    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('#nav-links-container .nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                // تحديد إذا كان القسم في منتصف الشاشة تقريباً
                if (pageYOffset >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active-blue');
                if (link.getAttribute('href').includes(current) && current !== '') {
                    link.classList.add('active-blue');
                }
            });
        });
    });