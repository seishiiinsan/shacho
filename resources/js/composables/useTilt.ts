import { useMouseInElement } from '@vueuse/core';
import { computed, type Ref } from 'vue';

export function useTilt(target: Ref<HTMLElement | null>, strength = 10) {
    const { elementX, elementY, elementWidth, elementHeight, isOutside } = useMouseInElement(target);

    const style = computed(() => {
        if (isOutside.value || !elementWidth.value || !elementHeight.value) {
            return { transform: 'rotateX(0deg) rotateY(0deg)' };
        }
        const px = elementX.value / elementWidth.value - 0.5;
        const py = elementY.value / elementHeight.value - 0.5;
        return {
            transform: `rotateX(${(-py * strength).toFixed(2)}deg) rotateY(${(px * strength).toFixed(2)}deg)`,
        };
    });

    return { style };
}
