<template>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label
                    class="filter-bar filter-bar__label"
                    for="filteredData"
                ><strong>Select Category</strong></label>

                <select
                    class="form-control form-control--brand-red"
                    v-model="filteredData"
                    id="filteredData"
                    name="filteredData"
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
