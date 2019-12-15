<template>
    <div class="row">
        <div class="col-2">
            {{ eventItem.date }}
            {{ eventItem.time }}
        </div>
        <div class="col-1">
            {{ eventItem.discipline.name }}
        </div>
        <div class="col-5">
            <span class="px-1"> {{ eventItem.hometeam.name }} </span>
            <span>|</span>
            <span class="px-1"> {{ eventItem.outwardteam.name }} </span>
        </div>
        <div class="col-2">
            {{ eventItem.referee }}
        </div>

        <div class="col-2">
            {{ eventItem.location }}
        </div>

    </div>
</template>

<script>
export default {
    name: 'Event',
    props: {
        eventItem: {
            type: Object,
            default: {}
        }
    },
    computed: {
        getConvertedDateFormat() {
            return new Date(this.eventItem.date).toString();
        }
    }
}
</script>

