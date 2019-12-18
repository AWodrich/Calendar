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
                        v-if="adminMode"
                    >
                        <div
                            v-scroll-to="'#createEvent'"
                            class="text--lightblue btn btn-outline-light"
                        >New Entry
                        </div>
                    </div>
                </div>

            </div>

            <div class="events-list__navigation-bar px-4 py-2">
                <!--  EventsList Navigation Bar -->
                <EventsListNavigation />
            </div>


            <!-- Event Item-->
            <div
                class="events-list__item p-4"
                v-if="filteredSportCategories(eventItem)"
                v-for="eventItem in list"
            >
                <Event :event-item="eventItem" />

                <span
                    v-if="adminMode"
                    @click="removeItemFromDB(eventItem)"
                    class="btn btn-outline-dark"
                >Delete</span>
            </div>


            <CreateEvent
                @createdEvent="createEvent"
                :categories="categories"
                id="createEvent"
                v-if="adminMode && !successMessage"
            />
            <transition name="fade">
                <div
                    class="flow-text text--lightblue mt-5"
                    v-if="successMessage"
                >Event successfully created
                </div>
            </transition>


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
        CreateEvent,
    },
    props: {
        events: {
            type: String,
            default: ''
        },
        adminMode: {
            required: false
        }
    },
    data() {
        return {
            list: [],
            categories: [],
            currentSportCategory: null,
            eventDate: '',
            successMessage: false
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
                    location.reload();
                }, function(error) {
                    // Error response from server.
                    alert('Something went wrong.');
                });
        },

        createEvent(event) {
            var self = this;

            this.list.map(item => {
                if (item.discipline.name === event.category) {
                    event.discipline_id = item.discipline.id;
                }
            })

            this.$http.post('/admin/create-event', event)
                .then(function(data) {
                    self.successMessage = true;
                }, function(error) {
                    // Error response from server.
                    alert('Something went wrong.');
                });
        },

    },
    mounted() {
        this.list = JSON.parse(this.events);
        this.prepareFilterDropdownData();
    }
}
</script>

