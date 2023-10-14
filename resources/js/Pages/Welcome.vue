<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import api from '@/Services/server'

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const form = useForm({
    type: '',
    name: '',
    email: '',
    phone: ''
})

const state = reactive({
    errors: []
})

const submit = () => {
    verifyField(form)
    const url = import.meta.env.VITE_BASE_API
    api.post(url + 'form/proposal', form)
    .then(res => {
        console.log(res)
        router.post('formulario/termos', res, {
            preserveScroll: (res) => Object.keys(res).length,
        })
    })
    .catch(err => {
        console.log({err})
    })
};

const verifyField = (errors) => {
    if (!form.name || !form.type || !form.email || !form.phone) {
        state.errors.push('Todos os campos são obritarórios');
    }
    setTimeout(() => {
        state.errors = []
    }, 2300);
}
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter
         dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Register</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_ea.jpg" alt=""
                    style="width: 350px;">
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 lg:gap-8">

                    <div class="w-full sm:w-auto shadow-lg mx-auto rounded-xl bg-white" x-data="creditCard">
                        <p v-if="state.errors.length" 
                            class="font-regular relative block w-full rounded-lg bg-error p-4 text-base leading-5 text-white opacity-100">
                            <b>Ops! Algo deu errado.</b>
                            <ul>
                            <li v-for="error in state.errors">{{ error }}</li>
                            </ul>
                        </p>
                        <form @submit.prevent="submit">
                            <main class="mt-4 p-4">
                                <h1 class="text-xl font-semibold text-gray-700 text-center">
                                    O jeito mais fácil de alugar um imóvel.</h1>
                                <div class="">
                                    <div class="mb-2  text-center">
                                        <label for="" class="text-gray-700">Quem é o principal inquilino?</label>
                                    </div>
                                    <select name="typeRentalUser"
                                        class="form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                        v-model="form.type">
                                        <option value="" selected disabled>--Selecione--</option>
                                        <option value="Pessoa Física">Pessoa Física</option>
                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>

                                    </select>
                                    <div class="my-3">
                                        <input type="text"
                                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="Nome Completo" maxlength="22" v-model="form.name" />
                                    </div>
                                    <div class="my-3">
                                        <input type="email"
                                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="E-mail" maxlength="256" v-model="form.email" />
                                    </div>
                                    <div class="my-3">
                                        <input type="text"
                                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="Telefone de contato" v-model="form.phone" v-mask-phone.br
                                            maxlength="15" />
                                    </div>

                                </div>
                            </main>
                            <footer class="mt-6 p-4">
                                <button
                                    class="px-4 py-3 rounded-full bg-blue-300 text-blue-900 focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                                    Continuar
                                </button>
                            </footer>
                        </form>
                    </div>

                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/sponsors/taylorotwell"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
