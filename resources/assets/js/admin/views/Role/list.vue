<template>
    <div class="show-items">
        <p class="text-info">Role</p>
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Example Form
            </div>
            <b-form>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="text" placeholder="Username"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-user"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                </b-form-group>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="email" placeholder="Email" autocomplete="email"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-envelope"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                </b-form-group>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="password" placeholder="Password" autocomplete="current-password"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-asterisk"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                </b-form-group>
                <div class="form-group form-actions">
                <b-button type="submit" class="btn btn-sm btn-secondary">Submit</b-button>
                </div>
            </b-form>
            </b-card>
        </b-col>
    </div>
</template>

<script>
export default {
  name: "role-list"
};
</script>
