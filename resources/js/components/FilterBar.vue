<template>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <select
                    class="form-control form-control--brand-red"
                    v-model="filteredData"
                >
                    <option value="" disabled selected>Select Category</option>
                    <option
                        :value="item"
                        v-for="item in categories"
                    >{{ item }}
                    </option>
                    <option
                        value="All"
                    >All
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'FilterBar',
    props: {
        categories: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            currentSportCategory: null,

        }
    },
    computed: {
        filteredData: {
            get () {
                return this.value
            },
            set (newValue) {
                this.$emit('change', newValue )
            }
        }
    },
}
</script>
