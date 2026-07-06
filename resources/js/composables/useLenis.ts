import Lenis from 'lenis';
import { onMounted, onUnmounted } from 'vue';

let instance: Lenis | null = null;

export function getLenis(): Lenis | null {
    return instance;
}

export function useLenis() {
    let rafId = 0;

    onMounted(() => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }

        instance = new Lenis({
            duration: 1.1,
            smoothWheel: true,
            wheelMultiplier: 1,
        });

        const raf = (time: number) => {
            instance?.raf(time);
            rafId = requestAnimationFrame(raf);
        };
        rafId = requestAnimationFrame(raf);

        const onClick = (event: MouseEvent) => {
            const anchor = (event.target as HTMLElement)?.closest('a[href^="#"]');
            if (!anchor) return;
            const href = anchor.getAttribute('href');
            if (!href || href === '#') return;
            const target = document.querySelector(href);
            if (!target) return;

            event.preventDefault();
            instance?.scrollTo(target as HTMLElement, { offset: -72, duration: 1.4 });
        };
        document.addEventListener('click', onClick);

        onUnmounted(() => {
            document.removeEventListener('click', onClick);
            cancelAnimationFrame(rafId);
            instance?.destroy();
            instance = null;
        });
    });
}
