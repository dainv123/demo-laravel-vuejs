<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
                <div slot="header">
                    <i class="fa fa-opencart" />
                    Edit User 
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
                        </b-input-group>
                    </b-form-group>
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                          <b-form-select v-model="sex.selected" :options="sex.options">
                          </b-form-select>
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
                    <b-button type="submit" variant="primary" @click="edit(id)">Edit</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "user-edit",
  data() {
    return {
        email: "",
        firstname: "",
        lastname:"",
        role: {selected: 1, options: ''},
        status: {selected: 'inactive', options: [{text: 'active', value: 'active'},{text: 'inactive', value: 'inactive'}]},
        subscribe: {selected: 'inactive', options: [{text: 'active', value: 'active'},{text: 'inactive', value: 'inactive'}]},
        sex: {selected: 'male', options: [{ value: 'male', text: 'Male' },{ value: 'female', text: 'Female' }]},
        birthday: ""
      };
  },
  mounted() {
    this.get_item();
  },
  methods: {
    get_list_role(id) {
        this.url = "api/role/";
        Axios.get(this.url)
          .then(response => {
            this.role.options = '';
            response.data.data.forEach(element => {
              if(element.id == id)
                this.role.options = this.role.options+'<option value="'+element.id+'" selected>'+element.title+'</option>';  
              else
                this.role.options = this.role.options+'<option value="'+element.id+'">'+element.title+'</option>';  
            });
          })
          .catch(function(error) {
            console.error(error);
        });
      },
    get_item(){
        this.id = this.$route.params.id;
        this.url_edit = "api/user/edit/" + this.id;
        Axios.get(this.url_edit)
          .then(response => {
            console.log("response", response.data);
            this.email = response.data.email;
            this.password =  response.data.password;
            this.repassword = response.data.repassword;
            this.firstname = response.data.firstname;
            this.lastname = response.data.lastname;
            this.role.selected = response.data.role_id;
            this.status.selected = response.data.status;
            this.sex.selected = response.data.sex;
            console.log(this.sex);
            this.subscribe.selected = response.data.subscribe;
            this.birthday = response.data.birthday;
            this.get_list_role(response.data.role_id);
          })
          .catch(function(error) {
            console.error(error);
          });
    },
    edit(id) {
      swal({
        title: "Are you sure?",
        text: "Are you edit",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_edit = {
            id: id,
            email: this.email, 
            firstname: this.firstname, 
            lastname: this.lastname, 
            role: this.role.selected, 
            sex: this.sex.selected, 
            birthday: this.birthday ,
            status: this.status.selected,
            subscribe: this.subscribe.selected
          };
          var url_edit = "api/user/edit/" + id;
          Axios.post(url_edit, data_edit)
            .then(response => {
              if (response.data.status == true) {
                this.$router.push({ name: 'List User'});
                swal("Edit Success!", "Edit success!", "success");
              } else swal("Oops!", "Edit Faild!", "error");
            })
            .catch(function(error) {
              swal("Oops!", "Edit Faild!", "error");
              e.preventDefault();
              console.error(error);
            });
        }
      });
    }
  }
};
</script>
