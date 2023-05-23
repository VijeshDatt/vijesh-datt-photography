<template>
  <div>
    <v-container fluid>
      <h1 style="font-size: 4rem; font-weight: 300" :class="{ 'text-center': smAndDown }" class="mb-4">Contact</h1>

      <v-row v-if="mdAndUp">
        <!-- FAQ -->
        <v-col cols="12">
          <v-card rounded="lg" elevation="8" class="mx-md-8 mb-md-12">
            <v-card-title class="justify-center">
              <h2>FAQ</h2>
            </v-card-title>

            <v-divider class="mx-16"></v-divider>

            <v-card-text>
              <v-expansion-panels flat hover active-class="rounded-lg elevation-4">
                <v-expansion-panel>
                  <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>Do I do event photography?</strong> </v-expansion-panel-header>

                  <v-expansion-panel-content> Yes, coverage for events including (but not limited to) birthdays, graduations, receptions, official events and events such as concerts, music festivals and any other events not mentioned. Weddings are not covered. </v-expansion-panel-content>
                </v-expansion-panel>

                <v-expansion-panel>
                  <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>How much are my charges?</strong> </v-expansion-panel-header>

                  <v-expansion-panel-content>
                    <ul>
                      <li>Birthdays - $250 for 2 hours.</li>
                      <li>Graduations - $80 for 30 minutes.</li>
                      <li>Other events - $150 per hour.</li>
                    </ul>
                  </v-expansion-panel-content>
                </v-expansion-panel>

                <v-expansion-panel>
                  <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>Do I do wedding photography?</strong> </v-expansion-panel-header>

                  <v-expansion-panel-content>
                    No, unfortunately since I am hobbyist photographer, I can do only provide photos and not videos at the moment however if you require just a photographer then you may request for a quote or are looking for recommendations for a wedding videographer, you may contact Adarsh Bala at <strong><a href="https://www.facebook.com/adarshbalaphotography">Adarsh Bala Photography</a></strong> as he specialises in Wedding Photography and Videography
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>
            </v-card-text>
          </v-card>
        </v-col>

        <!-- Information section -->
        <v-col cols="12" md="6">
          <v-card rounded="lg" elevation="8" class="mx-md-8">
            <v-card-title class="justify-center">
              <h2>Information</h2>
            </v-card-title>

            <v-divider class="mx-16"></v-divider>

            <v-card-text>
              <v-row>
                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg mb-0" icon="fa-envelope">
                    Email: <strong><a href="mailto:info@vijeshdatt.com">info@vijeshdatt.com</a></strong>
                  </v-alert>
                </v-col>

                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg mb-0" icon="fa-phone">
                    Phone:
                    <v-menu offset-y left transition="scale" rounded="lg" origin="top center" nudgeBottom="5px">
                      <template v-slot:activator="{ on, attrs }">
                        <strong><a class="text-decoration-underline" v-bind="attrs" v-on="on"> (+679) 711 7310 </a></strong>
                      </template>

                      <v-list nav>
                        <v-list-item @click="triggerAction('call')" :ripple="ripple">
                          <v-list-item-title class="d-flex align-center"> <v-icon left size="15" class="mr-4">fa-phone</v-icon> Call </v-list-item-title>
                        </v-list-item>

                        <v-list-item @click="triggerAction('sms')" :ripple="ripple">
                          <v-list-item-title class="d-flex align-center"> <v-icon left size="15" class="mr-4">fa-message</v-icon> SMS </v-list-item-title>
                        </v-list-item>
                      </v-list>
                    </v-menu>
                  </v-alert>
                </v-col>
                <v-col cols="12">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg mb-0" icon="fa-facebook-f">
                    Facebook: <strong><a href="https://www.facebook.com/VijeshDattPhotography" target="_blank">Vijesh Datt Photography</a></strong>
                  </v-alert>
                </v-col>

                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg mb-0" icon="fa-instagram">
                    Intagram: <strong><a href="https://www.instagram.com/vijeshdatt/" target="_blank">@vijeshdatt</a></strong>
                  </v-alert>
                </v-col>

                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg mb-0" icon="fa-location-dot"> Location: <strong>Based in Suva, Fiji</strong> </v-alert>
                </v-col>

                <v-col cols="12">
                  <v-alert border="left" elevation="0" type="info" class="rounded-lg mb-0" text>
                    <template #prepend>
                      <v-icon class="ml-4 mr-5 mt-n1 info--text">fa-info</v-icon>
                    </template>

                    Due to photography being a hobby and due to my actual job timings, I don't take photography jobs outside of Suva (even Lami and Nausori is out of the way), unless it's the weekend and the requirements are not heavy.
                  </v-alert>
                </v-col>
              </v-row>
            </v-card-text>
          </v-card>
        </v-col>

        <!-- Contact Form -->
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
                    <v-text-field v-model="formItem.name" label="Name *" dense filled class="rounded-lg" :rules="fieldRules" counter="255" maxlength="255"></v-text-field>
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field v-model="formItem.phone" label="Phone Number" dense filled class="rounded-lg" counter="10" maxlength="10" v-mask="'##########'" type="tel" :rules="formItem.phone ? phoneRules : []"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field v-model="formItem.email" label="Email Address *" dense filled class="rounded-lg" counter="255" maxlength="255" :rules="emailRules"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field v-model="formItem.subject" label="Subject *" dense filled class="rounded-lg" counter="255" maxlength="255" :rules="fieldRules"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-textarea v-model="formItem.message" label="Message *" dense filled class="rounded-lg" counter="1000" maxlength="1000" :rules="fieldRules" auto-grow rows="1"></v-textarea>
                  </v-col>
                </v-row>
              </v-form>
            </v-card-text>

            <v-card-actions>
              <v-row dense>
                <v-col cols="6">
                  <v-btn block class="rounded-lg" color="success" @click="send" :disabled="!valid || isLoading" :loading="isLoading">
                    Send
                    <v-icon right>fa-paper-plane</v-icon>
                  </v-btn>
                </v-col>

                <v-col cols="6">
                  <v-btn block class="rounded-lg" text color="error" @click="clear">
                    Clear
                    <v-icon right>fa-trash</v-icon>
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>

      <div v-else>
        <v-expansion-panels flat active-class="rounded-lg elevation-4" class="rounded-lg">
          <v-expansion-panel>
            <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>FAQ</strong> </v-expansion-panel-header>

            <v-expansion-panel-content>
              <v-card flat>
                <v-card-text class="px-0">
                  <v-expansion-panels flat active-class="rounded-lg elevation-4">
                    <v-expansion-panel>
                      <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>Do I do event photography?</strong> </v-expansion-panel-header>

                      <v-expansion-panel-content> Yes, coverage for events including (but not limited to) birthdays, graduations, receptions, official events and events such as concerts, music festivals and any other events not mentioned. Weddings are not covered. </v-expansion-panel-content>
                    </v-expansion-panel>

                    <v-expansion-panel>
                      <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>How much are my charges?</strong> </v-expansion-panel-header>

                      <v-expansion-panel-content>
                        <ul>
                          <li>Birthdays - $250 for 2 hours.</li>
                          <li>Graduations - $80 for 30 minutes.</li>
                          <li>Other events - $150 per hour.</li>
                        </ul>
                      </v-expansion-panel-content>
                    </v-expansion-panel>

                    <v-expansion-panel>
                      <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>Do I do wedding photography?</strong> </v-expansion-panel-header>

                      <v-expansion-panel-content>
                        No, unfortunately since I am hobbyist photographer, I can do only provide photos and not videos at the moment however if you require just a photographer then you may request for a quote or are looking for recommendations for a wedding videographer, you may contact Adarsh Bala at <strong><a href="https://www.facebook.com/adarshbalaphotography">Adarsh Bala Photography</a></strong> as he specialises in Wedding Photography and Videography
                      </v-expansion-panel-content>
                    </v-expansion-panel>
                  </v-expansion-panels>
                </v-card-text>
              </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>

          <v-expansion-panel>
            <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>Information</strong> </v-expansion-panel-header>

            <v-expansion-panel-content>
              <v-row dense>
                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg" icon="fa-envelope">
                    Email: <strong><a href="mailto:info@vijeshdatt.com">info@vijeshdatt.com</a></strong>
                  </v-alert>
                </v-col>

                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg" icon="fa-phone">
                    Phone:
                    <v-menu offset-y left transition="scale" rounded="lg" origin="top center" nudgeBottom="5px">
                      <template v-slot:activator="{ on, attrs }">
                        <strong><a class="text-decoration-underline" v-bind="attrs" v-on="on"> (+679) 711 7310 </a></strong>
                      </template>

                      <v-list nav>
                        <v-list-item @click="triggerAction('call')" :ripple="ripple">
                          <v-list-item-title class="d-flex align-center"> <v-icon left size="15" class="mr-4">fa-phone</v-icon> Call </v-list-item-title>
                        </v-list-item>

                        <v-list-item @click="triggerAction('sms')" :ripple="ripple">
                          <v-list-item-title class="d-flex align-center"> <v-icon left size="15" class="mr-4">fa-message</v-icon> SMS </v-list-item-title>
                        </v-list-item>
                      </v-list>
                    </v-menu>
                  </v-alert>
                </v-col>

                <v-col cols="12">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg" icon="fa-facebook-f">
                    Facebook: <strong><a href="https://www.facebook.com/VijeshDattPhotography" target="_blank">Vijesh Datt Photography</a></strong>
                  </v-alert>
                </v-col>

                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg" icon="fa-instagram">
                    Intagram: <strong><a href="https://www.instagram.com/vijeshdatt/" target="_blank">@vijeshdatt</a></strong>
                  </v-alert>
                </v-col>

                <v-col cols="12" md="6">
                  <v-alert border="left" elevation="0" color="primary" text class="rounded-lg" icon="fa-location-dot"> Location: <strong>Based in Suva, Fiji</strong> </v-alert>
                </v-col>

                <v-col cols="12">
                  <v-alert border="left" elevation="0" type="info" class="rounded-lg" text icon="fa-info"> Due to photography being a hobby and due to my actual job timings, I don't take photography jobs outside of Suva (even Lami and Nausori is out of the way), unless it's the weekend and the requirements are not heavy. </v-alert>
                </v-col>
              </v-row>
            </v-expansion-panel-content>
          </v-expansion-panel>

          <v-expansion-panel>
            <v-expansion-panel-header expand-icon="fa-caret-down" class="rounded-lg"> <strong>Contact Form</strong> </v-expansion-panel-header>

            <v-expansion-panel-content>
              <p class="text-center">Fields with * are required</p>
              <v-form ref="form" v-model="valid" lazy-validation>
                <v-row dense>
                  <v-col cols="12">
                    <v-text-field v-model="formItem.name" label="Name *" dense filled class="rounded-lg" :rules="fieldRules" counter="255" maxlength="255"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field v-model="formItem.phone" label="Phone Number" dense filled class="rounded-lg" counter="10" maxlength="10" v-mask="'##########'" type="tel" :rules="formItem.phone ? phoneRules : []"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field v-model="formItem.email" label="Email Address *" dense filled class="rounded-lg" counter="255" maxlength="255" :rules="emailRules"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-text-field v-model="formItem.subject" label="Subject *" dense filled class="rounded-lg" counter="255" maxlength="255" :rules="fieldRules"></v-text-field>
                  </v-col>

                  <v-col cols="12">
                    <v-textarea v-model="formItem.message" label="Message *" dense filled class="rounded-lg" counter="1000" maxlength="1000" :rules="fieldRules" auto-grow rows="1"></v-textarea>
                  </v-col>
                </v-row>
              </v-form>

              <v-row dense>
                <v-col cols="6">
                  <v-btn block class="rounded-lg" color="success" @click="send()" :disabled="!valid || isLoading" :loading="isLoading">
                    Send
                    <v-icon right>fa-paper-plane</v-icon>
                  </v-btn>
                </v-col>

                <v-col cols="6">
                  <v-btn block class="rounded-lg" text color="error" @click="clear">
                    Clear
                    <v-icon right>fa-trash</v-icon>
                  </v-btn>
                </v-col>
              </v-row>
            </v-expansion-panel-content>
          </v-expansion-panel>
        </v-expansion-panels>
      </div>
    </v-container>

    <v-snackbar v-model="snackbar" top :right="mdAndUp" app text outlined :color="type" rounded="lg" :transition="mdAndUp ? 'slide-x-reverse-transition' : 'slide-y-transition'" class="mt-md-6">
      <v-icon left :color="type"> {{ type == "success" ? "mdi-checkbox-marked-circle-outline" : "mdi-alert-circle-outline" }} </v-icon> {{ text }}
    </v-snackbar>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      valid: true,
      snackbar: false,
      text: "",
      type: "success",
      formItem: {},
      fieldRules: [(v) => !!v || "Field is required"],
      emailRules: [(v) => !!v || "Field is required", (v) => /[a-zA-Z0-9._-]@[a-zA-Z0-9-]+\.\w+(\.\w+)?/.test(v) || "Email is invalid"],
      phoneRules: [(v) => !!v || "Number is required", (v) => /[0-9]{7}/.test(v) || "Not a valid Phone Number"],
      ripple: {
        class: "primary--text",
      },
      isLoading: false,
    };
  },

  methods: {
    clear() {
      this.$refs.form.reset();
    },

    send() {
      if (this.$refs.form.validate()) {
        this.isLoading = true;
        axios
          .post("/api/email", this.formItem)
          .then((res) => {
            this.snackbar = true;
            this.text = "Email sent successfully";
            this.type = "success";
            this.clear();
          })
          .catch((e) => {
            this.snackbar = true;
            this.text = "Error occurred, please try again...";
            this.type = "error";
          })
          .finally(() => (this.isLoading = false));
      }
    },

    triggerAction(action) {
      if (action == "call") window.location.href = "tel:+6797117310";
      else if (action == "sms") window.location.href = "sms:+6797117310";
    },
  },
};
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

.v-textarea.v-text-field--enclosed textarea {
  margin-top: 20px !important;
}

.v-text-field > .v-input__control > .v-input__slot:before,
.v-text-field > .v-input__control > .v-input__slot:after {
  border-style: none !important;
  /* 	border-radius: 50px !important; */
}

/* .v-text-field--filled .v-label--active {
	transform: translateY(-10px) scale(0.75) !important;
} */

.v-text-field--filled:not(.v-text-field--single-line):not(.v-select) input {
  margin-top: 19px !important;
}

.v-expansion-panel-header__icon > .v-icon.v-icon {
  font-size: 15px !important;
}
</style>
