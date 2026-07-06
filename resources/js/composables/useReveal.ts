import { useIntersectionObserver } from '@vueuse/core';
import { ref, type Ref } from 'vue';

export function useReveal(threshold = 0.2): { target: Ref<HTMLElement | null>; visible: Ref<boolean> } {
    const target = ref<HTMLElement | null>(null);
    const visible = ref(false);

    useIntersectionObserver(
        target,
        ([entry]) => {
            if (entry?.isIntersecting) {
                visible.value = true;
            }
        },
        { threshold },
    );

    return { target, visible };
}
