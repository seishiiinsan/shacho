<script setup lang="ts">
import { useReveal } from '@/composables/useReveal';

const { target, visible } = useReveal();

const curves = [
    {
        id: 'marketing',
        color: '#1d1d1f',
        label: 'Marketing',
        window: 'Jours 1&ndash;10',
        d: 'M0,60 C60,40 100,110 160,140 C260,185 380,200 600,208',
        delay: 0,
    },
    {
        id: 'recrutement',
        color: '#8a8a8e',
        label: 'Recrutement',
        window: 'Jours 10&ndash;20',
        d: 'M0,190 C100,170 180,60 260,55 C340,50 420,120 600,150',
        delay: 150,
    },
    {
        id: 'optimisation',
        color: '#b3261e',
        label: 'Optimisation & trésorerie',
        window: 'Jours 20&ndash;30',
        d: 'M0,210 C160,205 320,190 420,110 C480,65 520,45 600,30',
        delay: 300,
    },
];
</script>

<template>
    <section ref="target" class="relative bg-white py-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Le modèle économique</p>
                    <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#1d1d1f] sm:text-4xl">
                        Un idle game inversé : 30 tours, coûts exponentiels, aucune stratégie dominante.
                    </h2>
                    <p class="mt-5 text-[#6e6e73]">
                        Le levier le plus rentable change au fil de la saison &mdash; marketing en tête de course, recrutement au milieu, optimisation
                        de la trésorerie sur la fin. Le modèle est simulé et équilibré avant toute mise en jeu&nbsp;: 1&nbsp;000 saisons Monte-Carlo,
                        faillite vers J20&ndash;25 en pilote automatique, victoire vers J28&ndash;30 en jouant bien.
                    </p>

                    <div class="mt-8 grid grid-cols-3 gap-4 border-t border-black/[0.06] pt-6">
                        <div>
                            <p class="text-xl font-semibold text-[#1d1d1f]">50k&nbsp;€</p>
                            <p class="mt-1 text-xs text-[#8a8a8e]">Trésorerie de départ</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold text-[#1d1d1f]">500k&nbsp;€</p>
                            <p class="mt-1 text-xs text-[#8a8a8e]">Cible de victoire</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold text-[#1d1d1f]">3 jours</p>
                            <p class="mt-1 text-xs text-[#8a8a8e]">Trésorerie &lt; 0 = faillite</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-black/[0.06] bg-[#f5f5f7] p-6">
                    <svg viewBox="0 0 600 240" class="w-full" preserveAspectRatio="none">
                        <line v-for="x in [0, 150, 300, 450, 600]" :key="x" :x1="x" y1="0" :x2="x" y2="220" stroke="black" stroke-opacity="0.06" />
                        <path
                            v-for="curve in curves"
                            :key="curve.id"
                            :d="curve.d"
                            fill="none"
                            :stroke="curve.color"
                            stroke-width="3"
                            stroke-linecap="round"
                            path-length="100"
                            stroke-dasharray="100"
                            class="transition-all ease-out"
                            :style="{
                                strokeDashoffset: visible ? 0 : 100,
                                transitionDuration: '1600ms',
                                transitionDelay: `${curve.delay}ms`,
                            }"
                        />
                    </svg>
                    <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2 text-xs text-[#6e6e73]">
                        <span v-for="curve in curves" :key="curve.id" class="inline-flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full" :style="{ backgroundColor: curve.color }" />
                            {{ curve.label }} <span class="text-[#c7c7cc]">&middot;</span> <span v-html="curve.window" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
