import { useWindowScroll } from '@vueuse/core';
import { computed } from 'vue';

export function useParallax(speed = 0.15) {
    const { y } = useWindowScroll();
    const offset = computed(() => `translate3d(0, ${(y.value * speed).toFixed(1)}px, 0)`);
    return { offset };
}
