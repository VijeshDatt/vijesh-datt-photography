<template>
  <div>
    <v-container fluid>
      <h1 style="font-size: 4rem; font-weight: 300;" :class="{ 'text-center' : $vuetify.breakpoint.smAndDown }" class="mb-4">Contact</h1>
      <v-row>
        <v-col cols="12" md="6">
          <v-card rounded="lg" elevation="8" class="mx-md-8">
            <v-card-title class="justify-center">
              <h2>Information</h2>
            </v-card-title>
            <v-divider class="mx-16"></v-divider>
            <v-card-text>
              <v-row dense>
                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" icon="mdi-email-outline" color="primary" text class="rounded-lg">
                    Email: <strong><a href="mailto:info@vijeshdatt.com">info@vijeshdatt.com</a></strong>
                  </v-alert>
                </v-col>
                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" icon="mdi-phone-outline" color="primary" text class="rounded-lg">
                    Phone:
                    <v-menu offset-y left transition='scale' rounded='lg' origin='top center' nudgeBottom='5px'>
                      <template v-slot:activator="{ on, attrs }">
                        <strong><a class="text-decoration-underline" v-bind="attrs" v-on="on"> 711 7310 </a></strong>
                      </template>
                      <v-list nav>
                        <v-list-item @click="triggerAction('call')" :ripple="ripple">
                          <v-list-item-title>
                            <v-icon left>mdi-phone-outline</v-icon> Call
                          </v-list-item-title>
                        </v-list-item>
                        <v-list-item @click="triggerAction('sms')" :ripple="ripple">
                          <v-list-item-title>
                            <v-icon left>mdi-message-text-outline</v-icon> SMS
                          </v-list-item-title>
                        </v-list-item>
                      </v-list>
                    </v-menu>
                  </v-alert>
                </v-col>
                <v-col cols="12">
                  <v-alert border="left" elevation="0" icon="mdi-map-marker-outline" color="primary" text class="rounded-lg">
                    Location: <strong>Based in Suva, Fiji</strong>
                  </v-alert>
                </v-col>
                <v-col cols="12">
                  <v-alert border="left" elevation="0" type="info" class="rounded-lg" text icon="mdi-information-variant">
                    Due to photography being a hobby and due to my actual job timings, I don't take photography jobs outside of Suva (even Lami and Nausori is out of the way), unless it's the weekend and the requirements are not heavy.
                  </v-alert>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="12" md="6">
          <v-card rounded="lg" elevation="8" class="mx-md-8">
            <v-card-title class="justify-center">
              <h2>Contact Form</h2>
            </v-card-title>
            <v-divider class="mx-16"></v-divider>
            <v-card-text>
              <p>Fields with * are required</p>
              <v-form ref="form" v-model="valid" lazy-validation>
                <v-row dense>
                  <v-col cols="12" md="6">
                    <v-text-field v-model="formItem.name" label="Name *" outlined class="rounded-lg" :rules="fieldRules" counter="255" maxlength="255"></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-text-field v-model="formItem.phone" label="Phone Number" outlined class="rounded-lg" counter="10" maxlength="10" v-mask="'##########'" type="tel" :rules="formItem.phone ? phoneRules : []"></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field v-model="formItem.email" label="Email Address *" outlined class="rounded-lg" counter="255" maxlength="255" :rules="emailRules"></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field v-model="formItem.subject" label="Subject *" outlined class="rounded-lg" counter="255" maxlength="255" :rules="fieldRules"></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-textarea v-model="formItem.message" label="Message *" outlined class="rounded-lg" counter="1000" maxlength="1000" :rules="fieldRules" auto-grow rows="1"></v-textarea>
                  </v-col>
                </v-row>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-row dense>
                <v-col cols="12" md="6">
                  <v-btn block class="rounded-lg" color="success" @click="send" :disabled="!valid">
                    Send <v-icon right>mdi-send-outline</v-icon>
                  </v-btn>
                </v-col>
                <v-col cols="12" md="6">
                  <v-btn block class="rounded-lg" text color="error" @click="clear">
                    Clear Form <v-icon right>mdi-delete-empty-outline</v-icon>
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

    <v-snackbar v-model="snackbar" top :right="$vuetify.breakpoint.mdAndUp" app text outlined :color="type" rounded="lg" :transition="$vuetify.breakpoint.mdAndUp ? 'slide-x-reverse-transition' : 'slide-y-transition'">
      <v-icon left :color="type"> {{ type == 'success' ? 'mdi-checkbox-marked-circle-outline' : 'mdi-alert-circle-outline' }} </v-icon> {{ text }}
    </v-snackbar>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      valid: true,
      snackbar: false,
      text: '',
      type: 'success',
      formItem: {},
      fieldRules: [v => !!v || 'Field is required'],
      emailRules: [
        v => !!v || 'Email is required',
        v => /[a-zA-Z0-9._-]@[a-zA-Z0-9-]+\.\w+(\.\w+)?/.test(v) || 'Email is invalid',
      ],
      phoneRules: [
        v => !!v || 'Number is required',
        v => /[0-9]{7}/.test(v) || 'Not a valid Phone Number',
      ],
      ripple: {
        class: 'primary--text',
      }
    };
  },

  methods: {
    clear() {
      this.$refs.form.reset();
    },

    send() {
      if (this.$refs.form.validate()) {
        // console.log('success');
        axios
          .post('/api/email', this.formItem)
          .then(res => {
            this.snackbar = true;
            this.text = 'Email sent successfully';
            this.type = 'success';
            this.clear();
          })
          .catch(e => {
            this.snackbar = true;
            this.text = 'Error occurred, please try again...';
            this.type = 'error';
          });
      }
    },

    triggerAction(action) {
      if (action == 'call') window.location.href = 'tel:7117310';
      else if (action == 'sms') window.location.href = 'sms:7117310';
    },
  },
}
</script>

<style>
.scale-enter-active,
.scale-leave-active {
  transition: transform 0.1s;
  transform: scaleY(1);
}

.scale-enter,
.scale-leave-to {
  transform: scaleY(0);
}
</style>
