<script setup lang="ts">
import { useParallax } from '@/composables/useParallax';
import { useTilt } from '@/composables/useTilt';
import { ArrowRight, TrendingDown, TrendingUp } from 'lucide-vue-next';
import { ref } from 'vue';

const card = ref<HTMLElement | null>(null);
const { style: tiltStyle } = useTilt(card, 8);
const { offset: blobOffsetSlow } = useParallax(0.08);
const { offset: blobOffsetFast } = useParallax(0.16);
</script>

<template>
    <section id="top" class="relative overflow-hidden bg-white pb-28 pt-40">
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div
                class="absolute -left-32 -top-24 h-[34rem] w-[34rem] rounded-full opacity-[0.35] blur-3xl transition-transform duration-300 ease-out"
                :style="{ background: 'radial-gradient(circle, rgba(255,124,110,0.25), transparent 70%)', transform: blobOffsetSlow }"
            />
            <div
                class="absolute -right-24 top-10 h-[28rem] w-[28rem] rounded-full opacity-[0.3] blur-3xl transition-transform duration-300 ease-out"
                :style="{ background: 'radial-gradient(circle, rgba(120,150,255,0.22), transparent 70%)', transform: blobOffsetFast }"
            />
            <div
                class="absolute bottom-[-10rem] left-1/3 h-[26rem] w-[26rem] rounded-full opacity-[0.25] blur-3xl transition-transform duration-300 ease-out"
                :style="{ background: 'radial-gradient(circle, rgba(255,214,120,0.25), transparent 70%)', transform: blobOffsetSlow }"
            />
        </div>

        <div class="relative mx-auto max-w-6xl px-6">
            <div class="mx-auto max-w-3xl text-center">
                <div
                    class="mb-6 inline-flex items-center gap-2 rounded-full border border-black/10 bg-white/70 px-4 py-1.5 text-xs font-medium uppercase tracking-widest text-[#6e6e73] backdrop-blur duration-700 animate-in fade-in slide-in-from-bottom-4"
                >
                    <span class="h-1.5 w-1.5 rounded-full bg-[#1d1d1f]" />
                    Bêta privée &mdash; saison 0
                </div>

                <h1 class="text-4xl font-semibold leading-[1.08] tracking-tight text-[#1d1d1f] sm:text-5xl lg:text-6xl">
                    <span class="block duration-700 animate-in fade-in slide-in-from-bottom-6">Votre entreprise est au bord du gouffre.</span>
                    <span class="block text-[#6e6e73] duration-700 animate-in fade-in slide-in-from-bottom-6 [animation-delay:120ms]">
                        Vous avez 30 jours.
                    </span>
                </h1>

                <p
                    class="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-[#6e6e73] duration-700 animate-in fade-in slide-in-from-bottom-4 [animation-delay:240ms]"
                >
                    Un jeu de gestion collaboratif et asynchrone. Une décision par jour, une résolution nocturne, un rapport à lire au réveil &mdash;
                    et une équipe qui en débat sur Slack toute la journée.
                </p>

                <div
                    class="mt-9 flex flex-wrap items-center justify-center gap-4 duration-700 animate-in fade-in slide-in-from-bottom-4 [animation-delay:360ms]"
                >
                    <a
                        href="#tarifs"
                        class="group inline-flex items-center gap-2 rounded-full bg-[#1d1d1f] px-6 py-3 font-medium text-white transition-all hover:-translate-y-0.5 hover:bg-black hover:shadow-lg"
                    >
                        Redresser une entreprise
                        <ArrowRight class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                    </a>
                    <a
                        href="#rapport"
                        class="inline-flex items-center gap-2 px-2 py-3 font-medium text-[#1d1d1f] transition-colors hover:text-[#6e6e73]"
                    >
                        Voir un rapport type
                    </a>
                </div>
            </div>

            <div class="mx-auto mt-20 max-w-2xl duration-1000 animate-in fade-in slide-in-from-bottom-8 [animation-delay:480ms] [perspective:1400px]">
                <div
                    ref="card"
                    class="rounded-2xl border border-black/[0.06] bg-[#f5f5f7]/90 p-8 shadow-[0_40px_80px_-30px_rgba(0,0,0,0.2)] backdrop-blur transition-transform duration-200 ease-out [transform-style:preserve-3d]"
                    :style="tiltStyle"
                >
                    <div class="flex items-start justify-between border-b border-black/[0.06] pb-4">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Rapport quotidien &mdash; Jour 14/30</p>
                            <h3 class="mt-1 text-lg font-semibold text-[#1d1d1f]">Parapluie &amp; Fils</h3>
                        </div>
                        <span
                            class="flex h-11 w-11 items-center justify-center rounded-full border border-black/10 text-[10px] font-semibold uppercase leading-none text-[#1d1d1f]"
                        >
                            Résolu
                        </span>
                    </div>

                    <p class="mt-4 text-[15px] leading-relaxed text-[#3a3a3c]">
                        « Le stagiaire a proposé de vendre des parapluies transparents. Contre toute attente, la banquière a souri. La trésorerie
                        respire, le moral des ateliers frémit. »
                    </p>

                    <div class="mt-6 grid grid-cols-3 gap-3 text-xs">
                        <div class="rounded-lg bg-white p-3">
                            <p class="flex items-center gap-1 font-medium text-[#1d7a4c]"><TrendingUp class="h-3.5 w-3.5" /> +6 400 €</p>
                            <p class="mt-0.5 text-[#8a8a8e]">Trésorerie</p>
                        </div>
                        <div class="rounded-lg bg-white p-3">
                            <p class="flex items-center gap-1 font-medium text-[#1d7a4c]"><TrendingUp class="h-3.5 w-3.5" /> +3</p>
                            <p class="mt-0.5 text-[#8a8a8e]">Moral</p>
                        </div>
                        <div class="rounded-lg bg-white p-3">
                            <p class="flex items-center gap-1 font-medium text-[#b3261e]"><TrendingDown class="h-3.5 w-3.5" /> &minus;2</p>
                            <p class="mt-0.5 text-[#8a8a8e]">Réputation</p>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between text-[11px] text-[#8a8a8e]">
                        <span>4/4 décisions prises</span>
                        <span>Prochaine résolution &middot; 03h00</span>
                    </div>
                </div>
            </div>

            <dl
                class="relative mx-auto mt-20 grid max-w-2xl grid-cols-3 gap-6 border-t border-black/[0.06] pt-10 text-center duration-700 animate-in fade-in [animation-delay:600ms]"
            >
                <div>
                    <dt class="text-xs uppercase tracking-wider text-[#8a8a8e]">Par jour</dt>
                    <dd class="mt-1 text-2xl font-semibold text-[#1d1d1f]">2 min</dd>
                </div>
                <div>
                    <dt class="text-xs uppercase tracking-wider text-[#8a8a8e]">Par saison</dt>
                    <dd class="mt-1 text-2xl font-semibold text-[#1d1d1f]">30 jours</dd>
                </div>
                <div>
                    <dt class="text-xs uppercase tracking-wider text-[#8a8a8e]">Par équipe</dt>
                    <dd class="mt-1 text-2xl font-semibold text-[#1d1d1f]">2&ndash;8 joueurs</dd>
                </div>
            </dl>
        </div>
    </section>
</template>
