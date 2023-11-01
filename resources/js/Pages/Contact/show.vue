<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import Foot from '@/Components/Foot.vue';



const props = defineProps({
    contacts: {type:Object}
});

</script>

<template>
<Head title="Contact"></Head>

<AuthenticatedLayout>
    <template #header>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

      <div class="container d-lg-flex justify-content-center table-responsive mt-5 ">
        <table class="table w-75 table-bordered">
  <thead class="bg-secondary">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Título</th>
      <th scope="col">Tipo</th>
      <th scope="col">Opinión</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody v-if="contacts && contacts.length">
    <tr v-for="o in contacts" :key="o.id">
    <td>{{  o.id  }}</td>
    <td>{{  o.titulo  }}</td>
    <td>{{  o.tipo }}</td>
    <td>{{  o.text }}</td>

    </tr>
  </tbody>
  <tbody v-else>
        <tr>
          <td colspan="3">No hay quejas ni sugerencias  disponibles.</td>
        </tr>
      </tbody>


</table>
</div>
</template>

</AuthenticatedLayout>
<Foot></Foot>
</template>
