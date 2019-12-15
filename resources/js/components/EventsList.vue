<template>
    <div class="container mt-5">
        <div class="events-list">
            <!-- Header -->
            <div class="row justify-content-center mb-4 text-light">
                <h1 class="heading--main heading">Sports Events 2020</h1>
            </div>

            <div class="events-list__filter-bar">
                <!-- FilterBar for searching Events -->
                <FilterBar
                    @change="setCategoryFilter"
                    :categories="categories"
                />
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
                <transition name="slide-fade">
                    <Event :event-item="eventItem" />
                </transition>

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
            categories: [],
            currentSportCategory: null,
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
    },
    mounted() {
        this.list = JSON.parse(this.events);
        this.prepareFilterDropdownData();
    }
}
</script>

