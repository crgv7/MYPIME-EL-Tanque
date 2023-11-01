<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Foot from '@/Components/Foot.vue';
//import "https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"

const props = defineProps({
    orders: {type:Object}
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>

  <body>

    <header
      class="text-center text-white masthead"
      style="background: url('assets/img/IMG-20230709-WA0017.jpg') left / cover"
    >
      <div
        class=""
        style=""
      ></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto position-relative">
            <h1
              class="mb-5"
              style=""
            >
              <strong>Mipyme "Viajando al futuro".</strong>
            </h1>
          </div>
        </div>
      </div>
    </header>
    <section
      class="text-center bg-light features-icons"
      style="border-radius: 0px; border-style: hidden"
    >
      <div
        class="table-responsive d-flex justify-content-center"
        style="padding-bottom: 0px; margin-bottom: 66px"
      >
      <table class="table w-50 table-bordered border-dark table-hover tabla tabla-oferta">
          <thead>
            <tr>

              <th>Ofertas</th>
              <th>Precios</th>
            </tr>
          </thead>

          <tbody v-if="orders && orders.length">
            <tr v-for="o in orders" :key="o.id">
              <td>{{ o.nombre }}</td>
              <td>{{ o.precio }}$</td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="3">No hay productos disponibles.</td>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 temblor">
            <div
              class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3"
              data-bss-hover-animate="swing"
              style="
                background: var(--bs-gray-200);
                box-shadow: 0px 0px 6px 1px;
                border-style: none;
                border-radius: 10px;
                padding-bottom: 55px;
              "
            >


              <div class="d-flex features-icons-icon">
                <i
                  class="icon-star m-auto text-primary"
                  data-bss-hover-animate="pulse"
                ></i>
              </div>
              <h3>Ofertas especiales</h3>
              <p class="lead mb-0">Happy Hours, descuentos, promociones</p>
            </div>
          </div>
          <div class="col-lg-4 temblor">
            <div
              class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3"
              data-bss-hover-animate="swing"
              style="
                background: var(--bs-gray-200);
                border-radius: 10px;
                box-shadow: 0px 0px 6px 1px;
                margin-bottom: 10px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                margin-left: 14px;
              "
            >
              <div class="d-flex features-icons-icon">
                <i
                  class="icon-music-tone-alt m-auto text-primary"
                  data-bss-hover-animate="pulse"
                ></i>
              </div>
              <h3 style="margin-right: 15px; margin-left: 8px">
                Entretenimiento en vivo
              </h3>
              <p
                class="lead mb-0"
                style="
                  margin-bottom: 8px;
                  padding-bottom: 19px;
                  margin-right: 7px;
                  margin-left: 10px;
                "
              >
                Musica, comedia, espectáculos de variedades
              </p>
            </div>
          </div>
          <div class="col-lg-4 temblor">
            <div
              class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3"
              data-bss-hover-animate="swing"
              style="
                box-shadow: 0px 0px 6px 1px;
                background: var(--bs-gray-200);
                padding-bottom: 83px;
                border-radius: 10px;
              "
            >
              <div class="d-flex features-icons-icon">
                <i
                  class="icon-home m-auto text-primary"
                  data-bss-hover-animate="pulse"
                ></i>
              </div>
              <h3>Espacios privados</h3>
              <p class="lead mb-0">Para eventos y reuniones</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row g-0">
          <div
            class="col-lg-6 text-white order-lg-2 showcase-img reveal fade-right "
            style="
              background: url('assets/img/pexels-flo-dahm-541216.jpg') center /
                cover;
              border-color: rgb(0, 0, 0);
              box-shadow: 0px 0px 6px 1px rgb(37, 36, 36);
            "
          >
            <span></span>
          </div>
          <div class="col-lg-6 my-auto order-lg-1 showcase-text reveal fade-left">
            <h2>Comida</h2>
            <p class="lead mb-0">
              Nuestros chefs expertos han creado un menú excepcional que ofrece
              una amplia variedad de platillos deliciosos y sabrosos para todos
              los gustos. Nuestros ingredientes frescos y de alta calidad se
              combinan para crear platillos que son simplemente
              irresistibles.&nbsp;
            </p>
          </div>
        </div>
        <div class="row g-0">
          <div
            class="col-lg-6 text-white showcase-img reveal fade-left"
            style="
              background: url('assets/img/pexels-valeria-boltneva-1200348.jpg')
                center / cover no-repeat;
              display: block;
              box-shadow: 0px 0px 6px 1px rgb(37, 36, 36);
            "
          >
            <span></span>
          </div>
          <div class="col-lg-6 my-auto order-lg-1 showcase-text reveal fade-right">
            <h2>Bebidas</h2>
            <p class="lead mb-0">
              Ofrecemos una amplia selección de cervezas frías, vinos finos y
              cócteles artesanales que complementarán perfectamente tu comida
            </p>
          </div>
        </div>
        <div class="row g-0">
          <div
            class="col-lg-6 text-white order-lg-2 showcase-img reveal fade-right"
            style="
              background: url('assets/img/pexels-feyza-simsek-16933554.jpg')
                center / cover no-repeat;
              box-shadow: 0px 0px 6px 1px rgb(37, 36, 36);
            "
          >
            <span></span>
          </div>
          <div class="col-lg-6 my-auto order-lg-1 showcase-text reveal fade-left">
            <h2>Eventos</h2>
            <p class="lead mb-0">
              En nuestro bar, siempre hay algo emocionante sucediendo. Desde
              noches de Karaoke y trivia hasta eventos deportivos y músicas en
              vivos&nbsp;
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="text-center bg-light testimonials">
      <div class="container">
        <h2 class="mb-5">Comentarios</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="mx-auto testimonial-item mb-5 mb-lg-0">
              <img
                class="rounded-circle img-fluid mb-3 mx-5"
                src="assets/img/testimonials-1.jpg"
              />
              <h5>Margaret E.</h5>
              <p class="font-weight-light mb-0">
                Excelente lugar para compartir en familia.
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="mx-auto testimonial-item mb-5 mb-lg-0">
              <img
                class="rounded-circle img-fluid mb-3 mx-5"
                src="assets/img/testimonials-2.jpg"
              />
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">
                "Me gusto, mucho este bar, un ambiente nocturno excelente, y
                mucha profesionalidad del personal"
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="mx-auto testimonial-item mb-5 mb-lg-0">
              <img
                class="rounded-circle img-fluid mb-3 mx-5"
                src="assets/img/testimonials-3.jpg"
              />
              <h5>Sarah W.</h5>
              <p class="font-weight-light mb-0">
                "Me encanta este lugar, buen trato, y calidad garantizada."
              </p>
            </div>
          </div>
        </div>
      </div>
      <footer class="text-center"></footer>
    </section>
<Foot></Foot>


  </body>
</template>



    </AuthenticatedLayout>
</template>
