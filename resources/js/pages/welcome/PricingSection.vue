<script setup lang="ts">
import { useReveal } from '@/composables/useReveal';
import { Link } from '@inertiajs/vue3';
import { Check, Minus } from 'lucide-vue-next';

const { target, visible } = useReveal();

const features: { label: string; free: boolean; premium: boolean }[] = [
    { label: 'Joueurs par ligue', free: true, premium: true },
    { label: 'Scénario du mois', free: true, premium: true },
    { label: 'Classement mondial', free: true, premium: true },
    { label: "Scénarios d'archive", free: false, premium: true },
    { label: 'Legacy Points & bonus permanents', free: false, premium: true },
    { label: "Stats avancées & musée de l'entreprise", free: false, premium: true },
    { label: 'Personnalisation (logo, siège social)', free: false, premium: true },
];
</script>

<template>
    <section id="tarifs" ref="target" class="relative bg-[#f5f5f7] py-28">
        <div class="mx-auto max-w-5xl px-6">
            <div class="mx-auto max-w-xl text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Tarifs</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#1d1d1f] sm:text-4xl">
                    Une première saison gratuite. La suite se paie en équipe.
                </h2>
                <p class="mt-4 text-[#6e6e73]">
                    Un seul payeur par ligue&nbsp;: le Game Master. On paie pour la continuité &mdash; l'histoire de son équipe.
                </p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-2">
                <div
                    class="rounded-2xl border border-black/[0.06] bg-white p-8 transition-all duration-700"
                    :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                >
                    <h3 class="text-xl font-semibold text-[#1d1d1f]">Gratuit</h3>
                    <p class="mt-2 text-sm text-[#6e6e73]">De quoi vivre une première saison complète et excellente.</p>
                    <p class="mt-6 text-4xl font-semibold text-[#1d1d1f]">
                        0&nbsp;€ <span class="text-base font-normal text-[#8a8a8e]">/ mois</span>
                    </p>
                    <p class="mt-1 text-xs text-[#8a8a8e]">2 à 4 joueurs par ligue</p>

                    <ul class="mt-8 space-y-3 text-sm">
                        <li v-for="feature in features" :key="feature.label" class="flex items-center gap-3">
                            <Check v-if="feature.free" class="h-4 w-4 shrink-0 text-[#1d7a4c]" />
                            <Minus v-else class="h-4 w-4 shrink-0 text-[#c7c7cc]" />
                            <span :class="feature.free ? 'text-[#3a3a3c]' : 'text-[#c7c7cc]'">{{ feature.label }}</span>
                        </li>
                    </ul>

                    <Link
                        :href="route('register')"
                        class="mt-8 block rounded-full border border-black/10 px-6 py-3 text-center font-medium text-[#1d1d1f] transition-colors hover:border-black/25"
                    >
                        Créer une ligue gratuite
                    </Link>
                </div>

                <div
                    class="relative rounded-2xl border border-[#1d1d1f] bg-white p-8 shadow-[0_30px_60px_-30px_rgba(0,0,0,0.2)] transition-all duration-700"
                    :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                    style="transition-delay: 150ms"
                >
                    <span class="absolute -top-3 left-8 rounded-full bg-[#1d1d1f] px-3 py-1 text-xs font-medium uppercase tracking-wide text-white">
                        Recommandé
                    </span>
                    <h3 class="text-xl font-semibold text-[#1d1d1f]">Premium</h3>
                    <p class="mt-2 text-sm text-[#6e6e73]">Pour les équipes qui reviennent saison après saison.</p>
                    <p class="mt-6 text-4xl font-semibold text-[#1d1d1f]">
                        6,99&nbsp;€ <span class="text-base font-normal text-[#8a8a8e]">/ mois</span>
                    </p>
                    <p class="mt-1 text-xs text-[#8a8a8e]">ou 59&nbsp;€&nbsp;/&nbsp;an &middot; 2 à 8 joueurs par ligue</p>

                    <ul class="mt-8 space-y-3 text-sm">
                        <li v-for="feature in features" :key="feature.label" class="flex items-center gap-3">
                            <Check class="h-4 w-4 shrink-0 text-[#1d7a4c]" />
                            <span class="text-[#1d1d1f]">{{ feature.label }}</span>
                        </li>
                    </ul>

                    <Link
                        :href="route('register')"
                        class="mt-8 block rounded-full bg-[#1d1d1f] px-6 py-3 text-center font-medium text-white transition-colors hover:bg-black"
                    >
                        Passer en Premium
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
