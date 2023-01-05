<script>
import CarTable from './CarTable.vue';

export default {
    data() {
        return {
            show: true,
            term: '',
            open: false,
            form: this.$inertia.form({
                name: '',
                model: '',
                year: '',
                model: '',
                color: '',
            }),
        }
    },
    props: {
        cars: Array,
        user: Array,
    },
    components: {
        CarTable,
    },
    methods: {
        openForm() {
            const open = this.open;
            open == true ? this.open = false : this.open = true;
        },
        search() {
            this.$inertia.get('/cars', { term: this.term }, { preserveState: true });
        },
    },
}
</script>

<template>

    <body class="h-screen bg-gradient-to-r from-indigo-300 to-purple-400">
        <div class="flex justify-center items-center">
            <div class="mb-5 w-full">
                <div class="bg-stone-50 w-full h-20 mb-5 flex justify-between items-center">

                    <div>
                        <button @click="openForm()"
                            class="m-4 px-1 py-1 bg-green-600 shadow-sm hover:bg-green-700  rounded text-white font-bold h-8 items-center">Adicionar
                            Carro</button>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-6 absolute mt-5 ml-52">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>

                        <input v-model="term" @keyup="search" placeholder="Pesquisar"
                            class="m-4 px-1 py-1 bg-zinc-100 rounded shadow-sm font-bold">
                    </div>

                    <div>
                        <div class="m-4 px-3 rounded font-bold flex h-8 items-center">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="mt-0.5 mr-1 w-5 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg> -->
                            <t-dropdown>
                                <div slot="trigger" slot-scope="{mousedownHandler}">
                                    <button id="user-menu" aria-label="User menu" aria-haspopup="true"
                                        class="text-gray-700 flex" @mousedown="mousedownHandler"> {{ user.name }}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="mt-1 ml-1 w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg></button>

                                </div>



                                <div slot-scope="{ hide, blurHandler }">
                                    <button
                                        class="block w-20 px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                        role="menuitem" @blur="blurHandler">
                                        <a href="/logout">Sair</a>
                                    </button>
                                </div>
                            </t-dropdown>

                        </div>
                    </div>



                </div>
                <!--  -->
                <div v-if="open == true" class="flex justify-center">
                    <form @submit.prevent="form.post(('/cars/store'), { onSuccess: () => form.reset() })">

                        <div class="flex bg-stone-50 rounded mb-5 gap-3 pt-5 px-2">
                            <input type="text" autocomplete="off" v-model="form.name" name="name" placeholder="Nome"
                                class="bg-zinc-100 mb-5 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            <input type="text" autocomplete="off" v-model="form.model" name="model" placeholder="Modelo"
                                class="bg-zinc-100 mb-5 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            <input type="text" autocomplete="off" v-model="form.year" name="year" placeholder="Ano"
                                class="bg-zinc-100 mb-5 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            <input type="text" autocomplete="off" v-model="form.color" name="color" placeholder="Cor"
                                class="bg-zinc-100 mb-5 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            <div>
                                <button type="submit"
                                    class="py-1 px-3 mt-1 bg-green-600 hover:bg-green-700 rounded font-bold text-white">Enviar</button>
                            </div>
                        </div>

                    </form>

                </div>
                <div>
                    <CarTable :cars="cars" />
                </div>

            </div>
        </div>
    </body>
</template>

