<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import CepModal from '@/Components/CepModal.vue';
import { ref, onMounted } from 'vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    data: Object,
});

const form = useForm({
    cep: '',
});

const showModal = ref(false);

const submit = () => {
    form.get(route('cep.search'), {
        onSuccess: () => {
            showModal.value = true;
        },
        onFinish: () => {
            openModal();
        }
    });

    showModal.value = true;
    localStorage.setItem('showModal', 'true');
};

onMounted(() => {
    const storedShowModal = localStorage.getItem('showModal');
    if (storedShowModal === 'true') {
        showModal.value = true;
    }
});

const openModal = () => {
    showModal.value = true;
};

const formatCep = () => {
    let cep = form.cep.replace(/\D/g, '');
    cep = cep.replace(/^(\d{5})(\d{3})$/, '$1-$2');
    form.cep = cep;
};

</script>

<template>

    <Head title="Home" />
    <div class="bg-cover bg-center" style="background-image: url('/desert.png')">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <a href="https://revendamais.com.br" title="Revenda Mais">
                            <img width="244" height="34"
                                src="https://revendamais.com.br/wp-content/uploads/2023/09/logo-2.png.webp"
                                class="attachment-full size-full wp-image-15149" alt="Logo Revenda Mais"
                                srcset="https://revendamais.com.br/wp-content/uploads/2023/09/logo-2.png.webp 244w,https://revendamais.com.br/wp-content/uploads/2023/09/logo-2-100x14.png 100w"
                                sizes="(max-width: 244px) 100vw, 244px"> </a>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                        </Link>
                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-3 py-2 text-black font-bold ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Entrar
                            </Link>
                            <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-3 py-2 text-black font-bold ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Registrar
                            </Link>
                        </template>
                    </nav>
                </header>

                <main>
                    <div class="relative rounded-lg isolate overflow-hidden bg-[#8b2a25] py-16 sm:py-24 lg:py-32">
                        <div class="mx-auto grid justify-items-center px-6 lg:px-8">
                            <div class="mx-auto max-w-2xl lg:max-w-none">
                                <div class=" justify-center">
                                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center">A
                                        busca de CEP mais
                                        rápida do Oeste! 🤠</h2>
                                    <p class="mt-4 text-lg leading-8 text-gray-300 text-center max-w-[40rem] ">Caso seu
                                        CEP não tenha
                                        sido encontrado, é possível cadastrá-lo no nosso banco de dados para busca
                                        posterior!
                                    </p>
                                    <form @submit.prevent="submit">
                                        <div class="mt-6 flex gap-x-4 mx-20 justify-items-center">
                                            <label for="cep" class="sr-only">CEP</label>
                                            <TextInput
                                            id="cep"
                                            name="cep"
                                            type="text"
                                            maxlength="9" 
                                            autocomplete="cep"
                                            v-model="form.cep" 
                                            @input="formatCep"
                                            class="min-w-0 flex-auto rounded-md border-0 bg-white/1 px-3.5 py-2 text-black shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-red-500 lg:text-lg lg:leading-8"
                                            placeholder="00000-000" />
                                            <InputError class="mt-2" :message="form.errors.cep" />
                                            <PrimaryButton type="submit" :disabled="!form.cep.trim()"
                                                class="flex-none rounded-md bg-red-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Buscar</PrimaryButton>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 blur-3xl xl:-top-6"
                            aria-hidden="true">
                            <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ebe7e5] to-[#abaac0] opacity-40"
                                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                            </div>
                        </div>
                    </div>
                </main>

                <footer>
                    <p class="py-1 rounded-lg text-center text-2md opacity-70 mx-40 text-black bg-gray-300 mt-6">Feito
                        por Thomaz
                        Juliann Boncompagni a propósitos de
                        testes para a empresa Revenda Mais.</p>
                </footer>
                <CepModal v-if="showModal" :data="data" @close="showModal = false" />
            </div>
        </div>
    </div>
</template>
