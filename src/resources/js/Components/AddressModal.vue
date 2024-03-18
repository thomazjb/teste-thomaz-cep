<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const form = useForm({
    street: '',
    number: '',
    complement: '',
    city: '',
    state: '',
    cep: '',
});

const submit = () => {
    form.post(route('address.store'), {
        onFinish: () => {
            form.reset()
        }
    });
};
</script>

<template>
    <div class="modal fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
        <div class="modal-container bg-white w-full md:max-w-3xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-8 text-gray-900">
                        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
                            <h2 class="text-3xl font-bold tracking-tight text-red-500 sm:text-4xl">Cadastro de endereços
                            </h2>
                            <p class="mt-2 text-lg leading-8 text-gray-600">Insira corretamente as informações do
                                endereço que
                                deseja cadastrar.</p>
                        </div>
                        <form @submit.prevent="submit" class="m-8 space-y-6">
                            <div class="grid grid-cols-3 gap-4 gap-y-6 sm:grid-cols-3">

                                <div class="col-span-2">
                                    <InputLabel for="street" value="Rua" />
                                    <TextInput id="street" type="text" class="mt-1 w-full" v-model="form.street"
                                        required autofocus autocomplete="street" />
                                    <InputError class="mt-2" :message="form.errors.street" />
                                </div>
                                <div>
                                    <InputLabel for="number" value="Número" />
                                    <TextInput id="number" type="text" class="mt-1 w-full" v-model="form.number"
                                        required autocomplete="number" />
                                    <InputError class="mt-2" :message="form.errors.number" />
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-4 gap-y-6 sm:grid-col-4">

                                <div>
                                    <InputLabel for="complement" value="Complemento" />
                                    <TextInput id="complement" type="text" class="mt-1 w-full" v-model="form.complement"
                                        required autofocus autocomplete="complement" />
                                    <InputError class="mt-2" :message="form.errors.complement" />
                                </div>
                                <div class="col-span-2">
                                    <InputLabel for="city" value="Cidade" />
                                    <TextInput id="city" type="text" class="mt-1 w-full" v-model="form.city" required
                                        autocomplete="city" />
                                    <InputError class="mt-2" :message="form.errors.city" />
                                </div>

                                <div>
                                    <InputLabel for="state" value="Estado" />
                                    <Select id="state" v-model="form.state">
                                        <template #content>
                                            <option value="PR">Paraná</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </template>
                                    </Select>
                                    <InputError class="mt-2" :message="form.errors.state" />

                                </div>
                            </div>
                            <div class="flex justify-between">

                                <div>
                                    <PrimaryButton class="bg-gray-400" @click="closeModal">Sair</PrimaryButton>
                                </div>
                                <div>
                                    <PrimaryButton class="bg-blue-400 hover:bg-blue-300" :disabled="form.processing">Salvar</PrimaryButton>
                                </div>
                                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Salvo.</p>
                                </Transition>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {

    },
    methods: {
        closeModal() {
            this.$emit('close');
        }
    }
};
</script>