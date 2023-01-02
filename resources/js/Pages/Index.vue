<script>
import CarTable from './CarTable.vue';

export default {
    data() {
        return {
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

    <body class="h-screen bg-gradient-to-r from-cyan-500 to-blue-500">
        <div class="flex justify-center items-center">
            <div>
                <div class="flex justify-center items-center ">
                    <button @click="openForm()"
                        class="m-5 px-1 py-1 bg-white hover:bg-white-700 rounded font-bold">Adicionar Carro</button>
                    <input v-model="term" @keyup="search" placeholder="Pesquisar"
                        class="m-5 px-1 py-1 bg-white hover:bg-white-700 rounded font-bold">

                </div>
                <div class="flex flex-row">
                    <div v-if="open == true">
                        <form
                            @submit.prevent="form.post(('/cars/store'), { onSuccess: () => form.reset() }, { onError: () => alert('Error') })"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-52 mr-5">

                            <div>
                                <h1 class="text-xl font-bold mb-5">Adicionar Carro</h1>
                                <input type="text" v-model="form.name" name="name" placeholder="Nome"
                                    class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <input type="text" v-model="form.model" name="model" placeholder="Modelo"
                                    class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <input type="text" v-model="form.year" name="year" placeholder="Ano"
                                    class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <input type="text" v-model="form.color" name="color" placeholder="Cor"
                                    class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            </div>
                            <button type="submit"
                                class="py-1 px-3 bg-sky-500 hover:bg-sky-700 rounded font-bold text-white">Enviar</button>
                        </form>

                    </div>
                    <div>
                        <CarTable :cars="cars" />
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>

