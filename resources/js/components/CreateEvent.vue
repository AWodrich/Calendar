<template>
    <div class="container">
        <form
            class="my-5 create-form"
            id="createEvent"
            action="post"
        >

            <h3 class="flow-text text--lightblue mt-3">Event</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <select
                        class="form-control form-control--brand-red"
                        v-model="selectedCategory"
                        id="selectedCategory"
                        name="selectedCategory"
                    >
                        <option
                            value=""
                            disabled
                            selected
                        >Select Category
                        </option>
                        <option
                            :value="item"
                            v-for="item in categories"
                        >{{ item }}
                        </option>
                    </select>
                </div>
            </div>


            <h3 class="flow-text text--lightblue mt-3">Date & Time</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label
                        class="create-form__label"
                        for="eventDate"
                    >Date</label>
                    <vuejs-datepicker
                        class="form-control"
                        :value="date"
                        id="eventDate"
                        name="eventDate"
                        v-model="date"
                    ></vuejs-datepicker>
                </div>
                <div class="col-6 mb-3">
                    <label
                        class="create-form__label"
                        for="eventTime"
                    >Time</label>
                    <input
                        class="form-control"
                        v-model="time"
                        id="eventTime"
                        name="eventTime"
                        type="time"
                    >
                </div>
            </div>

            <h3 class="flow-text text--lightblue mt-3">Teams</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label
                        class="create-form__label"
                        for="home"
                    >Home</label>
                    <input
                        v-model="homeTeam"
                        id="home"
                        name="home"
                        class="form-control"
                        type="text"
                        placeholder="Home Team"
                    >
                </div>
                <div class="col-6 mb-3">
                    <label
                        class="create-form__label"
                        for="eventDate"
                    >Outward</label>
                    <input
                        v-model="outwardTeam"
                        id="outward"
                        name="outward"
                        class="form-control"
                        type="text"
                        placeholder="Outward Team"
                    ></div>
            </div>


            <h3 class="flow-text text--lightblue mt-3">Referee</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label
                        class="create-form__label"
                        for="referee"
                    >Referee</label>
                    <input
                        v-model="referee"
                        id="referee"
                        name="referee"
                        class="form-control"
                        type="text"
                        placeholder="Referee"
                    ></div>
            </div>


            <h3 class="flow-text text--lightblue mt-3">Location</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label
                        class="create-form__label"
                        for="eventLocation"
                    >Location</label>
                    <input
                        v-model="location"
                        id="eventLocation"
                        name="eventLocation"
                        class="form-control"
                        type="text"
                        placeholder="Location"
                    >
                </div>
            </div>


            <div
                class="btn btn-outline-light btn--primary"
                @click="submit()"
            >Submit
            </div>
        </form>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
    name: 'CreateEvent',
    components: {
        'vuejs-datepicker': Datepicker
    },
    props: {
        categories: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            date: new Date(),
            time: '',
            location: '',
            referee: '',
            homeTeam: '',
            outwardTeam: '',
            name: '',
            category: ''
        }
    },
    methods: {
        submit() {
            this.$emit('createdEvent', {
                date: this.date,
                time: this.time,
                location: this.location,
                referee: this.referee,
                home_team: this.homeTeam,
                outward_team: this.outwardTeam,
                category: this.category
            })
        }
    },
    computed: {
        selectedCategory: {
            get() {
                return this.value
            },
            set(newValue) {
                this.category = newValue;
            }
        }
    },
}
</script>

