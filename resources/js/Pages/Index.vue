<script>
import CarTable from './CarTable.vue';

export default {
    data() {
        return {
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
    },
}
</script>

<template>
    <div class="flex justify-center">
        <div>
            <button @click="openForm()"
                class="py-1 px-3 bg-sky-500 hover:bg-sky-700 rounded font-bold text-white">Add
                Car</button>

            <div v-if="open == true">
                <form
                    @submit.prevent="form.post(('/cars/store'), { onSuccess: () => form.reset() }, { onError: () => alert('Error') })"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                    <div>
                        <h1 class="text-xl font-bold mb-5">Add Car</h1>
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

            <div v-else>
            </div>

            <CarTable :cars="cars" />
        </div>
    </div>

</template>

