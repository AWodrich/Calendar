<template>
    <div class="container mt-5">
        <div class="events-list">
            <!-- Header -->
            <div class="row justify-content-center mb-4 text-light">
                <h1 class="heading--main heading">Sports Events 2020</h1>
            </div>

            <div class="events-list__navigation-bar p-2">
                <!--  EventsList Navigation Bar -->
                <EventsListNavigation />
                <!-- FilterBar for searching Events -->
                <FilterBar :categories="categories" />
            </div>


            <!-- Event Item-->
            <div
                class="events-list__item p-2"
                v-for="eventItem in list"
            >
                <Event :event-item="eventItem" />
            </div>

        </div>
    </div>

</template>

<script>
import Event from './Event';
import EventsListNavigation from './EventsListNavigation';
import FilterBar from './FilterBar'

export default {
    name: 'EventsList',
    components: {
        FilterBar,
        Event,
        EventsListNavigation
    },
    props: {
        events: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            list: [],
            categories: []
        }

    },
    methods: {
        prepareFilterDropdownData() {
            // get disciplines only
            this.categories.push(this.list.map((item) => item.discipline.name));
            // remove all duplicates
            this.categories = [...new Set(this.categories[0])];
        }
    },
    mounted() {
        this.list = JSON.parse(this.events);
        this.prepareFilterDropdownData();
    }
}
</script>

