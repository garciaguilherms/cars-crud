import './bootstrap';
import '../css/app.css';
import Vue from 'vue'
import VueTailwind from 'vue-tailwind'
import { TDropdown } from 'vue-tailwind/dist/components'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCalendar } from '@fortawesome/free-regular-svg-icons'
import { faDroplet } from '@fortawesome/free-solid-svg-icons';


library.add(faDroplet, faCalendar,)

Vue.component('font-awesome-icon', FontAwesomeIcon)

const settings = {
  't-dropdown': {
    component: TDropdown,
    props: {
      button: 'block px-4 py-2 text-white transition duration-100 ease-in-out bg-blue-500 border border-transparent rounded shadow-sm hover:bg-blue-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed',
      wrapper: 'inline-flex flex-col',
      dropdownWrapper: 'relative z-10',
      dropdown: 'origin-top-left absolute left-0 w-56 rounded shadow bg-white mt-1',
      enterClass: 'opacity-0 scale-95',
      enterActiveClass: 'transition transform ease-out duration-100',
      enterToClass: 'opacity-100 scale-100',
      leaveClass: 'opacity-100 scale-100',
      leaveActiveClass: 'transition transform ease-in duration-75',
      leaveToClass: 'opacity-0 scale-95',
    }
  }
}

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    Vue.use(plugin)
    Vue.use(VueTailwind, settings)

    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})