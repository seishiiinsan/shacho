<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps<{
    authUser: boolean;
}>();

const links = [
    { href: '#boucle', label: 'Le rituel' },
    { href: '#roles', label: 'Les rôles' },
    { href: '#rapport', label: 'Le rapport' },
    { href: '#tarifs', label: 'Tarifs' },
];

const scrolled = ref(false);
if (typeof window !== 'undefined') {
    window.addEventListener('scroll', () => {
        scrolled.value = window.scrollY > 8;
    });
}
</script>

<template>
    <header
        class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
        :class="scrolled ? 'border-b border-black/[0.06] bg-white/80 backdrop-blur-lg' : 'border-b border-transparent bg-white/0'"
    >
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="#top" class="flex items-center gap-2 font-semibold tracking-tight text-[#1d1d1f]">
                <span class="flex h-7 w-7 items-center justify-center rounded-full border border-black/10 text-xs text-[#1d1d1f]"> 社 </span>
                <span>Shachō</span>
            </a>

            <div class="hidden items-center gap-8 text-sm text-[#6e6e73] md:flex">
                <a v-for="link in links" :key="link.href" :href="link.href" class="transition-colors hover:text-[#1d1d1f]">
                    {{ link.label }}
                </a>
            </div>

            <div class="flex items-center gap-3 text-sm">
                <Link
                    v-if="authUser"
                    :href="route('dashboard')"
                    class="rounded-full border border-black/10 px-4 py-1.5 text-[#1d1d1f] transition-colors hover:border-black/25"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link :href="route('login')" class="hidden text-[#6e6e73] transition-colors hover:text-[#1d1d1f] sm:inline">Connexion</Link>
                    <Link
                        :href="route('register')"
                        class="rounded-full bg-[#1d1d1f] px-4 py-1.5 font-medium text-white transition-colors hover:bg-black"
                    >
                        Créer une ligue
                    </Link>
                </template>
            </div>
        </nav>
    </header>
</template>
