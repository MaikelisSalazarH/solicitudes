<script>
    export default {
        name: 'SolicitudesFormEdit'
    }
</script>

<script setup>
    import FormSection from '@/Components/FormSection.vue'
    import InputError from '@/Components/InputError.vue'
    import InputLabel from '@/Components/InputLabel.vue'
    import PrimaryButton from '@/Components/PrimaryButton.vue'
    import TextInput from '@/Components/TextInput.vue'
    import SecondaryButton from '@/Components/SecondaryButton.vue'
    //import CollectionSelector from '../Common/CollectionSelector.vue'
    
    
    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Object,
            required: false,
            default: null
        },
        estados: {
            type: Object,
            required: true
        }
    })

    defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update Solicitud' : 'Create New Solicitud' }}
        </template>

        <template #description>
            {{ updating ? 'Update the Selected Solicitud' : 'Create a New Solicitud From Scratch' }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="nombre_solicitante" value="Nombre y apellido" />
                <TextInput id="nombre_solicitante" v-model="form.nombre_solicitante" type="text"  autocomplete="nombre_solicitante" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.nombre_solicitante" class="mt-2"/>

                <InputLabel for="nun_telefono" value="Ingrese su número de teléfono" />
                <TextInput id="nun_telefono" v-model="form.nun_telefono" type="text" autocomplete="nun_telefono" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.nun_telefono" class="mt-2"/>

                <InputLabel for="titulo_solicitud" value="Solicitud" />
                <TextInput id="titulo_solicitud" v-model="form.titulo_solicitud" type="text" autocomplete="titulo_solicitud" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.titulo_solicitud" class="mt-2"/>
                
                <InputLabel for="descripcion" value="Description de su solicitud" />
                <TextInput id="descripcion" v-model="form.descripcion" type="text" autocomplete="descripcion" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.descripcion" class="mt-2"/>
                
                <div  class="mt-1 block w-full" v-if="$page.props.user.permissions.includes('update solicitudes')">
                <InputLabel for="estado_id" value="Estado" />
                <select name="estado_id" id="estado_id">
                    <option v-for="estado in estados" :value="estado.id">{{ estado.name }}</option>
                </select>
                </div>
                <InputError :message="$page.props.errors.estado_id" class="mt-2"/>

            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>