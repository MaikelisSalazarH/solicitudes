<script>
    export default {
        name: 'SolicitudesEdit'
    }
</script>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import SolicitudesFormEdit from '@/Components/Solicitudes/FormEdit.vue'
    
    const props = defineProps({
        solicitud: {
            type: Object,
            required: true
        }
    })
//este es el punto 
    const form = useForm({
        nombre_solicitante: props.solicitud.nombre_solicitante,
        nun_telefono: props.solicitud.nun_telefono,
        titulo_solicitud: props.solicitud.titulo_solicitud,
        descripcion: props.solicitud.descripcion,
        estado_id: props.solicitud.estado_id
        
    })
</script>

<template>
    <AppLayout title="Editar Solicitud">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Editar Solicitud</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <SolicitudesFormEdit :updating="true" :form="form" @submit="form.put(route('solicitudes.update', solicitud.id))"/>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>