<script>
    export default {
        name: 'SolicitudesCreate'
    }
</script>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import SolicitudesForm from '@/Components/Solicitudes/Form.vue'
    

    const form = useForm({
        nombre_solicitante: '',
        nun_telefono: '',
        titulo_solicitud: '',
        descripcion: '',
        
    })
</script>

<template>
    <AppLayout title="Ingresar Solicitud">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Ingresar Solicitud</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <SolicitudesForm :form="form" @submit="form.post(route('solicitudes.store'))" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>