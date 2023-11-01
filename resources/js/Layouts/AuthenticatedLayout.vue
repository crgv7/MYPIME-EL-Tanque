<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);

const logout = () => {
  history.pushState(null, null, window.location.href);
  
  // Asegúrate de que el usuario no pueda volver atrás utilizando el botón "Atrás" del navegador
  window.addEventListener('popstate', function(event) {
    history.pushState(null, null, window.location.href);
  });
};





</script>

<template>
  <div>
    <div class="min-h-screen">
      <nav class="bg-gray-300 border-b">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <NavLink
                  class="text-dark fs-5"
                  style="text-decoration: none"
                  :href="route('dashboard')"
                  :active="route().current('dashboard')"
                >
                  Inicio
                </NavLink>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <NavLink
                  class="text-dark fs-5 active"
                  style="text-decoration: none"
                  v-if="$page.props.auth.user.roles.includes('cliente')"
                  :href="route('reservations.index')"
                  :active="route().current('reservations.index')"
                >
                  Reservaciones
                </NavLink>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <NavLink
                  class="text-dark fs-5 active"
                  style="text-decoration: none"
                  v-if="$page.props.auth.user.roles.includes('cliente')"
                  :href="route('contacts.index')"
                  :active="route().current('contacts.index')"
                >
                  Contacto
                </NavLink>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <!-- v-if para mostrar segun los roles en este caso admin-->
                <NavLink
                  class="text-dark fs-5"
                  style="text-decoration: none"
                  v-if="$page.props.auth.user.roles.includes('admin')"
                  :href="route('orders.index')"
                  :active="route().current('orders.index')"
                >
                  Ofertas
                </NavLink>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <!-- v-if para mostrar segun los roles en este caso admin-->
                <NavLink
                  class="text-dark fs-5"
                  style="text-decoration: none"
                  v-if="$page.props.auth.user.roles.includes('admin')"
                  :href="'/showcontacts'"
                  :active="route().current('contacts.show')"
                >
                  Opiniones
                </NavLink>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <NavLink
                  class="text-dark fs-5"
                  style="text-decoration: none"
                  v-if="$page.props.auth.user.roles.includes('admin')"
                  :href="route('users.index')"
                  :active="route().current('users.index')"
                >
                  Usuarios
                </NavLink>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <NavLink
                  class="text-dark fs-5"
                  style="text-decoration: none"
                  v-if="$page.props.auth.user.roles.includes('admin')"
                  :href="route('reservations.all_reservation')"
                  :active="route().current('reservations.all_reservation')"
                >
                  Ver reservaciones
                </NavLink>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="user"><g fill="#2b4255" transform="translate(838 -946.115)"><circle cx="-830" cy="950.126" r="4"></circle><path d="M-823.997 959.123v2.982h-12.006v-2.982"></path><path d="M-823.997 959.598v-2.19c0-1.264-1.116-2.282-2.502-2.282h-7.002c-1.386 0-2.502 1.018-2.502 2.282v2.19"></path></g></svg>
              <!-- Settings Dropdown -->
              <div class="ml-3 relative">
                
                <Dropdown align="right" width="48">
                  <template #trigger>
                    <span class="inline-flex rounded-md">
                      <button
                        type="button"
                        class="inline-flex items-center px-3 py-2 fs-5 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                      >
                        {{ $page.props.auth.user.name }}

                        <svg
                          class="ml-2 -mr-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <DropdownLink class="fs-5" :href="route('profile.edit')">
                      Perfil
                    </DropdownLink>
                    <DropdownLink
                      class="fs-5"
                      :href="route('logout')"
                      method="post"
                      as="button"
                      @click="logout()"
                    >
                      Desconectarse
                    </DropdownLink>
                  </template>
                </Dropdown>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
              <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
              >
                <svg
                  class="h-6 w-6"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    :class="{
                      hidden: showingNavigationDropdown,
                      'inline-flex': !showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                    :class="{
                      hidden: !showingNavigationDropdown,
                      'inline-flex': showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink
              :href="route('dashboard')"
              :active="route().current('dashboard')"
            >
              Dashboard
            </ResponsiveNavLink>
          </div>

          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink
              :href="route('orders.index')"
              :active="route().current('orders.index')"
            >
              Ofertas
            </ResponsiveNavLink>
          </div>

          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink
              :href="route('reservations.index')"
              :active="route().current('reservations.index')"
            >
              Reservaciones
            </ResponsiveNavLink>
          </div>

          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink
              :href="route('contacts.index')"
              :active="route().current('contacts.index')"
            >
              Contacto
            </ResponsiveNavLink>
          </div>

          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
              <div
                class="font-medium text-base text-gray-800 dark:text-gray-200"
              >
                {{ $page.props.auth.user.name }}
              </div>
              <div class="font-medium text-sm text-gray-500">
                {{ $page.props.auth.user.email }}
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <ResponsiveNavLink :href="route('profile.edit')">
                Profile
              </ResponsiveNavLink>
              <ResponsiveNavLink
                :href="route('logout')"
                method="post"
                as="button"
              >
                Log Out
              </ResponsiveNavLink>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
        <div class="">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot />
      </main>
    </div>
  </div>
</template>
