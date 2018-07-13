<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
                <div slot="header">
                    <i class="fa fa-opencart" />
                    Create User 
                </div>
                <b-form-group>
                    <b-input-group>
                        <b-form-input type="email" placeholder="Email" v-validate="'required|email'" name="email" v-model="email"></b-form-input>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                    <span style="color: red" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                </b-form-group>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="password" placeholder="Password" v-validate="'required'" name="password" v-model="password"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('password')">{{ errors.first('password') }}</span>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="password" placeholder="Confirm Password" v-validate="'required'" name="repassword" v-model="repassword"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('repassword')">{{ errors.first('repassword') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="text" placeholder="First Name" v-validate="'required'" name="firstname" v-model="firstname"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('firstname')">{{ errors.first('firstname') }}</span>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="text" placeholder="Last Name" v-validate="'required'" name="lastname" v-model="lastname"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('lastname')">{{ errors.first('lastname') }}</span>
                    </b-form-group>
                </div>

                <div class="row">
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                            <b-form-select v-model="role.selected" v-html="role.options">
                            </b-form-select>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                            <b-form-select v-model="sex.selected" :options="sex.options">
                            </b-form-select>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                            <b-form-input type="date" placeholder="birthday" v-validate="'required'" name="birthday" v-model="birthday"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('birthday')">{{ errors.first('birthday') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                          <b-form-group label="Status:">
                            <b-form-radio-group v-model="status.selected" :options="status.options">
                            </b-form-radio-group>
                          </b-form-group>
                        </b-input-group>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                      <b-input-group>
                          <b-form-group label="Subscribe:">
                            <b-form-radio-group v-model="subscribe.selected" :options="subscribe.options">
                            </b-form-radio-group>
                          </b-form-group>
                        </b-input-group>
                    </b-form-group>
                </div>
                <div class="form-group form-actions">
                    <b-link class="btn btn-danger" :to="{ name: 'List User'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="create">Create</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "user-create",
  data() {
    return {
      email: "",
      password: "",
      repassword: "",
      firstname: "",
      lastname:"",
      role: {selected: 1, options: ''},
      status: {selected: 'inactive', options: [{text: 'active', value: 'active'},{text: 'inactive', value: 'inactive'}]},
      subscribe: {selected: 'inactive', options: [{text: 'active', value: 'active'},{text: 'inactive', value: 'inactive'}]},
      sex: {selected: 'male', options: [{ value: 'male', text: 'Sex, Default: Male.' },{ value: 'male', text: 'Male' },{ value: 'Female', text: 'Female' }]},
      birthday: ""
    };
  },
  mounted() {
    this.get_list_parent();
  },
  methods: {
    get_list_parent() {
      this.url = "/api/role/";
      Axios.get(this.url)
        .then(response => {
          this.role.options = '<option value="3">Role, Default: User.</option>';
          response.data.data.forEach(element => {
            this.role.options = this.role.options+'<option value="'+element.id+'">'+element.title+'</option>';  
          });
        })
        .catch(function(error) {
          console.error(error);
      });
    },
    create() {
      swal({
        title: "Are you sure?",
        text: "Are you create",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_create = { 
            email: this.email, 
            password: this.password, 
            repassword: this.repassword, 
            firstname: this.firstname, 
            lastname: this.lastname, 
            role: this.role.selected, 
            sex: this.sex.selected, 
            birthday: this.birthday ,
            status: this.status.selected,
            subscribe: this.subscribe.selected
          };
          var url_create = "/api/user/create";
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_create, data_create)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push({ name: 'List User'});
                    swal("Create Success!", "Create success!", "success");
                  } else swal("Oops!", "Create Faild!", "error");
                })
                .catch(function(error) {
                  swal("Oops!", "Create Faild!", "error");
                  e.preventDefault();
                  console.error(error);
                });
            } else swal("Oops!", "Create Faild!", "error");
          });
        }
      });
    }
  }
};
</script>
