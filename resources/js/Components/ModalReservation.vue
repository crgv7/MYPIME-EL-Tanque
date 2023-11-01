<script setup>
import {useForm} from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
const props = defineProps({
    reservation:{type:Object, default:()=>({})},
    modal:String, title:String, op:String
});
//Formulario, difinir campos
const form =useForm({
    id:props.reservation.id,
    nombre:props.reservation.nombre,
    telefono:props.reservation.telefono,
    fecha:props.reservation.fecha,
    cantidad_personas:props.reservation.cantidad_personas,

});
//Funcion guardar
const save= () =>{
    //guarda el formulario,haciendo post y enviando a la ruta orders.store
    form.post(route('reservations.store'),{
        onSuccess: ()=>cerrar()
    })
};
//funcion actualizar
const update = () =>{
    //Actualiza los datos, obtiene el id del elemento, envia a la ruta de actualizar, pasando el id
    var id = document.getElementById('id2').value;
    form.put(route('reservations.update', id),{
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
                        <TextInput :id="'nombre'+op" class="form-control" type="text"
                        name="nombre" v-model="form.nombre" maxlength="100" placeholder="Nombre"
                        required></TextInput>
                    </div>
                    <div v-if="form.errors.nombre" class="text-sm text-danger">
                        {{ form.errors.nombre }}
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                        <TextInput :id="'telefono'+op" class="form-control" type="text"
                        name="telefono" v-model="form.telefono" maxlength="80" placeholder="telefono"
                        required></TextInput>
                    </div>
                    <div v-if="form.errors.telefono" class="text-sm text-danger">
                        {{ form.errors.telefono }}
                    </div>





                    <div class="row d-flex mb-3">
                        <div class="row">
                            <label class="mb-1">Fecha</label>
                        </div>
                        <div class="input-group ">
                        <input :id="'fecha'+op" v-model="form.fecha" name="fecha"  type="date"  min="2023-01-01" max="2030-12-31" required />
                    </div>
                    <div v-if="form.errors.fecha" class="text-sm text-danger">
                        {{ form.errors.fecha }}
                    </div>

                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                        <input :id="'cantidad_personas'+op" class="form-control" type="number" min="1" max="4"
                        name="fecha" v-model="form.cantidad_personas" maxlength="80" placeholder="cantidad de personas"
                        required>
                    </div>
                    <div v-if="form.errors.cantidad_personas" class="text-sm text-danger">
                        {{ form.errors.cantidad_personas }}
                    </div>



                    <div class="d-flex mx-auto justify-content-end">
                        <button class="btn btn-success text-white" style="width: 18%;" :disabled="form.processing">
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
