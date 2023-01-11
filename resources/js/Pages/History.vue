<script>
import moment from "moment";
moment.locale('pt-br');

export default {
    data() {
        return {
            moment: moment,
        }
    },

    props: {
        cars: Array,
    },
}

</script>

<template>

    <body class="h-screen bg-gradient-to-r from-indigo-300 to-purple-400">
        <div class="flex justify-between items-center">
            <div class="bg-stone-50 w-full h-20 mb-5 flex justify-between items-center">

                <div>
                    <button @click.prevent="$inertia.get('/cars')"
                        class="py-1 px-4 ml-5 mr-5 bg-indigo-400 hover:bg-indigo-600 rounded font-bold text-white">Voltar</button>
                </div>
                <div>
                    <h1 class="font-bold mr-28">Histórico de Alterações</h1>
                </div>
                <div>
                </div>
            </div>

        </div>
        <div class="flex justify-center mx-8">
            <table class="table-auto divide-y">
                <div class="bg-white bg-white rounded-md shadow-md divide-y">
                    <thead>
                        <tr>
                            <th class="px-20">Marca</th>
                            <th class="px-20">Modelo</th>
                            <th class="px-20">Placa</th>
                            <th class="px-20">Ano</th>
                            <th class="px-20">Cor</th>
                            <th class="px-20">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-base" v-for="car in cars" :key="car.id">
                            <td class="px-20 py-2">{{ car.brand.name }}</td>
                            <td class="px-20 py-2">{{ car.brand_model_id }}</td>
                            <td class="px-20 py-2">{{ car.license_plate }}</td>
                            <td class="px-20 py-2">{{ car.year }}</td>
                            <td class="px-20 py-2">{{ car.color }}</td>
                            <td class="px-20 py-2">{{ moment(car.created_at).fromNow() }}</td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </div>
    </body>
</template>