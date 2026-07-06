<script setup lang="ts">
import { useReveal } from '@/composables/useReveal';
import { Banknote, Megaphone, Users, Wallet } from 'lucide-vue-next';

const { target, visible } = useReveal();

const roles = [
    {
        icon: Wallet,
        name: 'PDG',
        scope: 'Stratégie, arbitrages, communication de crise',
        indicator: 'Réputation',
    },
    {
        icon: Banknote,
        name: 'DAF',
        scope: 'Budget, investissements, trésorerie, emprunts',
        indicator: 'Trésorerie',
    },
    {
        icon: Users,
        name: 'DRH',
        scope: 'Recrutement, licenciements, moral des équipes',
        indicator: 'Moral',
    },
    {
        icon: Megaphone,
        name: 'Dir. Marketing',
        scope: 'Campagnes, pricing, image de marque',
        indicator: 'Demande',
    },
];
</script>

<template>
    <section id="roles" ref="target" class="relative bg-white py-28">
        <div class="mx-auto max-w-6xl px-6">
            <div class="mx-auto max-w-2xl text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Le comité de direction</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#1d1d1f] sm:text-4xl">Quatre fauteuils. Une seule entreprise.</h2>
                <p class="mt-4 text-[#6e6e73]">
                    Chaque rôle reçoit un objectif secret en début de saison &mdash; en tension douce avec l'intérêt collectif. C'est le générateur de
                    débats.
                </p>
            </div>

            <div class="mt-14 grid gap-5 [perspective:1000px] sm:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="(role, i) in roles"
                    :key="role.name"
                    class="group rounded-2xl border border-black/[0.06] bg-white p-6 opacity-100 shadow-[0_1px_2px_rgba(0,0,0,0.03)] transition-all duration-500 [transform-style:preserve-3d] hover:z-10 hover:-translate-y-1 hover:shadow-[0_30px_50px_-20px_rgba(0,0,0,0.2)] hover:[transform:rotateX(6deg)_rotateY(-6deg)_translateY(-6px)]"
                    :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                    :style="{ transitionDelay: `${i * 100}ms` }"
                >
                    <component :is="role.icon" class="h-6 w-6 text-[#1d1d1f]" />
                    <h3 class="mt-4 text-lg font-semibold text-[#1d1d1f]">{{ role.name }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-[#6e6e73]">{{ role.scope }}</p>
                    <p class="mt-4 inline-flex items-center gap-1.5 rounded-full border border-black/10 px-3 py-1 text-xs text-[#6e6e73]">
                        Indicateur &middot; {{ role.indicator }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
