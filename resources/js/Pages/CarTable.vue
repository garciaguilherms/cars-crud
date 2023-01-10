<script>
export default {
    data() {
        return {
            user: this.$page.props.user,
        }
    },
    props: {
        cars: Array,
    },

    methods: {
        deleteCar(car) {
            this.$inertia.post('/cars/' + car.id, {
                _method: 'DELETE'
            });
        },
        historyCar(car) {
            this.$inertia.get('/cars/' + car.id + '/history');
        },
        moreInfo(car) {
            this.$inertia.get('/cars/' + car.id + '/more');
        }
    },
}
</script>

<template>
    <div>

        <body class="w-screen flex justify-center">
            <table class="table-auto divide-y">
                <div class="bg-white bg-white rounded-md shadow-md divide-y">
                    <thead>
                        <tr>
                            <th class="px-20">Marca</th>
                            <th class="px-20">Modelo</th>
                            <th class="px-20">Ano</th>
                            <th class="px-20">Cor</th>
                            <th class="px-20">Criador</th>
                            <th class="px-20">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="text-base" v-for="car in cars" :key="car.id">
                            <td class="px-20 py-2">{{ car.brand.name }}</td>
                            <td class="px-20 py-2">{{ car.model }}</td>
                            <td class="px-20 py-2">{{ car.year }}</td>
                            <td class="px-20 py-2">{{ car.color }}</td>
                            <td class="px-20 py-2">{{ car.user.name }}</td>
                            <div class="flex w-full justify-center space-x-3 mt-1">
                                <td>
                                    <button v-if="car.user_id == user.id"
                                        class="border px-1 py-1 bg-sky-500 hover:bg-sky-700 rounded font-bold text-white">
                                        <a :href="`/cars/${car.id}`">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>
                                    </button>

                                    <button v-if="car.user_id == user.id" @click="deleteCar(car)" class=" border-0 outline-0 border px-1 py-1 bg-red-500 hover:bg-red-700 rounded
                                        font-bold text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>

                                    <button @click="historyCar(car)"
                                        class="border-0 outline-0 border px-1 py-1 bg-gray-500 hover:bg-gray-700 rounded font-bold text-white"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>

                                    <button @click="moreInfo(car)"
                                        class="border-0 outline-0 border px-1 py-1 bg-purple-500 hover:bg-purple-700 rounded font-bold text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>

                                    </button>
                                </td>
                            </div>
                        </tr>
                    </tbody>
                </div>
            </table>
        </body>
    </div>
</template>