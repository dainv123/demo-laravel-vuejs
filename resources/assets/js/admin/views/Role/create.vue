<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Create Role
            </div>
            <b-form>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="text" placeholder="Title"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                </b-form-group>
                <div class="form-group form-actions">
                <b-link class="btn btn-danger" :to="'list'">Cancel</b-link>
                <b-button type="submit" variant="primary">Create</b-button>
                </div>
            </b-form>
            </b-card>
        </b-col>
    </div>
</template>

<script>
export default {
  name: "role-create",
  methods: {}
};
</script>
