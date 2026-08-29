import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['value'];
    static values = {
        mode: String,
    };

    connect() {
        this.reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (this.reducedMotion) {
            this.showFinalValues();

            return;
        }

        if (this.modeValue === 'count-up') {
            this.startCountUpObserver();
        }
    }

    disconnect() {
        this.observer?.disconnect();
    }

    startCountUpObserver() {
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                this.animateValue(entry.target);
                this.observer.unobserve(entry.target);
            });
        }, { threshold: 0.35 });

        this.valueTargets.forEach((element) => this.observer.observe(element));
    }

    animateValue(element) {
        const target = Number.parseInt(element.dataset.marketingMotionValue ?? '0', 10);
        if (Number.isNaN(target)) {
            return;
        }

        const duration = this.readMotionDurationMs();
        const start = performance.now();

        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const current = Math.round(target * progress);
            element.textContent = String(current);

            if (progress < 1) {
                requestAnimationFrame(step);
            }
        };

        element.textContent = '0';
        requestAnimationFrame(step);
    }

    showFinalValues() {
        this.valueTargets.forEach((element) => {
            const target = element.dataset.marketingMotionValue;
            if (target !== undefined) {
                element.textContent = target;
            }
        });
    }

    readMotionDurationMs() {
        const raw = getComputedStyle(document.documentElement)
            .getPropertyValue('--ui-motion-duration-normal')
            .trim();

        if (raw.endsWith('ms')) {
            return Number.parseInt(raw, 10) || 300;
        }

        if (raw.endsWith('s')) {
            return Math.round(Number.parseFloat(raw) * 1000) || 300;
        }

        return 300;
    }
}
