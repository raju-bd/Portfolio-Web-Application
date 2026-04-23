/**
 * Portfolio Application - Main JavaScript
 * Handles theme switching, animations, form validation, and interactivity
 */

// ============================================================================
// Theme Management
// ============================================================================

class ThemeManager {
    constructor() {
        this.THEME_KEY = 'portfolio_theme';
        this.THEMES = {
            LIGHT: 'light',
            DARK: 'dark',
            SYSTEM: 'system'
        };
        this.init();
    }

    init() {
        const savedTheme = localStorage.getItem(this.THEME_KEY) || this.THEMES.SYSTEM;
        this.setTheme(savedTheme);
        this.setupToggle();
        this.watchSystemPreference();
    }

    setTheme(theme) {
        let themeToApply = theme;

        if (theme === this.THEMES.SYSTEM) {
            themeToApply = this.getSystemPreference();
        }

        document.documentElement.setAttribute('data-theme', themeToApply);
        document.body.setAttribute('data-theme', themeToApply);
        localStorage.setItem(this.THEME_KEY, theme);
        this.updateThemeIcon(theme);
    }

    getSystemPreference() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches 
            ? this.THEMES.DARK 
            : this.THEMES.LIGHT;
    }

    toggleTheme() {
        const current = localStorage.getItem(this.THEME_KEY) || this.THEMES.SYSTEM;
        let next;

        switch (current) {
            case this.THEMES.LIGHT:
                next = this.THEMES.DARK;
                break;
            case this.THEMES.DARK:
                next = this.THEMES.SYSTEM;
                break;
            default:
                next = this.THEMES.LIGHT;
        }

        this.setTheme(next);
    }

    setupToggle() {
        const buttons = document.querySelectorAll('[data-toggle-theme]');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => this.toggleTheme());
        });
    }

    watchSystemPreference() {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            const current = localStorage.getItem(this.THEME_KEY);
            if (current === this.THEMES.SYSTEM) {
                this.setTheme(this.THEMES.SYSTEM);
            }
        });
    }

    updateThemeIcon(theme) {
        const icons = {
            light: '☀️',
            dark: '🌙',
            system: '🖥️'
        };
        const btn = document.querySelector('[data-toggle-theme]');
        if (btn) {
            const applied = theme === this.THEMES.SYSTEM 
                ? this.getSystemPreference() 
                : theme;
            btn.textContent = icons[applied] || icons.system;
        }
    }
}

// ============================================================================
// Animated Counter
// ============================================================================

class AnimatedCounter {
    constructor(element, duration = 2000) {
        this.element = element;
        this.duration = duration;
        this.target = parseInt(element.textContent) || 0;
        this.current = 0;
        this.startTime = null;
    }

    easeOutQuad(t) {
        return t * (2 - t);
    }

    animate(timestamp) {
        if (!this.startTime) this.startTime = timestamp;
        const elapsed = timestamp - this.startTime;
        const progress = Math.min(elapsed / this.duration, 1);
        const eased = this.easeOutQuad(progress);

        this.current = Math.floor(eased * this.target);
        this.element.textContent = this.current.toLocaleString();

        if (progress < 1) {
            requestAnimationFrame((ts) => this.animate(ts));
        }
    }

    start() {
        requestAnimationFrame((ts) => this.animate(ts));
    }
}

// ============================================================================
// Lazy Loading Images
// ============================================================================

class LazyLoader {
    constructor() {
        this.init();
    }

    init() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.srcset = img.dataset.srcset || '';
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }
}

// ============================================================================
// Form Validation
// ============================================================================

class FormValidator {
    constructor(formSelector) {
        this.form = document.querySelector(formSelector);
        if (!this.form) return;
        this.setupValidation();
    }

    setupValidation() {
        this.form.addEventListener('submit', (e) => {
            if (!this.validateForm()) {
                e.preventDefault();
            }
        });

        const inputs = this.form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', () => this.validateField(input));
        });
    }

    validateForm() {
        const inputs = this.form.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });

        return isValid;
    }

    validateField(field) {
        let isValid = true;
        const value = field.value.trim();

        // Remove previous error
        const errorElement = field.parentElement.querySelector('.error-message');
        if (errorElement) errorElement.remove();
        field.classList.remove('is-invalid');

        if (field.hasAttribute('required') && value === '') {
            isValid = false;
            this.showError(field, 'This field is required');
        } else if (field.type === 'email' && value && !this.isValidEmail(value)) {
            isValid = false;
            this.showError(field, 'Please enter a valid email address');
        } else if (field.type === 'number' && value && isNaN(value)) {
            isValid = false;
            this.showError(field, 'Please enter a valid number');
        }

        if (isValid) {
            field.classList.add('is-valid');
        }

        return isValid;
    }

    isValidEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    showError(field, message) {
        field.classList.add('is-invalid');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        errorDiv.style.color = 'var(--color-danger)';
        errorDiv.style.fontSize = 'var(--font-size-sm)';
        errorDiv.style.marginTop = 'var(--spacing-sm)';
        field.parentElement.appendChild(errorDiv);
    }
}

