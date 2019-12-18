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
                    <label class="create-form__label" for="eventName">Event</label>
                    <input class="form-control" name="eventName" id="eventName" type="text">
                </div>
            </div>


            <h3 class="flow-text text--lightblue mt-3">Date & Time</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="create-form__label" for="eventDate">Date</label>
                    <vuejs-datepicker class="form-control" :value="date" id="eventDate" name="eventDate" @model="date"
                                      @selected="selectDate"></vuejs-datepicker>
                </div>
                <div class="col-6 mb-3">
                    <label class="create-form__label" for="eventTime">Time</label>
                    <input class="form-control" @model="time" id="eventTime" name="eventTime" type="time">
                </div>
            </div>

            <h3 class="flow-text text--lightblue mt-3">Teams</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="create-form__label" for="home">Home</label>
                    <input id="home" name="home" class="form-control"
                    type="text"
                    placeholder="Home Team"
                >
                </div>
                <div class="col-6 mb-3">
                    <label class="create-form__label" for="eventDate">Outward</label>
                    <input id="outward" name="outward" class="form-control"
                    type="text"
                    placeholder="Outward Team"
                ></div>
            </div>


            <h3 class="flow-text text--lightblue mt-3">Referee</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="create-form__label" for="referee">Referee</label>
                    <input id="referee" name="referee" class="form-control"
                    type="text"
                    placeholder="Referee"
                ></div>
            </div>


            <h3 class="flow-text text--lightblue mt-3">Location</h3>
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="create-form__label" for="eventLocation">Location</label>
                    <input id="eventLocation" name="eventLocation" class="form-control"
                           type="text"
                           placeholder="Location"
                    >
                </div>
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
    data() {
        return {
            date: new Date(),
            time: ''
        }
    },
    methods: {
        selectDate() {
            this.$emit('selectedDate', this.date.toLocaleDateString("en-US"))
        },

    }
}
</script>

