<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import { Head } from '@inertiajs/vue3';
import {useForm} from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import ModalContact from '@/Components/ModalContact.vue';
import Foot from '@/Components/Foot.vue';


const form = useForm({});
const props = defineProps({
    contacts: {type:Object}
});

const deleteOrder= (id) => {
    Swal.fire({
        title: 'Estas seguro?',
        text: "No hay vuelta atras",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar'
      }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('contacts.destroy', id))
            Swal.fire(
                'Eliminar',
                'Se ha eliminado',
                'success'
              )
        }
      })
}
// esta funcion es para que cuando se de le en el boton actualizar  obtenga los datos en los campos para modificar
const openModal = (contact) => {
    document.getElementById('id2').value = contact.id;
    document.getElementById('titulo2').value = contact.titulo;
    document.getElementById('correo2').value = contact.correo;
    document.getElementById('tipo2').value = contact.tipo;
    document.getElementById('text2').value = contact.text;
}
</script>

<template>
<Head title="Contact"></Head>

<AuthenticatedLayout>
    <template #header>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

      <div class="d-grid mx-auto mt-5 d-flex justify-center mb-3">
        <div class=" container w-25 d-flex">
          <button class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#modalCreate">
            <i class="bi bi-plus-circle-fill"></i>Añadir</button>
          </div>
      </div>
      <div class="container d-lg-flex justify-content-center table-responsive  ">
        <table class="table w-75 table-bordered">
  <thead class="bg-secondary">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Opinion</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody v-if="contacts && contacts.length">
    <tr v-for="o in contacts" :key="o.id">
    <td>{{  o.id  }}</td>
    <td>{{  o.titulo  }}</td>
    <td>{{  o.tipo }}</td>
    <td>{{  o.text }}</td>

    <div class="container d-inline w-50">
        <td class="p-2"><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" @click="openModal(o)">
        <i class="bi bi-pencil-square"></i>
    </button></td>
    <td><button class="btn btn-danger" @click="deleteOrder(o.id)">
        <i class="bi bi-trash"></i></button></td>
    </div>
    </tr>
  </tbody>
  <tbody v-else>
        <tr>
          <td colspan="3">No hay quejas ni sugerencias  disponibles.</td>
        </tr>
      </tbody>


</table>
</div>
<ModalContact :modal="'modalCreate'" :title="'Añadir Quejas o Sugerencias'" :op="'1'"></ModalContact>
<ModalContact :modal="'modalEdit'" :title="'Editar Quejas o Sugerencias'" :op="'2'"></ModalContact>

</template>

</AuthenticatedLayout>
<Foot></Foot>
</template>
