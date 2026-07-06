<script setup lang="ts">
import { useReveal } from '@/composables/useReveal';
import { useTilt } from '@/composables/useTilt';
import { CheckCircle2 } from 'lucide-vue-next';
import { ref } from 'vue';

const { target, visible } = useReveal();
const card = ref<HTMLElement | null>(null);
const { style: tiltStyle } = useTilt(card, 6);
</script>

<template>
    <section id="rapport" ref="target" class="relative overflow-hidden bg-[#f5f5f7] py-28">
        <div
            class="pointer-events-none absolute -left-24 top-1/3 h-[26rem] w-[26rem] rounded-full opacity-[0.25] blur-3xl"
            style="background: radial-gradient(circle, rgba(120, 150, 255, 0.2), transparent 70%)"
        />
        <div class="relative mx-auto grid max-w-6xl items-center gap-16 px-6 lg:grid-cols-2">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Le rapport quotidien</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#1d1d1f] sm:text-4xl">
                    Sérieux dans la forme. Absurde dans le fond. Fait pour être capturé.
                </h2>
                <p class="mt-5 text-[#6e6e73]">
                    Chaque nuit, un rapport de 150 à 250 mots raconte la journée de l'entreprise &mdash; ton satirique, personnages récurrents,
                    chiffres réels injectés depuis la simulation. L'IA habille, elle ne décide jamais.
                </p>

                <ul class="mt-8 space-y-3 text-sm text-[#6e6e73]">
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-[#1d1d1f]" />
                        Posté automatiquement dans votre canal Discord ou Slack au réveil.
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-[#1d1d1f]" />
                        Aucun chiffre inventé : tout vient du moteur économique et des événements tirés la nuit même.
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-[#1d1d1f]" />
                        Une punchline partageable à la fin &mdash; le marketing du jeu, c'est le jeu lui-même.
                    </li>
                </ul>
            </div>

            <div
                class="relative transition-all duration-700 [perspective:1400px]"
                :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
            >
                <div
                    ref="card"
                    class="relative rounded-2xl border border-black/[0.06] bg-white p-8 shadow-[0_30px_60px_-30px_rgba(0,0,0,0.15)] transition-transform duration-200 ease-out [transform-style:preserve-3d]"
                    :style="tiltStyle"
                >
                    <span
                        class="pointer-events-none absolute -right-3 -top-3 inline-flex items-center gap-1.5 rounded-full border border-black/10 bg-white px-3 py-1.5 text-xs font-medium text-[#1d1d1f] shadow-sm transition-all duration-700"
                        :class="visible ? 'scale-100 opacity-100' : 'scale-75 opacity-0'"
                        style="transition-delay: 400ms"
                    >
                        <CheckCircle2 class="h-3.5 w-3.5 text-[#1d7a4c]" />
                        Approuvé CoDir
                    </span>

                    <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Parapluie &amp; Fils &mdash; Rapport du jour 22</p>
                    <h3 class="mt-2 text-2xl font-semibold text-[#1d1d1f]">La banque s'inquiète, le stagiaire s'illustre</h3>

                    <p class="mt-4 text-sm leading-relaxed text-[#3a3a3c]">
                        La trésorerie a frôlé le rouge cette nuit. Mme Aubry, votre banquière, a laissé un message vocal à 23h47 &mdash; jamais bon
                        signe. Pendant ce temps, le stagiaire a relancé le client historique avec un mail signé « bien cordialement, l'équipe
                        dirigeante », sans consulter personne. Le client a payé le double. Personne ne sait pourquoi. Personne ne pose la question.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-2 text-xs">
                        <span class="rounded-full bg-[#f5f5f7] px-3 py-1 text-[#3a3a3c]">Trésorerie &minus;4 100 €</span>
                        <span class="rounded-full bg-[#f5f5f7] px-3 py-1 text-[#3a3a3c]">Demande +9</span>
                        <span class="rounded-full bg-[#f5f5f7] px-3 py-1 text-[#3a3a3c]">Événement &middot; Client fidèle</span>
                    </div>

                    <p class="mt-6 border-t border-black/[0.06] pt-4 text-sm italic text-[#6e6e73]">
                        « On a survécu à la banquière grâce à un stagiaire non mandaté. La gouvernance, ça va, ça vient. »
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
