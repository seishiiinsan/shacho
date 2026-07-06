<script setup lang="ts">
import { useReveal } from '@/composables/useReveal';
import type { SharedData } from '@/types';
import { useForm, usePage } from '@inertiajs/vue3';
import { ArrowRight, CheckCircle2 } from 'lucide-vue-next';

const { target, visible } = useReveal();
const page = usePage<SharedData>();

const form = useForm({
    email: '',
});

function submit() {
    form.post(route('waitlist.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <section ref="target" class="relative overflow-hidden bg-white py-32">
        <div
            class="pointer-events-none absolute left-1/2 top-1/2 h-[36rem] w-[36rem] -translate-x-1/2 -translate-y-1/2 rounded-full opacity-[0.3] blur-3xl"
            style="background: radial-gradient(circle, rgba(255, 124, 110, 0.2), transparent 70%)"
        />
        <div
            class="relative mx-auto max-w-2xl px-6 text-center transition-all duration-700"
            :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
        >
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#6e6e73]">Prochaine saison</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#1d1d1f] sm:text-4xl">La première ligue ouvre bientôt. La vôtre&nbsp;?</h2>
            <p class="mt-4 text-[#6e6e73]">Bêta privée, 3 à 5 équipes. Laissez votre email, on vous invite dès qu'un scénario se libère.</p>

            <form v-if="!page.props.flash.success" class="mx-auto mt-8 flex max-w-md flex-col gap-3 sm:flex-row" @submit.prevent="submit">
                <input
                    v-model="form.email"
                    type="email"
                    required
                    placeholder="vous@equipe.com"
                    class="w-full rounded-full border border-black/10 bg-white px-5 py-3 text-sm text-[#1d1d1f] placeholder:text-[#8a8a8e] focus:border-black/30 focus:outline-none focus:ring-2 focus:ring-black/10"
                />
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="group inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-[#1d1d1f] px-6 py-3 font-medium text-white transition-colors hover:bg-black disabled:opacity-50"
                >
                    Rejoindre la liste
                    <ArrowRight class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                </button>
            </form>
            <p v-if="form.errors.email" class="mt-3 text-sm text-[#b3261e]">{{ form.errors.email }}</p>

            <div
                v-if="page.props.flash.success"
                class="mx-auto mt-8 flex max-w-md items-center justify-center gap-2 rounded-full border border-black/10 bg-[#f5f5f7] px-5 py-3 text-sm text-[#1d1d1f] duration-500 animate-in fade-in zoom-in-95"
            >
                <CheckCircle2 class="h-4 w-4 text-[#1d7a4c]" />
                {{ page.props.flash.success }}
            </div>
        </div>
    </section>
</template>
