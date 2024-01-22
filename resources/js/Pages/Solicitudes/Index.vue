<script>
export default {
    name: 'SolicitudesIndex'
}
</script>

<script setup >
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'



defineProps({
    solicitudes: {
        type: Object,
        required: true
    }
})

const deleteSolicitud = id => {
    if(confirm('¿Esta seguro de Eliminar el registro?')) {
        Inertia.delete(route('solicitudes.destroy', id))
    }
    
}

</script>

<!--Este es el punto-->

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Solicitudes</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-5 bg-white border-b border-gray-200">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create solicitudes')">
                        <Link :href="route('solicitudes.create')" class=" text-white  bg-indigo-500 hover:bg-indigo-700  py-2 px-4 rounded" v-if="$page.props.user.permissions.includes('create solicitudes')">
                            INGRESAR SOLICITUD
                        </Link>
                    </div>
                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li class="flex justify-between gap-x-6 py-5" v-for="solicitud in solicitudes.data">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-md font-semibold leading-6 text-gray-900">{{ solicitud.nombre_solicitante }}</p>
                                    </div>
                                </div>
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-md font-semibold leading-6 text-gray-900">{{ solicitud.nun_telefono }}</p>
                                    </div>
                                </div>
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-md font-semibold leading-6 text-gray-900">{{ solicitud.titulo_solicitud }}</p>
                                    </div>
                                </div>

                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-md leading-6 text-gray-900">
                                        <Link class="py-2 px-6 text-blue-600"  :href="route('solicitudes.edit', solicitud.id)" v-if="$page.props.user.permissions.includes('update solicitudes')">Edit</Link> 
                                        <Link class="py-2 px-6 text-red-600" @click="deleteSolicitud(solicitud.id)" v-if="$page.props.user.permissions.includes('delete solicitudes')">Delete</Link>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-between mt-2">
                        <Link v-if="solicitudes.current_page > 1" :href="solicitudes.prev_page_url" class=" py-2 px-4 rounded" >
                            previous
                        </Link>
                        <div v-else></div>
                        <Link v-if= "solicitudes.current_page < solicitudes.last_page" :href="solicitudes.next_page_url" class=" py-2 px-4 rounded" >
                           next
                        </Link>
                        <div v-else></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

