<template>
    <div class="events-list">

        <div class="events-list__navigation-bar p-2">
            <!--  EventsList Navigation Bar -->
            <EventsListNavigation />
        </div>
    </div>

</template>

<script>
import EventsListNavigation from './EventsListNavigation';

export default {
    name: 'SportEvents',
    components: {
        EventsListNavigation
    },
}
</script>

