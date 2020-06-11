<template>
    <div class="form-group row">
        <select v-model="activity" @change="fetchTeams">
            <option value="" selected disabled>-- Välj aktivitet --</option>
            <option v-for="activity in activities" :key="activity.id" :value="activity.id">{{ activity.activity }}</option>
        </select>

        <select name="team_id" v-if="teams">
            <option selected disabled>-- Välj lag--</option>
            <option v-for="team in teams" :key="team.id" :value="team.id">{{ team.teamName }}</option>
        </select>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                activity: '',
                teams: null
            }
        },
        methods: {
            fetchTeams() {
                axios.get(`/api/teams/${this.activity}`)
                .then(response => {
                    this.teams = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
        props: {
            activities: {
                type: Array,
                required: true
            }
        }
    }
</script>
