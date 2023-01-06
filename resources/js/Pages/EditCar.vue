<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                name: this.car.name,
                model: this.car.model,
                year: this.car.year,
                color: this.car.color,
                description: this.car.description,
            }),
        }
    },
    props: {
        car: Object,
    },
    methods: {
        updateCar() {
            this.form.put((`/cars/${this.car.id}`), { onSuccess: () => this.form.reset() }, { onError: () => alert('Error') })
        }
    },

}
</script>

<template>

    <body
        class="h-screen bg-gradient-to-r from-indigo-300 to-purple-400 items-center flex justify-center content-center">
        <div class=" flex justify-center">
            <div>
                <form @submit.prevent="updateCar()" class="m-5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-80">

                    <div>
                        <h1 class="text-xl font-bold mb-5">Editar Carro</h1>
                        <input type="text" v-model="form.name" name="name" placeholder="Nome"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" v-model="form.model" name="model" placeholder="Modelo"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" v-model="form.year" name="year" placeholder="Ano"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" v-model="form.color" name="color" placeholder="Cor"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <input type="text" v-model="form.description" name="description" placeholder="Descrição"
                            class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                    </div>
                    <button type="submit"
                        class="py-1 px-3 bg-indigo-400 hover:bg-indigo-600 rounded font-bold text-white">Atualizar</button>
                </form>
            </div>
        </div>
    </body>

</template>