<script setup lang="ts">
import { useLenis } from '@/composables/useLenis';
import DailyLoopSection from '@/pages/welcome/DailyLoopSection.vue';
import EconomySection from '@/pages/welcome/EconomySection.vue';
import FinalCtaSection from '@/pages/welcome/FinalCtaSection.vue';
import HeroSection from '@/pages/welcome/HeroSection.vue';
import LandingFooter from '@/pages/welcome/LandingFooter.vue';
import LandingNav from '@/pages/welcome/LandingNav.vue';
import PricingSection from '@/pages/welcome/PricingSection.vue';
import ReportShowcaseSection from '@/pages/welcome/ReportShowcaseSection.vue';
import RolesSection from '@/pages/welcome/RolesSection.vue';
import type { SharedData } from '@/types';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage<SharedData>();
useLenis();
</script>

<template>
    <Head title="Shachō — Redressez une entreprise en 30 jours, en équipe">
        <meta
            name="description"
            content="Shachō est un jeu de gestion collaboratif asynchrone. Une décision par jour, une résolution nocturne, un rapport narratif à lire au réveil."
        />
    </Head>

    <div class="min-h-screen scroll-smooth bg-white font-sans antialiased">
        <LandingNav :auth-user="Boolean(page.props.auth.user)" />
        <main>
            <HeroSection />
            <DailyLoopSection />
            <RolesSection />
            <ReportShowcaseSection />
            <EconomySection />
            <PricingSection />
            <FinalCtaSection />
        </main>
        <LandingFooter />
    </div>
</template>
