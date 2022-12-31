<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                name: this.car.name,
                model: this.car.model,
                year: this.car.year,
                color: this.car.color,
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

    <div class="flex justify-center">
        <div>
            <form @submit.prevent="updateCar()" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                <div>
                    <h1 class="text-xl font-bold mb-5">Edit Car</h1>
                    <input type="text" v-model="form.name" name="name" placeholder="Name"
                        class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <input type="text" v-model="form.model" name="model" placeholder="Model"
                        class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <input type="text" v-model="form.year" name="year" placeholder="Year"
                        class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <input type="text" v-model="form.color" name="color" placeholder="Color"
                        class="mb-5 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                </div>
                <button type="submit"
                    class="py-1 px-3 bg-sky-500 hover:bg-sky-700 rounded font-bold text-white">Submit</button>
            </form>
        </div>
    </div>

</template>