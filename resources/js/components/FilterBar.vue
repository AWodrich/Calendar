<template>
    <div class="">
        <VDropdown
            text="Categories"
            transition="slide-up"
            class="styled"
        >
            <nav>
                <ul v-for="item in categories">
                    <li>{{ item }}</li>
                </ul>
            </nav>
        </VDropdown>
    </div>
</template>

<script>
import { VDropdown } from 'vuetensils'

export default {
    name: 'FilterBar',
    props: {
        categories: {
            type: Array,
            default: []
        }
    },
    components: {
        VDropdown
    },
    computed: {
        getDropDownContent() {
            // return this.categories.reduce((unique, category) => {
            //     unique.includes(category) ? unique : [...unique, category], []
            // })

           //  console.log(this.categories);
           // [...new Set(this.categories)];
           //  console.log(this.categories);

        }
    },
    methods: {
        prepareDropDownContent() {
            console.log(this.categories);

        }
    },
    created() {
        console.log('this.categories', this.categories)
    }
}
</script>