// ============================================================================
// Smooth Scroll Navigation
// ============================================================================

class SmoothScroll {
    constructor() {
        this.setupLinks();
    }

    setupLinks() {
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }
}

// ============================================================================
// Mobile Menu Toggle
// ============================================================================

class MobileMenu {
    constructor() {
        this.setupMenuToggle();
    }

    setupMenuToggle() {
        const menuBtn = document.querySelector('[data-menu-toggle]');
        const menu = document.querySelector('[data-menu]');

        if (menuBtn && menu) {
            menuBtn.addEventListener('click', () => {
                menu.classList.toggle('active');
                menuBtn.classList.toggle('active');
            });

            // Close menu when clicking on a link
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.remove('active');
                    menuBtn.classList.remove('active');
                });
            });
        }
    }
}

// ============================================================================
// Modal/Lightbox
// ============================================================================

class Lightbox {
    constructor(triggerSelector = '[data-lightbox]') {
        this.setupLightbox(triggerSelector);
    }

    setupLightbox(selector) {
        document.querySelectorAll(selector).forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                this.show(trigger.getAttribute('href') || trigger.dataset.src);
            });
        });
    }

    show(src) {
        const modal = document.createElement('div');
        modal.className = 'lightbox-modal';
        modal.innerHTML = `
            <div class="lightbox-content">
                <span class="lightbox-close">&times;</span>
                <img src="${src}" alt="Preview" />
            </div>
        `;
        modal.style.cssText = `
            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.9); display: flex; align-items: center;
            justify-content: center; z-index: 9999;
        `;
        modal.querySelector('.lightbox-content').style.cssText = `
            position: relative; max-width: 90%; max-height: 90%;
        `;
        modal.querySelector('img').style.cssText = `
            max-width: 100%; max-height: 100%; object-fit: contain;
        `;
        modal.querySelector('.lightbox-close').style.cssText = `
            position: absolute; top: 20px; right: 30px; font-size: 40px;
            color: white; cursor: pointer; z-index: 10000;
        `;

        document.body.appendChild(modal);

        modal.querySelector('.lightbox-close').addEventListener('click', () => modal.remove());
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.remove();
        });
    }
}

// ============================================================================
// Initialize All Components
// ============================================================================

document.addEventListener('DOMContentLoaded', () => {
    // Initialize theme manager
    new ThemeManager();

    // Initialize lazy loading
    new LazyLoader();

    // Initialize form validation
    document.querySelectorAll('form').forEach(form => {
        new FormValidator(`#${form.id || ''}`);
    });

    // Initialize smooth scroll
    new SmoothScroll();

    // Initialize mobile menu
    new MobileMenu();

    // Initialize lightbox
    new Lightbox();

    // Initialize animated counters
    document.querySelectorAll('[data-counter]').forEach(element => {
        const counter = new AnimatedCounter(element);
        
        // Start animation when element comes into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    counter.start();
                    observer.unobserve(element);
                }
            });
        });
        observer.observe(element);
    });

    console.log('Portfolio Application Initialized');
});

// ============================================================================
// Utilities
// ============================================================================

const Utils = {
    /**
     * Format number with thousand separators
     */
    formatNumber(num) {
        return num.toLocaleString();
    },

    /**
     * Debounce function
     */
    debounce(func, wait) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    },

    /**
     * Throttle function
     */
    throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },

    /**
     * Get URL parameter
     */
    getUrlParam(param) {
        const params = new URLSearchParams(window.location.search);
        return params.get(param);
    },

    /**
     * Show notification
     */
    showNotification(message, type = 'info', duration = 3000) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed; bottom: 20px; right: 20px; padding: 15px 20px;
            background: var(--color-${type}); color: white; border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15); z-index: 10000;
            animation: slideInUp 0.3s ease;
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => notification.remove(), duration);
    }
};

// Export for use in other modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { ThemeManager, LazyLoader, FormValidator, SmoothScroll, MobileMenu, Lightbox, Utils };
}
