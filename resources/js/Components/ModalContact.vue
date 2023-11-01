<script setup>
import {useForm} from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
const props = defineProps({
    contact:{type:Object, default:()=>({})},
    modal:String, title:String, op:String
});
//Formulario, difinir campos
const form =useForm({
    id:props.contact.id,
    titulo:props.contact.titulo,
    tipo:props.contact.tipo,
    text:props.contact.text,
});

let options=  [ //Lista de opciones
        { value: '1', text: 'Sugerencia' },
        { value: '2', text: 'Queja' },
      ];
//Funcion guardar
const save= () =>{
    //guarda el formulario,haciendo post y enviando a la ruta orders.store
    form.post(route('contacts.store'),{
        onSuccess: ()=>cerrar()
    })
};
//funcion actualizar
const update = () =>{
    //Actualiza los datos, obtiene el id del elemento, envia a la ruta de actualizar, pasando el id
    var id = document.getElementById('id2').value;
    form.put(route('contacts.update', id),{
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
                        <span class="input-group-text"><i class="bi bi-sticky-fill"></i></span>
                        <TextInput :id="'titulo'+op" class="form-control" type="text"
                        name="titulo" v-model="form.titulo" maxlength="100" placeholder="Titulo"
                        required></TextInput>
                    </div>
                    <div v-if="form.errors.titulo" class="text-sm text-danger">
                        {{ form.errors.titulo }}
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-menu-button-wide"></i></span>
                        <select
                        :id="'tipo'+op" class="form-control" type="text"
                        name="tipo" v-model="form.tipo" maxlength="80" placeholder="client"
                        required> <option v-for="option in options" :key="option.value" :value="option.text">
                        {{ option.text }}
                        </option></select>
                    </div>
                    <div v-if="form.errors.tipo" class="text-sm text-danger">
                        {{ form.errors.tipo }}
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-textarea"></i></span>
                        <TextArea :id="'text'+op" class="form-control" type="text"
                        name="text" v-model="form.text" maxlength="80" placeholder="Escriba su queja o sugerencia"
                        required></TextArea>
                    </div>
                    <div v-if="form.errors.text" class="text-sm text-danger">
                        {{ form.errors.text }}
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
