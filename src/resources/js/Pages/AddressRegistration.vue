<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>


<template>

    <Head title="Cadastro de Endereços" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastro de Endereços</h2>
        </template>

        <div class="py-20">

            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-8 text-gray-900">
                        <div class="mx-auto max-w-2xl text-center">
                            <h2 class="text-3xl font-bold tracking-tight text-red-500 sm:text-4xl">Cadastro de endereços
                            </h2>
                            <p class="mt-2 text-lg leading-8 text-gray-600">Insira corretamente as informações do
                                endereço que
                                deseja cadastrar.</p>
                        </div>
                        <form @submit.prevent="form.patch(route('profile.update'))" class="m-8 space-y-6">
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
                                    <InputLabel for="city" value="Estado" />
                                    <Select id="state">
                                        <template #content>
                                            <option value="PR" selected>Paraná</option>
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
                                    <InputError class="mt-2" :message="form.errors.city" />



                                </div>
                            </div>
                            <div class="flex items-center gap-4 justify-end">
                                <PrimaryButton :disabled="form.processing">Salvar</PrimaryButton>
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
    </AuthenticatedLayout>
</template>
