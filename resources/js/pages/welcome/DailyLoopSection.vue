<script setup lang="ts">
import { useReveal } from '@/composables/useReveal';
import { MoonStar, Sun, Sunrise } from 'lucide-vue-next';

const { target, visible } = useReveal();

const steps = [
    {
        time: '07h00',
        icon: Sunrise,
        title: 'Le rapport tombe',
        body: "Notification : la nuit a tranché. Chaque joueur lit la narration des conséquences d'hier, en 1 minute, café en main.",
    },
    {
        time: 'Journée',
        icon: Sun,
        title: 'Une décision, un rôle',
        body: '2 à 4 options propres à son poste. Deadline 22h00. On voit qui a joué, jamais ce que les autres ont choisi.',
    },
    {
        time: '03h00',
        icon: MoonStar,
        title: 'Résolution automatique',
        body: "Moteur économique, tirage d'événements, génération narrative. L'équipe dort ; l'entreprise, non.",
    },
];
</script>

<template>
    <section id="boucle" ref="target" class="relative bg-[#f5f5f7] py-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="mx-auto max-w-2xl text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Le rituel quotidien</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#1d1d1f] sm:text-4xl">
                    Deux minutes par jour. Toute la journée dans le chat.
                </h2>
            </div>

            <div class="relative mt-16 grid gap-10 md:grid-cols-3">
                <div class="absolute left-0 right-0 top-8 hidden h-px bg-black/[0.08] md:block" aria-hidden="true">
                    <div
                        class="h-full bg-[#1d1d1f] transition-all ease-out"
                        :style="{ width: visible ? '100%' : '0%', transitionDuration: '1400ms' }"
                    />
                </div>

                <div
                    v-for="(step, i) in steps"
                    :key="step.title"
                    class="relative text-center transition-all duration-700 md:text-left"
                    :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                    :style="{ transitionDelay: `${i * 150}ms` }"
                >
                    <div
                        class="relative z-10 mx-auto flex h-16 w-16 items-center justify-center rounded-full border border-black/10 bg-white text-[#1d1d1f] md:mx-0"
                    >
                        <component :is="step.icon" class="h-6 w-6" />
                    </div>
                    <p class="mt-5 text-xs font-semibold uppercase tracking-widest text-[#8a8a8e]">{{ step.time }}</p>
                    <h3 class="mt-1 text-xl font-semibold text-[#1d1d1f]">{{ step.title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-[#6e6e73]">{{ step.body }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
