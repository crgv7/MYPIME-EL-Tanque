<script setup>
import {useForm} from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
const props = defineProps({
    user:{type:Object, default:()=>({})},
    modal:String, title:String, op:String
});
//Formulario, difinir campos
const form =useForm({
    id:props.user.id,
    name:props.user.name,
    email:props.user.email,
    password:props.user.password,

});
//Funcion guardar
const save= () =>{
    //guarda el formulario,haciendo post y enviando a la ruta orders.store
    form.post(route('users.store'),{
        onSuccess: ()=>cerrar()
    })
};
//funcion actualizar
const update = () =>{
    //Actualiza los datos, obtiene el id del elemento, envia a la ruta de actualizar, pasando el id
    var id = document.getElementById('id2').value;
    form.put(route('users.update', id),{
        onSuccess: ()=>cerrar() //si es exitoso cierra el modal
    })
};
//funcion cerrar del boton
const cerrar = () =>{
        form.reset();
        document.querySelector('#cerrar'+props.op).click();
    };


</script>
<template>
  <div class="modal fade" :id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5">{{ title }}</label>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <!-- si la op =1 llama a la funcion save() si no llama a la funcion update-->
                <form @submit.prevent="(op === '1' ? save() : update())">
                    <TextInput :id="'id'+op" type="hidden" name="id" v-model="form.id">
                    </TextInput>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <TextInput :id="'name'+op" class="form-control" type="text"
                        name="name" v-model="form.name" maxlength="100" placeholder="Nombre"
                        required></TextInput>
                    </div>
                    <div v-if="form.errors.name" class="text-sm text-danger">
                        {{ form.errors.name }}
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <TextInput :id="'email'+op" class="form-control" type="text"
                        name="email" v-model="form.email" maxlength="80" placeholder="correo"
                        required></TextInput>
                    </div>
                    <div v-if="form.errors.email" class="text-sm text-danger">
                        {{ form.errors.email }}
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <TextInput :id="'password'+op" class="form-control" type="text"
                        name="password" v-model="form.password" maxlength="80" placeholder="contraseña"
                        required></TextInput>
                    </div>
                    <div v-if="form.errors.password" class="text-sm text-danger">
                        {{ form.errors.password }}
                    </div>

                    <div class="d-grid mx-auto">
                        <button class="btn btn-success" :disabled="form.processing">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" type="submit" :id="'cerrar'+op"
                data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>



</template>
