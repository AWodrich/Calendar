<template>
    <div class="container mt-5">
        <div class="events-list">

            <div class="events-list__filter-bar">
                <!-- FilterBar for searching Events -->
                <div class="row">
                    <FilterBar
                        @change="setCategoryFilter"
                        :categories="categories"
                    />
                    <div
                        class="events-list__btn"
                        v-if="alterList"
                    >
                        <a href="#createEvent" class="text--lightblue btn btn-outline-light">New Entry</a>
                    </div>
                </div>

            </div>

            <div class="events-list__navigation-bar p-2">
                <!--  EventsList Navigation Bar -->
                <EventsListNavigation />
            </div>


            <!-- Event Item-->
            <div
                class="events-list__item p-2"
                v-if="filteredSportCategories(eventItem)"
                v-for="eventItem in list"
            >
                <Event :event-item="eventItem" />

                <span
                    v-if="alterList"
                    @click="removeItemFromDB(eventItem)"
                    class="btn btn-outline-dark"
                >Delete</span>
            </div>


            <CreateEvent @selectedDate="setEventDate" id="createEvent" v-if="alterList"/>


        </div>
    </div>

</template>

<script>
import Event from './Event';
import EventsListNavigation from './EventsListNavigation';
import FilterBar from './FilterBar';
import CreateEvent from './CreateEvent';



import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);


export default {
    name: 'EventsList',
    components: {
        FilterBar,
        Event,
        EventsListNavigation,
        CreateEvent
    },
    props: {
        events: {
            type: String,
            default: ''
        },
        alterList: {
            required: false
        }
    },
    data() {
        return {
            list: [],
            categories: [],
            currentSportCategory: null,
            eventDate: ''
        }

    },
    methods: {
        prepareFilterDropdownData() {
            // get disciplines only
            this.categories.push(this.list.map((item) => item.discipline.name));
            // remove all duplicates
            this.categories = [...new Set(this.categories[0])];
        },
        setCategoryFilter(value) {
            this.currentSportCategory = value;
        },

        filteredSportCategories(listItem) {
            if (this.currentSportCategory === 'All') {
                return true;
            }
            if (this.currentSportCategory == null) {
                return true;
            }
            else if (this.currentSportCategory !== null && listItem.discipline.name !== this.currentSportCategory) {
                return false;
            }
            else if (this.currentSportCategory !== null && this.currentSportCategory == listItem.discipline.name) {
                return true;
            }
        },
        removeItemFromDB(eventItem) {
            var self = this;
            this.$http.delete(`/admin/delete/${ eventItem.id }`)
                .then(function(data) {
                    console.log('event removed', data);
                }, function(error) {
                    // Error response from server.
                    alert('Something went wrong.');
                });
        },

        createEvent() {
            var self = this;

            let event = {
                date: this.eventDate || '',
            }
            this.$http.post('/admin/create-event', event)
                .then(function(data) {
                    console.log('event created', data);
                }, function(error) {
                    // Error response from server.
                    alert('Something went wrong.');
                });
        },
        setEventDate(value) {
            console.log('value of date', value)
            this.eventDate = value;
        }
    },
    mounted() {
        this.list = JSON.parse(this.events);
        this.prepareFilterDropdownData();
    }
}
</script>

