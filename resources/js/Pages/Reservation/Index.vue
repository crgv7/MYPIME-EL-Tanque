<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import { Head } from '@inertiajs/vue3';
import {useForm} from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import ModalOrder from '@/Components/ModalReservation.vue';
import Foot from '@/Components/Foot.vue';

const form = useForm({});
const props = defineProps({
    reservations: {type:Object}
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
            form.delete(route('reservations.destroy', id))
            Swal.fire(
                'Eliminar',
                'Su archivo se ha eliminado',
                'success'
              )
        }
      })
}
// esta funcion es para que cuando se de le en el boton actualizar  obtenga los datos en los campos para modificar
const openModal = (reservation) => {
    document.getElementById('id2').value = reservation.id;
    document.getElementById('nombre2').value = reservation.nombre;
    document.getElementById('telefono2').value = reservation.telefono;
    document.getElementById('fecha2').value = reservation.fecha;
    document.getElementById('cantidad_personas2').value = reservation.cantidad_personas;

}

</script>

<template>
<Head title="Reservaciones"></Head>

<AuthenticatedLayout>
    <template #header>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <div class=" container-fluid d-grid mx-auto mt-5 d-flex justify-center mb-3">
          <button class="btn btn-secondary w-25" data-bs-toggle="modal" data-bs-target="#modalCreate">
            <i class="bi bi-plus-circle-fill"></i>Añadir</button>
      </div>
      <div class="container d-lg-flex justify-content-center table-responsive">
        <table class="table w-75 table-bordered">
  <thead class="bg-secondary">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cantidad de personas</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

    <tbody v-if="reservations && reservations.length">
    <tr v-for="reservation in reservations" :key="reservation.id">
    <td>{{  reservation.id  }}</td>
    <td>{{  reservation.nombre  }}</td>
    <td>{{  reservation.telefono  }}</td>
    <td>{{  reservation.correo }}</td>
    <td>{{  reservation.fecha }}</td>
    <td>{{  reservation.cantidad_personas }}</td>

    <div class="container d-inline w-50">
        <td class="p-2"><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" @click="openModal(reservation)">
        <i class="bi bi-pencil-square"></i>
    </button></td>
    <td><button class="btn btn-danger" @click="deleteOrder(reservation.id)">
        <i class="bi bi-trash"></i></button></td>
    </div>

    </tr>
  </tbody>
  <tbody v-else>
        <tr>
          <td colspan="3">No hay reservaciones.</td>
        </tr>
      </tbody>
</table>
</div>
<ModalOrder :modal="'modalCreate'" :title="'Añadir Reservacion'" :op="'1'"></ModalOrder>
<ModalOrder :modal="'modalEdit'" :title="'Editar Reservacion'" :op="'2'"></ModalOrder>
</template>

</AuthenticatedLayout>
<Foot></Foot>
</template>
