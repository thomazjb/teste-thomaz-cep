<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
</script>
<template>
    <div class="modal fixed inset-0 flex items-center justify-center z-50" v-if="data">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-container bg-white w-full md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <div class="text-center">
                    <h3 class="text-2xl font-bold tracking-tight text-red-500 sm:text-3xl">Aqui estão as informações do
                        CEP!</h3>
                </div>
                <form class="mt-8 space-y-6">
                    <div class="grid grid-cols-2 gap-4">
                        <p class="font-bold text-lg">CEP:</p>
                        <p class="text-lg">{{ data.cep }}</p>
                        <p class="font-bold text-lg">Logradouro:</p>
                        <p class="text-lg">{{ data.logradouro }}</p>
                        <p class="font-bold text-lg">Complemento:</p>
                        <p class="text-lg">{{ data.complemento }}</p>
                        <p class="font-bold text-lg">Bairro:</p>
                        <p class="text-lg">{{ data.bairro }}</p>
                        <p class="font-bold text-lg">Cidade:</p>
                        <p class="text-lg">{{ data.localidade }}</p>
                        <p class="font-bold text-lg">UF:</p>
                        <p class="text-lg">{{ data.uf }}</p>
                    </div>

                    <div class="flex items-center gap-4 justify-end mt-6">
                        <div class="flex justify-end">
                            <PrimaryButton @click="closeModal">Sair</PrimaryButton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: Object
    },
    methods: {
        closeModal() {
            this.$emit('close');
        }
    }
};
</script>