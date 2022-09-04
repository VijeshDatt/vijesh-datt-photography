<template>
	<div>
		<v-container fluid>
			<h1 style="font-size: 4rem; font-weight: 300;" :class="{ 'text-center': $vuetify.breakpoint.smAndDown }" class="mb-4">Contact</h1>
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
									<v-alert border="left" elevation="0" color="primary" text class="rounded-lg">
										<span class="d-flex align-center">
											<span class="mb-n1 mr-3">
												<svg width="24px" height="24px" viewBox="0 0 225 184" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;">
													<g id="Layer-1" serif:id="Layer 1">
														<path d="M216.667,133.333c-0,23.009 -18.659,41.667 -41.667,41.667l-125,0c-23.013,0 -41.667,-18.658 -41.667,-41.667l0,-83.333c0,-23.013 18.654,-41.667 41.667,-41.667l125,0c23.008,0 41.667,18.655 41.667,41.667l-0,83.333Z" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M216.667,50l-104.167,58.333l-104.167,-58.333" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M79.167,93.667l-70.834,39.666" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M216.667,133.333l-70.829,-39.666" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
													</g>
												</svg>
											</span>
											<span>
												Email: <strong><a href="mailto:info@vijeshdatt.com">info@vijeshdatt.com</a></strong>
											</span>
										</span>
									</v-alert>
								</v-col>
								<v-col cols="12" md="6">
									<v-alert border="left" elevation="0" color="primary" text class="rounded-lg">
										<span class="d-flex align-center">
											<span class="mb-n1 mr-3">
												<svg width="24px" height="24px" viewBox="0 0 225 225" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;">
													<g id="Layer-1" serif:id="Layer 1">
														<path d="M61.072,61.281c-42.405,42.554 -73.65,108.442 -35.571,146.667c2.958,2.971 13.741,11.012 27.096,8.087c15.716,-3.445 60.187,-39.55 33.271,-66.3c-16.471,-16.37 -18.334,-8.354 -21.584,-11.329c-6.229,-5.683 3.363,-28 24.567,-49.271c21.204,-21.287 43.633,-30.416 49.304,-24.154c2.954,3.263 -6.129,6.125 10.342,22.504c27.258,27.084 64.154,-18.166 67.583,-33.945c2.917,-13.4 -5.867,-25.005 -8.825,-27.971c-38.096,-38.242 -103.775,-6.846 -146.183,35.712Z" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
													</g>
												</svg>
											</span>
											<span>
												Phone:
												<v-menu offset-y left transition='scale' rounded='lg' origin='top center' nudgeBottom='5px'>
													<template v-slot:activator="{ on, attrs }">
														<strong><a class="text-decoration-underline" v-bind="attrs" v-on="on"> (+679) 711 7310 </a></strong>
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
											</span>
										</span>
									</v-alert>
								</v-col>
								<v-col cols="12">
									<v-alert border="left" elevation="0" color="primary" text class="rounded-lg">
										<span class="d-flex align-center">
											<span class="mb-n1 mr-3">
												<svg width="24px" height="24px" viewBox="0 0 134 225" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;">
													<g id="Layer-1" serif:id="Layer 1">
														<path d="M33.333,133.333l0,83.334l41.667,-0l0,-83.334l29.167,0l-0,-41.666l-29.167,-0l0,-20.834c0,-8.337 9.329,-20.816 20.833,-20.833l29.167,0l0,-41.667l-29.167,0c-34.529,0.013 -62.483,27.98 -62.5,62.5l0,20.834l-25,-0l0,41.666l25,0Z" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
													</g>
												</svg>
											</span>
											<span>
												Facebook: <strong><a href="https://www.facebook.com/VijeshDattPhotography" target="_blank">Vijesh Datt Photography</a></strong>
											</span>
										</span>
									</v-alert>
								</v-col>
								<v-col cols="12" md="6">
									<v-alert border="left" elevation="0" color="primary" text class="rounded-lg">
										<span class="d-flex align-center">
											<span class="mb-n1 mr-3">
												<svg width="24px" height="24px" viewBox="0 0 217 217" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;">
													<g id="Layer-1" serif:id="Layer 1">
														<path d="M208.333,166.667c0,23.008 -18.658,41.666 -41.666,41.666l-116.667,0c-23.013,0 -41.667,-18.658 -41.667,-41.666l0,-116.667c0,-23.013 18.654,-41.667 41.667,-41.667l116.667,0c23.008,0 41.666,18.654 41.666,41.667l0,116.667Z" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M162.5,108.333c0,-29.895 -24.271,-54.166 -54.167,-54.166c-29.895,-0 -54.166,24.271 -54.166,54.166c-0,29.896 24.271,54.167 54.166,54.167c29.896,0 54.167,-24.271 54.167,-54.167Z" style="fill:none;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M154.167,70.833l54.166,0" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M8.333,70.833l54.167,0" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M145.833,66.667l0,-58.334" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
													</g>
												</svg>
											</span>
											<span>
												Intagram: <strong><a href="https://www.instagram.com/vijeshdatt/" target="_blank">@vijeshdatt</a></strong>
											</span>
										</span>
									</v-alert>
								</v-col>
								<v-col cols="12" md="6">
									<v-alert border="left" elevation="0" color="primary" text class="rounded-lg">
										<span class="d-flex align-center">
											<span class="mb-n1 mr-3">
												<svg width="24px" height="24px" viewBox="0 0 167 225" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;">
													<g id="Layer-1" serif:id="Layer 1">
														<path d="M158.333,83.333c0,64.584 -54.166,133.334 -75,133.334c-20.833,-0 -75,-68.75 -75,-133.334c0,-41.42 33.58,-75 75,-75c41.421,0 75,33.58 75,75Z" style="fill:none;fill-rule:nonzero;stroke:#361d2e;stroke-width:16.67px;" />
														<path d="M120.833,83.333c0,-20.696 -16.803,-37.5 -37.5,-37.5c-20.696,0 -37.5,16.804 -37.5,37.5c0,20.697 16.804,37.5 37.5,37.5c20.697,0 37.5,-16.803 37.5,-37.5Z" style="fill:none;stroke:#361d2e;stroke-width:16.67px;" />
													</g>
												</svg>
											</span>
											<span>
												Location: <strong>Based in Suva, Fiji</strong>
											</span>
										</span>
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
				v => !!v || 'Field is required',
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
			if (action == 'call') window.location.href = 'tel:+6797117310';
			else if (action == 'sms') window.location.href = 'sms:+6797117310';
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
</style>
