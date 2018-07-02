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
                <b-button type="submit" variant="danger">Cancel</b-button>
                <b-button type="submit" variant="primary">Edit</b-button>
                </div>
            </b-form>
            </b-card>
        </b-col>
    </div>
</template>

<script>
export default {
  name: "role-edit"
};
</script>
