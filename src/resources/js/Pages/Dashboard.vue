<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AddressModal from '@/Components/AddressModal.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/solid'

defineProps({
    addresses: Object,
});

const form = useForm({
    street: '',
    number: '',
    complement: '',
    city: '',
    state: '',
    cep: '',
});


const showingAddressModal = ref(false);
const selectedAddress = ref(null);

const showAddressModal = () => {
    showingAddressModal.value = true;
}

const openEditModal = (address) => {
    selectedAddress.value = address;
    showAddressModal();
}

const deleteAddress = (address) => {
    form.delete(route('address.destroy', address), {
        onFinish: () => {
           
        }
    });
};
</script>


<template>
    <Head title="Painel" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Painel</h2>
        </template>

        <div class="py-12">
            <AddressModal v-if="showingAddressModal" :address="selectedAddress" @close="showingAddressModal = false" />
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <PrimaryButton @click="showAddressModal" class="my-4">Adicionar Endereço</PrimaryButton>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
                    
                    <table class="w-full text-sm text-left rtl:text-right text-gray-900 ">
                        <thead class="text-xs text-gray-50 uppercase bg-red-800 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    CEP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    RUA
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NÚMERO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    COMPLEMENTO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ESTADO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    UF
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="address in addresses" :key="address.id" class="odd:bg-gray-100 even:bg-gray-200 border-b">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ address.cep }}</th>
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ address.street }}</th>
                                <td class="px-6 py-4">{{ address.number }}</td>
                                <td class="px-6 py-4">{{ address.complement }}</td>
                                <td class="px-6 py-4">{{ address.city }}</td>
                                <td class="px-6 py-4">{{ address.state }}</td>
                                <td class="px-6 py-4">{{ address.zip_code }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex">
                                        <a href="#" @click="openEditModal(address)" class="font-medium text-blue-600 hover:underline">
                                            <PencilSquareIcon class="h-6 w-6 text-red-500 m-1" />
                                        </a>
                                        <div class="w-4"></div>
                                        <a href="#" @click="deleteAddress(address)" class="font-medium text-blue-600 hover:underline">
                                            <TrashIcon class="h-6 w-6 text-red-500 m-1" />
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>